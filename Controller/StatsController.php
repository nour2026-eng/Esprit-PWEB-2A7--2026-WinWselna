<?php
/**
 * Controller/StatsController.php
 * Read-only statistics computed from the database (no hard-coded figures):
 *  - admin dashboard, home page figures, and the client's own activity ("My space").
 */
require_once __DIR__ . '/../Config/database.php';

class StatsController
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnexion();
    }

    private function count(string $sql, array $params = []): int
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    private function rows(string $sql, array $params = []): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /** Counts per value of an ENUM column, with 0 for missing values. */
    private function countBy(string $table, string $column, array $values): array
    {
        $out = array_fill_keys($values, 0);
        foreach ($this->rows("SELECT `$column` AS k, COUNT(*) AS n FROM `$table` GROUP BY `$column`") as $r) {
            if (array_key_exists($r['k'], $out)) {
                $out[$r['k']] = (int) $r['n'];
            }
        }
        return $out;
    }

    // ==============================================================
    // ADMIN DASHBOARD
    // ==============================================================
    public function dashboard(): array
    {
        // registrations of the last 6 months (including empty months)
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $months[date('Y-m', strtotime("first day of -$i month"))] = 0;
        }
        foreach ($this->rows(
            "SELECT DATE_FORMAT(created_at, '%Y-%m') AS m, COUNT(*) AS n FROM users
             WHERE created_at >= DATE_SUB(DATE_FORMAT(CURDATE(), '%Y-%m-01'), INTERVAL 5 MONTH) GROUP BY m"
        ) as $r) {
            if (isset($months[$r['m']])) {
                $months[$r['m']] = (int) $r['n'];
            }
        }

        return [
            'users' => [
                'total'      => $this->count('SELECT COUNT(*) FROM users'),
                'byRole'     => $this->countBy('users', 'role', ['CLIENT', 'AGENT', 'ADMIN']),
                'verified'   => $this->count('SELECT COUNT(*) FROM users WHERE is_verified = 1'),
                'last7'      => $this->count('SELECT COUNT(*) FROM users WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)'),
                'last30'     => $this->count('SELECT COUNT(*) FROM users WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)'),
                'perMonth'   => $months,
                'perGov'     => $this->rows('SELECT governorate AS label, COUNT(*) AS n FROM users WHERE governorate IS NOT NULL AND governorate <> "" GROUP BY governorate ORDER BY n DESC LIMIT 6'),
                'latest'     => $this->rows('SELECT id, full_name, email, role, governorate, created_at FROM users ORDER BY created_at DESC, id DESC LIMIT 5'),
            ],
            'modules' => [
                'news'      => ['articles' => $this->count('SELECT COUNT(*) FROM articles'), 'categories' => $this->count('SELECT COUNT(*) FROM categories')],
                'projects'  => ['projects' => $this->count('SELECT COUNT(*) FROM projects'), 'milestones' => $this->count('SELECT COUNT(*) FROM milestones')],
                'safe'      => ['reclamations' => $this->count('SELECT COUNT(*) FROM reclamations'), 'byStatus' => $this->countBy('reclamations', 'status', ['SENT', 'ONGOING', 'DONE'])],
                'transport' => ['lines' => $this->count('SELECT COUNT(*) FROM transport_lines'), 'tickets' => $this->count('SELECT COUNT(*) FROM tickets')],
                'event'     => ['events' => $this->count('SELECT COUNT(*) FROM events'), 'participations' => $this->count('SELECT COUNT(*) FROM participations')],
                'jobs'      => ['offers' => $this->count('SELECT COUNT(*) FROM job_offers'), 'applications' => $this->count('SELECT COUNT(*) FROM applications')],
            ],
        ];
    }

    // ==============================================================
    // HOME PAGE
    // ==============================================================
    public function home(): array
    {
        return [
            'counts' => [
                'projects'     => $this->count('SELECT COUNT(*) FROM projects'),
                'reclamations' => $this->count('SELECT COUNT(*) FROM reclamations'),
                'positions'    => $this->count('SELECT COALESCE(SUM(positions),0) FROM job_offers'),
                'lines'        => $this->count('SELECT COUNT(*) FROM transport_lines'),
                'events'       => $this->count("SELECT COUNT(*) FROM events WHERE event_date >= NOW()"),
                'users'        => $this->count("SELECT COUNT(*) FROM users WHERE role = 'CLIENT'"),
            ],
            'articles' => $this->rows("SELECT a.id, a.title, a.content, a.image_url, a.published_at, c.name AS category
                                       FROM articles a JOIN categories c ON c.id = a.category_id
                                       WHERE a.status = 'PUBLISHED' ORDER BY a.published_at DESC LIMIT 3"),
            'projects' => $this->rows('SELECT id, title, governorate, progress, status, image_url FROM projects ORDER BY created_at DESC LIMIT 3'),
            'events'   => $this->rows('SELECT id, title, type, event_date, place, capacity,
                                       (SELECT COUNT(*) FROM participations p WHERE p.event_id = e.id AND p.status = "ACTIVE") AS taken
                                       FROM events e WHERE event_date >= NOW() ORDER BY event_date ASC LIMIT 2'),
            'jobs'     => $this->rows('SELECT j.id, j.title, j.contract_type, j.positions, j.salary, j.deadline, p.title AS project
                                       FROM job_offers j JOIN projects p ON p.id = j.project_id
                                       WHERE j.deadline >= CURDATE() ORDER BY j.deadline ASC LIMIT 2'),
        ];
    }

    // ==============================================================
    // CLIENT "MY SPACE" — the client's own activity in every module
    // ==============================================================
    public function mySpace(int $userId): array
    {
        $p = ['u' => $userId];
        return [
            'reclamations'   => $this->rows('SELECT id, type, location, status, created_at FROM reclamations WHERE user_id = :u ORDER BY created_at DESC LIMIT 10', $p),
            'tickets'        => $this->rows('SELECT t.id, t.travel_date, t.quantity, t.total_price, t.status, l.name AS line, l.departure, l.arrival
                                             FROM tickets t JOIN transport_lines l ON l.id = t.line_id WHERE t.user_id = :u ORDER BY t.purchased_at DESC LIMIT 10', $p),
            'participations' => $this->rows('SELECT pa.id, pa.status, e.title, e.event_date, e.place FROM participations pa
                                             JOIN events e ON e.id = pa.event_id WHERE pa.user_id = :u ORDER BY e.event_date DESC LIMIT 10', $p),
            'applications'   => $this->rows('SELECT a.id, a.status, a.applied_at, j.title, pr.title AS project FROM applications a
                                             JOIN job_offers j ON j.id = a.job_offer_id JOIN projects pr ON pr.id = j.project_id
                                             WHERE a.user_id = :u ORDER BY a.applied_at DESC LIMIT 10', $p),
        ];
    }
}

<?php
/**
 * Config/database.php — the only configuration file of the application:
 *  1. application constants (URL, session lifetime)
 *  2. secure PDO connection (Singleton: one connection shared by the whole application)
 *  3. small display helpers used by the views (escaping, links, flash messages)
 */

// ==============================================================
// 1. APPLICATION CONSTANTS
// ==============================================================
// Base URL of the application, e.g. "/winwselna/" — detected from the front controller location.
define('BASE_URL', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/');
define('APP_NAME', 'Win Wselna?');
define('SESSION_LIFETIME', 1800); // 30 minutes of inactivity

// ==============================================================
// 2. DATABASE CONNECTION (PDO Singleton)
// ==============================================================
class Database
{
    private static ?PDO $pdo = null;

    // --- Adjust these to match your local MySQL / phpMyAdmin setup ---
    private const HOST = 'localhost';
    private const NAME = 'winwselna';
    private const USER = 'root';
    private const PASS = '';

    public static function getConnexion(): PDO
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=' . self::HOST . ';dbname=' . self::NAME . ';charset=utf8mb4',
                    self::USER,
                    self::PASS,
                    [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // SQL errors raise exceptions
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false,                  // native prepared statements (anti SQL injection)
                    ]
                );
            } catch (PDOException $e) {
                http_response_code(500);
                die('Database connection error. Check Config/database.php and that the "winwselna" database is imported.');
            }
        }
        return self::$pdo;
    }
}

// ==============================================================
// 3. DISPLAY HELPERS (used by the views)
// ==============================================================
/** Escape any value before printing it in HTML (anti-XSS). */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Build a link to a route of the front controller: url('news') → /winwselna/index.php?action=news */
function url(string $action = 'home', array $params = []): string
{
    $query = array_merge(['action' => $action], $params);
    return BASE_URL . 'index.php?' . http_build_query($query);
}

/** Store a one-time message in the session (2 arguments), or read and clear it (no argument). */
function flash(?string $type = null, ?string $message = null): ?array
{
    if ($type !== null) {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
        return null;
    }
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}

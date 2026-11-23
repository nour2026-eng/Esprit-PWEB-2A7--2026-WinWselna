<?php
/**
 * Controller/AuthController.php
 * All the business logic of authentication: DB access (prepared statements), password hashing,
 * input validation, sessions, CSRF protection and role control.
 */
require_once __DIR__ . '/../Config/database.php';
require_once __DIR__ . '/../Model/UserModel.php';

class AuthController
{
    protected PDO $db;

    /** The 24 governorates of Tunisia (allowed values for the "governorate" field). */
    public const GOVERNORATES = [
        'Ariana', 'Béja', 'Ben Arous', 'Bizerte', 'Gabès', 'Gafsa', 'Jendouba', 'Kairouan',
        'Kasserine', 'Kébili', 'Le Kef', 'Mahdia', 'La Manouba', 'Médenine', 'Monastir', 'Nabeul',
        'Sfax', 'Sidi Bouzid', 'Siliana', 'Sousse', 'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan',
    ];
    /** Roles allowed in the back office. */
    public const STAFF_ROLES = ['ADMIN', 'AGENT'];

    public function __construct()
    {
        $this->db = Database::getConnexion();
    }

    // ==============================================================
    // SESSION STATE & ROLE CONTROL
    // ==============================================================
    public static function isAuthenticated(): bool
    {
        return !empty($_SESSION['user_id']);
    }

    public static function currentRole(): ?string
    {
        return self::isAuthenticated() ? ($_SESSION['role'] ?? null) : null;
    }

    public static function isStaff(): bool
    {
        return in_array(self::currentRole(), self::STAFF_ROLES, true);
    }

    /** Where a user lands after login, depending on the role stored in the database. */
    public static function homeFor(?string $role): string
    {
        return in_array($role, self::STAFF_ROLES, true) ? 'admin' : 'home';
    }

    /** Stops execution and sends to the login page if nobody is logged in. */
    public static function requireAuth(): void
    {
        if (!self::isAuthenticated()) {
            flash('error', 'Please log in to access this page.');
            header('Location: ' . url('login'));
            exit;
        }
    }

    /**
     * Stops execution with HTTP 403 if the logged-in user does not have one of the roles.
     * Must be called on EVERY sensitive route (never only at login time).
     */
    public static function requireRole(array $roles): void
    {
        self::requireAuth();
        if (!in_array($_SESSION['role'] ?? null, $roles, true)) {
            http_response_code(403);
            require __DIR__ . '/../View/errors/403.php';
            exit;
        }
    }

    // ==============================================================
    // CSRF
    // ==============================================================
    public function getCsrfToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public function verifyCsrfToken(?string $token): bool
    {
        if (!$token || empty($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    // ==============================================================
    // DATA ACCESS (prepared statements — SQL injection protection)
    // ==============================================================
    public function findById(int $id): ?UserModel
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ? UserModel::fromArray($row) : null;
    }

    protected function findByEmail(string $email): ?UserModel
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch();
        return $row ? UserModel::fromArray($row) : null;
    }

    /** True if another account (different id) already uses this email. */
    protected function emailTaken(string $email, int $ignoreId = 0): bool
    {
        $stmt = $this->db->prepare('SELECT id FROM users WHERE email = :email AND id <> :id LIMIT 1');
        $stmt->execute(['email' => $email, 'id' => $ignoreId]);
        return (bool) $stmt->fetch();
    }

    protected function insertUser(UserModel $user): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (full_name, email, password, phone, governorate, role, is_verified)
             VALUES (:full_name, :email, :password, :phone, :governorate, :role, :is_verified)'
        );
        return $stmt->execute([
            'full_name'   => $user->getFullName(),
            'email'       => $user->getEmail(),
            'password'    => $user->getPassword(),
            'phone'       => $user->getPhone(),
            'governorate' => $user->getGovernorate(),
            'role'        => $user->getRole(),
            'is_verified' => $user->isVerified() ? 1 : 0,
        ]);
    }

    // ==============================================================
    // SERVER-SIDE VALIDATION (shared by register, profile and admin forms)
    // ==============================================================
    /**
     * Validates the identity fields. Returns [errors, clean values].
     * $passwordMode: 'required' (sign up / admin create), 'optional' (admin edit), 'none' (profile edit)
     */
    public function validateUserFields(array $post, string $passwordMode, int $ignoreId = 0): array
    {
        $errors = [];
        $clean = [
            'full_name'   => trim((string) ($post['full_name'] ?? '')),
            'email'       => mb_strtolower(trim((string) ($post['email'] ?? ''))),
            'phone'       => preg_replace('/\s+/', '', (string) ($post['phone'] ?? '')),
            'governorate' => trim((string) ($post['governorate'] ?? '')),
            'password'    => (string) ($post['password'] ?? ''),
        ];

        if ($clean['full_name'] === '' || $clean['email'] === '' || $clean['phone'] === '' || $clean['governorate'] === '') {
            $errors['form'] = 'All fields marked with * are required.';
        }
        if (!preg_match("/^[\p{L}][\p{L}' -]{2,99}$/u", $clean['full_name'])) {
            $errors['full_name'] = 'Full name: 3 to 100 letters (spaces, apostrophes and hyphens allowed).';
        }
        if (!filter_var($clean['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($clean['email']) > 150) {
            $errors['email'] = 'Invalid email address.';
        } elseif ($this->emailTaken($clean['email'], $ignoreId)) {
            $errors['email'] = 'This email is already used by another account.';
        }
        if (!preg_match('/^(\+216)?[2-9]\d{7}$/', $clean['phone'])) {
            $errors['phone'] = 'Phone: a Tunisian number of 8 digits (optionally +216).';
        }
        if (!in_array($clean['governorate'], self::GOVERNORATES, true)) {
            $errors['governorate'] = 'Choose a governorate from the list.';
        }
        if ($passwordMode === 'required' || ($passwordMode === 'optional' && $clean['password'] !== '')) {
            if (!self::strongPassword($clean['password'])) {
                $errors['password'] = 'Password: at least 8 characters, with at least one letter and one digit.';
            } elseif ($clean['password'] !== (string) ($post['password_confirm'] ?? '')) {
                $errors['password_confirm'] = 'Passwords do not match.';
            }
        }
        return [$errors, $clean];
    }

    public static function strongPassword(string $password): bool
    {
        return strlen($password) >= 8 && strlen($password) <= 72
            && preg_match('/[A-Za-z]/', $password) && preg_match('/\d/', $password);
    }

    // ==============================================================
    // REGISTER (Create) — role is ALWAYS forced to CLIENT (no self-promotion)
    // ==============================================================
    public function register(array $post): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        [$errors, $clean] = $this->validateUserFields($post, 'required');
        if (empty($post['terms'])) {
            $errors['terms'] = 'You must accept the terms of use.';
        }
        if ($errors) {
            return $errors;
        }

        $user = new UserModel();
        $user->setFullName($clean['full_name']);
        $user->setEmail($clean['email']);
        $user->setPassword(password_hash($clean['password'], PASSWORD_DEFAULT)); // bcrypt + automatic salt
        $user->setPhone($clean['phone']);
        $user->setGovernorate($clean['governorate']);
        $user->setRole('CLIENT');
        $user->setIsVerified(false);

        if (!$this->insertUser($user)) {
            return ['form' => 'An error occurred while creating your account.'];
        }
        return []; // empty = success
    }

    // ==============================================================
    // LOGIN
    // ==============================================================
    public function login(array $post): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        $email = mb_strtolower(trim((string) ($post['email'] ?? '')));
        $password = (string) ($post['password'] ?? '');
        if ($email === '' || $password === '') {
            return ['form' => 'Please enter your email and password.'];
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['form' => 'Incorrect email or password.'];
        }

        $user = $this->findByEmail($email);
        // Deliberately generic message: never reveal whether the email exists
        if (!$user || !password_verify($password, $user->getPassword())) {
            return ['form' => 'Incorrect email or password.'];
        }

        // New session id after login: protects against session fixation
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['full_name'] = $user->getFullName();
        $_SESSION['role'] = $user->getRole();          // copied from the DATABASE, never chosen by the visitor
        $_SESSION['last_activity'] = time();
        unset($_SESSION['csrf_token']);                   // new token for the new session
        return [];
    }

    // ==============================================================
    // LOGOUT
    // ==============================================================
    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();
    }

    // ==============================================================
    // PROFILE (Read / Update / Delete of one's own account)
    // ==============================================================
    /** Returns the logged-in user, or logs out if the account no longer exists. */
    public function currentUser(): UserModel
    {
        self::requireAuth();
        $user = $this->findById((int) $_SESSION['user_id']);
        if (!$user) {
            $this->logout();
            session_start();
            flash('error', 'Your account no longer exists.');
            header('Location: ' . url('login'));
            exit;
        }
        // keep the session in sync if an admin changed the role in the meantime
        $_SESSION['role'] = $user->getRole();
        $_SESSION['full_name'] = $user->getFullName();
        return $user;
    }

    public function updateProfile(UserModel $user, array $post): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        [$errors, $clean] = $this->validateUserFields($post, 'none', $user->getId());
        if ($errors) {
            return $errors;
        }
        $stmt = $this->db->prepare(
            'UPDATE users SET full_name = :full_name, email = :email, phone = :phone, governorate = :governorate WHERE id = :id'
        );
        $stmt->execute([
            'full_name' => $clean['full_name'], 'email' => $clean['email'], 'phone' => $clean['phone'],
            'governorate' => $clean['governorate'], 'id' => $user->getId(),
        ]);
        $_SESSION['full_name'] = $clean['full_name'];
        return [];
    }

    public function changePassword(UserModel $user, array $post): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        $errors = [];
        if (!password_verify((string) ($post['current_password'] ?? ''), $user->getPassword())) {
            $errors['current_password'] = 'Your current password is incorrect.';
        }
        $new = (string) ($post['new_password'] ?? '');
        if (!self::strongPassword($new)) {
            $errors['new_password'] = 'New password: at least 8 characters, with at least one letter and one digit.';
        } elseif ($new !== (string) ($post['new_password_confirm'] ?? '')) {
            $errors['new_password_confirm'] = 'Passwords do not match.';
        } elseif (password_verify($new, $user->getPassword())) {
            $errors['new_password'] = 'The new password must be different from the current one.';
        }
        if ($errors) {
            return $errors;
        }
        $stmt = $this->db->prepare('UPDATE users SET password = :password WHERE id = :id');
        $stmt->execute(['password' => password_hash($new, PASSWORD_DEFAULT), 'id' => $user->getId()]);
        session_regenerate_id(true);
        return [];
    }

    /** Deletes the logged-in account after password confirmation. The last administrator cannot delete itself. */
    public function deleteAccount(UserModel $user, array $post): array
    {
        if (!$this->verifyCsrfToken($post['csrf_token'] ?? null)) {
            return ['form' => 'Invalid security token. Please try again.'];
        }
        if (!password_verify((string) ($post['delete_password'] ?? ''), $user->getPassword())) {
            return ['delete_password' => 'Password incorrect: your account was not deleted.'];
        }
        if ($user->getRole() === 'ADMIN' && $this->countByRole('ADMIN') <= 1) {
            return ['form' => 'You are the last administrator: create another admin before deleting your account.'];
        }
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->execute(['id' => $user->getId()]);
        $this->logout();
        return [];
    }

    public function countByRole(string $role): int
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE role = :role');
        $stmt->execute(['role' => $role]);
        return (int) $stmt->fetchColumn();
    }
}

<?php
/**
 * Config/database.php
 * Secure PDO connection — Singleton: one connection shared by the whole application.
 */
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

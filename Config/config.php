<?php
/**
 * Config/config.php
 * Application constants + small display helpers used by the views.
 */

// Base URL of the application, e.g. "/winwselna/" — detected from the front controller location.
define('BASE_URL', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/');
define('APP_NAME', 'Win Wselna?');
define('SESSION_LIFETIME', 1800); // 30 minutes of inactivity

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

/** Read and clear a one-time message stored in the session (flash message). */
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

<?php
/**
 * View/backoffice/index.php — entry of the back office folder.
 * Hands over to the front controller, which checks the session:
 *  - not logged in → login page with a message
 *  - CLIENT        → 403 Access denied
 *  - ADMIN / AGENT → dashboard
 */
header('Location: ../../index.php?action=admin');
exit;

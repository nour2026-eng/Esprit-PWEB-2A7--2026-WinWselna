<?php /* Shown by AuthController::requireRole() when the role does not allow the page (HTTP 403) */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $title = 'Access denied'; require __DIR__ . '/../frontoffice/includes/head.php'; ?>
</head>
<body class="front">
<main class="container" style="min-height:100vh;display:grid;place-items:center">
  <div class="empty" style="max-width:520px;border-style:solid">
    <div class="empty-ico" style="--m:var(--red)"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></div>
    <span class="kicker">Error 403</span>
    <h3 style="font-size:26px;margin-top:6px">Access denied</h3>
    <p>Your account does not have the permissions required to open this page.</p>
    <div class="flex" style="justify-content:center;margin-top:16px">
      <a class="btn btn-navy" href="<?= e(url(AuthController::homeFor(AuthController::currentRole()))) ?>">Back to my space</a>
      <a class="btn btn-ghost" href="<?= e(url('logout')) ?>">Log out</a>
    </div>
  </div>
</main>
</body>
</html>

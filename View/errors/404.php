<?php /* Unknown route */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $title = 'Page not found'; require __DIR__ . '/../frontoffice/includes/head.php'; ?>
</head>
<body class="front">
<main class="container" style="min-height:100vh;display:grid;place-items:center">
  <div class="empty" style="max-width:520px;border-style:solid">
    <div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-pin"/></svg></div>
    <span class="kicker">Error 404</span>
    <h3 style="font-size:26px;margin-top:6px">Win wselna? This page doesn't exist.</h3>
    <p>The link may be wrong or the page was moved.</p>
    <a class="btn btn-primary" href="<?= e(url('home')) ?>">Back to the home page</a>
  </div>
</main>
</body>
</html>

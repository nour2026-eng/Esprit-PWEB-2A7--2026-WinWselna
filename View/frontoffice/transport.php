<?php
/**
 * View/transport.php — Win Transport. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'transport'; $title = 'Win Transport';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="page-head m-transport">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Transport</span></div>
        <h1>Where's my bus?</h1>
        <p>Bus, metro, train and louage lines near you, with their status during public works. Buy your ticket online and show the QR code on board.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-transport"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="empty m-transport"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-transport"/></svg></div><h3>No transport line yet</h3><p>Lines, fares and their status will be listed here. Tickets can then be bought online.</p><?php if (!AuthController::isAuthenticated()): ?><a class="btn btn-primary btn-sm" href="<?= e(url('login')) ?>">Log in to continue</a><?php endif; ?></div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

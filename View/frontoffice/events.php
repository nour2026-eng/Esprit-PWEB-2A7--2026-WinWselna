<?php
/**
 * View/events.php — Win Event. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'events'; $title = 'Win Event';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="page-head m-event">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Event</span></div>
        <h1>Can I have my say?</h1>
        <p>Public consultations, neighbourhood meetings and openings around the projects near you. Register in one click, cancel anytime.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="empty m-event"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></div><h3>No event scheduled yet</h3><p>Upcoming consultations and meetings will be announced here.</p><?php if (!AuthController::isAuthenticated()): ?><a class="btn btn-primary btn-sm" href="<?= e(url('login')) ?>">Log in to continue</a><?php endif; ?></div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

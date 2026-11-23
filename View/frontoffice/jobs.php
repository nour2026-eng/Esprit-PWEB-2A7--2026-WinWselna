<?php
/**
 * View/jobs.php — Win Jobs. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'jobs'; $title = 'Win Jobs';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="page-head m-jobs">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Jobs</span></div>
        <h1>Is there work near me?</h1>
        <p>Every public project publishes the jobs it creates. Apply with your CV and follow your application until the answer.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="empty m-jobs"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></div><h3>No job offer yet</h3><p>Job offers created by public projects will be listed here.</p><?php if (!AuthController::isAuthenticated()): ?><a class="btn btn-primary btn-sm" href="<?= e(url('login')) ?>">Log in to continue</a><?php endif; ?></div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

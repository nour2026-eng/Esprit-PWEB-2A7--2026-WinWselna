<?php
/**
 * View/projects.php — Win Projects. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'projects'; $title = 'Win Projects';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="page-head m-projects">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Projects</span></div>
        <h1>Where is this project at?</h1>
        <p>Every public project with its budget, its milestones and its progress. Follow one to be notified at each new milestone.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="empty m-projects"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></div><h3>No public project yet</h3><p>Projects, their milestones and their progress will be listed here.</p></div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

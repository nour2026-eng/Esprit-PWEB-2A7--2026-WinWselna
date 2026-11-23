<?php
/**
 * View/project.php — Project details. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'project'; $title = 'Project details';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="container" style="padding:34px 0 60px">
  <div class="crumbs" style="color:var(--muted);margin-bottom:14px"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><a href="<?= e(url('projects')) ?>">Win Projects</a></div>
  <div class="empty m-projects"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></div><h3>Project not found</h3><p>This project does not exist yet.</p><a class="btn btn-module btn-sm m-projects" href="<?= e(url('projects')) ?>">Back to the projects</a></div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

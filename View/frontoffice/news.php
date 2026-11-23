<?php
/**
 * View/news.php — Win News. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'news'; $title = 'Win News';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="page-head m-news">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win News</span></div>
        <h1>What's happening today?</h1>
        <p>Official articles from your municipality and ministries, classified by category, each with a 60-second summary.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="empty m-news"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></div><h3>No article published yet</h3><p>Articles and their categories will appear here as soon as the newsroom publishes them.</p></div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

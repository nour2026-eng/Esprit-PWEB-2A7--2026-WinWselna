<?php
/* Navbar — the calling page sets $page ('home','news','projects','reclamations','requests','events','jobs','account', ...)
   isActive() adds the .active class to the link of the current page only. */
if (!function_exists('isActive')) {
  function isActive($name) {
    global $page;
    return (isset($page) && $page === $name) ? 'active' : '';
  }
}
$navItems = [
  ['news',         'news.php',         'news',     'News',     'm-news'],
  ['projects',     'projects.php',     'projects', 'Projects', 'm-projects'],
  ['reclamations', 'reclamations.php', 'safe',     'Reclamations', 'm-safe'],
  ['requests',     'requests.php',     'request',  'Requests', 'm-request'],
  ['events',       'events.php',       'event',    'Events',   'm-event'],
  ['jobs',         'jobs.php',         'jobs',     'Jobs',     'm-jobs'],
];
?>
<!-- Top strip -->
<div class="topstrip">
  <div class="container">
    <span class="ar">الدولة في جيبك · وين وصلنا؟</span>
    <div class="ts-links">
      <a href="tel:80100100" class="hide-sm"><svg class="ico"><use href="img/icons.svg#i-phone"/></svg>80 100 100</a>
      <a href="mailto:contact@winwselna.tn" class="hide-sm"><svg class="ico"><use href="img/icons.svg#i-mail"/></svg>contact@winwselna.tn</a>
      <a href="admin/login.php" class="ts-staff" title="Agents and admins"><svg class="ico"><use href="img/icons.svg#i-dashboard"/></svg>Back office</a>
      <div class="lang" role="group" aria-label="Language"><button class="active">EN</button><button>FR</button><button>ع</button></div>
    </div>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar">
  <div class="container">
    <a href="index.php" class="brand"><img src="img/logo.svg" alt=""><b>WIN WSELNA<i>?</i></b></a>
    <div class="nav-pills" id="nav-pills">
      <a href="index.php" class="<?php echo isActive('home'); ?>"><svg class="ico"><use href="img/icons.svg#i-dashboard"/></svg><span>Home</span></a>
      <?php foreach ($navItems as $it): ?>
      <a href="<?php echo $it[1]; ?>" class="<?php echo $it[4] . ' ' . isActive($it[0]); ?>"><svg class="ico"><use href="img/icons.svg#i-<?php echo $it[2]; ?>"/></svg><span><?php echo $it[3]; ?></span></a>
      <?php endforeach; ?>
    </div>
    <div class="nav-actions">
      <a href="account.php" class="btn btn-ghost btn-sm <?php echo isActive('account'); ?>" title="My account"><svg class="ico ico-sm"><use href="img/icons.svg#i-user"/></svg><span>My space</span></a>
      <a href="login.php" class="btn btn-primary btn-sm"><span>Log in</span><svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
      <button class="nav-toggle" aria-label="Open menu" aria-controls="nav-pills" aria-expanded="false"><svg class="ico"><use href="img/icons.svg#i-menu"/></svg></button>
    </div>
  </div>
</nav>

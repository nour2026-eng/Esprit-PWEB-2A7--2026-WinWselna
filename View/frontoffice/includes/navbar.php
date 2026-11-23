<?php
/* Navbar — the calling page sets $page ('home','news','projects','reclamations','transport','events','jobs','account')
   isActive() adds the .active class to the link of the current page only.
   The right-hand buttons depend on the session: visitor / client / staff (ADMIN, AGENT). */
if (!function_exists('isActive')) {
  function isActive($name) {
    global $page;
    return (isset($page) && $page === $name) ? 'active' : '';
  }
}
$navItems = [
  ['news',         'news',     'News',         'm-news'],
  ['projects',     'projects', 'Projects',     'm-projects'],
  ['reclamations', 'safe',     'Reclamations', 'm-safe'],
  ['transport',    'transport','Transport',    'm-transport'],
  ['events',       'event',    'Events',       'm-event'],
  ['jobs',         'jobs',     'Jobs',         'm-jobs'],
];
$navLogged = AuthController::isAuthenticated();
$navStaff  = AuthController::isStaff();
?>
<!-- Top strip -->
<div class="topstrip">
  <div class="container">
    <span class="ar">الدولة في جيبك · وين وصلنا؟</span>
    <div class="ts-links">
      <a href="tel:80100100" class="hide-sm"><svg class="ico"><use href="img/icons.svg#i-phone"/></svg>80 100 100</a>
      <a href="mailto:contact@winwselna.tn" class="hide-sm"><svg class="ico"><use href="img/icons.svg#i-mail"/></svg>contact@winwselna.tn</a>
      <div class="lang" role="group" aria-label="Language"><button class="active">EN</button><button>FR</button><button>ع</button></div>
    </div>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar">
  <div class="container">
    <a href="<?= e(url('home')) ?>" class="brand"><img src="img/logo.svg" alt=""><b>WIN WSELNA<i>?</i></b></a>
    <div class="nav-pills" id="nav-pills">
      <a href="<?= e(url('home')) ?>" class="<?= isActive('home') ?>"><svg class="ico"><use href="img/icons.svg#i-dashboard"/></svg><span>Home</span></a>
      <?php foreach ($navItems as $it): ?>
      <a href="<?= e(url($it[0])) ?>" class="<?= $it[3] . ' ' . isActive($it[0]) ?>"><svg class="ico"><use href="img/icons.svg#i-<?= $it[1] ?>"/></svg><span><?= $it[2] ?></span></a>
      <?php endforeach; ?>
    </div>
    <div class="nav-actions">
      <?php if (!$navLogged): ?>
        <a href="<?= e(url('register')) ?>" class="btn btn-ghost btn-sm"><svg class="ico ico-sm"><use href="img/icons.svg#i-user"/></svg><span>Sign up</span></a>
        <a href="<?= e(url('login')) ?>" class="btn btn-primary btn-sm"><span>Log in</span><svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
      <?php elseif ($navStaff): ?>
        <a href="<?= e(url('admin')) ?>" class="btn btn-navy btn-sm"><svg class="ico ico-sm"><use href="img/icons.svg#i-dashboard"/></svg><span>Dashboard</span></a>
        <a href="<?= e(url('logout')) ?>" class="btn btn-ghost btn-sm" title="Log out"><svg class="ico ico-sm"><use href="img/icons.svg#i-logout"/></svg></a>
      <?php else: ?>
        <a href="<?= e(url('account')) ?>" class="nav-user <?= isActive('account') ?>" title="My space"><span class="avatar" style="width:30px;height:30px;font-size:11px;background:linear-gradient(135deg,var(--navy),var(--teal))"><?= e(mb_strtoupper(mb_substr($_SESSION['full_name'] ?? '?', 0, 1))) ?></span><span><?= e(explode(' ', $_SESSION['full_name'] ?? '')[0]) ?></span></a>
        <a href="<?= e(url('logout')) ?>" class="btn btn-ghost btn-sm" title="Log out"><svg class="ico ico-sm"><use href="img/icons.svg#i-logout"/></svg></a>
      <?php endif; ?>
      <button class="nav-toggle" aria-label="Open menu" aria-controls="nav-pills" aria-expanded="false"><svg class="ico"><use href="img/icons.svg#i-menu"/></svg></button>
    </div>
  </div>
</nav>

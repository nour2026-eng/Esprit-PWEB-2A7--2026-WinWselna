<?php
/* Sidebar — the calling page sets $page; isActive() marks the current link.
   Links are built on the SERVER from the role in the session: an agent never receives the admin-only links.
   (Each route is ALSO protected by AuthController::requireRole() in index.php.) */
if (!function_exists('isActive')) {
  function isActive($name) {
    global $page;
    return (isset($page) && $page === $name) ? 'active' : '';
  }
}
$sbRole = AuthController::currentRole();
$sbAdmin = $sbRole === 'ADMIN';
$sbMenu = [
  // label (section), [route, page, icon, text, module class, roles]
  ['Win Account', [['admin_users', 'users', 'users', 'Users & roles', 'm-user', ['ADMIN']]]],
  ['Win News', [['admin_categories', 'categories', 'layers', 'Categories', 'm-news', ['ADMIN']], ['admin_articles', 'articles', 'news', 'Articles', 'm-news', ['ADMIN']]]],
  ['Win Projects', [['admin_projects', 'projects', 'projects', 'Projects', 'm-projects', ['ADMIN']], ['admin_milestones', 'milestones', 'flag', 'Milestones', 'm-projects', ['ADMIN', 'AGENT']]]],
  ['Win Safe', [['admin_reclamations', 'reclamations', 'safe', 'Reclamations', 'm-safe', ['ADMIN', 'AGENT']]]],
  ['Win Transport', [['admin_lines', 'lines', 'transport', 'Transport lines', 'm-transport', ['ADMIN']], ['admin_tickets', 'tickets', 'ticket', 'Tickets', 'm-transport', ['ADMIN', 'AGENT']]]],
  ['Win Event', [['admin_events', 'events', 'event', 'Events', 'm-event', ['ADMIN']], ['admin_participations', 'participations', 'users', 'Participations', 'm-event', ['ADMIN']]]],
  ['Win Jobs', [['admin_job_offers', 'job-offers', 'jobs', 'Job offers', 'm-jobs', ['ADMIN']], ['admin_applications', 'applications', 'file', 'Applications', 'm-jobs', ['ADMIN']]]],
];
?>
<aside class="sidebar" aria-label="Dashboard navigation">
  <a href="<?= e(url('admin')) ?>" class="sb-brand"><img src="img/logo-white.svg" alt=""><div>WIN WSELNA<span>?</span><small><?= $sbAdmin ? 'ADMINISTRATOR' : 'MUNICIPAL AGENT' ?></small></div></a>
  <nav class="sb-nav">
    <a href="<?= e(url('admin')) ?>" class="sb-link <?= isActive('dashboard') ?>"><svg class="ico"><use href="img/icons.svg#i-dashboard"/></svg>Dashboard</a>
    <?php foreach ($sbMenu as [$section, $links]):
      $visible = array_filter($links, fn($l) => in_array($sbRole, $l[5], true));
      if (!$visible) continue; ?>
      <div class="sb-label"><?= e($section) ?></div>
      <?php foreach ($visible as $l): ?>
        <a href="<?= e(url($l[0])) ?>" class="sb-link <?= $l[4] ?> <?= isActive($l[1]) ?>"<?= $l[4] === 'm-user' ? ' style="--m:#9FB3C8"' : '' ?>><svg class="ico"><use href="img/icons.svg#i-<?= $l[2] ?>"/></svg><?= e($l[3]) ?></a>
      <?php endforeach; ?>
    <?php endforeach; ?>

    <div class="sb-label">My account</div>
    <a href="<?= e(url('admin_profile')) ?>" class="sb-link <?= isActive('profile') ?>"><svg class="ico"><use href="img/icons.svg#i-user"/></svg>My profile</a>
    <a href="<?= e(url('home')) ?>" class="sb-link"><svg class="ico"><use href="img/icons.svg#i-globe"/></svg>View the website</a>
    <a href="<?= e(url('logout')) ?>" class="sb-link"><svg class="ico"><use href="img/icons.svg#i-logout"/></svg>Log out</a>
  </nav>
  <div class="sb-foot"><div class="sb-help"><img src="img/mascot.webp" alt=""><div><b>3am Win</b><br>Session expires after 30 min of inactivity</div></div></div>
</aside>
<div class="overlay"></div>

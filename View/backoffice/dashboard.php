<?php
/**
 * View/admin/index.php — dashboard (ADMIN + AGENT). All figures come from the database ($stats, StatsController).
 * Expects: $user (UserModel), $stats (array)
 */
$page = 'dashboard'; $title = 'Dashboard';
$u = $stats['users']; $m = $stats['modules'];
$isAdmin = $user->getRole() === 'ADMIN';
$monthLabels = array_map(fn($k) => date('M', strtotime($k . '-01')), array_keys($u['perMonth']));
$roleBadge = ['ADMIN' => 'b-info', 'AGENT' => 'b-ok', 'CLIENT' => 'b-gray'];
$pct = fn($a, $b) => $b > 0 ? round($a / $b * 100) : 0;
$hour = (int) date('G');
$greet = $hour < 12 ? 'Good morning' : ($hour < 18 ? 'Good afternoon' : 'Good evening');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="admin">
<div class="admin-wrap">
<?php require __DIR__ . '/includes/sidebar.php'; ?>
<div class="main">
<?php require __DIR__ . '/includes/topbar.php'; ?>
<main class="content">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><span>Dashboard</span></div>
      <h1><?= $greet ?>, <?= e(explode(' ', $user->getFullName())[0]) ?></h1>
      <p>Live statistics from the database · <?= e(date('l d F Y')) ?></p>
    </div>
    <?php if ($isAdmin): ?><a class="btn btn-primary" href="<?= e(url('admin_users')) ?>"><svg class="ico ico-sm"><use href="img/icons.svg#i-users"/></svg>Manage users</a><?php endif; ?>
  </div>

  <!-- ===== Accounts ===== -->
  <div class="kpis">
    <div class="kpi" style="--m:var(--navy)"><svg class="ico"><use href="img/icons.svg#i-users"/></svg><span class="trend">+<?= (int) $u['last30'] ?> in 30 days</span><b data-count="<?= (int) $u['total'] ?>">0</b><span>Accounts</span></div>
    <div class="kpi" style="--m:var(--teal)"><svg class="ico"><use href="img/icons.svg#i-user"/></svg><span class="trend"><?= $pct($u['byRole']['CLIENT'], $u['total']) ?>%</span><b data-count="<?= (int) $u['byRole']['CLIENT'] ?>">0</b><span>Clients</span></div>
    <div class="kpi" style="--m:var(--c-news)"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg><span class="trend"><?= $pct($u['byRole']['AGENT'], $u['total']) ?>%</span><b data-count="<?= (int) $u['byRole']['AGENT'] ?>">0</b><span>Agents</span></div>
    <div class="kpi" style="--m:var(--red)"><svg class="ico"><use href="img/icons.svg#i-settings"/></svg><span class="trend"><?= (int) $u['last7'] ?> new this week</span><b data-count="<?= (int) $u['byRole']['ADMIN'] ?>">0</b><span>Administrators</span></div>
  </div>

  <div class="dash-grid">
    <div class="panel">
      <div class="panel-head"><h3><svg class="ico"><use href="img/icons.svg#i-chart"/></svg>New accounts per month</h3><div class="legend-row"><span><i style="background:var(--teal)"></i>Sign-ups · last 6 months</span></div></div>
      <div class="panel-body"><svg class="chart" data-line="<?= e(json_encode([array_values($u['perMonth'])])) ?>" data-colors='["#13A89E"]' data-labels="<?= e(json_encode($monthLabels)) ?>" role="img" aria-label="Sign-ups per month"></svg></div>
    </div>
    <div class="panel">
      <div class="panel-head"><h3><svg class="ico"><use href="img/icons.svg#i-users"/></svg>Accounts by role</h3></div>
      <div class="panel-body">
        <svg class="donut" data-donut="<?= e(json_encode([$u['byRole']['CLIENT'], $u['byRole']['AGENT'], $u['byRole']['ADMIN']])) ?>" data-colors='["#13A89E","#2F6FDB","#E70013"]' data-label="accounts" role="img" aria-label="Accounts by role"></svg>
        <div class="legend-row" style="justify-content:center"><span><i style="background:#13A89E"></i>Clients</span><span><i style="background:#2F6FDB"></i>Agents</span><span><i style="background:#E70013"></i>Admins</span></div>
        <div class="divider"></div>
        <div class="mod-bar m-user" style="--m:var(--teal)"><div class="lbl"><span>Verified accounts</span><b><?= (int) $u['verified'] ?> / <?= (int) $u['total'] ?></b></div><div class="progress"><i data-v="<?= $pct($u['verified'], $u['total']) ?>"></i></div></div>
      </div>
    </div>
  </div>

  <div class="dash-grid">
    <!-- latest accounts (admin only: personal data) -->
    <div class="panel">
      <div class="panel-head"><h3><svg class="ico"><use href="img/icons.svg#i-user"/></svg><?= $isAdmin ? 'Latest accounts' : 'Reclamations by status' ?></h3><?php if ($isAdmin): ?><a href="<?= e(url('admin_users')) ?>" class="link-arrow" style="font-size:13px">Open all <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a><?php endif; ?></div>
      <?php if ($isAdmin): ?>
        <?php if (!$u['latest']): ?>
          <div class="panel-body"><p class="muted" style="margin:0">No account yet.</p></div>
        <?php else: ?>
        <div class="tbl-wrap"><table class="tbl">
          <thead><tr><th class="no-sort">Name</th><th class="no-sort">Email</th><th class="no-sort">Governorate</th><th class="no-sort">Role</th><th class="no-sort">Created</th></tr></thead>
          <tbody>
          <?php foreach ($u['latest'] as $r): ?>
            <tr><td><div class="who"><span class="avatar"><?= e(mb_strtoupper(mb_substr($r['full_name'], 0, 1))) ?></span><b><?= e($r['full_name']) ?></b></div></td><td><?= e($r['email']) ?></td><td><?= e($r['governorate']) ?></td><td><span class="badge <?= $roleBadge[$r['role']] ?? 'b-gray' ?>"><?= e(ucfirst(strtolower($r['role']))) ?></span></td><td><?= e(date('d M Y', strtotime($r['created_at']))) ?></td></tr>
          <?php endforeach; ?>
          </tbody>
        </table></div>
        <?php endif; ?>
      <?php else: $rs = $m['safe']['byStatus']; $rt = max(1, array_sum($rs)); ?>
        <div class="panel-body mod-bars">
          <div class="mod-bar m-news"><div class="lbl"><span>Sent</span><b><?= $rs['SENT'] ?></b></div><div class="progress"><i data-v="<?= $pct($rs['SENT'], $rt) ?>"></i></div></div>
          <div class="mod-bar m-projects"><div class="lbl"><span>In progress</span><b><?= $rs['ONGOING'] ?></b></div><div class="progress"><i data-v="<?= $pct($rs['ONGOING'], $rt) ?>"></i></div></div>
          <div class="mod-bar m-jobs"><div class="lbl"><span>Done</span><b><?= $rs['DONE'] ?></b></div><div class="progress"><i data-v="<?= $pct($rs['DONE'], $rt) ?>"></i></div></div>
        </div>
      <?php endif; ?>
    </div>
    <!-- accounts per governorate -->
    <div class="panel">
      <div class="panel-head"><h3><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Accounts per governorate</h3></div>
      <div class="panel-body mod-bars">
        <?php if (!$u['perGov']): ?><p class="muted" style="margin:0">No data yet.</p><?php endif; ?>
        <?php foreach ($u['perGov'] as $g): ?>
          <div class="mod-bar" style="--m:var(--navy-3)"><div class="lbl"><span><?= e($g['label']) ?></span><b><?= (int) $g['n'] ?></b></div><div class="progress"><i data-v="<?= $pct($g['n'], $u['total']) ?>"></i></div></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- ===== Modules (totals from each table) ===== -->
  <h2 style="font-size:18px;margin:8px 0 12px">Modules</h2>
  <div class="kpis">
    <div class="kpi kpi-light m-news"><svg class="ico"><use href="img/icons.svg#i-news"/></svg><span class="trend"><?= (int) $m['news']['categories'] ?> categories</span><b><?= (int) $m['news']['articles'] ?></b><span>Articles</span></div>
    <div class="kpi kpi-light m-projects"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg><span class="trend"><?= (int) $m['projects']['milestones'] ?> milestones</span><b><?= (int) $m['projects']['projects'] ?></b><span>Projects</span></div>
    <div class="kpi kpi-light m-safe"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg><span class="trend"><?= (int) $m['safe']['byStatus']['SENT'] ?> to process</span><b><?= (int) $m['safe']['reclamations'] ?></b><span>Reclamations</span></div>
    <div class="kpi kpi-light m-transport"><svg class="ico"><use href="img/icons.svg#i-transport"/></svg><span class="trend"><?= (int) $m['transport']['tickets'] ?> tickets</span><b><?= (int) $m['transport']['lines'] ?></b><span>Transport lines</span></div>
    <div class="kpi kpi-light m-event"><svg class="ico"><use href="img/icons.svg#i-event"/></svg><span class="trend"><?= (int) $m['event']['participations'] ?> registrations</span><b><?= (int) $m['event']['events'] ?></b><span>Events</span></div>
    <div class="kpi kpi-light m-jobs"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg><span class="trend"><?= (int) $m['jobs']['applications'] ?> applications</span><b><?= (int) $m['jobs']['offers'] ?></b><span>Job offers</span></div>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
</div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

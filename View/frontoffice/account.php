<?php
/**
 * View/account.php — client space: Read / Update / Delete of one's own account + own activity.
 * Expects: $user (UserModel), $activity (array), $errors (array), $old (array), $openTab (string),
 *          $csrfToken (string), $governorates (array)
 */
$page = 'account'; $title = 'My space';
$errors = $errors ?? []; $old = $old ?? [];
$val = fn(string $f, string $current) => e(array_key_exists($f, $old) ? $old[$f] : $current);
$fe = fn(string $f) => isset($errors[$f]) ? ' has-error' : '';
$fm = fn(string $f) => isset($errors[$f]) ? '<span class="err-srv">' . e($errors[$f]) . '</span>' : '';
$tab = ['profile_update' => 't-profile', 'password_update' => 't-security', 'account_delete' => 't-delete'][$openTab] ?? 't-profile';
$badge = ['SENT' => 'b-info', 'ONGOING' => 'b-warn', 'DONE' => 'b-ok', 'VALID' => 'b-ok', 'USED' => 'b-gray', 'CANCELED' => 'b-bad',
          'ACTIVE' => 'b-ok', 'OK' => 'b-ok', 'REFUSED' => 'b-bad'];
$fmtDate = fn($d) => $d ? date('d M Y', strtotime((string) $d)) : '—';
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
  <?php require __DIR__ . '/includes/flash.php'; ?>
  <div class="with-aside" style="grid-template-columns:320px 1fr">
    <aside class="aside-sticky">
      <div class="card profile-card">
        <span class="avatar"><?= e($user->getInitials()) ?></span>
        <h3 style="margin:0"><?= e($user->getFullName()) ?></h3>
        <small class="muted"><?= e($user->getEmail()) ?></small>
        <div style="margin-top:10px" class="flex wrap" ><span class="badge b-info" style="margin:auto">Client<?= $user->isVerified() ? ' · verified' : '' ?></span></div>
        <div class="mini-stat">
          <div><b><?= count($activity['reclamations']) ?></b><span>reclamations</span></div>
          <div><b><?= count($activity['tickets']) ?></b><span>tickets</span></div>
          <div><b><?= count($activity['participations']) ?></b><span>events</span></div>
          <div><b><?= count($activity['applications']) ?></b><span>applications</span></div>
        </div>
        <p class="muted" style="font-size:12.5px;margin:14px 0 0">Member since <?= e($fmtDate($user->getCreatedAt())) ?><br><?= e($user->getGovernorate()) ?> · <?= e($user->getPhone()) ?></p>
        <a href="<?= e(url('logout')) ?>" class="btn btn-ghost btn-sm" style="margin-top:12px;width:100%"><svg class="ico ico-sm"><use href="img/icons.svg#i-logout"/></svg>Log out</a>
      </div>
    </aside>

    <div>
      <span class="kicker">My space</span>
      <h1 style="font-size:32px;font-weight:800;margin:6px 0 18px">Hello <?= e(explode(' ', $user->getFullName())[0]) ?>, here is where everything is at.</h1>

      <div class="tabs" data-tabs style="margin-bottom:18px">
        <?php foreach (['t-activity' => 'My activity', 't-profile' => 'Profile', 't-security' => 'Password', 't-delete' => 'Delete account'] as $id => $label): ?>
          <button class="tab <?= $tab === $id ? 'active' : '' ?>" data-tab="<?= $id ?>"><?= $label ?></button>
        <?php endforeach; ?>
      </div>

      <div class="card card-pad">
        <!-- ===== My activity (read from the database) ===== -->
        <div class="tab-panel <?= $tab === 't-activity' ? 'active' : '' ?>" id="t-activity">
          <?php
          $sections = [
            ['Reclamations', 'safe', 'm-safe', $activity['reclamations'], fn($r) => [ucfirst(strtolower($r['type'])) . ' · ' . $r['location'], '#' . $r['id'] . ' · ' . $fmtDate($r['created_at']), $r['status']], 'reclamations'],
            ['Tickets', 'ticket', 'm-transport', $activity['tickets'], fn($r) => [$r['line'] . ' · ' . $r['departure'] . ' → ' . $r['arrival'], $fmtDate($r['travel_date']) . ' · ' . $r['quantity'] . ' × · ' . $r['total_price'] . ' TND', $r['status']], 'transport'],
            ['Event registrations', 'event', 'm-event', $activity['participations'], fn($r) => [$r['title'], $fmtDate($r['event_date']) . ' · ' . $r['place'], $r['status']], 'events'],
            ['Job applications', 'jobs', 'm-jobs', $activity['applications'], fn($r) => [$r['title'] . ' · ' . $r['project'], 'Applied ' . $fmtDate($r['applied_at']), $r['status']], 'jobs'],
          ];
          foreach ($sections as [$label, $icon, $mod, $rows, $map, $route]): ?>
            <h4 style="font-size:15px;margin:6px 0 4px"><?= $label ?></h4>
            <?php if (!$rows): ?>
              <p class="muted" style="font-size:13.5px;margin:0 0 14px">Nothing yet. <a href="<?= e(url($route)) ?>" style="color:var(--teal-d);font-weight:600">Open the module →</a></p>
            <?php else: foreach ($rows as $r): [$h, $s, $st] = $map($r); ?>
              <div class="list-row <?= $mod ?>"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-<?= $icon ?>"/></svg></span><div class="grow"><h4><?= e($h) ?></h4><small><?= e($s) ?></small></div><span class="badge <?= $badge[$st] ?? 'b-gray' ?>"><?= e(ucfirst(strtolower($st))) ?></span></div>
            <?php endforeach; endif; ?>
          <?php endforeach; ?>
        </div>

        <!-- ===== Update profile ===== -->
        <div class="tab-panel <?= $tab === 't-profile' ? 'active' : '' ?>" id="t-profile">
          <h3 style="font-size:19px">Personal information</h3>
          <form method="POST" action="<?= e(url('profile_update')) ?>" data-validate data-server novalidate>
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <div class="field<?= $fe('full_name') ?>"><label>Full name <span class="req">*</span></label><input name="full_name" class="input" required data-name data-min="3" data-max="100" value="<?= $val('full_name', $user->getFullName()) ?>"><span class="err">3 to 100 letters</span><?= $fm('full_name') ?></div>
            <div class="grid-2">
              <div class="field<?= $fe('email') ?>"><label>Email <span class="req">*</span></label><input name="email" type="email" class="input" required maxlength="150" value="<?= $val('email', $user->getEmail()) ?>"><span class="err">Valid email required</span><?= $fm('email') ?></div>
              <div class="field<?= $fe('phone') ?>"><label>Phone <span class="req">*</span></label><input name="phone" class="input" required data-type="phone" value="<?= $val('phone', $user->getPhone()) ?>"><span class="err">Valid Tunisian number</span><?= $fm('phone') ?></div>
            </div>
            <div class="field<?= $fe('governorate') ?>"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><?php $gv = $old['governorate'] ?? $user->getGovernorate(); foreach ($governorates as $g): ?><option value="<?= e($g) ?>" <?= $gv === $g ? 'selected' : '' ?>><?= e($g) ?></option><?php endforeach; ?></select><span class="err">Choose your governorate</span><?= $fm('governorate') ?></div>
            <button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save changes</button>
          </form>
        </div>

        <!-- ===== Change password ===== -->
        <div class="tab-panel <?= $tab === 't-security' ? 'active' : '' ?>" id="t-security">
          <h3 style="font-size:19px">Change my password</h3>
          <form method="POST" action="<?= e(url('password_update')) ?>" data-validate data-server novalidate style="max-width:460px">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <div class="field<?= $fe('current_password') ?>"><label>Current password <span class="req">*</span></label><input name="current_password" type="password" class="input" required autocomplete="current-password"><span class="err">Required</span><?= $fm('current_password') ?></div>
            <div class="field<?= $fe('new_password') ?>"><label>New password <span class="req">*</span></label><input name="new_password" type="password" class="input" required data-strong autocomplete="new-password"><span class="err">8+ characters, a letter and a digit</span><?= $fm('new_password') ?></div>
            <div class="field<?= $fe('new_password_confirm') ?>"><label>Confirm the new password <span class="req">*</span></label><input name="new_password_confirm" type="password" class="input" required data-match="new_password" autocomplete="new-password"><span class="err">Passwords don't match</span><?= $fm('new_password_confirm') ?></div>
            <button class="btn btn-teal" type="submit">Update my password</button>
          </form>
        </div>

        <!-- ===== Delete account ===== -->
        <div class="tab-panel <?= $tab === 't-delete' ? 'active' : '' ?>" id="t-delete">
          <h3 style="font-size:19px;color:var(--red)">Delete my account</h3>
          <p class="muted">This permanently deletes your account and everything linked to it (reclamations, tickets, registrations, applications). It cannot be undone.</p>
          <form method="POST" action="<?= e(url('account_delete')) ?>" data-validate data-server data-confirm="Your account and everything linked to it will be permanently deleted. This cannot be undone." data-confirm-title="Delete your account?" data-confirm-ok="Yes, delete it" novalidate style="max-width:460px">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <div class="field<?= $fe('delete_password') ?>"><label>Confirm with your password <span class="req">*</span></label><input name="delete_password" type="password" class="input" required autocomplete="current-password"><span class="err">Required</span><?= $fm('delete_password') ?></div>
            <button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-trash"/></svg>Delete my account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

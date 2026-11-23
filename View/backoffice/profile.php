<?php
/**
 * View/admin/profile.php — own profile for ADMIN / AGENT (Read / Update / change password / Delete).
 * Expects: $user (UserModel), $errors, $old, $openTab, $csrfToken, $governorates
 */
$page = 'profile'; $title = 'My profile';
$errors = $errors ?? []; $old = $old ?? [];
$val = fn(string $f, string $current) => e(array_key_exists($f, $old) ? $old[$f] : $current);
$fe = fn(string $f) => isset($errors[$f]) ? ' has-error' : '';
$fm = fn(string $f) => isset($errors[$f]) ? '<span class="err-srv">' . e($errors[$f]) . '</span>' : '';
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
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>My profile</span></div>
      <h1><span class="avatar" style="width:44px;height:44px;background:linear-gradient(135deg,var(--navy),var(--teal))"><?= e($user->getInitials()) ?></span><?= e($user->getFullName()) ?></h1>
      <p><?= e(ucfirst(strtolower($user->getRole()))) ?> · member since <?= e(date('d M Y', strtotime($user->getCreatedAt()))) ?></p>
    </div>
  </div>

  <div class="dash-grid" style="grid-template-columns:1.3fr 1fr">
    <div class="panel">
      <div class="panel-head"><h3><svg class="ico"><use href="img/icons.svg#i-user"/></svg>Personal information</h3></div>
      <div class="panel-body">
        <form method="POST" action="<?= e(url('profile_update')) ?>" data-validate data-server novalidate>
          <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
          <div class="field<?= $fe('full_name') ?>"><label>Full name <span class="req">*</span></label><input name="full_name" class="input" required data-name data-min="3" data-max="100" value="<?= $val('full_name', $user->getFullName()) ?>"><span class="err">3 to 100 letters</span><?= $fm('full_name') ?></div>
          <div class="grid-2">
            <div class="field<?= $fe('email') ?>"><label>Email <span class="req">*</span></label><input name="email" type="email" class="input" required maxlength="150" value="<?= $val('email', $user->getEmail()) ?>"><span class="err">Valid email required</span><?= $fm('email') ?></div>
            <div class="field<?= $fe('phone') ?>"><label>Phone <span class="req">*</span></label><input name="phone" class="input" required data-type="phone" value="<?= $val('phone', $user->getPhone()) ?>"><span class="err">Valid Tunisian number</span><?= $fm('phone') ?></div>
          </div>
          <div class="field<?= $fe('governorate') ?>"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><?php $gv = $old['governorate'] ?? $user->getGovernorate(); foreach ($governorates as $g): ?><option value="<?= e($g) ?>" <?= $gv === $g ? 'selected' : '' ?>><?= e($g) ?></option><?php endforeach; ?></select><span class="err">Choose a governorate</span><?= $fm('governorate') ?></div>
          <p class="muted" style="font-size:12.5px">Your role (<?= e($user->getRole()) ?>) can only be changed by another administrator.</p>
          <button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save changes</button>
        </form>
      </div>
    </div>
    <div style="display:flex;flex-direction:column;gap:16px">
      <div class="panel">
        <div class="panel-head"><h3><svg class="ico"><use href="img/icons.svg#i-settings"/></svg>Change my password</h3></div>
        <div class="panel-body">
          <form method="POST" action="<?= e(url('password_update')) ?>" data-validate data-server novalidate>
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <div class="field<?= $fe('current_password') ?>"><label>Current password <span class="req">*</span></label><input name="current_password" type="password" class="input" required autocomplete="current-password"><span class="err">Required</span><?= $fm('current_password') ?></div>
            <div class="field<?= $fe('new_password') ?>"><label>New password <span class="req">*</span></label><input name="new_password" type="password" class="input" required data-strong autocomplete="new-password"><span class="err">8+ characters, a letter and a digit</span><?= $fm('new_password') ?></div>
            <div class="field<?= $fe('new_password_confirm') ?>"><label>Confirm <span class="req">*</span></label><input name="new_password_confirm" type="password" class="input" required data-match="new_password" autocomplete="new-password"><span class="err">Passwords don't match</span><?= $fm('new_password_confirm') ?></div>
            <button class="btn btn-teal" type="submit">Update my password</button>
          </form>
        </div>
      </div>
      <div class="panel">
        <div class="panel-head"><h3 style="color:var(--red)"><svg class="ico" style="color:var(--red)"><use href="img/icons.svg#i-trash"/></svg>Delete my account</h3></div>
        <div class="panel-body">
          <p class="muted" style="font-size:13px;margin-top:0">Permanent. The platform always keeps at least one administrator.</p>
          <form method="POST" action="<?= e(url('account_delete')) ?>" data-validate data-server data-confirm="Your account and everything linked to it will be permanently deleted. This cannot be undone." data-confirm-title="Delete your account?" data-confirm-ok="Yes, delete it" novalidate>
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <div class="field<?= $fe('delete_password') ?>"><label>Confirm with your password <span class="req">*</span></label><input name="delete_password" type="password" class="input" required autocomplete="current-password"><span class="err">Required</span><?= $fm('delete_password') ?></div>
            <button class="btn btn-primary" type="submit">Delete my account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
</div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

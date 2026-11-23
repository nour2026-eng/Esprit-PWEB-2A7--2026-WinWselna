<?php
/**
 * View/admin/users.php — user management (ADMIN only): Create / Read / Update / Delete.
 * Expects: $user (UserModel, the logged-in admin), $users (UserModel[]), $counts (array), $search, $roleFilter,
 *          $errors (array), $old (array, values of the last failed form), $csrfToken, $governorates
 */
$page = 'users'; $title = 'Users';
$errors = $errors ?? []; $old = $old ?? [];
$roleBadge = ['ADMIN' => 'b-info', 'AGENT' => 'b-ok', 'CLIENT' => 'b-gray'];
$roleLabel = ['CLIENT' => 'Client', 'AGENT' => 'Agent', 'ADMIN' => 'Admin'];
$reopen = $errors && !isset($old['delete']);           // a failed create/update re-opens the form with its values
$editing = (int) ($old['id'] ?? 0) > 0;
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
<main class="content m-user" style="--m:var(--navy)">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Account</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Users</span></div>
      <h1><span class="m-dot"></span>Users & roles</h1>
      <p>Every account of the platform. Passwords are stored hashed (bcrypt); the role decides where the user lands after login.</p>
    </div>
    <button class="btn btn-primary" data-user-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add a user</button>
  </div>

  <div class="sum-chips">
    <div class="sum-chip" style="--c:var(--navy)"><i></i><b><?= (int) $counts['ALL'] ?></b>accounts</div>
    <div class="sum-chip" style="--c:#6B7A8F"><i></i><b><?= (int) $counts['CLIENT'] ?></b>clients</div>
    <div class="sum-chip" style="--c:var(--teal)"><i></i><b><?= (int) $counts['AGENT'] ?></b>agents</div>
    <div class="sum-chip" style="--c:var(--c-news)"><i></i><b><?= (int) $counts['ADMIN'] ?></b>admins</div>
  </div>

  <div class="panel" data-table>
    <!-- server-side search & filter (GET) -->
    <form class="table-tools" method="GET" action="<?= e(BASE_URL) ?>index.php">
      <input type="hidden" name="action" value="admin_users">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" name="q" maxlength="100" placeholder="Name, email or phone…" value="<?= e($search) ?>" aria-label="Search"></div>
      <div class="flex">
        <select class="select" name="role" aria-label="Filter by role"><option value="">All roles</option><?php foreach ($roleLabel as $k => $l): ?><option value="<?= $k ?>" <?= $roleFilter === $k ? 'selected' : '' ?>><?= $l ?></option><?php endforeach; ?></select>
        <button class="btn btn-navy btn-sm" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-filter"/></svg>Filter</button>
        <?php if ($search !== '' || $roleFilter !== ''): ?><a class="btn btn-ghost btn-sm" href="<?= e(url('admin_users')) ?>">Reset</a><?php endif; ?>
      </div>
    </form>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Full name</th><th>Email</th><th>Phone</th><th>Governorate</th><th>Role</th><th>Verified</th><th>Created</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
        <?php foreach ($users as $u): $self = $u->getId() === $user->getId(); ?>
          <tr>
            <td class="strong"><?= $u->getId() ?></td>
            <td><div class="who"><span class="avatar"><?= e($u->getInitials()) ?></span><div><b><?= e($u->getFullName()) ?></b><?php if ($self): ?><small>you</small><?php endif; ?></div></div></td>
            <td><?= e($u->getEmail()) ?></td>
            <td><?= e($u->getPhone()) ?></td>
            <td><?= e($u->getGovernorate()) ?></td>
            <td data-v="<?= e($u->getRole()) ?>"><span class="badge <?= $roleBadge[$u->getRole()] ?? 'b-gray' ?>"><?= e($roleLabel[$u->getRole()] ?? $u->getRole()) ?></span></td>
            <td><?= $u->isVerified() ? '<span class="badge b-ok">Yes</span>' : '<span class="badge b-gray">No</span>' ?></td>
            <td data-v="<?= e($u->getCreatedAt()) ?>"><?= e(date('d M Y', strtotime($u->getCreatedAt()))) ?></td>
            <td class="no-dl"><div class="row-actions">
              <button class="act edit" title="Edit" data-user="<?= e(json_encode(['id' => $u->getId(), 'full_name' => $u->getFullName(), 'email' => $u->getEmail(), 'phone' => $u->getPhone(), 'governorate' => $u->getGovernorate(), 'role' => $u->getRole(), 'is_verified' => $u->isVerified(), 'self' => $self])) ?>"><svg class="ico ico-sm"><use href="img/icons.svg#i-edit"/></svg></button>
              <?php if (!$self): ?>
              <form method="POST" action="<?= e(url('admin_user_delete')) ?>" data-confirm="The account of <?= e($u->getFullName()) ?> will be permanently deleted. This cannot be undone." data-confirm-title="Delete this account?" data-confirm-ok="Yes, delete">
                <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                <input type="hidden" name="id" value="<?= $u->getId() ?>">
                <input type="hidden" name="delete" value="1">
                <button class="act del" type="submit" title="Delete"><svg class="ico ico-sm"><use href="img/icons.svg#i-trash"/></svg></button>
              </form>
              <?php endif; ?>
            </div></td>
          </tr>
        <?php endforeach; ?>
        <?php if (!$users): ?>
          <tr class="empty-row"><td colspan="9"><?= ($search !== '' || $roleFilter !== '') ? 'No account matches your search.' : 'No account yet.' ?></td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
    <div class="table-foot"><span class="t-info"></span><div class="pager"></div></div>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
</div>
</div>

<!-- Create / Update form (same form: an empty id = create) -->
<div class="modal" id="user-modal" aria-hidden="true" data-reopen="<?= $reopen ? '1' : '' ?>">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3 id="user-modal-title"><?= $editing ? 'Edit user #' . (int) $old['id'] : 'Add a user' ?></h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form method="POST" action="<?= e(url('admin_user_save')) ?>" data-validate data-server novalidate id="user-form">
      <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
      <input type="hidden" name="id" value="<?= (int) ($old['id'] ?? 0) ?: '' ?>">
      <div class="modal-body">
        <?php if ($reopen && !empty($errors['form'])): ?><div class="alert alert-error"><svg class="ico"><use href="img/icons.svg#i-close"/></svg><span><?= e($errors['form']) ?></span></div><?php endif; ?>
        <div class="grid-2">
          <div class="field<?= $fe('full_name') ?>" style="grid-column:1/-1"><label>Full name <span class="req">*</span></label><input name="full_name" class="input" required data-name data-min="3" data-max="100" value="<?= e($old['full_name'] ?? '') ?>"><span class="err">3 to 100 letters</span><?= $fm('full_name') ?></div>
          <div class="field<?= $fe('email') ?>"><label>Email <span class="req">*</span></label><input name="email" type="email" class="input" required maxlength="150" value="<?= e($old['email'] ?? '') ?>"><span class="err">Valid email required</span><?= $fm('email') ?></div>
          <div class="field<?= $fe('phone') ?>"><label>Phone <span class="req">*</span></label><input name="phone" class="input" required data-type="phone" placeholder="2X XXX XXX" value="<?= e($old['phone'] ?? '') ?>"><span class="err">Valid Tunisian number</span><?= $fm('phone') ?></div>
          <div class="field<?= $fe('governorate') ?>"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><option value="">Choose…</option><?php foreach ($governorates as $g): ?><option value="<?= e($g) ?>" <?= ($old['governorate'] ?? '') === $g ? 'selected' : '' ?>><?= e($g) ?></option><?php endforeach; ?></select><span class="err">Choose a governorate</span><?= $fm('governorate') ?></div>
          <div class="field<?= $fe('role') ?>"><label>Role <span class="req">*</span></label><select name="role" class="select" required><option value="">Choose…</option><?php foreach ($roleLabel as $k => $l): ?><option value="<?= $k ?>" <?= ($old['role'] ?? '') === $k ? 'selected' : '' ?>><?= $l ?></option><?php endforeach; ?></select><span class="err">Choose a role</span><?= $fm('role') ?></div>
          <div class="field<?= $fe('password') ?>"><label>Password <span class="req" data-pw-star>*</span></label><input name="password" type="password" class="input" data-strong autocomplete="new-password" <?= $editing ? '' : 'required' ?>><span class="err">8+ characters, a letter and a digit</span><small class="muted" data-pw-hint<?= $editing ? '' : ' hidden' ?>>Leave empty to keep the current password.</small><?= $fm('password') ?></div>
          <div class="field<?= $fe('password_confirm') ?>"><label>Confirm password</label><input name="password_confirm" type="password" class="input" data-match="password" autocomplete="new-password"><span class="err">Passwords don't match</span><?= $fm('password_confirm') ?></div>
          <div class="field" style="grid-column:1/-1"><label class="check"><input type="checkbox" name="is_verified" value="1" <?= !empty($old['is_verified']) ? 'checked' : '' ?>>Identity verified (shows a "verified" badge on the account)</label></div>
        </div>
        <p class="muted" style="font-size:12.5px;margin:0" data-self-note hidden>This is your own account: your role cannot be changed here.</p>
      </div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

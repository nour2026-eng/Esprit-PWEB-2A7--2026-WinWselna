<?php
/**
 * View/register.php — sign up (the role is always CLIENT, set by the controller).
 * Expects: $errors (array, keyed by field), $old (array), $csrfToken (string), $governorates (array)
 */
$page = 'register'; $title = 'Create an account';
$errors = $errors ?? []; $old = $old ?? [];
$fe = fn(string $f) => isset($errors[$f]) ? ' has-error' : '';
$fm = fn(string $f) => isset($errors[$f]) ? '<span class="err-srv">' . e($errors[$f]) . '</span>' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>

<main class="auth">
  <div class="auth-art">
    <a href="<?= e(url('home')) ?>" class="brand" style="color:#fff"><img src="img/logo-white.svg" alt=""><b>WIN WSELNA<i>?</i></b></a>
    <div>
      <p class="ar">الدولة في جيبك</p>
      <h2>One account,<br>six public services.</h2>
      <ul style="list-style:none;padding:0;margin:18px 0 0;display:flex;flex-direction:column;gap:10px;color:#C9D4E3">
        <li class="flex"><svg class="ico" style="color:var(--teal)"><use href="img/icons.svg#i-check"/></svg>Submit and track reclamations, buy transport tickets</li>
        <li class="flex"><svg class="ico" style="color:var(--teal)"><use href="img/icons.svg#i-check"/></svg>Follow projects and register for consultations</li>
        <li class="flex"><svg class="ico" style="color:var(--teal)"><use href="img/icons.svg#i-check"/></svg>Apply to jobs created near you</li>
      </ul>
    </div>
    <small style="color:#8DA0B9">Your password is stored as an irreversible hash (bcrypt), never in clear text.</small>
  </div>
  <div class="auth-form">
    <form method="POST" action="<?= e(url('register')) ?>" data-validate data-server novalidate>
      <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
      <span class="kicker">Create an account</span>
      <h1>Join Win Wselna?</h1>
      <p class="muted">Already registered? <a href="<?= e(url('login')) ?>" style="color:var(--red);font-weight:700">Log in</a></p>

      <?php if ($errors): ?>
        <div class="alert alert-error" role="alert"><svg class="ico"><use href="img/icons.svg#i-close"/></svg><div>Please fix the following:<ul><?php foreach ($errors as $msg): ?><li><?= e($msg) ?></li><?php endforeach; ?></ul></div></div>
      <?php endif; ?>

      <div class="field<?= $fe('full_name') ?>"><label for="g-name">Full name <span class="req">*</span></label><input id="g-name" name="full_name" class="input" required data-name data-min="3" data-max="100" autocomplete="name" placeholder="First and last name" value="<?= e($old['full_name'] ?? '') ?>"><span class="err">3 to 100 characters</span><?= $fm('full_name') ?></div>
      <div class="grid-2">
        <div class="field<?= $fe('email') ?>"><label for="g-email">Email <span class="req">*</span></label><input id="g-email" name="email" type="email" class="input" required maxlength="150" autocomplete="email" placeholder="you@example.com" value="<?= e($old['email'] ?? '') ?>"><span class="err">Valid email required</span><?= $fm('email') ?></div>
        <div class="field<?= $fe('phone') ?>"><label for="g-phone">Phone <span class="req">*</span></label><input id="g-phone" name="phone" class="input" required data-type="phone" autocomplete="tel" placeholder="2X XXX XXX" value="<?= e($old['phone'] ?? '') ?>"><span class="err">Valid Tunisian number</span><?= $fm('phone') ?></div>
      </div>
      <div class="field<?= $fe('governorate') ?>"><label for="g-gov">Governorate <span class="req">*</span></label><select id="g-gov" name="governorate" class="select" required><option value="">Choose…</option><?php foreach ($governorates as $g): ?><option value="<?= e($g) ?>" <?= ($old['governorate'] ?? '') === $g ? 'selected' : '' ?>><?= e($g) ?></option><?php endforeach; ?></select><span class="err">Choose your governorate</span><?= $fm('governorate') ?></div>
      <div class="grid-2">
        <div class="field<?= $fe('password') ?>"><label for="g-pass">Password <span class="req">*</span></label><input id="g-pass" name="password" type="password" class="input" required data-min="8" data-strong autocomplete="new-password"><span class="err">8+ characters, a letter and a digit</span><?= $fm('password') ?></div>
        <div class="field<?= $fe('password_confirm') ?>"><label for="g-pass2">Confirm <span class="req">*</span></label><input id="g-pass2" name="password_confirm" type="password" class="input" required data-match="password" autocomplete="new-password"><span class="err">Passwords don't match</span><?= $fm('password_confirm') ?></div>
      </div>
      <div class="field<?= $fe('terms') ?>"><label class="check"><input type="checkbox" name="terms" value="1" required>I accept the terms of use</label><span class="err">Please accept the terms</span><?= $fm('terms') ?></div>
      <button class="btn btn-primary btn-lg" type="submit" style="width:100%">Create my account</button>
    </form>
  </div>
</main>

<div class="toasts"></div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

<?php
/**
 * View/login.php — the ONLY login page, for every role (CLIENT, AGENT, ADMIN).
 * Expects: $errors (array), $old (array), $csrfToken (string)
 */
$page = 'login'; $title = 'Log in';
$errors = $errors ?? []; $old = $old ?? [];
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
      <p class="ar">عسلامة! وين وصلنا؟</p>
      <h2>Welcome back.</h2>
      <p style="color:#C9D4E3;max-width:420px">One login for everyone: citizens go to their space, agents and administrators go straight to the dashboard.</p>
    </div>
    <div class="flex" style="gap:12px"><img src="img/mascot.webp" alt="" style="width:52px;height:52px;border-radius:50%;object-fit:cover;object-position:62% 22%;border:2px solid var(--teal)"><small style="color:#C9D4E3">“One account, six services.” · 3am Win</small></div>
  </div>
  <div class="auth-form">
    <form method="POST" action="<?= e(url('login')) ?>" data-validate data-server novalidate>
      <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
      <span class="kicker">Log in</span>
      <h1>Access your space</h1>
      <p class="muted">No account yet? <a href="<?= e(url('register')) ?>" style="color:var(--red);font-weight:700">Create one</a></p>

      <?php require __DIR__ . '/includes/flash.php'; ?>
      <?php if (!empty($errors['form'])): ?>
        <div class="alert alert-error" role="alert"><svg class="ico"><use href="img/icons.svg#i-close"/></svg><span><?= e($errors['form']) ?></span></div>
      <?php endif; ?>

      <div class="field"><label for="l-email">Email <span class="req">*</span></label><div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-mail"/></svg><input id="l-email" name="email" type="email" class="input" required maxlength="150" autocomplete="email" placeholder="you@example.com" value="<?= e($old['email'] ?? '') ?>"></div><span class="err">Enter a valid email</span></div>
      <div class="field"><label for="l-pass">Password <span class="req">*</span></label><input id="l-pass" name="password" type="password" class="input" required data-min="8" autocomplete="current-password" placeholder="••••••••"><span class="err">At least 8 characters</span></div>
      <button class="btn btn-primary btn-lg" type="submit" style="width:100%">Log in</button>
      <p class="muted" style="text-align:center;margin:18px 0 0;font-size:13px">Your session ends automatically after 30 minutes of inactivity.</p>
    </form>
  </div>
</main>

<div class="toasts"></div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

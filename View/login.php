<?php $page = 'login'; $title = 'Log in'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>

<main class="auth">
  <div class="auth-art">
    <a href="index.php" class="brand" style="color:#fff"><img src="img/logo-white.svg" alt=""><b>WIN WSELNA<i>?</i></b></a>
    <div>
      <p class="ar">عسلامة! وين وصلنا؟</p>
      <h2>Welcome back.</h2>
      <p style="color:#C9D4E3;max-width:420px">Your reclamations, requests, registrations and applications are waiting for you in your space.</p>
    </div>
    <div class="flex" style="gap:12px"><img src="img/mascot.webp" alt="" style="width:52px;height:52px;border-radius:50%;object-fit:cover;object-position:62% 22%;border:2px solid var(--teal)"><small style="color:#C9D4E3">“One account, six services.” · 3am Win</small></div>
  </div>
  <div class="auth-form">
    <form data-validate novalidate data-success="Welcome back!" data-redirect="account.php">
      <span class="kicker">Log in</span>
      <h1>Access your space</h1>
      <p class="muted">No account yet? <a href="register.php" style="color:var(--red);font-weight:700">Create one</a></p>
      <div class="field"><label for="l-email">Email <span class="req">*</span></label><div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-mail"/></svg><input id="l-email" name="email" type="email" class="input" required placeholder="you@example.com"></div><span class="err">Enter a valid email</span></div>
      <div class="field"><label for="l-pass">Password <span class="req">*</span></label><input id="l-pass" name="password" type="password" class="input" required data-min="8" placeholder="••••••••"><span class="err">At least 8 characters</span></div>
      <div class="flex between" style="margin-bottom:18px"><label class="check"><input type="checkbox">Remember me</label><a href="#" style="font-size:13.5px;font-weight:600;color:var(--teal-d)">Forgot password?</a></div>
      <button class="btn btn-primary btn-lg" type="submit" style="width:100%">Log in</button>
      <div class="or">or</div>
      <a href="admin/login.php" class="btn btn-ghost" style="width:100%"><svg class="ico ico-sm"><use href="img/icons.svg#i-dashboard"/></svg>Staff access (agent · admin)</a>
    </form>
  </div>
</main>

<div class="toasts"></div>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

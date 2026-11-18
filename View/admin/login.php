<?php $page = 'login'; $title = 'Staff login'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="admin">
<main class="a-login">
  <form class="card" data-validate novalidate data-success="Welcome to the back office" data-redirect="index.php">
    <div class="brand-c"><img src="../img/logo.svg" alt="Win Wselna? logo"><h1 style="font-size:22px;margin:0">Back office</h1><p class="muted" style="margin:4px 0 0">Agents and administrators only</p></div>
    <div class="field"><label for="a-email">Professional email <span class="req">*</span></label><div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-mail"/></svg><input id="a-email" name="email" type="email" class="input" required placeholder="name@winwselna.tn"></div><span class="err">Enter a valid email</span></div>
    <div class="field"><label for="a-pass">Password <span class="req">*</span></label><input id="a-pass" name="password" type="password" class="input" required data-min="8" placeholder="••••••••"><span class="err">At least 8 characters</span></div>
    <div class="field"><label for="a-role">Role <span class="req">*</span></label><select id="a-role" name="role" class="select" required><option value="">Choose…</option><option value="ADMIN">Admin</option><option value="AGENT">Agent</option></select><span class="err">Choose your role</span></div>
    <button class="btn btn-primary btn-lg" type="submit" style="width:100%">Log in</button>
    <p style="text-align:center;margin:16px 0 0;font-size:13.5px"><a href="../index.php" style="color:var(--teal-d);font-weight:600">← Back to the website</a></p>
  </form>
</main>
<div class="toasts"></div>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

<?php $page = 'register'; $title = 'Create an account'; ?>
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
      <p class="ar">الدولة في جيبك</p>
      <h2>One account,<br>six public services.</h2>
      <ul style="list-style:none;padding:0;margin:18px 0 0;display:flex;flex-direction:column;gap:10px;color:#C9D4E3">
        <li class="flex"><svg class="ico" style="color:var(--teal)"><use href="img/icons.svg#i-check"/></svg>Submit and track reclamations and requests</li>
        <li class="flex"><svg class="ico" style="color:var(--teal)"><use href="img/icons.svg#i-check"/></svg>Follow projects and register for consultations</li>
        <li class="flex"><svg class="ico" style="color:var(--teal)"><use href="img/icons.svg#i-check"/></svg>Apply to jobs created near you</li>
      </ul>
    </div>
    <small style="color:#8DA0B9">Your data stays in Tunisia and is only used by the administration.</small>
  </div>
  <div class="auth-form">
    <form data-validate novalidate data-success="Account created · welcome!" data-redirect="account.php">
      <span class="kicker">Create an account</span>
      <h1>Join Win Wselna?</h1>
      <p class="muted">Already registered? <a href="login.php" style="color:var(--red);font-weight:700">Log in</a></p>
      <div class="field"><label for="g-name">Full name <span class="req">*</span></label><input id="g-name" name="fullName" class="input" required data-min="3" placeholder="First and last name"><span class="err">At least 3 characters</span></div>
      <div class="grid-2">
        <div class="field"><label for="g-email">Email <span class="req">*</span></label><input id="g-email" name="email" type="email" class="input" required placeholder="you@example.com"><span class="err">Valid email required</span></div>
        <div class="field"><label for="g-phone">Phone <span class="req">*</span></label><input id="g-phone" name="phone" class="input" required data-type="phone" placeholder="2X XXX XXX"><span class="err">Valid Tunisian number</span></div>
      </div>
      <div class="field"><label for="g-gov">Governorate <span class="req">*</span></label><select id="g-gov" name="governorate" class="select" required><option value="">Choose…</option><option>Tunis</option><option>Ariana</option><option>Sfax</option><option>Sousse</option><option>Nabeul</option><option>Kasserine</option></select><span class="err">Choose your governorate</span></div>
      <div class="grid-2">
        <div class="field"><label for="g-pass">Password <span class="req">*</span></label><input id="g-pass" name="password" type="password" class="input" required data-min="8"><span class="err">At least 8 characters</span></div>
        <div class="field"><label for="g-pass2">Confirm <span class="req">*</span></label><input id="g-pass2" name="password2" type="password" class="input" required data-match="password"><span class="err">Passwords don't match</span></div>
      </div>
      <div class="field"><label class="check"><input type="checkbox" name="terms" required>I accept the terms of use</label><span class="err">Please accept the terms</span></div>
      <button class="btn btn-primary btn-lg" type="submit" style="width:100%">Create my account</button>
    </form>
  </div>
</main>

<div class="toasts"></div>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

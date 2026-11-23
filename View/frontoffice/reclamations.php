<?php
/**
 * View/reclamations.php — Win Safe · Reclamations. No hard-coded data: the module owner will pass the rows
 * from its controller (index.php) and loop over them here. Until then, an empty state is shown.
 */
$page = 'reclamations'; $title = 'Win Safe · Reclamations';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<section class="page-head m-safe">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="<?= e(url('home')) ?>">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Safe</span></div>
        <h1>Who fixes this pothole?</h1>
        <p>Report an incident, a damage or an emergency. A municipal agent answers you and you follow the status until it is resolved.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="with-aside" style="grid-template-columns:1fr 1fr">
    <div class="card card-pad">
      <h2 style="font-size:21px">Submit a reclamation</h2>
      <?php if (!AuthController::isAuthenticated()): ?>
        <div class="empty m-safe"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-user"/></svg></div><h3>Log in to submit a reclamation</h3><p>Your reclamations are linked to your account so you can follow their status.</p><a class="btn btn-primary btn-sm" href="<?= e(url('login')) ?>">Log in</a></div>
      <?php else: ?>
      <p class="muted" style="font-size:14px">Fields marked <span style="color:var(--red)">*</span> are required.</p>
      <form data-validate data-pending novalidate>
        <div class="field"><label for="r-type">Type <span class="req">*</span></label><select id="r-type" name="type" class="select" required><option value="">Choose…</option><option value="INCIDENT">Incident</option><option value="DAMAGE">Damage</option><option value="SOS">SOS · emergency</option></select><span class="err">Choose a type</span></div>
        <div class="field"><label for="r-loc">Location <span class="req">*</span></label><div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-pin"/></svg><input id="r-loc" name="location" class="input" required data-min="5" data-max="200" placeholder="Street, neighbourhood, city"></div><span class="err">5 to 200 characters</span></div>
        <div class="field"><label for="r-desc">Description <span class="req">*</span></label><textarea id="r-desc" name="description" class="textarea" required data-min="20" data-max="500" placeholder="What happened? Since when?"></textarea><span class="err">Between 20 and 500 characters</span></div>
        <div class="field"><label>Photo</label><div class="dropzone"><input type="file" name="photo" accept="image/*"><svg class="ico ico-lg"><use href="img/icons.svg#i-upload"/></svg><div><b>Click or drop a photo</b> · JPG or PNG, 5 MB max</div><div class="dz-name" style="color:var(--teal-d);font-weight:600"></div></div></div>
        <button class="btn btn-primary btn-lg" type="submit" style="width:100%"><svg class="ico"><use href="img/icons.svg#i-send"/></svg>Send the reclamation</button>
      </form>
      <?php endif; ?>
    </div>
    <div>
      <h2 style="font-size:21px">My reclamations</h2>
      <div class="empty m-safe"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></div><h3>No reclamation yet</h3><p>Your reclamations and the agents' responses will appear here.</p></div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

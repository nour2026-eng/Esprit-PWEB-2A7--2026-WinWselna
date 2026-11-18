<?php $page = 'reclamations'; $title = 'Win Safe · Reclamations'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="page-head m-safe">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Safe</span></div>
        <h1>Who fixes this pothole?</h1>
        <p>Report an incident, a damage or an emergency. A municipal agent answers you and you follow the status until it's resolved.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="with-aside" style="grid-template-columns:1fr 1fr">
    <!-- Submit (create Reclamation) -->
    <div class="card card-pad">
      <h2 style="font-size:21px">Submit a reclamation</h2>
      <p class="muted" style="font-size:14px">Fields marked <span style="color:var(--red)">*</span> are required. You can edit or cancel while the status is <b>Sent</b>.</p>
      <form data-validate novalidate data-success="Reclamation sent · you will be notified of the response">
        <div class="grid-2">
          <div class="field"><label for="r-type">Type <span class="req">*</span></label><select id="r-type" name="type" class="select" required><option value="">Choose…</option><option>Incident</option><option>Damage</option><option>SOS · emergency</option><option>Other</option></select><span class="err">Choose a type</span></div>
          <div class="field"><label for="r-project">Linked project</label><select id="r-project" name="project" class="select"><option value="">None</option><option>RN-X road · Sfax</option><option>Rain drainage · Ariana</option><option>Water network · Sousse</option></select></div>
        </div>
        <div class="field"><label for="r-loc">Location <span class="req">*</span></label><div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-pin"/></svg><input id="r-loc" name="location" class="input" required data-min="5" placeholder="Street, neighbourhood, city"></div><span class="err">Give at least 5 characters</span></div>
        <div class="field"><label for="r-desc">Description <span class="req">*</span></label><textarea id="r-desc" name="description" class="textarea" required data-min="20" data-max="500" placeholder="What happened? Since when?"></textarea><span class="err">Between 20 and 500 characters</span></div>
        <div class="field"><label>Photo</label><div class="dropzone"><input type="file" name="photo" accept="image/*"><svg class="ico ico-lg"><use href="img/icons.svg#i-upload"/></svg><div><b>Click or drop a photo</b> · JPG or PNG, 5 MB max</div><div class="dz-name" style="color:var(--teal-d);font-weight:600"></div></div></div>
        <label class="check" style="margin-bottom:18px"><input type="checkbox" name="share">Share my GPS position with the agent</label>
        <button class="btn btn-primary btn-lg" type="submit" style="width:100%"><svg class="ico"><use href="img/icons.svg#i-send"/></svg>Send the reclamation</button>
      </form>
    </div>

    <!-- My reclamations (read / update / delete + Response) -->
    <div style="display:flex;flex-direction:column;gap:14px">
      <div class="flex between"><h2 style="font-size:21px;margin:0">My reclamations</h2><span class="muted" style="font-size:13px">3 total</span></div>

      <div class="card track" data-item>
        <div class="track-head"><div><h4>Pothole, Avenue Habib Bourguiba</h4><small class="muted">#1284 · Damage · sent 09 Nov</small></div><span class="badge b-warn">In progress</span></div>
        <div class="stepper"><span></span><i class="on"></i><span class="on"></span><i class="on"></i><span></span><i></i></div>
        <div class="stepper-lbl"><span>Sent</span><span>In progress</span><span>Done</span></div>
        <div class="reply"><b>Response · Agent S. Ben Ali</b> · 10 Nov<br>The repair team is planned for Thursday morning. Thank you for the photo.</div>
      </div>

      <div class="card track" data-item>
        <div class="track-head"><div><h4>Blocked drain after the rain</h4><small class="muted">#1291 · Incident · sent today</small></div><span class="badge b-info">Sent</span></div>
        <div class="stepper"><span></span><i class="on"></i><span></span><i></i><span></span><i></i></div>
        <div class="stepper-lbl"><span>Sent</span><span>In progress</span><span>Done</span></div>
        <div class="flex" style="margin-top:8px"><button class="btn btn-ghost btn-sm" data-open="edit-modal"><svg class="ico ico-sm"><use href="img/icons.svg#i-edit"/></svg>Edit</button><button class="btn btn-ghost btn-sm" data-cancel="reclamation"><svg class="ico ico-sm"><use href="img/icons.svg#i-trash"/></svg>Cancel</button></div>
      </div>

      <div class="card track" data-item>
        <div class="track-head"><div><h4>Broken street light, Rue de Marseille</h4><small class="muted">#1102 · Damage · sent 21 Oct</small></div><span class="badge b-ok">Done</span></div>
        <div class="stepper"><span></span><i class="on"></i><span class="on"></span><i class="on"></i><span class="on"></span><i class="on"></i></div>
        <div class="stepper-lbl"><span>Sent</span><span>In progress</span><span>Done</span></div>
        <div class="reply"><b>Response · Agent M. Trabelsi</b> · 23 Oct<br>The light was replaced on 22 October.</div>
      </div>
    </div>
  </div>
</section>

<!-- Edit modal (update while Sent) -->
<div class="modal" id="edit-modal" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box">
    <div class="modal-head"><h3>Edit reclamation #1291</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate data-success="Reclamation updated">
      <div class="modal-body">
        <div class="field"><label>Location <span class="req">*</span></label><input name="location" class="input" required data-min="5" value="Rue Ibn Khaldoun, Ariana"><span class="err">Give at least 5 characters</span></div>
        <div class="field"><label>Description <span class="req">*</span></label><textarea name="description" class="textarea" required data-min="20">The drain in front of the school is blocked since the storm, water covers the road.</textarea><span class="err">At least 20 characters</span></div>
      </div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit">Save changes</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

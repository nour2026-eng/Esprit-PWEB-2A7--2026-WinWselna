<?php $page = 'jobs'; $title = 'Win Jobs'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="page-head m-jobs">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Jobs</span></div>
        <h1>Is there work near me?</h1>
        <p>Every public project publishes the jobs it creates. Apply with your CV and follow your application until the answer.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="toolbar">
    <div class="chips" data-filter-group="jobs">
      <button class="chip active" data-filter="all">All</button>
      <button class="chip" data-filter="cdd">CDD</button>
      <button class="chip" data-filter="cdi">CDI</button>
    </div>
    <div class="flex">
      <div class="tabs" data-tabs><button class="tab active" data-tab="jb-all">Offers</button><button class="tab" data-tab="jb-mine">My applications</button></div>
    </div>
  </div>

  <!-- JobOffer (entity 1) -->
  <div class="tab-panel active" id="jb-all">
    <div class="input-ico" style="max-width:420px;margin-bottom:20px"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Job title, project, city…" data-search="jobs" aria-label="Search job offers"></div>
    <div class="grid-3">
      <div class="card job lift" data-group="jobs" data-cat="cdd"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h3>Site worker</h3><small class="muted">RN-X road · Sfax</small></div></div><div class="tags"><span class="badge b-ok">CDD 8 months</span><span class="badge b-gray">12 positions</span></div><p class="muted" style="font-size:13.5px;margin:0">Earthworks and paving on the second lane. No diploma required, on-site training.</p><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 30 Nov</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 100 TND</span></div><button class="btn btn-module btn-sm m-jobs" data-open="apply-modal" data-apply="Site worker · RN-X road">Apply</button></div>
      <div class="card job lift" data-group="jobs" data-cat="cdi"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h3>Nurse assistant</h3><small class="muted">Regional hospital · Kasserine</small></div></div><div class="tags"><span class="badge b-info">CDI</span><span class="badge b-gray">6 positions</span></div><p class="muted" style="font-size:13.5px;margin:0">For the new wing opening on 27 November. Nursing diploma required.</p><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 05 Dec</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 350 TND</span></div><button class="btn btn-module btn-sm m-jobs" data-open="apply-modal" data-apply="Nurse assistant · Kasserine hospital">Apply</button></div>
      <div class="card job lift" data-group="jobs" data-cat="cdd"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h3>Plumber</h3><small class="muted">Water network · Sousse</small></div></div><div class="tags"><span class="badge b-ok">CDD 6 months</span><span class="badge b-gray">9 positions</span></div><p class="muted" style="font-size:13.5px;margin:0">House connections to the new drinking water network in Sahloul.</p><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 12 Dec</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 250 TND</span></div><button class="btn btn-module btn-sm m-jobs" data-open="apply-modal" data-apply="Plumber · Sousse water network">Apply</button></div>
      <div class="card job lift" data-group="jobs" data-cat="cdd"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h3>Machine operator</h3><small class="muted">Rain drainage · Ariana</small></div></div><div class="tags"><span class="badge b-ok">CDD 10 months</span><span class="badge b-gray">4 positions</span></div><p class="muted" style="font-size:13.5px;margin:0">Excavator licence required. Night shifts possible.</p><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 18 Dec</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 500 TND</span></div><button class="btn btn-module btn-sm m-jobs" data-open="apply-modal" data-apply="Machine operator · Ariana drainage">Apply</button></div>
      <div class="card job lift" data-group="jobs" data-cat="cdi"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h3>Park maintenance agent</h3><small class="muted">Lac 2 park · Tunis</small></div></div><div class="tags"><span class="badge b-info">CDI</span><span class="badge b-gray">3 positions</span></div><p class="muted" style="font-size:13.5px;margin:0">Gardening and maintenance once the park opens in 2027.</p><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 10 Jan</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 050 TND</span></div><button class="btn btn-module btn-sm m-jobs" data-open="apply-modal" data-apply="Park maintenance agent · Lac 2">Apply</button></div>
    </div>
  </div>

  <!-- Application (entity 2) -->
  <div class="tab-panel" id="jb-mine">
    <div class="card card-pad" style="max-width:760px">
      <div class="list-row m-jobs" data-item><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h4>Site worker · RN-X road</h4><small>Applied 12 Nov · CV_Ahmed.pdf</small></div><span class="badge b-warn">Sent</span><button class="btn btn-ghost btn-sm" data-cancel="application">Withdraw</button></div>
      <div class="list-row m-jobs" data-item><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h4>Plumber · Sousse water network</h4><small>Applied 28 Oct · interview on 20 Nov</small></div><span class="badge b-ok">Accepted</span></div>
    </div>
  </div>
</section>

<!-- Apply modal (create Application) -->
<div class="modal" id="apply-modal" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box">
    <div class="modal-head"><div><h3>Apply</h3><small class="muted" id="apply-offer">Job offer</small></div><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate data-success="Application sent · track it in “My applications”">
      <div class="modal-body">
        <div class="grid-2">
          <div class="field"><label>Full name <span class="req">*</span></label><input name="name" class="input" required data-min="3"><span class="err">At least 3 characters</span></div>
          <div class="field"><label>Phone <span class="req">*</span></label><input name="phone" class="input" required data-type="phone" placeholder="2X XXX XXX"><span class="err">Valid Tunisian number</span></div>
        </div>
        <div class="field"><label>Email <span class="req">*</span></label><input name="email" type="email" class="input" required placeholder="you@example.com"><span class="err">Enter a valid email</span></div>
        <div class="field"><label>CV <span class="req">*</span></label><div class="dropzone"><input type="file" name="cv" required accept=".pdf"><svg class="ico ico-lg"><use href="img/icons.svg#i-upload"/></svg><div><b>Upload your CV</b> · PDF</div><div class="dz-name" style="color:var(--teal-d);font-weight:600"></div></div><span class="err">Your CV is required</span></div>
        <div class="field"><label>Motivation</label><textarea name="motivation" class="textarea" data-max="300" placeholder="A few words (optional)"></textarea><span class="err">300 characters max</span></div>
      </div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-teal" type="submit">Send my application</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

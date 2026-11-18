<?php $page = 'requests'; $title = 'Win Request'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="page-head m-request">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Request</span></div>
        <h1>Where is my paperwork at?</h1>
        <p>Choose the document you need, upload the required files and follow your request from <b>Pending</b> to <b>Accepted</b>.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-request"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:30px">
  <div class="sec-head"><div><span class="kicker" style="color:var(--c-request)">Step 1</span><h2 style="font-size:26px">Choose a request type</h2></div><div class="input-ico" style="min-width:260px"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search a document…" data-search="rt" aria-label="Search request types"></div></div>
  <!-- RequestType (entity 1) -->
  <div class="grid-4 m-request">
    <div class="card rtype" data-type="Birth certificate" data-group="rt"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-file"/></svg></span><h3>Birth certificate</h3><span class="badge b-module">2 days</span><ul><li>National ID card</li></ul></div>
    <div class="card rtype" data-type="Residence certificate" data-group="rt"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-pin"/></svg></span><h3>Residence certificate</h3><span class="badge b-module">3 days</span><ul><li>National ID card</li><li>Electricity or water bill</li></ul></div>
    <div class="card rtype" data-type="Building permit" data-group="rt"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><h3>Building permit</h3><span class="badge b-module">30 days</span><ul><li>Land title</li><li>Architect plans</li><li>Site photos</li></ul></div>
    <div class="card rtype" data-type="Shop licence" data-group="rt"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><h3>Shop licence</h3><span class="badge b-module">15 days</span><ul><li>Lease contract</li><li>Tax ID</li></ul></div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="with-aside" style="grid-template-columns:1fr 1fr">
    <!-- Submit (create Request) -->
    <div class="card card-pad" id="request-form">
      <span class="kicker" style="color:var(--c-request)">Step 2</span>
      <h2 style="font-size:21px;margin-top:6px">Submit your request</h2>
      <form data-validate novalidate data-success="Request sent · status: Pending">
        <div class="field"><label for="req-type">Request type <span class="req">*</span></label><select id="req-type" name="type" class="select" required><option value="">Choose…</option><option>Birth certificate</option><option>Residence certificate</option><option>Building permit</option><option>Shop licence</option></select><span class="err">Choose a request type</span></div>
        <div class="grid-2">
          <div class="field"><label for="req-cin">ID card number <span class="req">*</span></label><input id="req-cin" name="cin" class="input" required data-digits data-min="8" data-max="8" inputmode="numeric" placeholder="8 digits"><span class="err">8 digits required</span></div>
          <div class="field"><label for="req-phone">Phone <span class="req">*</span></label><input id="req-phone" name="phone" class="input" required data-type="phone" placeholder="2X XXX XXX"><span class="err">Enter a valid Tunisian number</span></div>
        </div>
        <div class="field"><label for="req-desc">Details</label><textarea id="req-desc" name="description" class="textarea" data-max="400" placeholder="Number of copies, purpose…"></textarea><span class="err">400 characters max</span></div>
        <div class="field"><label>Required documents <span class="req">*</span></label><div class="dropzone"><input type="file" name="documents" multiple required accept=".pdf,image/*"><svg class="ico ico-lg"><use href="img/icons.svg#i-upload"/></svg><div><b>Upload your files</b> · PDF or images</div><div class="dz-name" style="color:var(--teal-d);font-weight:600"></div></div><span class="err">Upload at least one document</span></div>
        <button class="btn btn-teal btn-lg" type="submit" style="width:100%"><svg class="ico"><use href="img/icons.svg#i-send"/></svg>Send the request</button>
      </form>
    </div>

    <!-- My requests (track / edit / cancel) -->
    <div style="display:flex;flex-direction:column;gap:14px">
      <div class="flex between"><h2 style="font-size:21px;margin:0">My requests</h2><span class="muted" style="font-size:13px">3 total</span></div>
      <div class="card track" data-item>
        <div class="track-head"><div><h4>Birth certificate · 3 copies</h4><small class="muted">#R-5521 · sent 11 Nov</small></div><span class="badge b-ok">Accepted</span></div>
        <div class="stepper"><span></span><i class="on"></i><span class="on"></span><i class="on"></i><span class="on"></span><i class="on"></i></div>
        <div class="stepper-lbl"><span>Pending</span><span>In review</span><span>Accepted</span></div>
        <div class="reply" style="border-left-color:var(--c-request)"><b>Ready</b> · pick it up at the municipality of Tunis, desk 4, from 13 Nov.</div>
      </div>
      <div class="card track" data-item>
        <div class="track-head"><div><h4>Residence certificate</h4><small class="muted">#R-5560 · sent today · 3 days expected</small></div><span class="badge b-warn">Pending</span></div>
        <div class="stepper"><span></span><i class="on"></i><span></span><i></i><span></span><i></i></div>
        <div class="stepper-lbl"><span>Pending</span><span>In review</span><span>Accepted</span></div>
        <div class="flex" style="margin-top:8px"><button class="btn btn-ghost btn-sm" onclick="document.getElementById('req-type').value='Residence certificate';document.getElementById('request-form').scrollIntoView({behavior:'smooth'})"><svg class="ico ico-sm"><use href="img/icons.svg#i-edit"/></svg>Edit</button><button class="btn btn-ghost btn-sm" data-cancel="request"><svg class="ico ico-sm"><use href="img/icons.svg#i-trash"/></svg>Cancel</button></div>
      </div>
      <div class="card track" data-item>
        <div class="track-head"><div><h4>Shop licence</h4><small class="muted">#R-5310 · sent 02 Oct</small></div><span class="badge b-bad">Refused</span></div>
        <div class="reply" style="border-left-color:var(--c-safe)"><b>Reason</b> · the lease contract is not signed. You can submit a new request.</div>
      </div>
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

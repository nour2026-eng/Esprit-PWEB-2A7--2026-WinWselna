<?php $page = 'account'; $title = 'My space'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="container" style="padding:34px 0 60px">
  <div class="with-aside" style="grid-template-columns:320px 1fr">
    <aside class="aside-sticky">
      <div class="card profile-card">
        <span class="avatar">AB</span>
        <h3 style="margin:0">Ahmed Ben Salah</h3>
        <small class="muted">ahmed.bensalah@mail.tn · Tunis</small>
        <div style="margin-top:10px"><span class="badge b-ok">Client · verified</span></div>
        <div class="mini-stat"><div><b>3</b><span>reclamations</span></div><div><b>3</b><span>requests</span></div><div><b>1</b><span>event</span></div><div><b>2</b><span>applications</span></div></div>
        <button class="btn btn-ghost btn-sm" style="margin-top:16px;width:100%" data-open="profile-modal"><svg class="ico ico-sm"><use href="img/icons.svg#i-edit"/></svg>Edit my profile</button>
        <a href="login.php" class="btn btn-ghost btn-sm" style="margin-top:8px;width:100%"><svg class="ico ico-sm"><use href="img/icons.svg#i-logout"/></svg>Log out</a>
      </div>
    </aside>

    <div>
      <span class="kicker">My space</span>
      <h1 style="font-size:32px;font-weight:800;margin:6px 0 18px">Hello Ahmed, here is where everything is at.</h1>
      <div class="tabs" data-tabs style="margin-bottom:18px">
        <button class="tab active" data-tab="t-recl">Reclamations</button>
        <button class="tab" data-tab="t-req">Requests</button>
        <button class="tab" data-tab="t-ev">Events</button>
        <button class="tab" data-tab="t-jobs">Applications</button>
        <button class="tab" data-tab="t-follow">Followed projects</button>
      </div>
      <div class="card card-pad">
        <div class="tab-panel active" id="t-recl">
          <div class="list-row m-safe"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span><div class="grow"><h4>Pothole, Avenue Habib Bourguiba</h4><small>#1284 · response received 10 Nov</small></div><span class="badge b-warn">In progress</span></div>
          <div class="list-row m-safe"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span><div class="grow"><h4>Blocked drain after the rain</h4><small>#1291 · sent today</small></div><span class="badge b-info">Sent</span></div>
          <div class="list-row m-safe"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span><div class="grow"><h4>Broken street light</h4><small>#1102 · resolved 22 Oct</small></div><span class="badge b-ok">Done</span></div>
          <a href="reclamations.php" class="link-arrow" style="margin-top:12px">Manage my reclamations <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
        </div>
        <div class="tab-panel" id="t-req">
          <div class="list-row m-request"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-request"/></svg></span><div class="grow"><h4>Birth certificate · 3 copies</h4><small>#R-5521 · ready from 13 Nov</small></div><span class="badge b-ok">Accepted</span></div>
          <div class="list-row m-request"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-request"/></svg></span><div class="grow"><h4>Residence certificate</h4><small>#R-5560 · 3 days expected</small></div><span class="badge b-warn">Pending</span></div>
          <div class="list-row m-request"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-request"/></svg></span><div class="grow"><h4>Shop licence</h4><small>#R-5310 · lease contract missing</small></div><span class="badge b-bad">Refused</span></div>
          <a href="requests.php" class="link-arrow" style="margin-top:12px">Manage my requests <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
        </div>
        <div class="tab-panel" id="t-ev">
          <div class="list-row m-event"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span><div class="grow"><h4>RN-X road: public consultation</h4><small>20 Nov · 18:00 · Sfax town hall</small></div><span class="badge b-ok">Registered</span></div>
          <a href="events.php" class="link-arrow" style="margin-top:12px">See all events <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
        </div>
        <div class="tab-panel" id="t-jobs">
          <div class="list-row m-jobs"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h4>Site worker · RN-X road</h4><small>Applied 12 Nov</small></div><span class="badge b-warn">Sent</span></div>
          <div class="list-row m-jobs"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h4>Plumber · Sousse water network</h4><small>Interview on 20 Nov</small></div><span class="badge b-ok">Accepted</span></div>
          <a href="jobs.php" class="link-arrow" style="margin-top:12px">See all offers <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
        </div>
        <div class="tab-panel" id="t-follow">
          <div class="list-row m-projects"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h4>RN-X road widening</h4><div class="progress late" style="margin-top:6px;max-width:320px"><i data-v="72" style="--v:72%"></i></div></div><b style="font-family:var(--f-head)">72%</b></div>
          <div class="list-row m-projects"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><div class="grow"><h4>Lac 2 public park</h4><div class="progress gold" style="margin-top:6px;max-width:320px"><i style="--v:12%"></i></div></div><b style="font-family:var(--f-head)">12%</b></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Edit profile (User update) -->
<div class="modal" id="profile-modal" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box">
    <div class="modal-head"><h3>Edit my profile</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate data-success="Profile updated" data-keep="1">
      <div class="modal-body">
        <div class="field"><label>Full name <span class="req">*</span></label><input name="fullName" class="input" required data-min="3" value="Ahmed Ben Salah"><span class="err">At least 3 characters</span></div>
        <div class="grid-2">
          <div class="field"><label>Email <span class="req">*</span></label><input name="email" type="email" class="input" required value="ahmed.bensalah@mail.tn"><span class="err">Valid email required</span></div>
          <div class="field"><label>Phone <span class="req">*</span></label><input name="phone" class="input" required data-type="phone" value="22 456 789"><span class="err">Valid Tunisian number</span></div>
        </div>
        <div class="field"><label>New password</label><input name="password" type="password" class="input" data-min="8" placeholder="Leave empty to keep the current one"><span class="err">At least 8 characters</span></div>
      </div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit">Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

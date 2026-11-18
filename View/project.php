<?php $page = 'projects'; $title = 'Project details'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="page-head m-projects">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><a href="projects.php">Win Projects</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>RN-X road</span></div>
        <h1>RN-X road widening</h1>
        <p>Sfax governorate · Budget 48 M TND · Started March 2025 · Planned end March 2027</p>
        <div class="flex wrap" style="margin-top:16px"><span class="badge b-bad">Late · 6 weeks</span><button class="btn btn-light btn-sm" data-follow><svg class="ico ico-sm"><use href="img/icons.svg#i-bell"/></svg> Follow this project</button></div>
      </div>
      <div style="position:relative;z-index:1;text-align:center;color:#fff">
        <svg viewBox="0 0 120 120" width="130" height="130" aria-label="72% progress"><circle cx="60" cy="60" r="50" fill="none" stroke="rgba(255,255,255,.15)" stroke-width="12"/><circle cx="60" cy="60" r="50" fill="none" stroke="#F5B700" stroke-width="12" stroke-linecap="round" stroke-dasharray="226 314" transform="rotate(-90 60 60)"/><text x="60" y="66" text-anchor="middle" font-family="Poppins" font-weight="800" font-size="26" fill="#fff">72%</text></svg>
        <small style="color:#C9D4E3;font-weight:600">overall progress</small>
      </div>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="with-aside">
    <div style="display:flex;flex-direction:column;gap:20px">
      <!-- Milestones (entity 2) -->
      <div class="card card-pad">
        <div class="flex between" style="margin-bottom:18px"><h2 style="font-size:20px;margin:0">Milestones</h2><span class="badge b-module m-projects">4 / 6 done</span></div>
        <ol class="timeline">
          <li class="done"><b>Studies & land acquisition</b><small>Done · 15 Jun 2025</small></li>
          <li class="done"><b>Earthworks, section A</b><small>Done · 02 Nov 2025</small></li>
          <li class="done"><b>Drainage and networks</b><small>Done · 20 Apr 2026</small></li>
          <li class="done"><b>Bridge section (420 m)</b><small>Done · 10 Nov 2026 · reported in Win News</small></li>
          <li class="current"><b>Second lane</b><small>In progress · due 15 Jan 2027</small></li>
          <li><b>Public lighting</b><small>Planned · due 30 Mar 2027</small></li>
        </ol>
      </div>
      <div class="card card-pad">
        <h2 style="font-size:20px">About the project</h2>
        <p>The RN-X road connects the centre of Sfax to the industrial zone. The widening adds a second lane in each direction over 9 km, a new 420 m bridge, rain drainage and LED lighting.</p>
        <div class="grid-2" style="gap:14px">
          <div class="mini-stat" style="grid-template-columns:1fr 1fr;margin:0"><div><b>48 M</b><span>budget (TND)</span></div><div><b>9 km</b><span>length</span></div></div>
          <div class="mini-stat" style="grid-template-columns:1fr 1fr;margin:0"><div><b>12</b><span>jobs created</span></div><div><b>8</b><span>reclamations</span></div></div>
        </div>
      </div>
    </div>

    <aside class="aside-sticky">
      <div class="card card-pad m-event"><span class="kicker" style="color:var(--c-event)">Event on this project</span><h3 style="margin-top:6px;font-size:16.5px">Public consultation · 20 Nov, 18:00</h3><p class="muted" style="font-size:13.5px">Sfax town hall · 42 / 60 places</p><a href="events.php" class="btn btn-module btn-sm" style="width:100%">Register</a></div>
      <div class="card card-pad m-jobs"><span class="kicker" style="color:var(--c-jobs)">Jobs on this project</span><h3 style="margin-top:6px;font-size:16.5px">Site worker · 12 positions</h3><p class="muted" style="font-size:13.5px">CDD 8 months · deadline 30 Nov</p><a href="jobs.php" class="btn btn-module btn-sm" style="width:100%">See the offer</a></div>
      <div class="card card-pad m-safe"><span class="kicker" style="color:var(--c-safe)">Problem on this site?</span><p class="muted" style="font-size:13.5px;margin:6px 0 12px">Dust, blocked access, danger: send a reclamation linked to this project.</p><a href="reclamations.php" class="btn btn-primary btn-sm" style="width:100%">Submit a reclamation</a></div>
    </aside>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

<?php $page = 'dashboard'; $title = 'Dashboard'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="admin">
<div class="admin-wrap">
<?php require_once 'includes/sidebar.php'; ?>
<div class="main">
<?php require_once 'includes/topbar.php'; ?>
<main class="content">
  <div class="page-title">
    <div>
      <div class="bc"><span>Home</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Dashboard</span></div>
      <h1>Good morning, Sami <span style="font-family:var(--f-ar);color:var(--teal-d);font-size:22px">صباح الخير</span></h1>
      <p>Here is where everything is at today, Friday 13 November 2026.</p>
    </div>
    <div class="flex"><select class="select" style="width:auto" aria-label="Period"><option>Last 12 weeks</option><option>This month</option><option>This year</option></select><button class="btn btn-primary" onclick="WW.toast('Report generated (PDF)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Report</button></div>
  </div>

  <!-- KPIs -->
  <div class="kpis">
    <div class="kpi m-user" style="--m:var(--navy)"><svg class="ico"><use href="../img/icons.svg#i-projects"/></svg><span class="trend">+6</span><b data-count="128">0</b><span>Tracked projects</span></div>
    <div class="kpi m-safe"><svg class="ico"><use href="../img/icons.svg#i-safe"/></svg><span class="trend">7 new</span><b data-count="1284">0</b><span>Reclamations</span></div>
    <div class="kpi m-request"><svg class="ico"><use href="../img/icons.svg#i-request"/></svg><span class="trend">12 pending</span><b data-count="499">0</b><span>Requests</span></div>
    <div class="kpi m-jobs"><svg class="ico"><use href="../img/icons.svg#i-jobs"/></svg><span class="trend">+128</span><b data-count="346">0</b><span>Job positions</span></div>
  </div>
  <div class="kpis">
    <div class="kpi kpi-light m-news"><svg class="ico"><use href="../img/icons.svg#i-news"/></svg><span class="trend">5 drafts</span><b data-count="47">0</b><span>Articles</span></div>
    <div class="kpi kpi-light m-projects"><svg class="ico"><use href="../img/icons.svg#i-flag"/></svg><span class="trend">23 late</span><b data-count="612">0</b><span>Milestones</span></div>
    <div class="kpi kpi-light m-event"><svg class="ico"><use href="../img/icons.svg#i-event"/></svg><span class="trend">5 upcoming</span><b data-count="1870">0</b><span>Participations</span></div>
    <div class="kpi kpi-light m-user" style="--m:var(--teal)"><svg class="ico"><use href="../img/icons.svg#i-users"/></svg><span class="trend">+214</span><b data-count="9886">0</b><span>Users</span></div>
  </div>

  <div class="dash-grid">
    <div class="panel">
      <div class="panel-head"><h3 class="m-safe"><svg class="ico"><use href="../img/icons.svg#i-chart"/></svg>Reclamations received vs resolved</h3><div class="legend-row"><span><i style="background:var(--red)"></i>Received</span><span><i style="background:var(--teal)"></i>Resolved</span></div></div>
      <div class="panel-body"><svg class="chart" data-line="[[38,52,47,61,58,72,66,80,74,88,83,95],[30,41,40,50,52,60,58,70,69,79,78,90]]" data-colors='["#E70013","#13A89E"]' data-labels='["W35","W36","W37","W38","W39","W40","W41","W42","W43","W44","W45","W46"]' role="img" aria-label="Line chart"></svg></div>
    </div>
    <div class="panel">
      <div class="panel-head"><h3 class="m-request"><svg class="ico"><use href="../img/icons.svg#i-request"/></svg>Requests by status</h3></div>
      <div class="panel-body">
        <svg class="donut" data-donut="[412,12,75]" data-colors='["#13A89E","#F5A300","#E70013"]' data-label="requests" role="img" aria-label="Donut chart"></svg>
        <div class="legend-row" style="justify-content:center"><span><i style="background:#13A89E"></i>Accepted</span><span><i style="background:#F5A300"></i>Pending</span><span><i style="background:#E70013"></i>Refused</span></div>
      </div>
    </div>
  </div>

  <div class="dash-grid">
    <!-- latest reclamations -->
    <div class="panel">
      <div class="panel-head"><h3 class="m-safe"><svg class="ico"><use href="../img/icons.svg#i-safe"/></svg>Latest reclamations</h3><a href="reclamations.php" class="link-arrow" style="font-size:13px">Open all <svg class="ico ico-sm"><use href="../img/icons.svg#i-arrow"/></svg></a></div>
      <div class="tbl-wrap">
        <table class="tbl">
          <thead><tr><th class="no-sort">ID</th><th class="no-sort">Client</th><th class="no-sort">Type</th><th class="no-sort">Location</th><th class="no-sort">Status</th></tr></thead>
          <tbody>
            <tr><td class="strong">1291</td><td><div class="who"><span class="avatar">AB</span><b>Ahmed Ben Salah</b></div></td><td><span class="badge b-warn">Incident</span></td><td>Rue Ibn Khaldoun, Ariana</td><td><span class="badge b-info">Sent</span></td></tr>
            <tr><td class="strong">1290</td><td><div class="who"><span class="avatar" style="background:#7B5CFF">IH</span><b>Ines Hammami</b></div></td><td><span class="badge b-bad">SOS</span></td><td>Av. de la Liberté, Tunis</td><td><span class="badge b-warn">In progress</span></td></tr>
            <tr><td class="strong">1289</td><td><div class="who"><span class="avatar" style="background:#2F9E44">SA</span><b>Salma Ayari</b></div></td><td><span class="badge b-violet">Damage</span></td><td>RN-X km 4, Sfax</td><td><span class="badge b-warn">In progress</span></td></tr>
            <tr><td class="strong">1288</td><td><div class="who"><span class="avatar" style="background:#D99A00">YG</span><b>Youssef Gharbi</b></div></td><td><span class="badge b-warn">Incident</span></td><td>Sahloul 2, Sousse</td><td><span class="badge b-info">Sent</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- activity per module -->
    <div class="panel">
      <div class="panel-head"><h3><svg class="ico"><use href="../img/icons.svg#i-layers"/></svg>Activity per module</h3></div>
      <div class="panel-body mod-bars">
        <div class="mod-bar m-news"><div class="lbl"><span>Win News · articles read</span><b>86%</b></div><div class="progress"><i data-v="86"></i></div></div>
        <div class="mod-bar m-projects"><div class="lbl"><span>Win Projects · milestones on time</span><b>71%</b></div><div class="progress"><i data-v="71"></i></div></div>
        <div class="mod-bar m-safe"><div class="lbl"><span>Win Safe · answered &lt; 72 h</span><b>94%</b></div><div class="progress"><i data-v="94"></i></div></div>
        <div class="mod-bar m-request"><div class="lbl"><span>Win Request · accepted</span><b>83%</b></div><div class="progress"><i data-v="83"></i></div></div>
        <div class="mod-bar m-event"><div class="lbl"><span>Win Event · seats filled</span><b>64%</b></div><div class="progress"><i data-v="64"></i></div></div>
        <div class="mod-bar m-jobs"><div class="lbl"><span>Win Jobs · positions filled</span><b>48%</b></div><div class="progress"><i data-v="48"></i></div></div>
      </div>
    </div>
  </div>

  <div class="dash-grid" style="grid-template-columns:1fr 1fr 1fr">
    <div class="panel">
      <div class="panel-head"><h3 class="m-request"><svg class="ico"><use href="../img/icons.svg#i-request"/></svg>Pending requests</h3></div>
      <div class="panel-body"><ul class="feed">
        <li class="m-request"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-file"/></svg></span><div><b>Residence certificate</b><small>Ahmed Ben Salah · today</small></div></li>
        <li class="m-request"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-file"/></svg></span><div><b>Birth certificate</b><small>Walid Chebbi · today</small></div></li>
        <li class="m-request"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-file"/></svg></span><div><b>Building permit</b><small>Youssef Gharbi · yesterday</small></div></li>
      </ul></div>
    </div>
    <div class="panel">
      <div class="panel-head"><h3 class="m-event"><svg class="ico"><use href="../img/icons.svg#i-event"/></svg>Upcoming events</h3></div>
      <div class="panel-body"><ul class="feed">
        <li class="m-event"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-calendar"/></svg></span><div><b>RN-X public consultation</b><small>20 Nov · 42 / 60 registered</small></div></li>
        <li class="m-event"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-calendar"/></svg></span><div><b>Kasserine hospital opening</b><small>27 Nov · 64 / 120 registered</small></div></li>
        <li class="m-event"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-calendar"/></svg></span><div><b>Lac 2 park design</b><small>04 Dec · 77 / 80 · almost full</small></div></li>
      </ul></div>
    </div>
    <div class="panel">
      <div class="panel-head"><h3 class="m-jobs"><svg class="ico"><use href="../img/icons.svg#i-jobs"/></svg>New applications</h3></div>
      <div class="panel-body"><ul class="feed">
        <li class="m-jobs"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-user"/></svg></span><div><b>Ahmed Ben Salah</b><small>Site worker · RN-X road</small></div></li>
        <li class="m-jobs"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-user"/></svg></span><div><b>Youssef Gharbi</b><small>Site worker · RN-X road</small></div></li>
        <li class="m-jobs"><span class="m-ico"><svg class="ico"><use href="../img/icons.svg#i-user"/></svg></span><div><b>Walid Chebbi</b><small>Machine operator · Ariana</small></div></li>
      </ul></div>
    </div>
  </div>
</main>
<?php require_once 'includes/footer.php'; ?>
</div>
</div>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

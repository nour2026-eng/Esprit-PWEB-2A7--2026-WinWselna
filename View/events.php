<?php $page = 'events'; $title = 'Win Event'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="page-head m-event">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Event</span></div>
        <h1>Can I have my say?</h1>
        <p>Public consultations, neighbourhood meetings and openings around the projects near you. Register in one click, cancel anytime.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="toolbar">
    <div class="chips" data-filter-group="ev">
      <button class="chip active" data-filter="all">All</button>
      <button class="chip" data-filter="consultation">Consultations</button>
      <button class="chip" data-filter="meeting">Meetings</button>
      <button class="chip" data-filter="opening">Openings</button>
    </div>
    <div class="tabs" data-tabs><button class="tab active" data-tab="ev-up">Upcoming</button><button class="tab" data-tab="ev-mine">My registrations</button></div>
  </div>

  <div class="tab-panel active" id="ev-up">
    <div class="grid-3">
      <div class="card event lift m-event" data-capacity="60" data-group="ev" data-cat="consultation"><div class="date-box"><b>20</b><span>Nov</span></div><div><span class="badge b-module">Consultation</span><h3>RN-X road: public consultation</h3><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Sfax town hall</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>18:00</span></div><div class="cap"><span data-taken="42">42 / 60 places</span><span>Project: RN-X</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="70"></i></div><button class="btn btn-module btn-sm" style="margin-top:12px" data-register>Register</button></div></div>
      <div class="card event lift m-event" data-capacity="120" data-group="ev" data-cat="opening"><div class="date-box"><b>27</b><span>Nov</span></div><div><span class="badge b-module">Opening</span><h3>Kasserine hospital: new wing</h3><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Kasserine</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>10:00</span></div><div class="cap"><span data-taken="64">64 / 120 places</span><span>Project: Hospital</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="53"></i></div><button class="btn btn-module btn-sm" style="margin-top:12px" data-register>Register</button></div></div>
      <div class="card event lift m-event" data-capacity="80" data-group="ev" data-cat="consultation"><div class="date-box"><b>04</b><span>Dec</span></div><div><span class="badge b-module">Consultation</span><h3>Lac 2 park: choose the design</h3><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Tunis, Lac 2</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>17:30</span></div><div class="cap"><span data-taken="77">77 / 80 places</span><span>Project: Lac 2 park</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="96"></i></div><button class="btn btn-module btn-sm" style="margin-top:12px" data-register>Register</button></div></div>
      <div class="card event lift m-event" data-capacity="40" data-group="ev" data-cat="meeting"><div class="date-box"><b>09</b><span>Dec</span></div><div><span class="badge b-module">Meeting</span><h3>Ariana north: drainage works update</h3><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Ariana youth centre</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>19:00</span></div><div class="cap"><span data-taken="12">12 / 40 places</span><span>Project: Drainage</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="30"></i></div><button class="btn btn-module btn-sm" style="margin-top:12px" data-register>Register</button></div></div>
      <div class="card event lift m-event" data-capacity="50" data-group="ev" data-cat="meeting"><div class="date-box"><b>14</b><span>Dec</span></div><div><span class="badge b-module">Meeting</span><h3>Sousse: water network Q&A</h3><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Sahloul community hall</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>18:30</span></div><div class="cap"><span data-taken="21">21 / 50 places</span><span>Project: Water</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="42"></i></div><button class="btn btn-module btn-sm" style="margin-top:12px" data-register>Register</button></div></div>
    </div>
  </div>

  <!-- Participation (entity 2) -->
  <div class="tab-panel" id="ev-mine">
    <div class="card card-pad" style="max-width:760px">
      <div class="list-row m-event" data-item><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span><div class="grow"><h4>RN-X road: public consultation</h4><small>20 Nov · 18:00 · registered on 12 Nov</small></div><span class="badge b-ok">Active</span><button class="btn btn-ghost btn-sm" data-cancel="registration">Cancel</button></div>
      <div class="list-row m-event" data-item><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span><div class="grow"><h4>Hammamet school opening</h4><small>15 Sep · attended</small></div><span class="badge b-gray">Past</span></div>
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

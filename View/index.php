<?php $page = 'home'; $title = 'Home'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<!-- ============ HERO ============ -->
<header class="hero">
  <div class="container">
    <div>
      <span class="hero-tag"><b>NEW</b>Six public services, one account</span>
      <h1>Win Wselna<span class="q">?</span><br>The state in your pocket.</h1>
      <div class="ar-title">وين وصلنا؟</div>
      <p class="lead">Read verified news, follow the projects in your street, report a problem, track your paperwork, join public consultations and find a job created by your city. All in one place.</p>
      <div class="hero-ctas">
        <a href="reclamations.php" class="btn btn-primary btn-lg"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg>Submit a reclamation</a>
        <a href="news.php" class="btn btn-teal btn-lg"><svg class="ico"><use href="img/icons.svg#i-play"/></svg>Today's 60 s briefing</a>
      </div>
      <div class="hero-stats">
        <div><b data-count="128">0</b><span>public projects tracked</span></div>
        <div><b data-count="1284">0</b><span>reclamations handled</span></div>
        <div><b data-count="346">0</b><span>local jobs posted</span></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-img"><img src="img/hero.webp" alt="Smart Tunisian city with the Win Wselna interface"></div>
      <div class="float-card fc-1">RN-X road · Sfax<small>72% · 4 of 6 milestones done</small><div class="progress gold"><i data-v="72"></i></div></div>
      <div class="float-card fc-2"><span class="badge b-ok">Request accepted</span><small style="margin-top:6px">Birth certificate · ready tomorrow</small></div>
      <div class="float-card fc-3"><img src="img/mascot.webp" alt=""><div>3am Win<small class="ar" style="font-size:14px">نجم نعاونك؟</small></div></div>
    </div>
  </div>
</header>

<!-- ============ MODULES ============ -->
<section class="section" id="modules">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker">Six modules · one account</span><h2>Every question a citizen asks, one answer.</h2></div>
      <p>Each service is built the same way: you create, you follow, the administration answers. Nothing gets lost.</p>
    </div>
    <div class="modules">
      <a href="news.php" class="module-card m-news lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></span><h3>Win News</h3><span class="q">“What's happening today?”</span><p>Official articles by category, with a 60-second AI summary.</p><span class="link-arrow">Read the news <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="projects.php" class="module-card m-projects lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><h3>Win Projects</h3><span class="q">“Where is this project at?”</span><p>Progress, milestones and everything linked to each public project.</p><span class="link-arrow">Follow a project <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="reclamations.php" class="module-card m-safe lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span><h3>Win Safe</h3><span class="q">“Who fixes this pothole?”</span><p>Submit a reclamation with a photo, then read the agent's response.</p><span class="link-arrow">Report a problem <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="requests.php" class="module-card m-request lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-request"/></svg></span><h3>Win Request</h3><span class="q">“Where is my paperwork at?”</span><p>Choose a document, upload what's needed, track every step.</p><span class="link-arrow">Make a request <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="events.php" class="module-card m-event lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span><h3>Win Event</h3><span class="q">“Can I have my say?”</span><p>Public consultations and meetings about the projects near you.</p><span class="link-arrow">See the events <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="jobs.php" class="module-card m-jobs lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><h3>Win Jobs</h3><span class="q">“Is there work near me?”</span><p>Job offers created by public projects. Apply with your CV.</p><span class="link-arrow">Find a job <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
    </div>
  </div>
</section>

<!-- ============ LIVE NUMBERS ============ -->
<section class="container reveal">
  <div class="live">
    <div><b data-count="23">0</b><span>projects running late this month</span></div>
    <div><b data-count="94" data-suffix="%">0</b><span>reclamations answered in under 72 h</span></div>
    <div><b data-count="412">0</b><span>requests ready this week</span></div>
    <div><b data-count="1870">0</b><span>citizens registered to consultations</span></div>
  </div>
</section>

<!-- ============ LATEST NEWS ============ -->
<section class="section">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker" style="color:var(--c-news)">Win News</span><h2>Latest verified articles</h2></div>
      <a href="news.php" class="link-arrow">All articles <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
    </div>
    <div class="grid-3">
      <a href="article.php" class="card post lift reveal m-news"><div class="post-img"><img src="img/city.webp" alt=""><span class="badge b-module">Infrastructure</span></div><div class="post-body"><h3>RN-X road: the fourth milestone is delivered in Sfax</h3><p>The bridge section is open to traffic. Two milestones remain before the end of the works.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>12 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>3 min</span></div></div></a>
      <a href="article.php" class="card post lift reveal m-news"><div class="post-img"><img src="img/sign.webp" alt="" style="object-position:30% 50%"><span class="badge b-module">Municipality</span></div><div class="post-body"><h3>New QR panels on every construction site in Tunis</h3><p>Scan the sign to see the progress, the budget and the next milestone of the project.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>10 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>2 min</span></div></div></a>
      <a href="article.php" class="card post lift reveal m-news"><div class="post-img"><img src="img/office.webp" alt=""><span class="badge b-module">Services</span></div><div class="post-body"><h3>Administrative requests: average delay down to 3 days</h3><p>Birth certificates and residence certificates are now processed online in most governorates.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>08 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>4 min</span></div></div></a>
    </div>
  </div>
</section>

<!-- ============ PROJECTS ============ -->
<section class="section white">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker" style="color:var(--c-projects)">Win Projects</span><h2>Projects near you</h2></div>
      <a href="projects.php" class="link-arrow">All projects <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
    </div>
    <div class="grid-3">
      <a href="project.php" class="card project lift reveal"><div class="post-img"><img src="img/city.webp" alt=""><span class="badge b-bad">Late</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Sfax · Road</span><h3>RN-X road widening</h3><div class="pb-row"><span>4 / 6 milestones</span><b>72%</b></div><div class="progress late"><i data-v="72"></i></div></div></a>
      <a href="project.php" class="card project lift reveal"><div class="post-img"><img src="img/office.webp" alt=""><span class="badge b-ok">On time</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Kasserine · Health</span><h3>Regional hospital extension</h3><div class="pb-row"><span>3 / 7 milestones</span><b>45%</b></div><div class="progress"><i data-v="45"></i></div></div></a>
      <a href="project.php" class="card project lift reveal"><div class="post-img"><img src="img/hero.webp" alt=""><span class="badge b-info">Planned</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Tunis · Green space</span><h3>Lac 2 public park</h3><div class="pb-row"><span>1 / 5 milestones</span><b>12%</b></div><div class="progress gold"><i data-v="12"></i></div></div></a>
    </div>
  </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="section">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker">Reclamations & requests</span><h2>Submit once. Track until it's done.</h2></div>
      <p>Every reclamation and every request follows the same visible path. You always know <b>“win wselna”</b>.</p>
    </div>
    <div class="steps">
      <div class="step reveal m-safe"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-send"/></svg></span><h3>Submit</h3><p>Describe the problem or pick the document you need. Add a photo or your files.</p></div>
      <div class="step reveal m-request"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-user"/></svg></span><h3>An agent takes it</h3><p>A municipal agent receives it, checks it and changes its status.</p></div>
      <div class="step reveal m-news"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-reply"/></svg></span><h3>You get a response</h3><p>The answer arrives in your space and by notification. You can reply.</p></div>
      <div class="step reveal m-jobs"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-check"/></svg></span><h3>Done</h3><p>The problem is fixed or the document is ready. Everything stays in your history.</p></div>
    </div>
  </div>
</section>

<!-- ============ EVENTS + JOBS ============ -->
<section class="section white">
  <div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:30px" id="ev-jobs">
    <div>
      <div class="sec-head reveal"><div><span class="kicker" style="color:var(--c-event)">Win Event</span><h2>Have your say</h2></div><a href="events.php" class="link-arrow">All events <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a></div>
      <div style="display:flex;flex-direction:column;gap:14px">
        <div class="card event reveal m-event" data-capacity="60"><div class="date-box"><b>20</b><span>Nov</span></div><div><span class="badge b-module">Consultation</span><h3>RN-X road: public consultation</h3><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Sfax town hall</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>18:00</span></div><div class="cap"><span data-taken="42">42 / 60 places</span><span>Free</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="70"></i></div></div></div>
        <div class="card event reveal m-event" data-capacity="120"><div class="date-box"><b>27</b><span>Nov</span></div><div><span class="badge b-module">Opening</span><h3>Opening of the Kasserine hospital wing</h3><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg>Kasserine</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>10:00</span></div><div class="cap"><span data-taken="64">64 / 120 places</span><span>Free</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="53"></i></div></div></div>
      </div>
    </div>
    <div>
      <div class="sec-head reveal"><div><span class="kicker" style="color:var(--c-jobs)">Win Jobs</span><h2>Work near home</h2></div><a href="jobs.php" class="link-arrow">All offers <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a></div>
      <div style="display:flex;flex-direction:column;gap:14px">
        <div class="card job reveal"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h3>Site worker · 12 positions</h3><small class="muted">RN-X road · Sfax</small></div><span class="badge b-ok">CDD 8 months</span></div><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 30 Nov</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 100 TND / month</span></div></div>
        <div class="card job reveal"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h3>Nurse assistant · 6 positions</h3><small class="muted">Regional hospital · Kasserine</small></div><span class="badge b-info">CDI</span></div><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline 05 Dec</span><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg>1 350 TND / month</span></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ============ CTA ============ -->
<section class="section">
  <div class="container reveal">
    <div class="cta-band">
      <div>
        <span class="kicker" style="color:var(--gold)">3am Win · your assistant</span>
        <h2>Ask in Darija, Arabic or French.</h2>
        <p>“El chantier hedha wa9ef men 3 chhour.” 3am Win understands, finds the right module and opens a reclamation for you.</p>
        <div class="hero-ctas" style="margin-bottom:0"><a href="register.php" class="btn btn-primary btn-lg">Create my free account</a><a href="login.php" class="btn btn-light btn-lg">I already have one</a></div>
      </div>
      <img class="mascot" src="img/mascot.webp" alt="3am Win, the mascot">
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
<style>@media (max-width:860px){#ev-jobs{grid-template-columns:1fr!important}}</style>
</body>
</html>

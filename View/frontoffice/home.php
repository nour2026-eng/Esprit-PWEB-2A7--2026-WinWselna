<?php
/**
 * View/index.php — home page. Every figure and list comes from the database ($home, built by StatsController).
 * Expects: $home (array)
 */
$page = 'home'; $title = 'Home';
$c = $home['counts'];
$fmtDate = fn($d) => date('d M Y', strtotime((string) $d));
$statusBadge = ['PLANNED' => ['b-info', 'Planned'], 'ACTIVE' => ['b-warn', 'In progress'], 'DONE' => ['b-ok', 'Done']];
$img = fn($u, $fallback) => $u ? e($u) : $fallback;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="front">
<?php require __DIR__ . '/includes/spinner.php'; ?>
<?php require __DIR__ . '/includes/navbar.php'; ?>

<!-- ============ HERO ============ -->
<header class="hero">
  <div class="container">
    <div>
      <?php require __DIR__ . '/includes/flash.php'; ?>
      <span class="hero-tag"><b>WIN WSELNA?</b>Six public services, one account</span>
      <h1>Win Wselna<span class="q">?</span><br>The state in your pocket.</h1>
      <div class="ar-title">وين وصلنا؟</div>
      <p class="lead">Read official news, follow the projects in your street, report a problem, buy your bus or metro ticket, join public consultations and find a job created by your city. All in one place.</p>
      <div class="hero-ctas">
        <a href="<?= e(url('reclamations')) ?>" class="btn btn-primary btn-lg"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg>Submit a reclamation</a>
        <?php if (!AuthController::isAuthenticated()): ?>
          <a href="<?= e(url('register')) ?>" class="btn btn-teal btn-lg"><svg class="ico"><use href="img/icons.svg#i-user"/></svg>Create my free account</a>
        <?php else: ?>
          <a href="<?= e(url('news')) ?>" class="btn btn-teal btn-lg"><svg class="ico"><use href="img/icons.svg#i-news"/></svg>Read the news</a>
        <?php endif; ?>
      </div>
      <div class="hero-stats">
        <div><b data-count="<?= (int) $c['projects'] ?>">0</b><span>public projects tracked</span></div>
        <div><b data-count="<?= (int) $c['reclamations'] ?>">0</b><span>reclamations submitted</span></div>
        <div><b data-count="<?= (int) $c['users'] ?>">0</b><span>registered citizens</span></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-img"><img src="img/hero.webp" alt="Smart Tunisian city with the Win Wselna interface"></div>
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
      <a href="<?= e(url('news')) ?>" class="module-card m-news lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></span><h3>Win News</h3><span class="q">“What's happening today?”</span><p>Official articles by category, with a 60-second summary.</p><span class="link-arrow">Read the news <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="<?= e(url('projects')) ?>" class="module-card m-projects lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span><h3>Win Projects</h3><span class="q">“Where is this project at?”</span><p>Progress, milestones and everything linked to each public project.</p><span class="link-arrow">Follow a project <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="<?= e(url('reclamations')) ?>" class="module-card m-safe lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-safe"/></svg></span><h3>Win Safe</h3><span class="q">“Who fixes this pothole?”</span><p>Submit a reclamation with a photo, then read the agent's response.</p><span class="link-arrow">Report a problem <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="<?= e(url('transport')) ?>" class="module-card m-transport lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-transport"/></svg></span><h3>Win Transport</h3><span class="q">“Where's my bus?”</span><p>Lines and their status during works. Buy your ticket online with a QR code.</p><span class="link-arrow">See the lines <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="<?= e(url('events')) ?>" class="module-card m-event lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></span><h3>Win Event</h3><span class="q">“Can I have my say?”</span><p>Public consultations and meetings about the projects near you.</p><span class="link-arrow">See the events <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
      <a href="<?= e(url('jobs')) ?>" class="module-card m-jobs lift reveal"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><h3>Win Jobs</h3><span class="q">“Is there work near me?”</span><p>Job offers created by public projects. Apply with your CV.</p><span class="link-arrow">Find a job <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></span></a>
    </div>
  </div>
</section>

<!-- ============ LIVE NUMBERS (database) ============ -->
<section class="container reveal">
  <div class="live">
    <div><b data-count="<?= (int) $c['lines'] ?>">0</b><span>transport lines</span></div>
    <div><b data-count="<?= (int) $c['events'] ?>">0</b><span>upcoming events</span></div>
    <div><b data-count="<?= (int) $c['positions'] ?>">0</b><span>job positions offered</span></div>
    <div><b data-count="<?= (int) $c['projects'] ?>">0</b><span>public projects</span></div>
  </div>
</section>

<!-- ============ LATEST NEWS ============ -->
<section class="section">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker" style="color:var(--c-news)">Win News</span><h2>Latest articles</h2></div>
      <a href="<?= e(url('news')) ?>" class="link-arrow">All articles <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
    </div>
    <?php if (!$home['articles']): ?>
      <div class="empty m-news reveal"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></div><h3>No article published yet</h3><p>Official news will appear here as soon as they are published.</p></div>
    <?php else: ?>
    <div class="grid-3">
      <?php foreach ($home['articles'] as $a): ?>
      <a href="<?= e(url('article', ['id' => $a['id']])) ?>" class="card post lift reveal m-news"><div class="post-img"><img src="<?= $img($a['image_url'], 'img/city.webp') ?>" alt=""><span class="badge b-module"><?= e($a['category']) ?></span></div><div class="post-body"><h3><?= e($a['title']) ?></h3><p><?= e(mb_strimwidth(strip_tags($a['content']), 0, 120, '…')) ?></p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg><?= e($fmtDate($a['published_at'])) ?></span></div></div></a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ============ PROJECTS ============ -->
<section class="section white">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker" style="color:var(--c-projects)">Win Projects</span><h2>Public projects</h2></div>
      <a href="<?= e(url('projects')) ?>" class="link-arrow">All projects <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a>
    </div>
    <?php if (!$home['projects']): ?>
      <div class="empty m-projects reveal"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></div><h3>No project yet</h3><p>Public projects and their progress will appear here.</p></div>
    <?php else: ?>
    <div class="grid-3">
      <?php foreach ($home['projects'] as $p): [$b, $l] = $statusBadge[$p['status']] ?? ['b-gray', $p['status']]; ?>
      <a href="<?= e(url('project', ['id' => $p['id']])) ?>" class="card project lift reveal"><div class="post-img"><img src="<?= $img($p['image_url'], 'img/city.webp') ?>" alt=""><span class="badge <?= $b ?>"><?= e($l) ?></span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600"><?= e($p['governorate']) ?></span><h3><?= e($p['title']) ?></h3><div class="pb-row"><span>Progress</span><b><?= (int) $p['progress'] ?>%</b></div><div class="progress"><i data-v="<?= (int) $p['progress'] ?>"></i></div></div></a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ============ HOW IT WORKS ============ -->
<section class="section">
  <div class="container">
    <div class="sec-head reveal">
      <div><span class="kicker">Win Safe · reclamations</span><h2>Submit once. Track until it's done.</h2></div>
      <p>Every reclamation follows the same visible path. You always know <b>“win wselna”</b>.</p>
    </div>
    <div class="steps">
      <div class="step reveal m-safe"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-send"/></svg></span><h3>Submit</h3><p>Describe the problem, add a photo and the location. It takes one minute.</p></div>
      <div class="step reveal m-transport"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-user"/></svg></span><h3>An agent takes it</h3><p>A municipal agent receives it, checks it and changes its status.</p></div>
      <div class="step reveal m-news"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-reply"/></svg></span><h3>You get a response</h3><p>The answer arrives in your space. You can follow every step.</p></div>
      <div class="step reveal m-jobs"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-check"/></svg></span><h3>Done</h3><p>The problem is fixed. Everything stays in your history.</p></div>
    </div>
  </div>
</section>

<!-- ============ EVENTS + JOBS ============ -->
<section class="section white">
  <div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:30px" id="ev-jobs">
    <div>
      <div class="sec-head reveal"><div><span class="kicker" style="color:var(--c-event)">Win Event</span><h2>Have your say</h2></div><a href="<?= e(url('events')) ?>" class="link-arrow">All events <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a></div>
      <?php if (!$home['events']): ?>
        <div class="empty m-event reveal"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-event"/></svg></div><h3>No upcoming event</h3><p>Public consultations and meetings will be announced here.</p></div>
      <?php else: ?>
      <div style="display:flex;flex-direction:column;gap:14px">
        <?php foreach ($home['events'] as $ev): $pct = $ev['capacity'] ? min(100, round($ev['taken'] / $ev['capacity'] * 100)) : 0; ?>
        <div class="card event reveal m-event"><div class="date-box"><b><?= e(date('d', strtotime($ev['event_date']))) ?></b><span><?= e(date('M', strtotime($ev['event_date']))) ?></span></div><div><span class="badge b-module"><?= e(ucfirst(strtolower($ev['type']))) ?></span><h3><?= e($ev['title']) ?></h3><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-pin"/></svg><?= e($ev['place']) ?></span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg><?= e(date('H:i', strtotime($ev['event_date']))) ?></span></div><div class="cap"><span><?= (int) $ev['taken'] ?> / <?= (int) $ev['capacity'] ?> places</span></div><div class="progress" style="--teal:var(--c-event)"><i data-v="<?= $pct ?>"></i></div></div></div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
    <div>
      <div class="sec-head reveal"><div><span class="kicker" style="color:var(--c-jobs)">Win Jobs</span><h2>Work near home</h2></div><a href="<?= e(url('jobs')) ?>" class="link-arrow">All offers <svg class="ico ico-sm"><use href="img/icons.svg#i-arrow"/></svg></a></div>
      <?php if (!$home['jobs']): ?>
        <div class="empty m-jobs reveal"><div class="empty-ico"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></div><h3>No open job offer</h3><p>Jobs created by public projects will be listed here.</p></div>
      <?php else: ?>
      <div style="display:flex;flex-direction:column;gap:14px">
        <?php foreach ($home['jobs'] as $j): ?>
        <div class="card job reveal"><div class="job-top"><span class="job-logo"><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg></span><div class="grow"><h3><?= e($j['title']) ?> · <?= (int) $j['positions'] ?> position<?= $j['positions'] > 1 ? 's' : '' ?></h3><small class="muted"><?= e($j['project']) ?></small></div><span class="badge <?= $j['contract_type'] === 'CDI' ? 'b-info' : 'b-ok' ?>"><?= e($j['contract_type']) ?></span></div><div class="meta" style="padding:0"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>Deadline <?= e($fmtDate($j['deadline'])) ?></span><?php if ($j['salary'] !== null): ?><span><svg class="ico"><use href="img/icons.svg#i-money"/></svg><?= e(number_format((float) $j['salary'], 0, '.', ' ')) ?> TND / month</span><?php endif; ?></div></div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ============ CTA ============ -->
<?php if (!AuthController::isAuthenticated()): ?>
<section class="section">
  <div class="container reveal">
    <div class="cta-band">
      <div>
        <span class="kicker" style="color:var(--gold)">3am Win · your assistant</span>
        <h2>Ask in Darija, Arabic or French.</h2>
        <p>Create your free account to submit reclamations, buy tickets, register for events and apply to jobs.</p>
        <div class="hero-ctas" style="margin-bottom:0"><a href="<?= e(url('register')) ?>" class="btn btn-primary btn-lg">Create my free account</a><a href="<?= e(url('login')) ?>" class="btn btn-light btn-lg">I already have one</a></div>
      </div>
      <img class="mascot" src="img/mascot.webp" alt="3am Win, the mascot">
    </div>
  </div>
</section>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

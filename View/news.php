<?php $page = 'news'; $title = 'Win News'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="page-head m-news">
  <div class="container">
    <div class="ph-box">
      <div>
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win News</span></div>
        <h1>What's happening today?</h1>
        <p>Official articles from your municipality and ministries, classified by category, each with a 60-second AI summary.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <!-- Category (entity 1) as filters + search -->
  <div class="toolbar">
    <div class="chips" data-filter-group="news">
      <button class="chip active" data-filter="all">All</button>
      <button class="chip" data-filter="infra">Infrastructure</button>
      <button class="chip" data-filter="municipality">Municipality</button>
      <button class="chip" data-filter="services">Services</button>
      <button class="chip" data-filter="health">Health</button>
      <button class="chip" data-filter="economy">Economy</button>
    </div>
    <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search articles…" data-search="news" aria-label="Search articles"></div>
  </div>

  <!-- Featured article -->
  <a href="article.php" class="card featured lift m-news" data-group="news" data-cat="infra">
    <div class="post-img"><img src="img/city.webp" alt=""><span class="badge b-module">Infrastructure</span></div>
    <div class="post-body">
      <span class="kicker" style="color:var(--c-news)">Featured</span>
      <h2>RN-X road: the fourth milestone is delivered in Sfax</h2>
      <p>The bridge section is open to traffic since Monday. The municipality confirms two remaining milestones before the end of the works, planned for March 2027.</p>
      <div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>12 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>3 min read</span><span><svg class="ico"><use href="img/icons.svg#i-projects"/></svg>Linked project</span></div>
    </div>
  </a>

  <div class="grid-3">
    <a href="article.php" class="card post lift m-news" data-group="news" data-cat="municipality"><div class="post-img"><img src="img/sign.webp" alt="" style="object-position:30% 50%"><span class="badge b-module">Municipality</span></div><div class="post-body"><h3>New QR panels on every construction site in Tunis</h3><p>Scan the sign to see the progress, the budget and the next milestone.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>10 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>2 min</span></div></div></a>
    <a href="article.php" class="card post lift m-news" data-group="news" data-cat="services"><div class="post-img"><img src="img/office.webp" alt=""><span class="badge b-module">Services</span></div><div class="post-body"><h3>Administrative requests: average delay down to 3 days</h3><p>Birth and residence certificates are now processed online in most governorates.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>08 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>4 min</span></div></div></a>
    <a href="article.php" class="card post lift m-news" data-group="news" data-cat="health"><div class="post-img"><img src="img/sdg.webp" alt=""><span class="badge b-module">Health</span></div><div class="post-body"><h3>Kasserine hospital: the new wing opens on 27 November</h3><p>Forty new beds and a modern emergency unit for the region.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>06 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>3 min</span></div></div></a>
    <a href="article.php" class="card post lift m-news" data-group="news" data-cat="economy"><div class="post-img"><img src="img/hero.webp" alt=""><span class="badge b-module">Economy</span></div><div class="post-body"><h3>346 local jobs created by public projects this year</h3><p>Site workers, technicians and nurses: most offers are open to residents of the governorate.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>04 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>5 min</span></div></div></a>
    <a href="article.php" class="card post lift m-news" data-group="news" data-cat="infra"><div class="post-img"><img src="img/sos.webp" alt=""><span class="badge b-module">Infrastructure</span></div><div class="post-body"><h3>Storm season: 1 200 drains cleaned in Greater Tunis</h3><p>Citizens reported 312 blocked drains through Win Safe in October.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>02 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>2 min</span></div></div></a>
    <a href="article.php" class="card post lift m-news" data-group="news" data-cat="municipality"><div class="post-img"><img src="img/city.webp" alt="" style="object-position:80% 50%"><span class="badge b-module">Municipality</span></div><div class="post-body"><h3>Public consultation on the Lac 2 park: register now</h3><p>Residents are invited to choose between two designs on 4 December.</p><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>30 Oct 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>2 min</span></div></div></a>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

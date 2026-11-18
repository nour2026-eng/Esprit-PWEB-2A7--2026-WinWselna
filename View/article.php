<?php $page = 'news'; $title = 'Article'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'includes/head.php'; ?>
</head>
<body class="front">
<?php require_once 'includes/spinner.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="container" style="padding:34px 0 60px">
  <div class="crumbs" style="color:var(--muted);margin-bottom:14px"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><a href="news.php">Win News</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Infrastructure</span></div>
  <div class="with-aside">
    <article>
      <span class="badge b-module m-news">Infrastructure</span>
      <h1 style="font-size:clamp(28px,4vw,42px);font-weight:800;margin:12px 0 10px">RN-X road: the fourth milestone is delivered in Sfax</h1>
      <div class="meta" style="margin-bottom:22px"><span><svg class="ico"><use href="img/icons.svg#i-user"/></svg>Editorial team · Municipality of Sfax</span><span><svg class="ico"><use href="img/icons.svg#i-calendar"/></svg>12 Nov 2026</span><span><svg class="ico"><use href="img/icons.svg#i-clock"/></svg>3 min read</span></div>
      <div class="article-cover"><img src="img/city.webp" alt="RN-X road works"></div>
      <div class="ai-box"><img src="img/mascot.webp" alt=""><div><b>3am Win · 60-second summary</b><br>The bridge section of the RN-X road is open. The project is at 72%, slightly late. Two milestones remain: the second lane and the lighting, planned for March 2027.</div></div>
      <div class="article-body">
        <p>The fourth milestone of the RN-X road widening project was officially delivered on Monday. The new bridge section, 420 metres long, now carries traffic in both directions between the city centre and the industrial zone.</p>
        <p>According to the municipality, the project has reached 72% of its total progress. Two milestones remain before completion: the opening of the second lane and the installation of public lighting along the 9 kilometres of road.</p>
        <p>Residents can follow every step on the project page, see the next milestone and register for the public consultation organised on 20 November at the town hall. Twelve site-worker positions are also open on Win Jobs.</p>
      </div>
      <div class="divider"></div>
      <div class="flex wrap"><span class="muted" style="font-weight:600">Share</span><a class="btn btn-ghost btn-sm" href="#"><svg class="ico ico-sm"><use href="img/icons.svg#i-facebook"/></svg>Facebook</a><a class="btn btn-ghost btn-sm" href="#"><svg class="ico ico-sm"><use href="img/icons.svg#i-linkedin"/></svg>LinkedIn</a></div>
    </article>
    <aside class="aside-sticky">
      <div class="card card-pad m-projects">
        <span class="kicker" style="color:var(--c-projects)">Linked project</span>
        <h3 style="margin-top:6px">RN-X road widening</h3>
        <div class="pb-row"><span>4 / 6 milestones</span><b>72%</b></div>
        <div class="progress late"><i data-v="72"></i></div>
        <a href="project.php" class="btn btn-module btn-sm" style="margin-top:14px;width:100%">Open the project</a>
      </div>
      <div class="card card-pad">
        <h3 style="font-size:16px">Categories</h3>
        <div class="flex wrap" style="gap:8px"><a class="chip" href="news.php">Infrastructure · 14</a><a class="chip" href="news.php">Municipality · 9</a><a class="chip" href="news.php">Services · 7</a><a class="chip" href="news.php">Health · 5</a><a class="chip" href="news.php">Economy · 4</a></div>
      </div>
      <div class="card card-pad">
        <h3 style="font-size:16px">Read next</h3>
        <a class="list-row m-news" href="article.php"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></span><div><h4>New QR panels on construction sites</h4><small>10 Nov 2026</small></div></a>
        <a class="list-row m-news" href="article.php"><span class="m-ico"><svg class="ico"><use href="img/icons.svg#i-news"/></svg></span><div><h4>Requests: delay down to 3 days</h4><small>08 Nov 2026</small></div></a>
      </div>
    </aside>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

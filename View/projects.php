<?php $page = 'projects'; $title = 'Win Projects'; ?>
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
        <div class="crumbs"><a href="index.php">Home</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Projects</span></div>
        <h1>Where is this project at?</h1>
        <p>Every public project with its budget, its milestones and its progress. Follow one to be notified at each new milestone.</p>
      </div>
      <span class="ph-ico"><svg class="ico"><use href="img/icons.svg#i-projects"/></svg></span>
    </div>
  </div>
</section>

<section class="container" style="padding-bottom:60px">
  <div class="toolbar">
    <div class="chips" data-filter-group="proj">
      <button class="chip active" data-filter="all">All</button>
      <button class="chip" data-filter="active">Active</button>
      <button class="chip" data-filter="late">Late</button>
      <button class="chip" data-filter="planned">Planned</button>
      <button class="chip" data-filter="done">Done</button>
    </div>
    <div class="flex">
      <select class="select" aria-label="Governorate" style="width:auto"><option>All governorates</option><option>Tunis</option><option>Sfax</option><option>Sousse</option><option>Kasserine</option><option>Nabeul</option></select>
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search a project…" data-search="proj" aria-label="Search projects"></div>
    </div>
  </div>

  <div class="grid-3">
    <a href="project.php" class="card project lift" data-group="proj" data-cat="active late"><div class="post-img"><img src="img/city.webp" alt=""><span class="badge b-bad">Late</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Sfax · Road · 48 M TND</span><h3>RN-X road widening</h3><div class="pb-row"><span>4 / 6 milestones</span><b>72%</b></div><div class="progress late"><i data-v="72"></i></div><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-event"/></svg>1 event</span><span><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg>12 jobs</span><span><svg class="ico"><use href="img/icons.svg#i-safe"/></svg>8 reclamations</span></div></div></a>
    <a href="project.php" class="card project lift" data-group="proj" data-cat="active"><div class="post-img"><img src="img/office.webp" alt=""><span class="badge b-ok">On time</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Kasserine · Health · 31 M TND</span><h3>Regional hospital extension</h3><div class="pb-row"><span>3 / 7 milestones</span><b>45%</b></div><div class="progress"><i data-v="45"></i></div><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-event"/></svg>1 event</span><span><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg>6 jobs</span><span><svg class="ico"><use href="img/icons.svg#i-safe"/></svg>2 reclamations</span></div></div></a>
    <a href="project.php" class="card project lift" data-group="proj" data-cat="planned"><div class="post-img"><img src="img/hero.webp" alt=""><span class="badge b-info">Planned</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Tunis · Green space · 6 M TND</span><h3>Lac 2 public park</h3><div class="pb-row"><span>1 / 5 milestones</span><b>12%</b></div><div class="progress gold"><i data-v="12"></i></div><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-event"/></svg>1 event</span><span><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg>0 jobs</span></div></div></a>
    <a href="project.php" class="card project lift" data-group="proj" data-cat="active"><div class="post-img"><img src="img/sign.webp" alt="" style="object-position:30% 50%"><span class="badge b-ok">On time</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Sousse · Water · 12 M TND</span><h3>Drinking water network, Sahloul</h3><div class="pb-row"><span>5 / 8 milestones</span><b>63%</b></div><div class="progress"><i data-v="63"></i></div><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg>9 jobs</span><span><svg class="ico"><use href="img/icons.svg#i-safe"/></svg>4 reclamations</span></div></div></a>
    <a href="project.php" class="card project lift" data-group="proj" data-cat="done"><div class="post-img"><img src="img/sdg.webp" alt=""><span class="badge b-gray">Done</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Nabeul · School · 4 M TND</span><h3>Hammamet primary school</h3><div class="pb-row"><span>6 / 6 milestones</span><b>100%</b></div><div class="progress"><i data-v="100"></i></div><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-news"/></svg>3 articles</span></div></div></a>
    <a href="project.php" class="card project lift" data-group="proj" data-cat="active late"><div class="post-img"><img src="img/sos.webp" alt=""><span class="badge b-bad">Late</span></div><div class="project-body"><span class="muted" style="font-size:12.5px;font-weight:600">Tunis · Drainage · 9 M TND</span><h3>Rain drainage, Ariana north</h3><div class="pb-row"><span>2 / 6 milestones</span><b>31%</b></div><div class="progress late"><i data-v="31"></i></div><div class="meta"><span><svg class="ico"><use href="img/icons.svg#i-jobs"/></svg>15 jobs</span><span><svg class="ico"><use href="img/icons.svg#i-safe"/></svg>21 reclamations</span></div></div></a>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

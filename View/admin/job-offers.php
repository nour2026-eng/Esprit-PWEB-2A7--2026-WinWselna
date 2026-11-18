<?php $page = 'job-offers'; $title = 'Job offers'; ?>
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
<main class="content m-jobs">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Jobs</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Job offers</span></div>
      <h1><span class="m-dot"></span>Job offers</h1>
      <p>Entity 1 of Win Jobs · each offer is created by a public project (project_id).</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add job offer</button>
    </div>
  </div>
  <div class="sum-chips"><div class="sum-chip" style="--c:var(--c-jobs)"><i></i><b>31</b>open offers</div><div class="sum-chip" style="--c:var(--teal)"><i></i><b>346</b>positions this year</div><div class="sum-chip" style="--c:var(--c-news)"><i></i><b>128</b>applications this week</div></div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search job offers…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter data-key="contractType" aria-label="Filter"><option value="">All contracts</option><option value="CDD">CDD</option><option value="CDI">CDI</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Project</th><th>Contract</th><th>Positions</th><th>Salary</th><th>Deadline</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="title" class="strong">Site worker</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="contractType" data-v="CDD" data-render="badge"><span class="badge b-ok">CDD</span></td><td data-f="positions">12</td><td data-f="salary" data-v="1100" data-render="money">1,100 TND</td><td data-f="deadline" data-v="2026-11-30">2026-11-30</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="title" class="strong">Nurse assistant</td><td data-f="projectId" data-v="2" data-render="fk"><span class="fk">#2</span> Regional hospital extension</td><td data-f="contractType" data-v="CDI" data-render="badge"><span class="badge b-info">CDI</span></td><td data-f="positions">6</td><td data-f="salary" data-v="1350" data-render="money">1,350 TND</td><td data-f="deadline" data-v="2026-12-05">2026-12-05</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="title" class="strong">Plumber</td><td data-f="projectId" data-v="4" data-render="fk"><span class="fk">#4</span> Water network, Sahloul</td><td data-f="contractType" data-v="CDD" data-render="badge"><span class="badge b-ok">CDD</span></td><td data-f="positions">9</td><td data-f="salary" data-v="1250" data-render="money">1,250 TND</td><td data-f="deadline" data-v="2026-12-12">2026-12-12</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="title" class="strong">Machine operator</td><td data-f="projectId" data-v="6" data-render="fk"><span class="fk">#6</span> Rain drainage, Ariana north</td><td data-f="contractType" data-v="CDD" data-render="badge"><span class="badge b-ok">CDD</span></td><td data-f="positions">4</td><td data-f="salary" data-v="1500" data-render="money">1,500 TND</td><td data-f="deadline" data-v="2026-12-18">2026-12-18</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="title" class="strong">Park maintenance agent</td><td data-f="projectId" data-v="3" data-render="fk"><span class="fk">#3</span> Lac 2 public park</td><td data-f="contractType" data-v="CDI" data-render="badge"><span class="badge b-info">CDI</span></td><td data-f="positions">3</td><td data-f="salary" data-v="1050" data-render="money">1,050 TND</td><td data-f="deadline" data-v="2027-01-10">2027-01-10</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="title" class="strong">Electrician</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="contractType" data-v="CDD" data-render="badge"><span class="badge b-ok">CDD</span></td><td data-f="positions">5</td><td data-f="salary" data-v="1300" data-render="money">1,300 TND</td><td data-f="deadline" data-v="2027-01-20">2027-01-20</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
        </tbody>
      </table>
    </div>
    <div class="table-foot"><span class="t-info"></span><div class="pager"></div></div>
  </div>
  
</main>
<?php require_once 'includes/footer.php'; ?>
</div>
</div>

<!-- Add / edit modal -->
<div class="modal" id="crud-modal" data-entity="job offer" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add job offer</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="3"><span class="err">At least 3 characters</span></div>
        <div class="field"><label>Project <span class="req">*</span></label><select name="projectId" class="select" required><option value="">Choose…</option><option value="1">RN-X road widening</option><option value="2">Regional hospital extension</option><option value="3">Lac 2 public park</option><option value="4">Water network, Sahloul</option><option value="5">Hammamet primary school</option><option value="6">Rain drainage, Ariana north</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Contract <span class="req">*</span></label><select name="contractType" class="select" required><option value="">Choose…</option><option value="CDD" data-b="b-ok">CDD</option><option value="CDI" data-b="b-info">CDI</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Positions <span class="req">*</span></label><input name="positions" type="number" class="input" required min="1" max="500"><span class="err">Between 1 and 500</span></div>
        <div class="field"><label>Monthly salary (TND) <span class="req">*</span></label><input name="salary" type="number" class="input" required min="460"><span class="err">At least the minimum wage (460)</span></div>
        <div class="field"><label>Deadline <span class="req">*</span></label><input name="deadline" type="date" class="input" required data-future><span class="err">Choose a future date</span></div>
        <div class="field" style="grid-column:1/-1"><label>Description</label><textarea name="description" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

<?php $page = 'projects'; $title = 'Projects'; ?>
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
<main class="content m-projects">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Projects</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Projects</span></div>
      <h1><span class="m-dot"></span>Projects</h1>
      <p>Entity 1 of Win Projects · the hub linked to articles, milestones, reclamations, events and job offers.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add data-role="admin"><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add project</button>
    </div>
  </div>
  <div class="sum-chips"><div class="sum-chip" style="--c:var(--c-projects)"><i></i><b>128</b>projects</div><div class="sum-chip" style="--c:var(--red)"><i></i><b>23</b>late</div><div class="sum-chip" style="--c:var(--teal)"><i></i><b>412 M</b>TND total budget</div></div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search projects…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter aria-label="Filter"><option value="">All statuses</option><option value="PLANNED">Planned</option><option value="ACTIVE">Active</option><option value="DONE">Done</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Governorate</th><th>Budget</th><th>Progress</th><th>Status</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="title" class="strong">RN-X road widening</td><td data-f="governorate">Sfax</td><td data-f="budget" data-v="48000000" data-render="money">48,000,000 TND</td><td data-f="progress" data-v="72" data-render="progress"><div class="mini-progress"><div class="progress"><i data-v="72"></i></div><b>72%</b></div></td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-warn">Active</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="title" class="strong">Regional hospital extension</td><td data-f="governorate">Kasserine</td><td data-f="budget" data-v="31000000" data-render="money">31,000,000 TND</td><td data-f="progress" data-v="45" data-render="progress"><div class="mini-progress"><div class="progress"><i data-v="45"></i></div><b>45%</b></div></td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-warn">Active</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="title" class="strong">Lac 2 public park</td><td data-f="governorate">Tunis</td><td data-f="budget" data-v="6000000" data-render="money">6,000,000 TND</td><td data-f="progress" data-v="12" data-render="progress"><div class="mini-progress"><div class="progress late"><i data-v="12"></i></div><b>12%</b></div></td><td data-f="status" data-v="PLANNED" data-render="badge"><span class="badge b-info">Planned</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="title" class="strong">Water network, Sahloul</td><td data-f="governorate">Sousse</td><td data-f="budget" data-v="12000000" data-render="money">12,000,000 TND</td><td data-f="progress" data-v="63" data-render="progress"><div class="mini-progress"><div class="progress"><i data-v="63"></i></div><b>63%</b></div></td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-warn">Active</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="title" class="strong">Hammamet primary school</td><td data-f="governorate">Nabeul</td><td data-f="budget" data-v="4000000" data-render="money">4,000,000 TND</td><td data-f="progress" data-v="100" data-render="progress"><div class="mini-progress"><div class="progress"><i data-v="100"></i></div><b>100%</b></div></td><td data-f="status" data-v="DONE" data-render="badge"><span class="badge b-ok">Done</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="title" class="strong">Rain drainage, Ariana north</td><td data-f="governorate">Ariana</td><td data-f="budget" data-v="9000000" data-render="money">9,000,000 TND</td><td data-f="progress" data-v="31" data-render="progress"><div class="mini-progress"><div class="progress late"><i data-v="31"></i></div><b>31%</b></div></td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-warn">Active</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">7</td><td data-f="title" class="strong">Sports hall, El Menzah</td><td data-f="governorate">Tunis</td><td data-f="budget" data-v="7500000" data-render="money">7,500,000 TND</td><td data-f="progress" data-v="0" data-render="progress"><div class="mini-progress"><div class="progress late"><i data-v="0"></i></div><b>0%</b></div></td><td data-f="status" data-v="PLANNED" data-render="badge"><span class="badge b-info">Planned</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">8</td><td data-f="title" class="strong">Bus station, Sfax south</td><td data-f="governorate">Sfax</td><td data-f="budget" data-v="15000000" data-render="money">15,000,000 TND</td><td data-f="progress" data-v="88" data-render="progress"><div class="mini-progress"><div class="progress"><i data-v="88"></i></div><b>88%</b></div></td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-warn">Active</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">9</td><td data-f="title" class="strong">Public library renovation</td><td data-f="governorate">Sousse</td><td data-f="budget" data-v="2200000" data-render="money">2,200,000 TND</td><td data-f="progress" data-v="100" data-render="progress"><div class="mini-progress"><div class="progress"><i data-v="100"></i></div><b>100%</b></div></td><td data-f="status" data-v="DONE" data-render="badge"><span class="badge b-ok">Done</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="project" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add project</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><option value="">Choose…</option><option value="Tunis">Tunis</option><option value="Ariana">Ariana</option><option value="Sfax">Sfax</option><option value="Sousse">Sousse</option><option value="Nabeul">Nabeul</option><option value="Kasserine">Kasserine</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Budget (TND) <span class="req">*</span></label><input name="budget" type="number" class="input" required min="1000"><span class="err">At least 1 000 TND</span></div>
        <div class="field"><label>Progress (%) <span class="req">*</span></label><input name="progress" type="number" class="input" required min="0" max="100"><span class="err">Between 0 and 100</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="PLANNED" data-b="b-info">Planned</option><option value="ACTIVE" data-b="b-warn">Active</option><option value="DONE" data-b="b-ok">Done</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Description</label><textarea name="description" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

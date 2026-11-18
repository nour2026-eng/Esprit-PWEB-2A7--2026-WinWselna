<?php $page = 'milestones'; $title = 'Milestones'; ?>
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
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Projects</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Milestones</span></div>
      <h1><span class="m-dot"></span>Milestones</h1>
      <p>Entity 2 of Win Projects · each milestone belongs to one project (project_id). Agents update them, progress is recalculated.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add milestone</button>
    </div>
  </div>
  
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search milestones…" data-tsearch aria-label="Search"></div>
      <div class="flex"><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Project</th><th>Due date</th><th>Done</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="title" class="strong">Studies &amp; land acquisition</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="dueDate" data-v="2025-06-15">2025-06-15</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="title" class="strong">Earthworks, section A</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="dueDate" data-v="2025-11-02">2025-11-02</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="title" class="strong">Drainage and networks</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="dueDate" data-v="2026-04-20">2026-04-20</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="title" class="strong">Bridge section (420 m)</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="dueDate" data-v="2026-11-10">2026-11-10</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="title" class="strong">Second lane</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="dueDate" data-v="2027-01-15">2027-01-15</td><td data-f="isDone" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="title" class="strong">Public lighting</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="dueDate" data-v="2027-03-30">2027-03-30</td><td data-f="isDone" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">7</td><td data-f="title" class="strong">Foundations, new wing</td><td data-f="projectId" data-v="2" data-render="fk"><span class="fk">#2</span> Regional hospital extension</td><td data-f="dueDate" data-v="2026-02-01">2026-02-01</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">8</td><td data-f="title" class="strong">Structure, new wing</td><td data-f="projectId" data-v="2" data-render="fk"><span class="fk">#2</span> Regional hospital extension</td><td data-f="dueDate" data-v="2026-09-30">2026-09-30</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">9</td><td data-f="title" class="strong">Design competition</td><td data-f="projectId" data-v="3" data-render="fk"><span class="fk">#3</span> Lac 2 public park</td><td data-f="dueDate" data-v="2026-12-04">2026-12-04</td><td data-f="isDone" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">10</td><td data-f="title" class="strong">Main pipes, phase 1</td><td data-f="projectId" data-v="4" data-render="fk"><span class="fk">#4</span> Water network, Sahloul</td><td data-f="dueDate" data-v="2026-07-12">2026-07-12</td><td data-f="isDone" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="milestone" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add milestone</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field"><label>Project <span class="req">*</span></label><select name="projectId" class="select" required><option value="">Choose…</option><option value="1">RN-X road widening</option><option value="2">Regional hospital extension</option><option value="3">Lac 2 public park</option><option value="4">Water network, Sahloul</option><option value="5">Hammamet primary school</option><option value="6">Rain drainage, Ariana north</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Due date <span class="req">*</span></label><input name="dueDate" type="date" class="input" required><span class="err">This field is required</span></div>
        <div class="field"><label class="check"><input type="checkbox" name="isDone">Milestone done</label></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

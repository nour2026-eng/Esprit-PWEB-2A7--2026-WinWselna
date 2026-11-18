<?php $page = 'events'; $title = 'Events'; ?>
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
<main class="content m-event">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Event</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Events</span></div>
      <h1><span class="m-dot"></span>Events</h1>
      <p>Entity 1 of Win Event · consultations, meetings and openings, optionally about a project (project_id).</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add event</button>
    </div>
  </div>
  
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search events…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter data-key="type" aria-label="Filter"><option value="">All types</option><option value="CONSULTATION">Consultation</option><option value="MEETING">Meeting</option><option value="OPENING">Opening</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Type</th><th>Project</th><th>Date</th><th>Place</th><th>Capacity</th><th class="no-sort">Registered</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="title" class="strong">RN-X road: public consultation</td><td data-f="type" data-v="CONSULTATION" data-render="badge"><span class="badge b-violet">Consultation</span></td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="date" data-v="2026-11-20">2026-11-20</td><td data-f="place">Sfax town hall</td><td data-f="capacity">60</td><td data-f="registered">42</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="title" class="strong">Kasserine hospital: new wing</td><td data-f="type" data-v="OPENING" data-render="badge"><span class="badge b-ok">Opening</span></td><td data-f="projectId" data-v="2" data-render="fk"><span class="fk">#2</span> Regional hospital extension</td><td data-f="date" data-v="2026-11-27">2026-11-27</td><td data-f="place">Kasserine</td><td data-f="capacity">120</td><td data-f="registered">64</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="title" class="strong">Lac 2 park: choose the design</td><td data-f="type" data-v="CONSULTATION" data-render="badge"><span class="badge b-violet">Consultation</span></td><td data-f="projectId" data-v="3" data-render="fk"><span class="fk">#3</span> Lac 2 public park</td><td data-f="date" data-v="2026-12-04">2026-12-04</td><td data-f="place">Tunis, Lac 2</td><td data-f="capacity">80</td><td data-f="registered">77</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="title" class="strong">Ariana drainage update</td><td data-f="type" data-v="MEETING" data-render="badge"><span class="badge b-info">Meeting</span></td><td data-f="projectId" data-v="6" data-render="fk"><span class="fk">#6</span> Rain drainage, Ariana north</td><td data-f="date" data-v="2026-12-09">2026-12-09</td><td data-f="place">Ariana youth centre</td><td data-f="capacity">40</td><td data-f="registered">12</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="title" class="strong">Sousse water network Q&amp;A</td><td data-f="type" data-v="MEETING" data-render="badge"><span class="badge b-info">Meeting</span></td><td data-f="projectId" data-v="4" data-render="fk"><span class="fk">#4</span> Water network, Sahloul</td><td data-f="date" data-v="2026-12-14">2026-12-14</td><td data-f="place">Sahloul community hall</td><td data-f="capacity">50</td><td data-f="registered">21</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="title" class="strong">Hammamet school opening</td><td data-f="type" data-v="OPENING" data-render="badge"><span class="badge b-ok">Opening</span></td><td data-f="projectId" data-v="5" data-render="fk"><span class="fk">#5</span> Hammamet primary school</td><td data-f="date" data-v="2026-09-15">2026-09-15</td><td data-f="place">Hammamet</td><td data-f="capacity">150</td><td data-f="registered">138</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="event" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add event</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field"><label>Type <span class="req">*</span></label><select name="type" class="select" required><option value="">Choose…</option><option value="CONSULTATION" data-b="b-violet">Consultation</option><option value="MEETING" data-b="b-info">Meeting</option><option value="OPENING" data-b="b-ok">Opening</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Project</label><select name="projectId" class="select"><option value="">None</option><option value="1">RN-X road widening</option><option value="2">Regional hospital extension</option><option value="3">Lac 2 public park</option><option value="4">Water network, Sahloul</option><option value="5">Hammamet primary school</option><option value="6">Rain drainage, Ariana north</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Date <span class="req">*</span></label><input name="date" type="date" class="input" required data-future><span class="err">Choose a future date</span></div>
        <div class="field"><label>Capacity <span class="req">*</span></label><input name="capacity" type="number" class="input" required min="1" max="5000"><span class="err">Between 1 and 5 000</span></div>
        <div class="field" style="grid-column:1/-1"><label>Place <span class="req">*</span></label><input name="place" type="text" class="input" required data-min="3"><span class="err">At least 3 characters</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

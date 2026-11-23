<?php
/**
 * View/admin/lines.php — Transport lines (Win Transport). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'lines'; $title = 'Transport lines';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require __DIR__ . '/includes/head.php'; ?>
</head>
<body class="admin">
<div class="admin-wrap">
<?php require __DIR__ . '/includes/sidebar.php'; ?>
<div class="main">
<?php require __DIR__ . '/includes/topbar.php'; ?>
<main class="content m-transport">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Transport</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Transport lines</span></div>
      <h1><span class="m-dot"></span>Transport lines</h1>
      <p>Entity 1 of Win Transport · bus, metro, train and louage lines, optionally served or improved by a project (project_id).</p>
    </div>
    <div class="flex">
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add line</button>
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search transport lines…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Line</th><th>Type</th><th>Departure</th><th>Arrival</th><th>Governorate</th><th>Fare (TND)</th><th>Project</th><th>Status</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="10">No transport lines in the database yet.</td></tr>
        </tbody>
      </table>
    </div>
    <div class="table-foot"><span class="t-info"></span><div class="pager"></div></div>
  </div>
  
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
</div>
</div>

<!-- Add / edit modal -->
<div class="modal" id="crud-modal" data-entity="line" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add line</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Line name <span class="req">*</span></label><input name="name" type="text" class="input" required data-min="2" data-max="100" placeholder="Bus 28"><span class="err">2 to 100 characters</span></div>
        <div class="field"><label>Type <span class="req">*</span></label><select name="type" class="select" required><option value="">Choose…</option><option value="BUS" data-b="b-info">Bus</option><option value="METRO" data-b="b-violet">Metro</option><option value="TRAIN" data-b="b-ok">Train</option><option value="LOUAGE" data-b="b-warn">Louage</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Departure <span class="req">*</span></label><input name="departure" type="text" class="input" required data-min="2"><span class="err">Required</span></div>
        <div class="field"><label>Arrival <span class="req">*</span></label><input name="arrival" type="text" class="input" required data-min="2"><span class="err">Required</span></div>
        <div class="field"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><option value="">Choose…</option><option value="Tunis">Tunis</option><option value="Ariana">Ariana</option><option value="Sfax">Sfax</option><option value="Sousse">Sousse</option><option value="Nabeul">Nabeul</option><option value="Kasserine">Kasserine</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Fare (TND) <span class="req">*</span></label><input name="fare" type="number" class="input" required min="0.1" max="100" step="0.05"><span class="err">Between 0.100 and 100 TND</span></div>
        <div class="field"><label>Frequency (minutes)</label><input name="frequency" type="number" class="input" min="1" max="240"><span class="err">Between 1 and 240</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="ACTIVE" data-b="b-ok">Active</option><option value="DISRUPTED" data-b="b-warn">Disrupted</option><option value="SUSPENDED" data-b="b-bad">Suspended</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Linked project</label><select name="projectId" class="select"><option value="">None</option></select><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

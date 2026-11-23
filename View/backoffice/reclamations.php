<?php
/**
 * View/admin/reclamations.php — Reclamations (Win Safe). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'reclamations'; $title = 'Reclamations';
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
<main class="content m-safe">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Safe</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Reclamations</span></div>
      <h1><span class="m-dot"></span>Reclamations</h1>
      <p>Entity 1 of Win Safe · submitted by clients (user_id), optionally linked to a project. Open one to answer it (Response, entity 2).</p>
    </div>
    <div class="flex">
      
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search reclamations…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Type</th><th>Location</th><th>Project</th><th>Status</th><th>Responses</th><th>Sent</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="9">No reclamations in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="reclamation" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add reclamation</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Type <span class="req">*</span></label><select name="type" class="select" required><option value="">Choose…</option><option value="INCIDENT" data-b="b-warn">Incident</option><option value="SOS" data-b="b-bad">SOS</option><option value="DAMAGE" data-b="b-violet">Damage</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="SENT" data-b="b-info">Sent</option><option value="ONGOING" data-b="b-warn">In progress</option><option value="DONE" data-b="b-ok">Done</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Location <span class="req">*</span></label><input name="location" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field" style="grid-column:1/-1"><label>Linked project</label><select name="projectId" class="select"><option value="">None</option></select><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

<?php
/**
 * View/admin/projects.php — Projects (Win Projects). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'projects'; $title = 'Projects';
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
<main class="content m-projects">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Projects</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Projects</span></div>
      <h1><span class="m-dot"></span>Projects</h1>
      <p>Entity 1 of Win Projects · the hub linked to articles, milestones, reclamations, events and job offers.</p>
    </div>
    <div class="flex">
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add project</button>
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search projects…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Governorate</th><th>Budget</th><th>Progress</th><th>Status</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="7">No projects in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="project" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add project</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><option value="">Choose…</option><option value="Tunis">Tunis</option><option value="Ariana">Ariana</option><option value="Sfax">Sfax</option><option value="Sousse">Sousse</option><option value="Nabeul">Nabeul</option><option value="Kasserine">Kasserine</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Budget (TND) <span class="req">*</span></label><input name="budget" type="number" class="input" required min="1000"><span class="err">At least 1 000 TND</span></div>
        <div class="field"><label>Progress (%) <span class="req">*</span></label><input name="progress" type="number" class="input" required min="0" max="100"><span class="err">Between 0 and 100</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="PLANNED" data-b="b-info">Planned</option><option value="ACTIVE" data-b="b-warn">Active</option><option value="DONE" data-b="b-ok">Done</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Description</label><textarea name="description" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

<?php
/**
 * View/admin/milestones.php — Milestones (Win Projects). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'milestones'; $title = 'Milestones';
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
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Projects</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Milestones</span></div>
      <h1><span class="m-dot"></span>Milestones</h1>
      <p>Entity 2 of Win Projects · each milestone belongs to one project (project_id). Agents update them, progress is recalculated.</p>
    </div>
    <div class="flex">
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add milestone</button>
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search milestones…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Project</th><th>Due date</th><th>Done</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="6">No milestones in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="milestone" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add milestone</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field"><label>Project <span class="req">*</span></label><select name="projectId" class="select" required><option value="">Choose…</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Due date <span class="req">*</span></label><input name="dueDate" type="date" class="input" required><span class="err">This field is required</span></div>
        <div class="field"><label class="check"><input type="checkbox" name="isDone">Milestone done</label></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

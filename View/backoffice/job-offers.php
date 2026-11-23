<?php
/**
 * View/admin/job-offers.php — Job offers (Win Jobs). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'job-offers'; $title = 'Job offers';
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
<main class="content m-jobs">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Jobs</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Job offers</span></div>
      <h1><span class="m-dot"></span>Job offers</h1>
      <p>Entity 1 of Win Jobs · each offer is created by a public project (project_id).</p>
    </div>
    <div class="flex">
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add job offer</button>
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search job offers…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Project</th><th>Contract</th><th>Positions</th><th>Salary</th><th>Deadline</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="8">No job offers in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="job offer" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add job offer</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="3"><span class="err">At least 3 characters</span></div>
        <div class="field"><label>Project <span class="req">*</span></label><select name="projectId" class="select" required><option value="">Choose…</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Contract <span class="req">*</span></label><select name="contractType" class="select" required><option value="">Choose…</option><option value="CDD" data-b="b-ok">CDD</option><option value="CDI" data-b="b-info">CDI</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Positions <span class="req">*</span></label><input name="positions" type="number" class="input" required min="1" max="500"><span class="err">Between 1 and 500</span></div>
        <div class="field"><label>Monthly salary (TND) <span class="req">*</span></label><input name="salary" type="number" class="input" required min="460"><span class="err">At least the minimum wage (460)</span></div>
        <div class="field"><label>Deadline <span class="req">*</span></label><input name="deadline" type="date" class="input" required data-future><span class="err">Choose a future date</span></div>
        <div class="field" style="grid-column:1/-1"><label>Description</label><textarea name="description" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

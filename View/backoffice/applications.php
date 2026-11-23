<?php
/**
 * View/admin/applications.php — Applications (Win Jobs). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'applications'; $title = 'Applications';
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
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Jobs</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Applications</span></div>
      <h1><span class="m-dot"></span>Applications</h1>
      <p>Entity 2 of Win Jobs · a client (user_id) applies to a job offer (job_offer_id) with a CV.</p>
    </div>
    <div class="flex">
      
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search applications…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Offer</th><th>CV</th><th>Status</th><th>Applied</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="7">No applications in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="application" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add application</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="SENT" data-b="b-warn">Sent</option><option value="OK" data-b="b-ok">Accepted</option><option value="REFUSED" data-b="b-bad">Refused</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Job offer <span class="req">*</span></label><select name="offerId" class="select" required><option value="">Choose…</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Message to the candidate</label><textarea name="note" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

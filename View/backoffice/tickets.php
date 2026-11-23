<?php
/**
 * View/admin/tickets.php — Tickets (Win Transport). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'tickets'; $title = 'Tickets';
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
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win Transport</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Tickets</span></div>
      <h1><span class="m-dot"></span>Tickets</h1>
      <p>Entity 2 of Win Transport · bought by clients (user_id) for a line (line_id). Agents validate them on board with the QR code.</p>
    </div>
    <div class="flex">
      
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search tickets…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Line</th><th>QR code</th><th>Travel date</th><th>Qty</th><th>Total (TND)</th><th>Status</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="9">No tickets in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="ticket" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add ticket</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="VALID" data-b="b-ok">Valid</option><option value="USED" data-b="b-gray">Used</option><option value="CANCELED" data-b="b-bad">Canceled</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Line <span class="req">*</span></label><select name="lineId" class="select" required><option value="">Choose…</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Travel date <span class="req">*</span></label><input name="travelDate" type="date" class="input" required><span class="err">This field is required</span></div>
        <div class="field"><label>Quantity <span class="req">*</span></label><input name="quantity" type="number" class="input" required min="1" max="10"><span class="err">Between 1 and 10</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

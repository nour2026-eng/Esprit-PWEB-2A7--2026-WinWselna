<?php $page = 'request-types'; $title = 'Request types'; ?>
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
<main class="content m-request">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Request</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Request types</span></div>
      <h1><span class="m-dot"></span>Request types</h1>
      <p>Entity 1 of Win Request · the catalogue of documents a client can ask for, with required files and delay.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add request type</button>
    </div>
  </div>
  
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search request types…" data-tsearch aria-label="Search"></div>
      <div class="flex"><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Name</th><th>Required documents</th><th>Delay (days)</th><th>Requests</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="name" class="strong">Birth certificate</td><td data-f="requiredDocs">National ID card</td><td data-f="delayDays">2</td><td data-f="count">214</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="name" class="strong">Residence certificate</td><td data-f="requiredDocs">ID card, electricity or water bill</td><td data-f="delayDays">3</td><td data-f="count">156</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="name" class="strong">Building permit</td><td data-f="requiredDocs">Land title, architect plans, site photos</td><td data-f="delayDays">30</td><td data-f="count">38</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="name" class="strong">Shop licence</td><td data-f="requiredDocs">Lease contract, tax ID</td><td data-f="delayDays">15</td><td data-f="count">27</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="name" class="strong">Marriage certificate</td><td data-f="requiredDocs">ID cards of both spouses</td><td data-f="delayDays">2</td><td data-f="count">64</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="request type" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add request type</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Name <span class="req">*</span></label><input name="name" type="text" class="input" required data-min="3"><span class="err">At least 3 characters</span></div>
        <div class="field"><label>Delay (days) <span class="req">*</span></label><input name="delayDays" type="number" class="input" required min="1" max="90"><span class="err">Between 1 and 90</span></div>
        <div class="field" style="grid-column:1/-1"><label>Required documents <span class="req">*</span></label><textarea name="requiredDocs" class="textarea" required data-min="5"></textarea><span class="err">List at least one document</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

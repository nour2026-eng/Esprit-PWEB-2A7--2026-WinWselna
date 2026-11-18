<?php $page = 'requests'; $title = 'Requests'; ?>
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
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Request</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Requests</span></div>
      <h1><span class="m-dot"></span>Requests</h1>
      <p>Entity 2 of Win Request · submitted by clients (user_id) for a request type (type_id). Agents accept or refuse them.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      
    </div>
  </div>
  <div class="sum-chips"><div class="sum-chip" style="--c:var(--warn)"><i></i><b>12</b>pending</div><div class="sum-chip" style="--c:var(--teal)"><i></i><b>412</b>accepted this week</div><div class="sum-chip" style="--c:var(--c-request)"><i></i><b>3.1 d</b>average delay</div></div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search requests…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter aria-label="Filter"><option value="">All statuses</option><option value="PENDING">Pending</option><option value="OK">Accepted</option><option value="REFUSED">Refused</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Type</th><th>Status</th><th>Files</th><th>Submitted</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">5560</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="typeId" data-v="2" data-render="fk"><span class="fk">#2</span> Residence certificate</td><td data-f="status" data-v="PENDING" data-render="badge"><span class="badge b-warn">Pending</span></td><td data-f="files">2</td><td data-f="sent">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5559</td><td data-f="client" data-v="Walid Chebbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">WC</span><div><b>Walid Chebbi</b></div></div></td><td data-f="typeId" data-v="1" data-render="fk"><span class="fk">#1</span> Birth certificate</td><td data-f="status" data-v="PENDING" data-render="badge"><span class="badge b-warn">Pending</span></td><td data-f="files">1</td><td data-f="sent">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5558</td><td data-f="client" data-v="Youssef Gharbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(158 45% 38%)">YG</span><div><b>Youssef Gharbi</b></div></div></td><td data-f="typeId" data-v="3" data-render="fk"><span class="fk">#3</span> Building permit</td><td data-f="status" data-v="PENDING" data-render="badge"><span class="badge b-warn">Pending</span></td><td data-f="files">5</td><td data-f="sent">11 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5555</td><td data-f="client" data-v="Nour Zouari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">NZ</span><div><b>Nour Zouari</b></div></div></td><td data-f="typeId" data-v="5" data-render="fk"><span class="fk">#5</span> Marriage certificate</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="files">2</td><td data-f="sent">11 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5552</td><td data-f="client" data-v="Mariem Jlassi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(121 45% 38%)">MJ</span><div><b>Mariem Jlassi</b></div></div></td><td data-f="typeId" data-v="1" data-render="fk"><span class="fk">#1</span> Birth certificate</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="files">1</td><td data-f="sent">10 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5521</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="typeId" data-v="1" data-render="fk"><span class="fk">#1</span> Birth certificate</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="files">1</td><td data-f="sent">09 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5498</td><td data-f="client" data-v="Karim Mejri" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">KM</span><div><b>Karim Mejri</b></div></div></td><td data-f="typeId" data-v="4" data-render="fk"><span class="fk">#4</span> Shop licence</td><td data-f="status" data-v="REFUSED" data-render="badge"><span class="badge b-bad">Refused</span></td><td data-f="files">1</td><td data-f="sent">07 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5470</td><td data-f="client" data-v="Rania Ferchichi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">RF</span><div><b>Rania Ferchichi</b></div></div></td><td data-f="typeId" data-v="2" data-render="fk"><span class="fk">#2</span> Residence certificate</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="files">2</td><td data-f="sent">05 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5310</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="typeId" data-v="4" data-render="fk"><span class="fk">#4</span> Shop licence</td><td data-f="status" data-v="REFUSED" data-render="badge"><span class="badge b-bad">Refused</span></td><td data-f="files">1</td><td data-f="sent">30 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="request" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add request</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="PENDING" data-b="b-warn">Pending</option><option value="OK" data-b="b-ok">Accepted</option><option value="REFUSED" data-b="b-bad">Refused</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Request type <span class="req">*</span></label><select name="typeId" class="select" required><option value="">Choose…</option><option value="1">Birth certificate</option><option value="2">Residence certificate</option><option value="3">Building permit</option><option value="4">Shop licence</option><option value="5">Marriage certificate</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Note to the client</label><textarea name="note" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<aside class="drawer" data-entity="Request"><div class="drawer-head"><div><span class="badge b-module m-request">Win Request</span><h3 class="drawer-title" style="margin:8px 0 0">Request</h3></div><button class="modal-x" data-close-drawer aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div><div class="drawer-body"><dl class="dl"></dl><h4 style="font-size:14px">Uploaded documents</h4><div class="flex wrap"><span class="chip"><svg class="ico ico-sm"><use href="../img/icons.svg#i-file"/></svg>id_card.pdf</span><span class="chip"><svg class="ico ico-sm"><use href="../img/icons.svg#i-file"/></svg>bill_steg.jpg</span></div></div><div class="drawer-foot"><button class="btn btn-ghost" onclick="WW.toast('Request refused · client notified','bad')">Refuse</button><button class="btn btn-teal" onclick="WW.toast('Request accepted · client notified')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Accept</button></div></aside>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

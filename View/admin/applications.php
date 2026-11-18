<?php $page = 'applications'; $title = 'Applications'; ?>
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
<main class="content m-jobs">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Jobs</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Applications</span></div>
      <h1><span class="m-dot"></span>Applications</h1>
      <p>Entity 2 of Win Jobs · a client (user_id) applies to a job offer (job_offer_id) with a CV.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      
    </div>
  </div>
  
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search applications…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter aria-label="Filter"><option value="">All statuses</option><option value="SENT">Sent</option><option value="OK">Accepted</option><option value="REFUSED">Refused</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Offer</th><th>CV</th><th>Status</th><th>Applied</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="offerId" data-v="1" data-render="fk"><span class="fk">#1</span> Site worker · RN-X</td><td data-f="cv">CV_Ahmed.pdf</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-warn">Sent</span></td><td data-f="applied">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="client" data-v="Youssef Gharbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(158 45% 38%)">YG</span><div><b>Youssef Gharbi</b></div></div></td><td data-f="offerId" data-v="1" data-render="fk"><span class="fk">#1</span> Site worker · RN-X</td><td data-f="cv">CV_Youssef.pdf</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-warn">Sent</span></td><td data-f="applied">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="client" data-v="Walid Chebbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">WC</span><div><b>Walid Chebbi</b></div></div></td><td data-f="offerId" data-v="4" data-render="fk"><span class="fk">#4</span> Machine operator · Ariana</td><td data-f="cv">CV_Walid.pdf</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-warn">Sent</span></td><td data-f="applied">11 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="client" data-v="Ines Hammami" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">IH</span><div><b>Ines Hammami</b></div></div></td><td data-f="offerId" data-v="2" data-render="fk"><span class="fk">#2</span> Nurse assistant · Kasserine</td><td data-f="cv">CV_Ines.pdf</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="applied">10 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="offerId" data-v="3" data-render="fk"><span class="fk">#3</span> Plumber · Sousse</td><td data-f="cv">CV_Ahmed.pdf</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="applied">30 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="client" data-v="Hedi Khelifi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">HK</span><div><b>Hedi Khelifi</b></div></div></td><td data-f="offerId" data-v="1" data-render="fk"><span class="fk">#1</span> Site worker · RN-X</td><td data-f="cv">CV_Hedi.pdf</td><td data-f="status" data-v="REFUSED" data-render="badge"><span class="badge b-bad">Refused</span></td><td data-f="applied">07 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">7</td><td data-f="client" data-v="Salma Ayari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">SA</span><div><b>Salma Ayari</b></div></div></td><td data-f="offerId" data-v="2" data-render="fk"><span class="fk">#2</span> Nurse assistant · Kasserine</td><td data-f="cv">CV_Salma.pdf</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-warn">Sent</span></td><td data-f="applied">05 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">8</td><td data-f="client" data-v="Nour Zouari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">NZ</span><div><b>Nour Zouari</b></div></div></td><td data-f="offerId" data-v="5" data-render="fk"><span class="fk">#5</span> Park agent · Lac 2</td><td data-f="cv">CV_Nour.pdf</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-warn">Sent</span></td><td data-f="applied">02 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">9</td><td data-f="client" data-v="Karim Mejri" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">KM</span><div><b>Karim Mejri</b></div></div></td><td data-f="offerId" data-v="3" data-render="fk"><span class="fk">#3</span> Plumber · Sousse</td><td data-f="cv">CV_Karim.pdf</td><td data-f="status" data-v="OK" data-render="badge"><span class="badge b-ok">Accepted</span></td><td data-f="applied">27 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="application" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add application</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="SENT" data-b="b-warn">Sent</option><option value="OK" data-b="b-ok">Accepted</option><option value="REFUSED" data-b="b-bad">Refused</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Job offer <span class="req">*</span></label><select name="offerId" class="select" required><option value="">Choose…</option><option value="1">Site worker · RN-X</option><option value="2">Nurse assistant · Kasserine</option><option value="3">Plumber · Sousse</option><option value="4">Machine operator · Ariana</option><option value="5">Park agent · Lac 2</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Message to the candidate</label><textarea name="note" class="textarea"></textarea><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<aside class="drawer" data-entity="Application"><div class="drawer-head"><div><span class="badge b-module m-jobs">Win Jobs</span><h3 class="drawer-title" style="margin:8px 0 0">Application</h3></div><button class="modal-x" data-close-drawer aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div><div class="drawer-body"><dl class="dl"></dl><a class="btn btn-ghost btn-sm" href="#"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Download the CV</a></div><div class="drawer-foot"><button class="btn btn-ghost" onclick="WW.toast('Application refused · client notified','bad')">Refuse</button><button class="btn btn-teal" onclick="WW.toast('Application accepted · client notified')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Accept</button></div></aside>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

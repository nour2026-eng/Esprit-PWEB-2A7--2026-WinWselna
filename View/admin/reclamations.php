<?php $page = 'reclamations'; $title = 'Reclamations'; ?>
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
<main class="content m-safe">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Safe</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Reclamations</span></div>
      <h1><span class="m-dot"></span>Reclamations</h1>
      <p>Entity 1 of Win Safe · submitted by clients (user_id), optionally linked to a project. Open one to answer it (Response, entity 2).</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      
    </div>
  </div>
  <div class="sum-chips"><div class="sum-chip" style="--c:var(--c-news)"><i></i><b>7</b>sent</div><div class="sum-chip" style="--c:var(--warn)"><i></i><b>18</b>in progress</div><div class="sum-chip" style="--c:var(--teal)"><i></i><b>1 259</b>done</div><div class="sum-chip" style="--c:var(--c-safe)"><i></i><b>94%</b>answered < 72 h</div></div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search reclamations…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter aria-label="Filter"><option value="">All statuses</option><option value="SENT">Sent</option><option value="ONGOING">In progress</option><option value="DONE">Done</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Type</th><th>Location</th><th>Project</th><th>Status</th><th>Responses</th><th>Sent</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1291</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="type" data-v="INCIDENT" data-render="badge"><span class="badge b-warn">Incident</span></td><td data-f="location">Rue Ibn Khaldoun, Ariana</td><td data-f="projectId" data-v="6" data-render="fk"><span class="fk">#6</span> Rain drainage, Ariana north</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-info">Sent</span></td><td data-f="responses">0</td><td data-f="sent">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1290</td><td data-f="client" data-v="Ines Hammami" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">IH</span><div><b>Ines Hammami</b></div></div></td><td data-f="type" data-v="SOS" data-render="badge"><span class="badge b-bad">SOS</span></td><td data-f="location">Avenue de la Liberté, Tunis</td><td data-f="projectId" data-v="" data-render="fk"><span class="muted">—</span></td><td data-f="status" data-v="ONGOING" data-render="badge"><span class="badge b-warn">In progress</span></td><td data-f="responses">2</td><td data-f="sent">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1289</td><td data-f="client" data-v="Salma Ayari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">SA</span><div><b>Salma Ayari</b></div></div></td><td data-f="type" data-v="DAMAGE" data-render="badge"><span class="badge b-violet">Damage</span></td><td data-f="location">RN-X km 4, Sfax</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="status" data-v="ONGOING" data-render="badge"><span class="badge b-warn">In progress</span></td><td data-f="responses">1</td><td data-f="sent">11 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1288</td><td data-f="client" data-v="Youssef Gharbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(158 45% 38%)">YG</span><div><b>Youssef Gharbi</b></div></div></td><td data-f="type" data-v="INCIDENT" data-render="badge"><span class="badge b-warn">Incident</span></td><td data-f="location">Sahloul 2, Sousse</td><td data-f="projectId" data-v="4" data-render="fk"><span class="fk">#4</span> Water network, Sahloul</td><td data-f="status" data-v="SENT" data-render="badge"><span class="badge b-info">Sent</span></td><td data-f="responses">0</td><td data-f="sent">11 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1287</td><td data-f="client" data-v="Rania Ferchichi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">RF</span><div><b>Rania Ferchichi</b></div></div></td><td data-f="type" data-v="DAMAGE" data-render="badge"><span class="badge b-violet">Damage</span></td><td data-f="location">Rue de Marseille, Tunis</td><td data-f="projectId" data-v="" data-render="fk"><span class="muted">—</span></td><td data-f="status" data-v="DONE" data-render="badge"><span class="badge b-ok">Done</span></td><td data-f="responses">2</td><td data-f="sent">10 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1284</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="type" data-v="DAMAGE" data-render="badge"><span class="badge b-violet">Damage</span></td><td data-f="location">Av. Habib Bourguiba, Tunis</td><td data-f="projectId" data-v="" data-render="fk"><span class="muted">—</span></td><td data-f="status" data-v="ONGOING" data-render="badge"><span class="badge b-warn">In progress</span></td><td data-f="responses">1</td><td data-f="sent">09 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1280</td><td data-f="client" data-v="Hedi Khelifi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">HK</span><div><b>Hedi Khelifi</b></div></div></td><td data-f="type" data-v="INCIDENT" data-render="badge"><span class="badge b-warn">Incident</span></td><td data-f="location">Cité Ennasr, Ariana</td><td data-f="projectId" data-v="6" data-render="fk"><span class="fk">#6</span> Rain drainage, Ariana north</td><td data-f="status" data-v="DONE" data-render="badge"><span class="badge b-ok">Done</span></td><td data-f="responses">3</td><td data-f="sent">07 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1276</td><td data-f="client" data-v="Karim Mejri" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">KM</span><div><b>Karim Mejri</b></div></div></td><td data-f="type" data-v="DAMAGE" data-render="badge"><span class="badge b-violet">Damage</span></td><td data-f="location">Hammamet centre</td><td data-f="projectId" data-v="5" data-render="fk"><span class="fk">#5</span> Hammamet primary school</td><td data-f="status" data-v="DONE" data-render="badge"><span class="badge b-ok">Done</span></td><td data-f="responses">1</td><td data-f="sent">05 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">1270</td><td data-f="client" data-v="Nour Zouari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">NZ</span><div><b>Nour Zouari</b></div></div></td><td data-f="type" data-v="SOS" data-render="badge"><span class="badge b-bad">SOS</span></td><td data-f="location">Kasserine centre</td><td data-f="projectId" data-v="2" data-render="fk"><span class="fk">#2</span> Regional hospital extension</td><td data-f="status" data-v="DONE" data-render="badge"><span class="badge b-ok">Done</span></td><td data-f="responses">2</td><td data-f="sent">02 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act view" title="View"><svg class="ico ico-sm"><use href="../img/icons.svg#i-eye"/></svg></button><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="reclamation" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add reclamation</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Type <span class="req">*</span></label><select name="type" class="select" required><option value="">Choose…</option><option value="INCIDENT" data-b="b-warn">Incident</option><option value="SOS" data-b="b-bad">SOS</option><option value="DAMAGE" data-b="b-violet">Damage</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="SENT" data-b="b-info">Sent</option><option value="ONGOING" data-b="b-warn">In progress</option><option value="DONE" data-b="b-ok">Done</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Location <span class="req">*</span></label><input name="location" type="text" class="input" required data-min="5"><span class="err">At least 5 characters</span></div>
        <div class="field" style="grid-column:1/-1"><label>Linked project</label><select name="projectId" class="select"><option value="">None</option><option value="1">RN-X road widening</option><option value="2">Regional hospital extension</option><option value="3">Lac 2 public park</option><option value="4">Water network, Sahloul</option><option value="5">Hammamet primary school</option><option value="6">Rain drainage, Ariana north</option></select><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<!-- Reclamation detail + responses (entity 2) -->
<aside class="drawer" data-entity="Reclamation" aria-label="Reclamation detail">
  <div class="drawer-head"><div><span class="badge b-module m-safe">Win Safe</span><h3 class="drawer-title" style="margin:8px 0 0">Reclamation</h3></div><button class="modal-x" data-close-drawer aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
  <div class="drawer-body">
    <dl class="dl"></dl>
    <h4 style="font-size:14px">Responses</h4>
    <div class="thread">
      <div class="bubble"><small>Client · 09 Nov, 08:12</small>Huge pothole in front of n°45, two scooters fell this week. Photo attached.</div>
      <div class="bubble agent"><small>Agent S. Ben Ali · 10 Nov, 10:30</small>The repair team is planned for Thursday morning. Thank you for the photo.</div>
    </div>
    <form id="reply-form" data-validate novalidate>
      <div class="field"><label>Write a response <span class="req">*</span></label><textarea class="textarea" name="message" required data-min="10" placeholder="Your answer to the client…"></textarea><span class="err">At least 10 characters</span></div>
      <div class="field"><label>New status</label><select class="select" id="reply-status" name="status"><option value="SENT" data-b="b-info">Sent</option><option value="ONGOING" data-b="b-warn">In progress</option><option value="DONE" data-b="b-ok">Done</option></select></div>
      <button class="btn btn-primary" type="submit" style="width:100%"><svg class="ico ico-sm"><use href="../img/icons.svg#i-send"/></svg>Send response & notify client</button>
    </form>
  </div>
</aside>
<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

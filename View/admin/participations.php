<?php $page = 'participations'; $title = 'Participations'; ?>
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
<main class="content m-event">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Event</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Participations</span></div>
      <h1><span class="m-dot"></span>Participations</h1>
      <p>Entity 2 of Win Event · a client (user_id) registered to an event (event_id). Admins confirm attendance.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      
    </div>
  </div>
  
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search participations…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter aria-label="Filter"><option value="">All statuses</option><option value="ACTIVE">Active</option><option value="CANCELED">Canceled</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Client</th><th>Event</th><th>Registered</th><th>Status</th><th>Attended</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="client" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="eventId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road: public consultation</td><td data-f="registeredAt">12 Nov 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="client" data-v="Mariem Jlassi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(121 45% 38%)">MJ</span><div><b>Mariem Jlassi</b></div></div></td><td data-f="eventId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road: public consultation</td><td data-f="registeredAt">11 Nov 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="client" data-v="Karim Mejri" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">KM</span><div><b>Karim Mejri</b></div></div></td><td data-f="eventId" data-v="3" data-render="fk"><span class="fk">#3</span> Lac 2 park: choose the design</td><td data-f="registeredAt">11 Nov 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="client" data-v="Salma Ayari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">SA</span><div><b>Salma Ayari</b></div></div></td><td data-f="eventId" data-v="2" data-render="fk"><span class="fk">#2</span> Kasserine hospital: new wing</td><td data-f="registeredAt">10 Nov 2026</td><td data-f="status" data-v="CANCELED" data-render="badge"><span class="badge b-gray">Canceled</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="client" data-v="Rania Ferchichi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">RF</span><div><b>Rania Ferchichi</b></div></div></td><td data-f="eventId" data-v="3" data-render="fk"><span class="fk">#3</span> Lac 2 park: choose the design</td><td data-f="registeredAt">09 Nov 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="client" data-v="Hedi Khelifi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">HK</span><div><b>Hedi Khelifi</b></div></div></td><td data-f="eventId" data-v="4" data-render="fk"><span class="fk">#4</span> Ariana drainage update</td><td data-f="registeredAt">07 Nov 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">7</td><td data-f="client" data-v="Youssef Gharbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(158 45% 38%)">YG</span><div><b>Youssef Gharbi</b></div></div></td><td data-f="eventId" data-v="5" data-render="fk"><span class="fk">#5</span> Sousse water network Q&amp;A</td><td data-f="registeredAt">05 Nov 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">8</td><td data-f="client" data-v="Nour Zouari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">NZ</span><div><b>Nour Zouari</b></div></div></td><td data-f="eventId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road: public consultation</td><td data-f="registeredAt">02 Nov 2026</td><td data-f="status" data-v="CANCELED" data-render="badge"><span class="badge b-gray">Canceled</span></td><td data-f="attended" data-v="no" data-render="bool"><span class="badge b-gray">No</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">9</td><td data-f="client" data-v="Ines Hammami" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">IH</span><div><b>Ines Hammami</b></div></div></td><td data-f="eventId" data-v="2" data-render="fk"><span class="fk">#2</span> Kasserine hospital: new wing</td><td data-f="registeredAt">27 Oct 2026</td><td data-f="status" data-v="ACTIVE" data-render="badge"><span class="badge b-ok">Active</span></td><td data-f="attended" data-v="yes" data-render="bool"><span class="badge b-ok">Yes</span></td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="participation" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add participation</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="ACTIVE" data-b="b-ok">Active</option><option value="CANCELED" data-b="b-gray">Canceled</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Event <span class="req">*</span></label><select name="eventId" class="select" required><option value="">Choose…</option><option value="1">RN-X road: public consultation</option><option value="2">Kasserine hospital: new wing</option><option value="3">Lac 2 park: choose the design</option><option value="4">Ariana drainage update</option><option value="5">Sousse water network Q&amp;A</option></select><span class="err">This field is required</span></div>
        <div class="field"><label class="check"><input type="checkbox" name="attended">Attendance confirmed</label></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

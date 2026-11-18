<?php $page = 'users'; $title = 'Users'; ?>
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
<main class="content m-user">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win Account</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Users</span></div>
      <h1><span class="m-dot"></span>Users</h1>
      <p>Every account of the platform and its role: Client, Agent or Admin.</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add user</button>
    </div>
  </div>
  <div class="sum-chips"><div class="sum-chip" style="--c:#6B7A8F"><i></i><b>9 842</b>clients</div><div class="sum-chip" style="--c:var(--teal)"><i></i><b>38</b>agents</div><div class="sum-chip" style="--c:var(--c-news)"><i></i><b>6</b>admins</div></div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search users…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter data-key="role" aria-label="Filter"><option value="">All roles</option><option value="CLIENT">Client</option><option value="AGENT">Agent</option><option value="ADMIN">Admin</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Full name</th><th>Email</th><th>Phone</th><th>Governorate</th><th>Role</th><th>Created</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="fullName" data-v="Ahmed Ben Salah" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">AB</span><div><b>Ahmed Ben Salah</b></div></div></td><td data-f="email">ahmed.ben.salah@mail.tn</td><td data-f="phone">20 400 100</td><td data-f="governorate">Tunis</td><td data-f="role" data-v="ADMIN" data-render="badge"><span class="badge b-info">Admin</span></td><td data-f="created">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="fullName" data-v="Mariem Jlassi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(121 45% 38%)">MJ</span><div><b>Mariem Jlassi</b></div></div></td><td data-f="email">mariem.jlassi@mail.tn</td><td data-f="phone">21 437 161</td><td data-f="governorate">Ariana</td><td data-f="role" data-v="AGENT" data-render="badge"><span class="badge b-ok">Agent</span></td><td data-f="created">11 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="fullName" data-v="Youssef Gharbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(158 45% 38%)">YG</span><div><b>Youssef Gharbi</b></div></div></td><td data-f="email">youssef.gharbi@mail.tn</td><td data-f="phone">22 474 222</td><td data-f="governorate">Sfax</td><td data-f="role" data-v="CLIENT" data-render="badge"><span class="badge b-gray">Client</span></td><td data-f="created">10 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="fullName" data-v="Ines Hammami" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">IH</span><div><b>Ines Hammami</b></div></div></td><td data-f="email">ines.hammami@mail.tn</td><td data-f="phone">23 511 283</td><td data-f="governorate">Sousse</td><td data-f="role" data-v="CLIENT" data-render="badge"><span class="badge b-gray">Client</span></td><td data-f="created">09 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="fullName" data-v="Karim Mejri" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">KM</span><div><b>Karim Mejri</b></div></div></td><td data-f="email">karim.mejri@mail.tn</td><td data-f="phone">24 548 344</td><td data-f="governorate">Nabeul</td><td data-f="role" data-v="CLIENT" data-render="badge"><span class="badge b-gray">Client</span></td><td data-f="created">07 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="fullName" data-v="Salma Ayari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">SA</span><div><b>Salma Ayari</b></div></div></td><td data-f="email">salma.ayari@mail.tn</td><td data-f="phone">25 585 405</td><td data-f="governorate">Kasserine</td><td data-f="role" data-v="AGENT" data-render="badge"><span class="badge b-ok">Agent</span></td><td data-f="created">05 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">7</td><td data-f="fullName" data-v="Walid Chebbi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">WC</span><div><b>Walid Chebbi</b></div></div></td><td data-f="email">walid.chebbi@mail.tn</td><td data-f="phone">26 622 466</td><td data-f="governorate">Tunis</td><td data-f="role" data-v="CLIENT" data-render="badge"><span class="badge b-gray">Client</span></td><td data-f="created">02 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">8</td><td data-f="fullName" data-v="Rania Ferchichi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(195 45% 38%)">RF</span><div><b>Rania Ferchichi</b></div></div></td><td data-f="email">rania.ferchichi@mail.tn</td><td data-f="phone">27 659 527</td><td data-f="governorate">Ariana</td><td data-f="role" data-v="CLIENT" data-render="badge"><span class="badge b-gray">Client</span></td><td data-f="created">30 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">9</td><td data-f="fullName" data-v="Hedi Khelifi" data-render="who"><div class="who"><span class="avatar" style="background:hsl(84 45% 38%)">HK</span><div><b>Hedi Khelifi</b></div></div></td><td data-f="email">hedi.khelifi@mail.tn</td><td data-f="phone">28 696 588</td><td data-f="governorate">Sfax</td><td data-f="role" data-v="CLIENT" data-render="badge"><span class="badge b-gray">Client</span></td><td data-f="created">27 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">10</td><td data-f="fullName" data-v="Nour Zouari" data-render="who"><div class="who"><span class="avatar" style="background:hsl(47 45% 38%)">NZ</span><div><b>Nour Zouari</b></div></div></td><td data-f="email">nour.zouari@mail.tn</td><td data-f="phone">29 733 649</td><td data-f="governorate">Sousse</td><td data-f="role" data-v="AGENT" data-render="badge"><span class="badge b-ok">Agent</span></td><td data-f="created">21 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="user" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add user</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Full name <span class="req">*</span></label><input name="fullName" type="text" class="input" required data-min="3"><span class="err">At least 3 characters</span></div>
        <div class="field"><label>Email <span class="req">*</span></label><input name="email" type="email" class="input" required><span class="err">Valid email required</span></div>
        <div class="field"><label>Phone <span class="req">*</span></label><input name="phone" type="text" class="input" required data-type="phone" placeholder="2X XXX XXX"><span class="err">Valid Tunisian number</span></div>
        <div class="field"><label>Governorate <span class="req">*</span></label><select name="governorate" class="select" required><option value="">Choose…</option><option value="Tunis">Tunis</option><option value="Ariana">Ariana</option><option value="Sfax">Sfax</option><option value="Sousse">Sousse</option><option value="Nabeul">Nabeul</option><option value="Kasserine">Kasserine</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Role <span class="req">*</span></label><select name="role" class="select" required><option value="">Choose…</option><option value="CLIENT" data-b="b-gray">Client</option><option value="AGENT" data-b="b-ok">Agent</option><option value="ADMIN" data-b="b-info">Admin</option></select><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Password</label><input name="password" type="password" class="input" data-min="8"><span class="err">At least 8 characters</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

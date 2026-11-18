<?php $page = 'articles'; $title = 'Articles'; ?>
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
<main class="content m-news">
  <div class="page-title">
    <div>
      <div class="bc"><a href="index.php">Dashboard</a><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Win News</span><svg class="ico ico-sm"><use href="../img/icons.svg#i-chevron"/></svg><span>Articles</span></div>
      <h1><span class="m-dot"></span>Articles</h1>
      <p>Entity 2 of Win News · linked to a category (category_id) and optionally to a project (project_id).</p>
    </div>
    <div class="flex">
      <button class="btn btn-ghost btn-sm" onclick="WW.toast('Export started (CSV)')"><svg class="ico ico-sm"><use href="../img/icons.svg#i-download"/></svg>Export</button>
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="../img/icons.svg#i-plus"/></svg>Add article</button>
    </div>
  </div>
  <div class="sum-chips"><div class="sum-chip" style="--c:var(--teal)"><i></i><b>42</b>published</div><div class="sum-chip" style="--c:#6B7A8F"><i></i><b>5</b>drafts</div></div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="../img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search articles…" data-tsearch aria-label="Search"></div>
      <div class="flex"><select class="select" data-tfilter aria-label="Filter"><option value="">All statuses</option><option value="DRAFT">Draft</option><option value="PUBLISHED">Published</option></select><span class="muted" style="font-size:12.5px"></span></div>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Category</th><th>Project</th><th>Status</th><th>Published</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr><td data-f="id" class="strong">1</td><td data-f="title" class="strong">RN-X road: fourth milestone delivered</td><td data-f="categoryId" data-v="1" data-render="fk"><span class="fk">#1</span> Infrastructure</td><td data-f="projectId" data-v="1" data-render="fk"><span class="fk">#1</span> RN-X road widening</td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">12 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">2</td><td data-f="title" class="strong">New QR panels on construction sites</td><td data-f="categoryId" data-v="2" data-render="fk"><span class="fk">#2</span> Municipality</td><td data-f="projectId" data-v="" data-render="fk"><span class="muted">—</span></td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">10 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">3</td><td data-f="title" class="strong">Requests: average delay down to 3 days</td><td data-f="categoryId" data-v="3" data-render="fk"><span class="fk">#3</span> Services</td><td data-f="projectId" data-v="" data-render="fk"><span class="muted">—</span></td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">08 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">4</td><td data-f="title" class="strong">Kasserine hospital: new wing opens</td><td data-f="categoryId" data-v="4" data-render="fk"><span class="fk">#4</span> Health</td><td data-f="projectId" data-v="2" data-render="fk"><span class="fk">#2</span> Regional hospital extension</td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">06 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">5</td><td data-f="title" class="strong">346 local jobs created this year</td><td data-f="categoryId" data-v="5" data-render="fk"><span class="fk">#5</span> Economy</td><td data-f="projectId" data-v="" data-render="fk"><span class="muted">—</span></td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">04 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">6</td><td data-f="title" class="strong">Storm season: 1 200 drains cleaned</td><td data-f="categoryId" data-v="1" data-render="fk"><span class="fk">#1</span> Infrastructure</td><td data-f="projectId" data-v="6" data-render="fk"><span class="fk">#6</span> Rain drainage, Ariana north</td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">02 Nov 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">7</td><td data-f="title" class="strong">Lac 2 park consultation opens</td><td data-f="categoryId" data-v="2" data-render="fk"><span class="fk">#2</span> Municipality</td><td data-f="projectId" data-v="3" data-render="fk"><span class="fk">#3</span> Lac 2 public park</td><td data-f="status" data-v="PUBLISHED" data-render="badge"><span class="badge b-ok">Published</span></td><td data-f="publishedAt">30 Oct 2026</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">8</td><td data-f="title" class="strong">Sousse water network: phase 2</td><td data-f="categoryId" data-v="1" data-render="fk"><span class="fk">#1</span> Infrastructure</td><td data-f="projectId" data-v="4" data-render="fk"><span class="fk">#4</span> Water network, Sahloul</td><td data-f="status" data-v="DRAFT" data-render="badge"><span class="badge b-gray">Draft</span></td><td data-f="publishedAt">—</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
          <tr><td data-f="id" class="strong">9</td><td data-f="title" class="strong">Hammamet school delivered</td><td data-f="categoryId" data-v="3" data-render="fk"><span class="fk">#3</span> Services</td><td data-f="projectId" data-v="5" data-render="fk"><span class="fk">#5</span> Hammamet primary school</td><td data-f="status" data-v="DRAFT" data-render="badge"><span class="badge b-gray">Draft</span></td><td data-f="publishedAt">—</td><td class="no-dl"><div class="row-actions"><button class="act edit" title="Edit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-edit"/></svg></button><button class="act del" title="Delete"><svg class="ico ico-sm"><use href="../img/icons.svg#i-trash"/></svg></button></div></td></tr>
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
<div class="modal" id="crud-modal" data-entity="article" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add article</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="../img/icons.svg#i-close"/></svg></button></div>
    <form data-validate novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="10" data-max="120"><span class="err">10 to 120 characters</span></div>
        <div class="field"><label>Category <span class="req">*</span></label><select name="categoryId" class="select" required><option value="">Choose…</option><option value="1">Infrastructure</option><option value="2">Municipality</option><option value="3">Services</option><option value="4">Health</option><option value="5">Economy</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Linked project</label><select name="projectId" class="select"><option value="">None</option><option value="1">RN-X road widening</option><option value="2">Regional hospital extension</option><option value="3">Lac 2 public park</option><option value="4">Water network, Sahloul</option><option value="5">Hammamet primary school</option><option value="6">Rain drainage, Ariana north</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="DRAFT" data-b="b-gray">Draft</option><option value="PUBLISHED" data-b="b-ok">Published</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Publication date</label><input name="publishedAt" type="date" class="input"><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Content <span class="req">*</span></label><textarea name="content" class="textarea" required data-min="50"></textarea><span class="err">At least 50 characters</span></div>
        <div class="field" style="grid-column:1/-1"><label>Cover image</label><div class="dropzone"><input type="file" name="image" accept="image/*"><svg class="ico"><use href="../img/icons.svg#i-upload"/></svg><div><b>Click or drop a file</b></div><div class="dz-name" style="color:var(--teal-d);font-weight:600"></div></div><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="../img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>

<?php require_once 'includes/scripts.php'; ?>
</body>
</html>

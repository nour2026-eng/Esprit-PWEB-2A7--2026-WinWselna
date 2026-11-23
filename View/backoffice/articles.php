<?php
/**
 * View/admin/articles.php — Articles (Win News). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'articles'; $title = 'Articles';
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
<main class="content m-news">
  <?php require __DIR__ . '/../frontoffice/includes/flash.php'; ?>
  <div class="page-title">
    <div>
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win News</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Articles</span></div>
      <h1><span class="m-dot"></span>Articles</h1>
      <p>Entity 2 of Win News · linked to a category (category_id) and optionally to a project (project_id).</p>
    </div>
    <div class="flex">
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add article</button>
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search articles…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Title</th><th>Category</th><th>Project</th><th>Status</th><th>Published</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="7">No articles in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="article" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add article</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Title <span class="req">*</span></label><input name="title" type="text" class="input" required data-min="10" data-max="120"><span class="err">10 to 120 characters</span></div>
        <div class="field"><label>Category <span class="req">*</span></label><select name="categoryId" class="select" required><option value="">Choose…</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Linked project</label><select name="projectId" class="select"><option value="">None</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Status <span class="req">*</span></label><select name="status" class="select" required><option value="">Choose…</option><option value="DRAFT" data-b="b-gray">Draft</option><option value="PUBLISHED" data-b="b-ok">Published</option></select><span class="err">This field is required</span></div>
        <div class="field"><label>Publication date</label><input name="publishedAt" type="date" class="input"><span class="err">This field is required</span></div>
        <div class="field" style="grid-column:1/-1"><label>Content <span class="req">*</span></label><textarea name="content" class="textarea" required data-min="50"></textarea><span class="err">At least 50 characters</span></div>
        <div class="field" style="grid-column:1/-1"><label>Cover image</label><div class="dropzone"><input type="file" name="image" accept="image/*"><svg class="ico"><use href="img/icons.svg#i-upload"/></svg><div><b>Click or drop a file</b></div><div class="dz-name" style="color:var(--teal-d);font-weight:600"></div></div><span class="err">This field is required</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

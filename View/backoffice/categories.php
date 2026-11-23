<?php
/**
 * View/admin/categories.php — Categories (Win News). Template only: the module owner will pass the rows
 * from its controller and loop over them in the <tbody>. No hard-coded data.
 */
$page = 'categories'; $title = 'Categories';
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
      <div class="bc"><a href="<?= e(url('admin')) ?>">Dashboard</a><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Win News</span><svg class="ico ico-sm"><use href="img/icons.svg#i-chevron"/></svg><span>Categories</span></div>
      <h1><span class="m-dot"></span>Categories</h1>
      <p>Entity 1 of Win News. Each article belongs to one category.</p>
    </div>
    <div class="flex">
      <button class="btn btn-primary" data-add><svg class="ico ico-sm"><use href="img/icons.svg#i-plus"/></svg>Add category</button>
    </div>
  </div>
  <div class="panel" data-table>
    <div class="table-tools">
      <div class="input-ico"><svg class="ico"><use href="img/icons.svg#i-search"/></svg><input class="input" type="search" placeholder="Search categories…" aria-label="Search" disabled></div>
      <span class="badge b-warn">Not connected to the database yet</span>
    </div>
    <div class="tbl-wrap">
      <table class="tbl">
        <thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Articles</th><th class="no-sort" style="text-align:right">Actions</th></tr></thead>
        <tbody>
          <tr class="empty-row"><td colspan="5">No categories in the database yet.</td></tr>
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
<div class="modal" id="crud-modal" data-entity="category" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(640px,100%)">
    <div class="modal-head"><h3>Add category</h3><button class="modal-x" data-close aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
    <form data-validate data-pending novalidate>
      <div class="modal-body"><div class="grid-2">
        <div class="field" style="grid-column:1/-1"><label>Name <span class="req">*</span></label><input name="name" type="text" class="input" required data-min="3" data-max="40"><span class="err">3 to 40 characters</span></div>
        <div class="field" style="grid-column:1/-1"><label>Description</label><textarea name="description" class="textarea" data-max="200"></textarea><span class="err">200 characters max</span></div>
      </div></div>
      <div class="modal-foot"><button type="button" class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" type="submit"><svg class="ico ico-sm"><use href="img/icons.svg#i-check"/></svg>Save</button></div>
    </form>
  </div>
</div>
<?php require __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>

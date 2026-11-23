<?php /* Topbar — shows the logged-in user (from the session, escaped) */ ?>
<header class="topbar">
  <button class="sb-toggle" aria-label="Open menu"><svg class="ico"><use href="img/icons.svg#i-menu"/></svg></button>
  <div class="tb-actions">
    <a href="<?= e(url('home')) ?>" class="tb-btn" title="View the website"><svg class="ico"><use href="img/icons.svg#i-globe"/></svg></a>
    <a href="<?= e(url('logout')) ?>" class="tb-btn" title="Log out"><svg class="ico"><use href="img/icons.svg#i-logout"/></svg></a>
    <a href="<?= e(url('admin_profile')) ?>" class="tb-user" title="My profile">
      <span class="avatar" style="background:linear-gradient(135deg,var(--navy),var(--teal))"><?= e(mb_strtoupper(mb_substr($_SESSION['full_name'] ?? '?', 0, 1))) ?></span>
      <div><b><?= e($_SESSION['full_name'] ?? '') ?></b><small><?= e($_SESSION['role'] ?? '') ?></small></div>
    </a>
  </div>
</header>

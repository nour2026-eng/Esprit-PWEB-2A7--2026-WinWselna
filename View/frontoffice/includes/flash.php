<?php
/* One-time message stored in the session by the router (success / error). Everything is escaped. */
$flashMsg = flash();
if ($flashMsg): ?>
<div class="alert alert-<?= $flashMsg['type'] === 'success' ? 'success' : 'error' ?>" role="status">
  <svg class="ico"><use href="img/icons.svg#i-<?= $flashMsg['type'] === 'success' ? 'check' : 'close' ?>"/></svg>
  <span><?= e($flashMsg['message']) ?></span>
</div>
<?php endif; ?>

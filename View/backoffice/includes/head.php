<?php /* Shared <head> content for the dashboard — the calling page sets $title */ ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?= e(BASE_URL) ?>View/">
<title><?= isset($title) ? e($title) . ' · ' : '' ?>Win Wselna? · Dashboard</title>
<link rel="icon" href="img/logo.svg" type="image/svg+xml">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600;700&family=Cairo:wght@700;800&family=JetBrains+Mono:wght@500&display=swap">
<link rel="stylesheet" href="css/common.css?v=<?= filemtime(__DIR__ . "/../../css/common.css") ?>">
<link rel="stylesheet" href="css/admin.css?v=<?= filemtime(__DIR__ . "/../../css/admin.css") ?>">

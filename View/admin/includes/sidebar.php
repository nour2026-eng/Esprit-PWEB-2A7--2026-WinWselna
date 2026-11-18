<?php
/* Sidebar — the calling page sets $page; isActive() marks the current link.
   data-role lists which roles see the link (admin / agent) — used by the role preview in the topbar. */
if (!function_exists('isActive')) {
  function isActive($name) {
    global $page;
    return (isset($page) && $page === $name) ? 'active' : '';
  }
}
?>
<aside class="sidebar" aria-label="Back office navigation">
  <a href="index.php" class="sb-brand"><img src="../img/logo-white.svg" alt=""><div>WIN WSELNA<span>?</span><small>BACK OFFICE</small></div></a>
  <nav class="sb-nav">
    <a href="index.php" class="sb-link <?php echo isActive('dashboard'); ?>" data-role="admin agent"><svg class="ico"><use href="../img/icons.svg#i-dashboard"/></svg>Dashboard</a>

    <div class="sb-label" data-role="admin">Win Account</div>
    <a href="users.php" class="sb-link m-user <?php echo isActive('users'); ?>" data-role="admin" style="--m:#9FB3C8"><svg class="ico"><use href="../img/icons.svg#i-users"/></svg>Users & roles</a>

    <div class="sb-label" data-role="admin">Win News</div>
    <a href="categories.php" class="sb-link m-news <?php echo isActive('categories'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-layers"/></svg>Categories</a>
    <a href="articles.php" class="sb-link m-news <?php echo isActive('articles'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-news"/></svg>Articles</a>

    <div class="sb-label">Win Projects</div>
    <a href="projects.php" class="sb-link m-projects <?php echo isActive('projects'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-projects"/></svg>Projects</a>
    <a href="milestones.php" class="sb-link m-projects <?php echo isActive('milestones'); ?>" data-role="admin agent"><svg class="ico"><use href="../img/icons.svg#i-flag"/></svg>Milestones</a>

    <div class="sb-label">Win Safe</div>
    <a href="reclamations.php" class="sb-link m-safe <?php echo isActive('reclamations'); ?>" data-role="admin agent"><svg class="ico"><use href="../img/icons.svg#i-safe"/></svg>Reclamations<span class="count">7</span></a>

    <div class="sb-label">Win Request</div>
    <a href="request-types.php" class="sb-link m-request <?php echo isActive('request-types'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-file"/></svg>Request types</a>
    <a href="requests.php" class="sb-link m-request <?php echo isActive('requests'); ?>" data-role="admin agent"><svg class="ico"><use href="../img/icons.svg#i-request"/></svg>Requests<span class="count">12</span></a>

    <div class="sb-label" data-role="admin">Win Event</div>
    <a href="events.php" class="sb-link m-event <?php echo isActive('events'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-event"/></svg>Events</a>
    <a href="participations.php" class="sb-link m-event <?php echo isActive('participations'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-users"/></svg>Participations</a>

    <div class="sb-label" data-role="admin">Win Jobs</div>
    <a href="job-offers.php" class="sb-link m-jobs <?php echo isActive('job-offers'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-jobs"/></svg>Job offers</a>
    <a href="applications.php" class="sb-link m-jobs <?php echo isActive('applications'); ?>" data-role="admin"><svg class="ico"><use href="../img/icons.svg#i-file"/></svg>Applications</a>

    <div class="sb-label">Other</div>
    <a href="../index.php" class="sb-link"><svg class="ico"><use href="../img/icons.svg#i-globe"/></svg>View the website</a>
    <a href="login.php" class="sb-link"><svg class="ico"><use href="../img/icons.svg#i-logout"/></svg>Log out</a>
  </nav>
  <div class="sb-foot"><div class="sb-help"><img src="../img/mascot.webp" alt=""><div><b>3am Win</b><br>8 AI suggestions waiting</div></div></div>
</aside>
<div class="overlay"></div>

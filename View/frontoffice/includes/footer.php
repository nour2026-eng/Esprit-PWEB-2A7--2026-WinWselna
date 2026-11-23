<!-- Footer -->
<footer class="footer">
  <div class="container footer-grid">
    <div>
      <a href="<?= e(url('home')) ?>" class="brand"><img src="img/logo-white.svg" alt=""><b>WIN WSELNA<i>?</i></b></a>
      <p class="ar">الدولة في جيبك</p>
      <p>One account for six public services: news, projects, reclamations, transport, events and local jobs. Built by team Aura Nova.</p>
    </div>
    <div>
      <h4>Modules</h4>
      <ul>
        <li><a href="<?= e(url('news')) ?>">Win News</a></li>
        <li><a href="<?= e(url('projects')) ?>">Win Projects</a></li>
        <li><a href="<?= e(url('reclamations')) ?>">Win Safe</a></li>
        <li><a href="<?= e(url('transport')) ?>">Win Transport</a></li>
        <li><a href="<?= e(url('events')) ?>">Win Event</a></li>
        <li><a href="<?= e(url('jobs')) ?>">Win Jobs</a></li>
      </ul>
    </div>
    <div>
      <h4>My account</h4>
      <ul>
        <?php if (AuthController::isAuthenticated()): ?>
          <li><a href="<?= e(url(AuthController::isStaff() ? 'admin' : 'account')) ?>"><?= AuthController::isStaff() ? 'Dashboard' : 'My space' ?></a></li>
          <li><a href="<?= e(url('logout')) ?>">Log out</a></li>
        <?php else: ?>
          <li><a href="<?= e(url('login')) ?>">Log in</a></li>
          <li><a href="<?= e(url('register')) ?>">Create an account</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div>
      <h4>Contact</h4>
      <ul>
        <li class="flex"><svg class="ico ico-sm"><use href="img/icons.svg#i-pin"/></svg>Esprit School of Engineering, Tunisia</li>
        <li class="flex"><svg class="ico ico-sm"><use href="img/icons.svg#i-mail"/></svg>contact@winwselna.tn</li>
        <li class="flex"><svg class="ico ico-sm"><use href="img/icons.svg#i-phone"/></svg>80 100 100</li>
      </ul>
    </div>
  </div>
  <div class="container footer-bottom">
    <span>© <?= date('Y') ?> Win Wselna? · Team Aura Nova · Esprit School of Engineering</span>
    <span>Web Technologies Project 2A · 2026–2027</span>
  </div>
</footer>

<!-- Back to top -->
<button class="to-top" aria-label="Back to top"><svg class="ico"><use href="img/icons.svg#i-up"/></svg></button>

<!-- 3am Win assistant -->
<button class="chat-fab" aria-label="Ask 3am Win"><img src="img/mascot.webp" alt="">Ask 3am Win</button>
<div class="chat-panel" role="dialog" aria-label="3am Win assistant">
  <div class="chat-head"><img src="img/mascot.webp" alt=""><div class="grow"><b>3am Win</b><small>Online · Darija · العربية · Français</small></div><button class="modal-x chat-close" aria-label="Close"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
  <div class="chat-body"><div class="msg bot"><span class="ar">عسلامة! وين وصلنا اليوم؟</span>Hello! Ask me about a project, a reclamation, a bus line, an event or a job.</div></div>
  <div class="chat-quick"><button>Where is my bus?</button><button>Report a pothole</button><button>Jobs near me</button></div>
  <form class="chat-form"><input type="text" placeholder="Type or speak in Darija…" aria-label="Message"><button type="submit" aria-label="Send"><svg class="ico ico-sm"><use href="img/icons.svg#i-send"/></svg></button></form>
</div>

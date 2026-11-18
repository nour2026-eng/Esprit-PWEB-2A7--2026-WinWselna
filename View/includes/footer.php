<!-- Footer -->
<footer class="footer">
  <div class="container footer-grid">
    <div>
      <a href="index.php" class="brand"><img src="img/logo-white.svg" alt=""><b>WIN WSELNA<i>?</i></b></a>
      <p class="ar">الدولة في جيبك</p>
      <p>One account for six public services: news, projects, reclamations, requests, events and local jobs. Built by team Aura Nova.</p>
      <div class="socials">
        <a href="#" aria-label="Facebook"><svg class="ico ico-sm"><use href="img/icons.svg#i-facebook"/></svg></a>
        <a href="#" aria-label="Instagram"><svg class="ico ico-sm"><use href="img/icons.svg#i-instagram"/></svg></a>
        <a href="#" aria-label="LinkedIn"><svg class="ico ico-sm"><use href="img/icons.svg#i-linkedin"/></svg></a>
      </div>
    </div>
    <div>
      <h4>Modules</h4>
      <ul>
        <li><a href="news.php">Win News</a></li>
        <li><a href="projects.php">Win Projects</a></li>
        <li><a href="reclamations.php">Win Safe</a></li>
        <li><a href="requests.php">Win Request</a></li>
        <li><a href="events.php">Win Event</a></li>
        <li><a href="jobs.php">Win Jobs</a></li>
      </ul>
    </div>
    <div>
      <h4>My space</h4>
      <ul>
        <li><a href="account.php">My account</a></li>
        <li><a href="account.php#t-recl">My reclamations</a></li>
        <li><a href="account.php#t-req">My requests</a></li>
        <li><a href="login.php">Log in</a></li>
        <li><a href="register.php">Create an account</a></li>
        <li><a href="admin/index.php">Back office</a></li>
      </ul>
    </div>
    <div>
      <h4>Weekly briefing</h4>
      <p>Your 60-second summary of what moved in your governorate, every Monday.</p>
      <form class="newsletter" novalidate>
        <input type="email" placeholder="Your email" aria-label="Email">
        <button class="btn btn-teal btn-sm" type="submit">Subscribe</button>
      </form>
      <ul style="margin-top:16px">
        <li class="flex"><svg class="ico ico-sm"><use href="img/icons.svg#i-pin"/></svg>Municipality of Tunis, Tunisia</li>
        <li class="flex"><svg class="ico ico-sm"><use href="img/icons.svg#i-phone"/></svg>80 100 100</li>
      </ul>
    </div>
  </div>
  <div class="container footer-bottom">
    <span>© <?php echo date('Y'); ?> Win Wselna? · Team Aura Nova · All rights reserved.</span>
    <span>Privacy · Terms · Accessibility</span>
  </div>
</footer>

<!-- Back to top -->
<button class="to-top" aria-label="Back to top"><svg class="ico"><use href="img/icons.svg#i-up"/></svg></button>

<!-- 3am Win assistant -->
<button class="chat-fab" aria-label="Ask 3am Win"><img src="img/mascot.webp" alt="">Ask 3am Win</button>
<div class="chat-panel" role="dialog" aria-label="3am Win assistant">
  <div class="chat-head"><img src="img/mascot.webp" alt=""><div class="grow"><b>3am Win</b><small>Online · Darija · العربية · Français</small></div><button class="modal-x chat-close" aria-label="Close" style="color:#fff"><svg class="ico"><use href="img/icons.svg#i-close"/></svg></button></div>
  <div class="chat-body"><div class="msg bot"><span class="ar">عسلامة! وين وصلنا اليوم؟</span>Hello! Ask me about a project, a reclamation, a request, an event or a job.</div></div>
  <div class="chat-quick"><button>Where is my request?</button><button>Report a pothole</button><button>Jobs near me</button></div>
  <form class="chat-form"><input type="text" placeholder="Type or speak in Darija…" aria-label="Message"><button type="submit" aria-label="Send"><svg class="ico ico-sm"><use href="img/icons.svg#i-send"/></svg></button></form>
</div>

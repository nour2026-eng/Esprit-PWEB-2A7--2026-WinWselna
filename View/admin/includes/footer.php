<footer class="admin-foot"><span>© <?php echo date('Y'); ?> Win Wselna? · Back office</span><span>Team Aura Nova</span></footer>

<!-- Delete confirmation (shared by every CRUD page) -->
<div class="modal" id="confirm-modal" aria-hidden="true">
  <div class="modal-backdrop"></div>
  <div class="modal-box" style="width:min(420px,100%)">
    <div class="modal-body" style="text-align:center;padding:30px 26px 10px">
      <span style="width:58px;height:58px;border-radius:18px;background:#FDE7EA;color:var(--red);display:grid;place-items:center;margin:0 auto 14px"><svg class="ico ico-lg"><use href="../img/icons.svg#i-trash"/></svg></span>
      <h3>Delete <span id="confirm-name"></span>?</h3>
      <p class="muted">This action cannot be undone.</p>
    </div>
    <div class="modal-foot" style="justify-content:center"><button class="btn btn-ghost" data-close>Cancel</button><button class="btn btn-primary" id="confirm-yes">Yes, delete</button></div>
  </div>
</div>

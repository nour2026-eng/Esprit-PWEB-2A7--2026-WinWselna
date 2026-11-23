/* =========================================================
   Win Wselna? — FRONT OFFICE behaviour
   ========================================================= */
(() => {
  const { $, $$, toast, animateIn } = WW;

  /* spinner */
  const hideSpinner = () => { const s = $('#spinner'); if (s) s.classList.add('hide'); };
  setTimeout(hideSpinner, 450);              /* page is ready (scripts run at the end of <body>) */
  window.addEventListener('load', hideSpinner);

  /* navbar shadow + back-to-top */
  const nav = $('.navbar'), top = $('.to-top');
  const onScroll = () => { const y = scrollY; nav && nav.classList.toggle('scrolled', y > 10); top && top.classList.toggle('show', y > 400); };
  addEventListener('scroll', onScroll, { passive: true }); onScroll();
  top && top.addEventListener('click', () => scrollTo({ top: 0, behavior: 'smooth' }));

  /* mobile menu */
  const tog = $('.nav-toggle'), pills = $('.nav-pills');
  tog && tog.addEventListener('click', () => { pills.classList.toggle('open'); tog.setAttribute('aria-expanded', pills.classList.contains('open')); });

  /* language switch (visual only for now) */
  $$('.lang button').forEach(b => b.addEventListener('click', () => { $$('.lang button').forEach(x => x.classList.toggle('active', x === b)); toast('Language: ' + b.textContent); }));

  /* reveal on scroll + start progress/counters when visible */
  const io = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); animateIn(e.target); io.unobserve(e.target); } }), { threshold: .12 });
  $$('.reveal').forEach(el => io.observe(el));
  animateIn($('.hero') || document.createElement('div'));
  $$('.page-head, .float-card').forEach(el => animateIn(el));

  /* 3am Win chat */
  const fab = $('.chat-fab'), panel = $('.chat-panel');
  if (fab && panel) {
    const body = $('.chat-body', panel), form = $('.chat-form', panel), input = $('input', form);
    const say = (txt, who = 'bot', ar) => { const m = document.createElement('div'); m.className = 'msg ' + who; if (ar) { const a = document.createElement('span'); a.className = 'ar'; a.textContent = ar; m.appendChild(a); } m.appendChild(document.createTextNode(txt)); body.appendChild(m); body.scrollTop = body.scrollHeight; };
    const answers = [
      [/reclam|pothole|complain|chkaya|شكاية/i, 'You can submit a reclamation in Win Safe. Add a photo and the location, then track its status.', 'نجم نعاونك تبعث شكاية'],
      [/bus|metro|train|louage|ticket|transport|car|كار|تران/i, 'Win Transport shows every line with its status. Buy your ticket online and show the QR code on board.', 'الكار متاعك وين وصل؟'],
      [/project|road|chantier|site|مشروع/i, 'Open Win Projects to see progress, milestones and linked events or jobs.', 'المشروع هذا وين وصل؟'],
      [/event|meeting|consult|اجتماع/i, 'Upcoming consultations are in Win Event. Registration takes one click.', 'سجّل روحك في الاجتماع'],
      [/job|work|khedma|خدمة/i, 'Win Jobs lists offers created by public projects near you. Upload your CV to apply.', 'فما خدمة قريبة منك'],
    ];
    const reply = q => { const a = answers.find(r => r[0].test(q)); setTimeout(() => a ? say(a[1], 'bot', a[2]) : say('I can help with news, projects, reclamations, transport, events and jobs. What do you need?', 'bot', 'آش نجم نعاونك؟'), 500); };
    fab.addEventListener('click', () => { panel.classList.toggle('open'); if (panel.classList.contains('open')) input.focus(); });
    $('.chat-close', panel).addEventListener('click', () => panel.classList.remove('open'));
    form.addEventListener('submit', e => { e.preventDefault(); const q = input.value.trim(); if (!q) return; say(q, 'me'); input.value = ''; reply(q); });
    $$('.chat-quick button', panel).forEach(b => b.addEventListener('click', () => { say(b.textContent, 'me'); reply(b.textContent); }));
  }

  /* Win Transport: buy a ticket → line name + total = fare × quantity */
  let fare = 0;
  const qty = $('#tk-qty'), total = $('#tk-total');
  const updateTotal = () => { const q = Math.min(10, Math.max(1, +qty.value || 1)); total.textContent = (fare * q).toFixed(3) + ' TND'; };
  $$('[data-buy]').forEach(b => b.addEventListener('click', () => {
    fare = +b.dataset.fare; $('#tk-line').textContent = b.dataset.buy;
    const d = $('#ticket-modal [name=travel_date]'); if (d && !d.value) d.value = new Date().toISOString().slice(0, 10);
    updateTotal();
  }));
  qty && qty.addEventListener('input', updateTotal);

  /* event registration toggle */
  $$('[data-register]').forEach(btn => btn.addEventListener('click', () => {
    const card = btn.closest('.event'), cnt = $('[data-taken]', card), cap = +card.dataset.capacity;
    let taken = +cnt.dataset.taken; const on = btn.classList.toggle('registered');
    taken += on ? 1 : -1; cnt.dataset.taken = taken; cnt.textContent = `${taken} / ${cap} places`;
    $('.progress>i', card).style.setProperty('--v', Math.round(taken / cap * 100) + '%');
    btn.innerHTML = on ? WW.icon('check', 'ico ico-sm') + ' Registered' : 'Register';
    btn.classList.toggle('btn-teal', on); btn.classList.toggle('btn-module', !on);
    toast(on ? 'You are registered. See you there!' : 'Registration cancelled');
  }));

  /* job apply: prefill offer title in the modal */
  $$('[data-apply]').forEach(b => b.addEventListener('click', () => { const t = $('#apply-offer'); if (t) t.textContent = b.dataset.apply; }));

  /* follow project */
  $$('[data-follow]').forEach(b => b.addEventListener('click', () => { const on = b.classList.toggle('on'); b.innerHTML = WW.icon(on ? 'check' : 'bell', 'ico ico-sm') + (on ? ' Following' : ' Follow this project'); toast(on ? 'You will be notified of every new milestone' : 'Project unfollowed'); }));

  /* cancel buttons on my lists */
  $$('[data-cancel]').forEach(b => b.addEventListener('click', async () => {
    const what = b.dataset.cancel, row = b.closest('[data-item]');
    if (await WW.ask({ title: 'Cancel this ' + what + '?', message: 'This action cannot be undone.', ok: 'Yes, cancel it', cancel: 'Keep it' })) {
      row.style.opacity = '.4'; b.disabled = true; toast(what[0].toUpperCase() + what.slice(1) + ' cancelled');
    }
  }));

  /* newsletter */
  const nl = $('.newsletter'); nl && nl.addEventListener('submit', e => { e.preventDefault(); const i = $('input', nl); if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(i.value)) { toast('Please enter a valid email', 'bad'); return; } i.value = ''; toast('Subscribed to the weekly briefing'); });
})();

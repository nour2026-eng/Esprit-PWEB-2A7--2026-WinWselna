/* =========================================================
   Win Wselna? — shared behaviour (front + back office)
   modals · toasts · tabs · input validation · filters · file inputs
   ========================================================= */
const WW = (() => {
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => [...r.querySelectorAll(s)];
  const icon = (id, cls = 'ico') => `<svg class="${cls}"><use href="${WW_BASE}img/icons.svg#${id}"/></svg>`;

  /* ---------- toast ---------- */
  function toast(msg, type = 'ok') {
    let box = $('.toasts');
    if (!box) { box = document.createElement('div'); box.className = 'toasts'; document.body.appendChild(box); }
    const t = document.createElement('div');
    t.className = 'toast ' + (type === 'bad' ? 'bad' : '');
    t.innerHTML = icon(type === 'bad' ? 'close' : 'check') + '<span></span>';
    t.querySelector('span').textContent = msg;
    box.appendChild(t);
    setTimeout(() => { t.style.opacity = '0'; t.style.transition = 'opacity .4s'; }, 2600);
    setTimeout(() => t.remove(), 3100);
  }

  /* ---------- modal ---------- */
  function openModal(id) { const m = document.getElementById(id); if (!m) return; m.classList.add('open'); document.body.style.overflow = 'hidden'; const f = m.querySelector('input,select,textarea'); if (f) setTimeout(() => f.focus(), 120); }
  function closeModal(m) { if (typeof m === 'string') m = document.getElementById(m); if (!m) return; m.classList.remove('open'); document.body.style.overflow = ''; }
  document.addEventListener('click', e => {
    const o = e.target.closest('[data-open]'); if (o) { e.preventDefault(); openModal(o.dataset.open); }
    const c = e.target.closest('[data-close]'); if (c) { e.preventDefault(); closeModal(c.closest('.modal')); }
    if (e.target.classList.contains('modal-backdrop')) closeModal(e.target.closest('.modal'));
  });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') $$('.modal.open').forEach(closeModal); });

  /* ---------- tabs: <div data-tabs> .tab[data-tab=x] + .tab-panel#x ---------- */
  $$('[data-tabs]').forEach(group => {
    const tabs = $$('.tab', group);
    tabs.forEach(t => t.addEventListener('click', () => {
      tabs.forEach(x => x.classList.toggle('active', x === t));
      $$('.tab-panel', group.closest('[data-tabs-scope]') || document).forEach(p => p.classList.toggle('active', p.id === t.dataset.tab));
    }));
  });
  /* open a tab from the URL hash, e.g. account.php#t-req */
  if (location.hash) { const t = document.querySelector(`.tab[data-tab="${location.hash.slice(1)}"]`); if (t) t.click(); }

  /* ---------- input validation (contrôle de saisie) ----------
     <form data-validate> fields: required, type=email, data-min, data-max, data-pattern, data-match, data-msg */
  const rules = {
    required: v => v.trim() !== '',
    email: v => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v),
    phone: v => /^(\+216)?\s?[2-9]\d{7}$/.test(v.replace(/\s/g, '')),
  };
  function validateField(el) {
    const f = el.closest('.field'); if (!f) return true;
    const v = el.type === 'file' ? (el.files.length ? 'x' : '') : (el.type === 'checkbox' ? (el.checked ? 'x' : '') : el.value);
    let ok = true;
    if (el.required && !rules.required(v)) ok = false;
    else if (v && el.type === 'email' && !rules.email(v)) ok = false;
    else if (v && el.dataset.type === 'phone' && !rules.phone(v)) ok = false;
    else if (v && el.dataset.digits !== undefined && !/^\d+$/.test(v.trim())) ok = false;
    else if (v && el.dataset.min && v.trim().length < +el.dataset.min) ok = false;
    else if (v && el.dataset.max && v.trim().length > +el.dataset.max) ok = false;
    else if (v && el.type === 'number' && ((el.min !== '' && +v < +el.min) || (el.max !== '' && +v > +el.max))) ok = false;
    else if (v && el.type === 'date' && el.dataset.future !== undefined && new Date(v) < new Date(new Date().toDateString())) ok = false;
    else if (el.dataset.match) { const o = el.form.querySelector(`[name="${el.dataset.match}"]`); if (o && o.value !== v) ok = false; }
    f.classList.toggle('invalid', !ok);
    return ok;
  }
  function validateForm(form) {
    let ok = true;
    $$('input,select,textarea', form).forEach(el => { if (!validateField(el)) ok = false; });
    if (!ok) { const first = $('.field.invalid input,.field.invalid select,.field.invalid textarea', form); if (first) first.focus(); }
    return ok;
  }
  document.addEventListener('input', e => { if (e.target.closest('form[data-validate]') && e.target.closest('.field.invalid')) validateField(e.target); });
  document.addEventListener('change', e => { if (e.target.closest('form[data-validate]')) validateField(e.target); });
  document.addEventListener('submit', e => {
    const form = e.target; if (!form.matches('form[data-validate]')) return;
    e.preventDefault();
    if (!validateForm(form)) { toast('Please check the highlighted fields', 'bad'); return; }
    form.dispatchEvent(new CustomEvent('ww:valid', { bubbles: true }));
    if (form.dataset.success) { toast(form.dataset.success); if (!form.dataset.keep) form.reset(); $$('.dropzone .dz-name', form).forEach(n => n.textContent = ''); const m = form.closest('.modal'); if (m) closeModal(m); }
    if (form.dataset.redirect) setTimeout(() => location.href = form.dataset.redirect, 700);
  });

  /* ---------- dropzones ---------- */
  $$('.dropzone').forEach(dz => {
    const inp = $('input[type=file]', dz), name = $('.dz-name', dz);
    dz.addEventListener('click', () => inp.click());
    inp.addEventListener('change', () => { name.textContent = [...inp.files].map(f => f.name).join(', '); validateField(inp); });
    ['dragover', 'dragenter'].forEach(ev => dz.addEventListener(ev, e => { e.preventDefault(); dz.classList.add('drag'); }));
    ['dragleave', 'drop'].forEach(ev => dz.addEventListener(ev, e => { e.preventDefault(); dz.classList.remove('drag'); }));
    dz.addEventListener('drop', e => { inp.files = e.dataTransfer.files; inp.dispatchEvent(new Event('change')); });
  });

  /* ---------- chip filters: [data-filter-group="g"] .chip[data-filter=x]  items [data-group="g"][data-cat="x y"] ---------- */
  $$('[data-filter-group]').forEach(group => {
    const g = group.dataset.filterGroup;
    $$('.chip', group).forEach(ch => ch.addEventListener('click', () => {
      $$('.chip', group).forEach(c => c.classList.toggle('active', c === ch));
      const f = ch.dataset.filter;
      $$(`[data-group="${g}"]`).forEach(it => { it.style.display = (f === 'all' || (it.dataset.cat || '').split(' ').includes(f)) ? '' : 'none'; });
    }));
  });
  /* ---------- live search: input[data-search="g"] filters [data-group="g"] by text ---------- */
  $$('[data-search]').forEach(inp => inp.addEventListener('input', () => {
    const q = inp.value.toLowerCase().trim();
    $$(`[data-group="${inp.dataset.search}"]`).forEach(it => { it.style.display = it.textContent.toLowerCase().includes(q) ? '' : 'none'; });
  }));

  /* ---------- animated progress + counters ---------- */
  function animateIn(root = document) {
    $$('.progress>i[data-v]', root).forEach(i => requestAnimationFrame(() => i.style.setProperty('--v', i.dataset.v + '%')));
    $$('[data-count]', root).forEach(el => {
      const end = +el.dataset.count, dur = 1200, t0 = performance.now(), fmt = n => n.toLocaleString('en-US');
      (function tick(t) { const p = Math.min(1, (t - t0) / dur); el.textContent = fmt(Math.round(end * (1 - Math.pow(1 - p, 3)))) + (el.dataset.suffix || ''); if (p < 1) requestAnimationFrame(tick); })(t0);
    });
  }

  return { $, $$, icon, toast, openModal, closeModal, validateForm, validateField, animateIn };
})();

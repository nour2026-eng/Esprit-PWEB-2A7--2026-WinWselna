/* =========================================================
   Win Wselna? — dashboard behaviour
   sidebar · tables (sort, pages) · user form (add / edit) · charts
   Data is never created in the browser: every form is sent to PHP (index.php) which validates it again.
   ========================================================= */
(() => {
  const { $, $$, openModal, animateIn } = WW;

  /* sidebar (mobile) */
  const sb = $('.sidebar'), ov = $('.overlay');
  $('.sb-toggle') && $('.sb-toggle').addEventListener('click', () => { sb.classList.add('open'); ov.classList.add('open'); });
  ov && ov.addEventListener('click', () => { sb.classList.remove('open'); ov.classList.remove('open'); });

  animateIn(document);

  /* ---------- tables: sort by column + pagination (rows come from the server) ---------- */
  const PAGE = 10;
  $$('[data-table]').forEach(panel => {
    const tbody = $('tbody', panel), pager = $('.pager', panel), info = $('.t-info', panel);
    if (!tbody) return;
    let page = 1, sortIdx = -1, dir = 1;
    const rows = () => $$('tr:not(.empty-row)', tbody);
    function render() {
      const all = rows(), pages = Math.max(1, Math.ceil(all.length / PAGE)); page = Math.min(page, pages);
      all.forEach((r, i) => r.style.display = (i >= (page - 1) * PAGE && i < page * PAGE) ? '' : 'none');
      if (info) info.textContent = all.length ? `Showing ${(page - 1) * PAGE + 1}–${Math.min(page * PAGE, all.length)} of ${all.length}` : '';
      if (pager) { pager.innerHTML = ''; if (pages > 1) for (let i = 1; i <= pages; i++) { const b = document.createElement('button'); b.type = 'button'; b.textContent = i; b.className = i === page ? 'active' : ''; b.addEventListener('click', () => { page = i; render(); }); pager.appendChild(b); } }
    }
    $$('th', panel).forEach((th, i) => {
      if (th.classList.contains('no-sort')) return;
      th.insertAdjacentHTML('beforeend', '<span class="sort">↕</span>');
      th.addEventListener('click', () => {
        dir = sortIdx === i ? -dir : 1; sortIdx = i;
        $$('th', panel).forEach(x => x.classList.remove('asc', 'desc')); th.classList.add(dir > 0 ? 'asc' : 'desc');
        const val = r => { const c = r.children[i]; const v = c ? (c.dataset.v ?? c.textContent.trim()) : ''; const n = Number(v); return v !== '' && !isNaN(n) ? n : v.toLowerCase(); };
        rows().sort((a, b) => { const x = val(a), y = val(b); return (x > y ? 1 : x < y ? -1 : 0) * dir; }).forEach(r => tbody.appendChild(r));
        render();
      });
    });
    render();
  });

  /* ---------- module templates not connected yet: the "Add" button opens their form ---------- */
  $$('[data-add]').forEach(b => b.addEventListener('click', () => openModal('crud-modal')));

  /* ---------- users: one form for create (empty id) and update (id filled) ---------- */
  const um = $('#user-modal');
  if (um) {
    const form = $('#user-form', um), title = $('#user-modal-title'), pw = $('[name=password]', form), hint = $('[data-pw-hint]', form),
          star = $('[data-pw-star]', form), role = $('[name=role]', form), selfNote = $('[data-self-note]', um);
    const clearErrors = () => { $$('.field', form).forEach(f => f.classList.remove('invalid', 'has-error')); $$('.err-srv, .alert', form).forEach(n => n.remove()); };
    const setMode = editing => { pw.required = !editing; hint.hidden = !editing; star.hidden = editing; };
    $$('[data-user-add]').forEach(b => b.addEventListener('click', () => {
      form.reset(); clearErrors(); form.elements['id'].value = ''; role.disabled = false; selfNote.hidden = true;
      $$('input:not([type=hidden]):not([type=checkbox]), select', form).forEach(el => { el.value = ''; });
      form.querySelector('[name=is_verified]').checked = false;
      title.textContent = 'Add a user'; setMode(false); openModal('user-modal');
    }));
    $$('.act.edit[data-user]').forEach(b => b.addEventListener('click', () => {
      const u = JSON.parse(b.dataset.user); form.reset(); clearErrors();
      form.elements['id'].value = u.id; form.full_name.value = u.full_name; form.email.value = u.email; form.phone.value = u.phone;
      form.governorate.value = u.governorate; role.value = u.role; form.is_verified.checked = !!u.is_verified;
      pw.value = ''; form.password_confirm.value = '';
      selfNote.hidden = !u.self;
      title.textContent = 'Edit user #' + u.id; setMode(true); openModal('user-modal');
    }));
    if (um.dataset.reopen === '1') openModal('user-modal');
  }

  /* ---------- charts (pure SVG, safe with empty data) ---------- */
  $$('svg[data-line]').forEach(svg => {
    const W = 600, H = 240, P = 28, sets = JSON.parse(svg.dataset.line), cols = JSON.parse(svg.dataset.colors), labels = JSON.parse(svg.dataset.labels || '[]');
    const top = Math.max(4, ...sets.flat()), step = Math.ceil(top / 4), max = step * 4, n = sets[0].length;
    const X = i => P + (n > 1 ? i * (W - P * 2) / (n - 1) : (W - P * 2) / 2), Y = v => H - P - v / max * (H - P * 2);
    let s = '';
    for (let g = 0; g <= 4; g++) { const v = step * g, y = Y(v); s += `<line x1="${P}" x2="${W - P}" y1="${y}" y2="${y}" stroke="#EEF0F4"/><text x="${P - 6}" y="${y + 4}" font-size="10" text-anchor="end" fill="#8A97A8">${v}</text>`; }
    labels.forEach((l, i) => s += `<text x="${X(i)}" y="${H - 8}" font-size="10" text-anchor="middle" fill="#8A97A8">${l}</text>`);
    sets.forEach((d, k) => {
      const pts = d.map((v, i) => `${X(i).toFixed(1)},${Y(v).toFixed(1)}`);
      if (k === 0) s += `<path d="M${pts.join(' L')} L${X(n - 1)},${H - P} L${X(0)},${H - P}Z" fill="${cols[k]}" fill-opacity=".08"/>`;
      s += `<polyline points="${pts.join(' ')}" fill="none" stroke="${cols[k]}" stroke-width="2.6" stroke-linejoin="round" stroke-linecap="round"/>`;
      d.forEach((v, i) => s += `<circle cx="${X(i)}" cy="${Y(v)}" r="4" fill="${cols[k]}" stroke="#fff" stroke-width="2"><title>${labels[i] || ''}: ${v}</title></circle>`);
    });
    svg.setAttribute('viewBox', `0 0 ${W} ${H}`); svg.innerHTML = s;
  });
  $$('svg[data-donut]').forEach(svg => {
    const vals = JSON.parse(svg.dataset.donut).map(Number), cols = JSON.parse(svg.dataset.colors), tot = vals.reduce((a, b) => a + b, 0), R = 52, C = 2 * Math.PI * R;
    let off = 0, s = `<circle cx="70" cy="70" r="${R}" fill="none" stroke="#EEF0F4" stroke-width="18"/>`;
    if (tot > 0) vals.forEach((v, i) => { const len = v / tot * C; s += `<circle cx="70" cy="70" r="${R}" fill="none" stroke="${cols[i]}" stroke-width="18" stroke-dasharray="${len} ${C - len}" stroke-dashoffset="${-off}" transform="rotate(-90 70 70)"/>`; off += len; });
    s += `<text x="70" y="68" text-anchor="middle" font-family="Poppins" font-weight="800" font-size="24" fill="#0B2545">${tot.toLocaleString('en-US')}</text><text x="70" y="86" text-anchor="middle" font-size="10.5" fill="#8A97A8">${svg.dataset.label || ''}</text>`;
    svg.setAttribute('viewBox', '0 0 140 140'); svg.innerHTML = s;
  });
})();

/* =========================================================
   Win Wselna? — BACK OFFICE behaviour
   sidebar · role switch · data tables (search, filter, sort, pages) · CRUD modal · drawer · charts
   ========================================================= */
(() => {
  const { $, $$, toast, openModal, closeModal, animateIn } = WW;

  /* sidebar (mobile) */
  const sb = $('.sidebar'), ov = $('.overlay');
  $('.sb-toggle') && $('.sb-toggle').addEventListener('click', () => { sb.classList.add('open'); ov.classList.add('open'); });
  ov && ov.addEventListener('click', () => { sb.classList.remove('open'); ov.classList.remove('open'); closeDrawer(); });

  /* role preview: Admin sees everything, Agent only processing pages */
  const applyRole = r => { $$('[data-role]').forEach(el => { el.style.display = el.dataset.role.split(' ').includes(r) ? '' : 'none'; }); const lbl = $('.tb-user small'); if (lbl) lbl.textContent = r.toUpperCase(); };
  $$('.role-switch button').forEach(b => b.addEventListener('click', () => { $$('.role-switch button').forEach(x => x.classList.toggle('active', x === b)); applyRole(b.dataset.r); toast('Viewing as ' + b.textContent); }));

  animateIn(document);

  /* ---------- data tables ---------- */
  const PAGE = 8;
  $$('[data-table]').forEach(panel => {
    const tbody = $('tbody', panel), search = $('[data-tsearch]', panel), filter = $('[data-tfilter]', panel), pager = $('.pager', panel), info = $('.t-info', panel);
    let page = 1, sortIdx = -1, dir = 1;
    const rows = () => $$('tr:not(.empty-row)', tbody);
    function render() {
      const q = (search && search.value || '').toLowerCase(), fv = filter && filter.value;
      const match = rows().filter(r => { const okQ = r.textContent.toLowerCase().includes(q); const st = r.querySelector(`[data-f="${(filter && filter.dataset.key) || 'status'}"]`); const okF = !fv || (st && (st.dataset.v || st.textContent.trim()) === fv); return okQ && okF; });
      rows().forEach(r => r.style.display = 'none');
      const pages = Math.max(1, Math.ceil(match.length / PAGE)); page = Math.min(page, pages);
      match.slice((page - 1) * PAGE, page * PAGE).forEach(r => r.style.display = '');
      let empty = $('.empty-row', tbody);
      if (!match.length) { if (!empty) { empty = document.createElement('tr'); empty.className = 'empty-row'; empty.innerHTML = `<td colspan="20">No result</td>`; tbody.appendChild(empty); } empty.style.display = ''; } else if (empty) empty.style.display = 'none';
      if (info) info.textContent = `Showing ${match.length ? (page - 1) * PAGE + 1 : 0}–${Math.min(page * PAGE, match.length)} of ${match.length}`;
      if (pager) { pager.innerHTML = ''; for (let i = 1; i <= pages; i++) { const b = document.createElement('button'); b.textContent = i; b.className = i === page ? 'active' : ''; b.addEventListener('click', () => { page = i; render(); }); pager.appendChild(b); } }
    }
    search && search.addEventListener('input', () => { page = 1; render(); });
    filter && filter.addEventListener('change', () => { page = 1; render(); });
    $$('th', panel).forEach((th, i) => { if (th.classList.contains('no-sort')) return; th.insertAdjacentHTML('beforeend', '<span class="sort">↕</span>'); th.addEventListener('click', () => {
      dir = sortIdx === i ? -dir : 1; sortIdx = i;
      $$('th', panel).forEach(x => x.classList.remove('asc', 'desc')); th.classList.add(dir > 0 ? 'asc' : 'desc');
      const val = r => { const c = r.children[i]; const v = c ? (c.dataset.v ?? c.textContent.trim()) : ''; const n = parseFloat(String(v).replace(/[^\d.-]/g, '')); return isNaN(n) || /[a-z]/i.test(v) && !/^\d/.test(v) ? v.toLowerCase() : n; };
      rows().sort((a, b) => { const x = val(a), y = val(b); return (x > y ? 1 : x < y ? -1 : 0) * dir; }).forEach(r => tbody.appendChild(r)); render();
    }); });
    panel._render = render; render();
  });

  /* ---------- CRUD modal ---------- */
  const modal = $('#crud-modal'), form = modal && $('form', modal);
  let editing = null;
  function cellText(el) { if (el.tagName === 'SELECT') return el.options[el.selectedIndex] ? el.options[el.selectedIndex].text : ''; if (el.type === 'file') return el.files[0] ? el.files[0].name : ''; return el.value; }
  function setCell(td, el) {
    const v = el.type === 'checkbox' ? (el.checked ? 'yes' : 'no') : el.value, txt = cellText(el); td.dataset.v = v;
    const r = td.dataset.render;
    if (r === 'badge') { const o = el.options ? el.options[el.selectedIndex] : null; td.innerHTML = `<span class="badge ${o && o.dataset.b || 'b-gray'}"></span>`; td.firstChild.textContent = txt; }
    else if (r === 'progress') td.innerHTML = `<div class="mini-progress"><div class="progress${+v < 40 ? ' late' : ''}"><i style="--v:${+v}%"></i></div><b>${+v}%</b></div>`;
    else if (r === 'fk') { td.innerHTML = `<span class="fk">#${v}</span> `; td.appendChild(document.createTextNode(txt.replace(/^#\d+\s*·?\s*/, ''))); }
    else if (r === 'money') td.textContent = (+v).toLocaleString('en-US') + ' TND';
    else if (r === 'bool') td.innerHTML = v === 'yes' ? '<span class="badge b-ok">Yes</span>' : '<span class="badge b-gray">No</span>';
    else if (r === 'who') { const ini = txt.split(' ').map(w => w[0]).join('').slice(0, 2).toUpperCase(); td.innerHTML = `<div class="who"><span class="avatar">${ini}</span><div><b></b></div></div>`; td.querySelector('b').textContent = txt; }
    else td.textContent = txt;
  }
  if (modal) {
    const title = $('.modal-head h3', modal), entity = modal.dataset.entity || 'item';
    $$('[data-add]').forEach(b => b.addEventListener('click', () => { editing = null; form.reset(); $$('.field', form).forEach(f => f.classList.remove('invalid')); title.textContent = 'Add ' + entity; openModal('crud-modal'); }));
    document.addEventListener('click', e => {
      const ed = e.target.closest('.act.edit'); if (!ed) return;
      editing = ed.closest('tr'); form.reset(); $$('.field', form).forEach(f => f.classList.remove('invalid'));
      $$('[name]', form).forEach(el => { const td = editing.querySelector(`[data-f="${el.name}"]`); if (!td || el.type === 'file') return; const v = td.dataset.v ?? td.textContent.trim(); if (el.type === 'checkbox') el.checked = v === 'yes'; else el.value = v; });
      title.textContent = 'Edit ' + entity + ' #' + (editing.querySelector('[data-f="id"]') || {}).textContent; openModal('crud-modal');
    });
    form.addEventListener('ww:valid', () => {
      const tbody = $('[data-table] tbody'); let row = editing;
      if (!row) { const tpl = $('tr:not(.empty-row)', tbody); row = tpl.cloneNode(true); row.style.display = ''; const ids = $$('[data-f="id"]', tbody).map(t => +t.textContent || 0); const idTd = row.querySelector('[data-f="id"]'); if (idTd) idTd.textContent = Math.max(0, ...ids) + 1; tbody.prepend(row); }
      $$('[name]', form).forEach(el => { const td = row.querySelector(`[data-f="${el.name}"]`); if (td) setCell(td, el); });
      row.animate([{ background: '#E3F6F4' }, { background: 'transparent' }], { duration: 1400 });
      closeModal(modal); toast(editing ? entity[0].toUpperCase() + entity.slice(1) + ' updated' : entity[0].toUpperCase() + entity.slice(1) + ' created');
      editing = null; const p = row.closest('[data-table]'); p && p._render && p._render();
    });
  }

  /* ---------- delete with confirmation ---------- */
  let toDelete = null;
  document.addEventListener('click', e => { const d = e.target.closest('.act.del'); if (!d) return; toDelete = d.closest('tr'); const n = $('#confirm-name'); if (n) n.textContent = (toDelete.querySelector('[data-f="id"]') || {}).textContent ? '#' + toDelete.querySelector('[data-f="id"]').textContent : ''; openModal('confirm-modal'); });
  $('#confirm-yes') && $('#confirm-yes').addEventListener('click', () => { if (!toDelete) return; const p = toDelete.closest('[data-table]'); toDelete.remove(); toDelete = null; closeModal('confirm-modal'); toast('Deleted'); p && p._render && p._render(); });

  /* ---------- drawer (view details) ---------- */
  const drawer = $('.drawer');
  function closeDrawer() { if (drawer) drawer.classList.remove('open'); ov && ov.classList.remove('open'); }
  document.addEventListener('click', e => {
    const v = e.target.closest('.act.view'); if (!v || !drawer) return;
    const row = v.closest('tr'), heads = $$('th', row.closest('table')).map(th => th.firstChild.textContent.trim());
    const dl = $('.dl', drawer); dl.innerHTML = '';
    [...row.children].forEach((td, i) => { if (!heads[i] || td.classList.contains('no-dl')) return; const dt = document.createElement('dt'); dt.textContent = heads[i]; const dd = document.createElement('dd'); dd.innerHTML = td.innerHTML; dl.append(dt, dd); });
    const t = $('.drawer-title', drawer); if (t) t.textContent = (drawer.dataset.entity || 'Item') + ' #' + (row.querySelector('[data-f="id"]') || {}).textContent;
    drawer._row = row; drawer.classList.add('open'); ov && ov.classList.add('open');
  });
  $$('[data-close-drawer]').forEach(b => b.addEventListener('click', closeDrawer));
  /* reply thread inside the drawer (reclamation → response) */
  const rf = $('#reply-form');
  rf && rf.addEventListener('ww:valid', () => {
    const ta = $('textarea', rf), th = $('.thread', drawer), b = document.createElement('div'); b.className = 'bubble agent';
    b.innerHTML = '<small>Agent · just now</small>'; b.appendChild(document.createTextNode(ta.value)); th.appendChild(b); ta.value = '';
    const st = $('#reply-status', rf); if (st && drawer._row) { const td = drawer._row.querySelector('[data-f="status"]'); if (td) setCell(td, st); }
    toast('Response sent · client notified');
  });

  /* ---------- charts (pure SVG) ---------- */
  $$('svg[data-line]').forEach(svg => {
    const W = 600, H = 240, P = 28, sets = JSON.parse(svg.dataset.line), cols = JSON.parse(svg.dataset.colors), labels = JSON.parse(svg.dataset.labels || '[]');
    const max = Math.ceil(Math.max(...sets.flat()) / 20) * 20, n = sets[0].length;
    const X = i => P + i * (W - P * 2) / (n - 1), Y = v => H - P - v / max * (H - P * 2);
    let s = '';
    for (let g = 0; g <= 4; g++) { const v = max / 4 * g, y = Y(v); s += `<line x1="${P}" x2="${W - P}" y1="${y}" y2="${y}" stroke="#EEF0F4"/><text x="${P - 6}" y="${y + 4}" font-size="10" text-anchor="end" fill="#8A97A8">${v}</text>`; }
    labels.forEach((l, i) => s += `<text x="${X(i)}" y="${H - 8}" font-size="10" text-anchor="middle" fill="#8A97A8">${l}</text>`);
    sets.forEach((d, k) => { const pts = d.map((v, i) => `${X(i).toFixed(1)},${Y(v).toFixed(1)}`); if (k === 0) s += `<path d="M${pts.join(' L')} L${X(n - 1)},${H - P} L${P},${H - P}Z" fill="${cols[k]}" fill-opacity=".08"/>`; s += `<polyline points="${pts.join(' ')}" fill="none" stroke="${cols[k]}" stroke-width="2.6" stroke-linejoin="round" stroke-linecap="round" pathLength="1" stroke-dasharray="1" stroke-dashoffset="1"><animate attributeName="stroke-dashoffset" to="0" dur="1.2s" fill="freeze"/></polyline>`; const l = d.length - 1; s += `<circle cx="${X(l)}" cy="${Y(d[l])}" r="4.5" fill="${cols[k]}" stroke="#fff" stroke-width="2"/>`; });
    svg.setAttribute('viewBox', `0 0 ${W} ${H}`); svg.innerHTML = s;
  });
  $$('svg[data-donut]').forEach(svg => {
    const vals = JSON.parse(svg.dataset.donut), cols = JSON.parse(svg.dataset.colors), tot = vals.reduce((a, b) => a + b, 0), R = 52, C = 2 * Math.PI * R;
    let off = 0, s = `<circle cx="70" cy="70" r="${R}" fill="none" stroke="#EEF0F4" stroke-width="18"/>`;
    vals.forEach((v, i) => { const len = v / tot * C; s += `<circle cx="70" cy="70" r="${R}" fill="none" stroke="${cols[i]}" stroke-width="18" stroke-dasharray="${len} ${C - len}" stroke-dashoffset="${-off}" transform="rotate(-90 70 70)"/>`; off += len; });
    s += `<text x="70" y="68" text-anchor="middle" font-family="Poppins" font-weight="800" font-size="24" fill="#0B2545">${tot.toLocaleString('en-US')}</text><text x="70" y="86" text-anchor="middle" font-size="10.5" fill="#8A97A8">${svg.dataset.label || ''}</text>`;
    svg.setAttribute('viewBox', '0 0 140 140'); svg.innerHTML = s;
  });
})();

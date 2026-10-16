/* =========================================================
   CẤU HÌNH – Tự động đồng bộ từ WordPress ACF (nếu có)
   ========================================================= */
const WP_DATA = window.WP_CONFIG || {};
const CONFIG = {
  showPlaceholders: WP_DATA.showPlaceholders !== undefined ? WP_DATA.showPlaceholders : true,
  productImages: (WP_DATA.productImages && WP_DATA.productImages.length) ? WP_DATA.productImages : [],
  usageImage: WP_DATA.usageImage || '',
  zoneImages: (WP_DATA.zoneImages && WP_DATA.zoneImages.length) ? WP_DATA.zoneImages : ['', '', '', ''],
  problemImages: (WP_DATA.problemImages && WP_DATA.problemImages.length) ? WP_DATA.problemImages : ['', '', '', ''],
  ingredientImages: (WP_DATA.ingredientImages && WP_DATA.ingredientImages.length) ? WP_DATA.ingredientImages : ['', '', '', ''],
  stepImages: (WP_DATA.stepImages && WP_DATA.stepImages.length) ? WP_DATA.stepImages : ['', '', ''],
  orderImage: WP_DATA.orderImage || '',
  videos: (WP_DATA.videos && WP_DATA.videos.length) ? WP_DATA.videos : [],
  reviews: (WP_DATA.reviews && WP_DATA.reviews.length) ? WP_DATA.reviews : [],
  feedbackImages: (WP_DATA.feedbackImages && WP_DATA.feedbackImages.length) ? WP_DATA.feedbackImages : [],
  feedbackImages34: (WP_DATA.feedbackImages34 && WP_DATA.feedbackImages34.length) ? WP_DATA.feedbackImages34 : [],
  feedbackImages11: (WP_DATA.feedbackImages11 && WP_DATA.feedbackImages11.length) ? WP_DATA.feedbackImages11 : [],
  seedingOrders: (WP_DATA.seedingOrders && WP_DATA.seedingOrders.length) ? WP_DATA.seedingOrders : [],
  certificateImages: (WP_DATA.certificateImages && WP_DATA.certificateImages.length) ? WP_DATA.certificateImages : [],
  commitments: [
    { icon: 'doc', title: 'Đã công bố mỹ phẩm', text: 'Số công bố 60/26/CBMP-NB.' },
    { icon: 'leaf', title: 'Thảo mộc thuần chay', text: 'Bạc hà, trầu không, gừng và cam.' },
    { icon: 'truck', title: 'Freeship toàn quốc', text: 'Miễn phí vận chuyển trên toàn quốc.' },
    { icon: 'phone', title: 'Xác nhận trước khi giao', text: 'Mây Mây gọi điện xác nhận thông tin đơn hàng trước khi giao.' }
  ],
  orderEndpoint: WP_DATA.orderEndpoint || 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec',
  price: WP_DATA.price || 49000,
  listPrice: WP_DATA.listPrice || 89000,
  packages: (WP_DATA.packages && WP_DATA.packages.length) ? WP_DATA.packages : [
    { qty: 1, name: '1 chai 30ml', price: 49000, oldPrice: 89000, tag: 'Tiết kiệm 45%' },
    { qty: 2, name: 'Combo 2 chai 30ml', price: 89000, oldPrice: 178000, tag: 'Bán chạy nhất · Tiết kiệm 50%' },
    { qty: 3, name: 'Combo 3 chai 30ml', price: 129000, oldPrice: 267000, tag: 'Tiết kiệm 52%' }
  ],
  timer: WP_DATA.timer || null
};

const fmt = n => n.toLocaleString('vi-VN') + 'đ';

const esc = v => String(v ?? '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
const STAR = '<svg viewBox="0 0 24 24"><path d="M12 2.8l2.8 5.9 6.4.8-4.7 4.4 1.2 6.4L12 17.2l-5.7 3.1 1.2-6.4-4.7-4.4 6.4-.8z"/></svg>';
const PLAY = '<svg viewBox="0 0 24 24"><path d="M8 5.5v13l11-6.5z"/></svg>';
const stars = r => `<span class="stars" role="img" aria-label="${(r || 0).toFixed(1)} trên 5 sao"><span class="stars-base">${STAR.repeat(5)}</span><span class="stars-fill" style="width:${(r || 0) / 5 * 100}%">${STAR.repeat(5)}</span></span>`;
const ICONS = { doc: 'i-doc', leaf: 'i-leaf', truck: 'i-truck', phone: 'i-phone', shield: 'i-shield', badge: 'i-badge' };

let previewShown = false;
const markPreview = () => {
  if (previewShown) return;
  previewShown = true;
  document.body.insertAdjacentHTML('beforeend', '<div class="preview-pill"><b>Bản xem trước.</b> Các khung "Chờ nội dung" sẽ được thay bằng ảnh, video, đánh giá thật.</div>');
};

/* Lightbox (ảnh) */
const LB = (() => {
  const el = document.getElementById('lightbox'), img = el.querySelector('img'), count = el.querySelector('.lb-count');
  let list = [], i = 0;
  const show = () => {
    img.src = list[i];
    count.textContent = list.length > 1 ? `${i + 1} / ${list.length}` : '';
    el.querySelectorAll('.lb-prev, .lb-next').forEach(b => b.hidden = list.length < 2);
  };
  const close = () => { el.classList.remove('open'); el.setAttribute('aria-hidden', 'true'); document.body.style.overflow = ''; };
  const step = d => { i = (i + d + list.length) % list.length; show(); };
  el.addEventListener('click', e => {
    if (e.target.closest('.lb-prev')) return step(-1);
    if (e.target.closest('.lb-next')) return step(1);
    if (e.target !== img) close();
  });
  document.addEventListener('keydown', e => {
    if (!el.classList.contains('open')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') step(-1);
    if (e.key === 'ArrowRight') step(1);
  });
  return {
    open(l, idx = 0) {
      list = l; i = idx; show();
      el.classList.add('open'); el.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden';
    }
  };
})();

/* Video modal */
const parseVideo = url => {
  let m;
  if ((m = url.match(/(?:youtu\.be\/|v=|shorts\/|embed\/)([\w-]{11})/))) return { type: 'yt', id: m[1], vertical: /shorts\//.test(url), thumb: `https://i.ytimg.com/vi/${m[1]}/hqdefault.jpg` };
  if ((m = url.match(/tiktok\.com\/.*video\/(\d+)/))) return { type: 'tt', id: m[1], vertical: true };
  return { type: 'file', src: url, vertical: true };
};
const VM = (() => {
  const el = document.getElementById('vmodal'), box = el.querySelector('.modal-inner');
  const close = () => { el.classList.remove('open'); el.setAttribute('aria-hidden', 'true'); box.innerHTML = ''; document.body.style.overflow = ''; };
  el.addEventListener('click', e => { if (!e.target.closest('.modal-inner')) close(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape' && el.classList.contains('open')) close(); });
  return {
    open(v) {
      box.className = 'modal-inner' + (v.vertical ? '' : ' wide');
      box.innerHTML = v.type === 'yt'
        ? `<iframe src="https://www.youtube.com/embed/${v.id}?autoplay=1&rel=0&playsinline=1" title="Video review Mây Mây" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>`
        : v.type === 'tt'
          ? `<iframe src="https://www.tiktok.com/embed/v2/${v.id}" title="Video review Mây Mây" allow="autoplay; encrypted-media" allowfullscreen></iframe>`
          : `<video src="${esc(v.src)}" controls autoplay playsinline></video>`;
      el.classList.add('open'); el.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden';
    }
  };
})();

/* Product visuals + hero gallery */
(() => {
  const imgs = CONFIG.productImages.filter(Boolean);
  const heroBox = document.querySelector('[data-visual="hero"]');
  if (!heroBox) return;

  let photo = heroBox.querySelector('img.photo');
  if (!photo && imgs[0]) {
    heroBox.insertAdjacentHTML('afterbegin', `<img class="photo" src="${esc(imgs[0])}" alt="Xịt khử mùi Gừng Cam">`);
    photo = heroBox.querySelector('img.photo');
  } else if (!photo && !imgs.length) {
    if (!heroBox.querySelector('.bottle-render') && !heroBox.querySelector('.render')) {
      heroBox.insertAdjacentHTML('afterbegin', `<svg class="render" viewBox="0 0 240 560" role="img" aria-label="Xịt khử mùi Gừng Cam"><use href="#packshot"/></svg>`);
    }
  }

  if (photo || imgs[0]) {
    heroBox.querySelectorAll('.botanical, .bottle-render, .render, .packshot-img').forEach(b => {
      if (b !== photo) b.remove();
    });
  }

  if (!imgs.length && !photo) return;
  let current = 0;
  heroBox.classList.add('zoomable');
  heroBox.addEventListener('click', () => {
    const list = imgs.length ? imgs : (photo ? [photo.src] : []);
    if (list.length) LB.open(list, current);
  });
  if (imgs.length < 2) return;
  const thumbs = document.getElementById('thumbs');
  if (thumbs) {
    thumbs.hidden = false;
    thumbs.innerHTML = imgs.slice(0, 5).map((s, i) => `<button type="button" class="${i ? '' : 'active'}" data-i="${i}" aria-label="Ảnh ${i + 1}"><img src="${esc(s)}" alt="" loading="lazy"></button>`).join('');
    thumbs.addEventListener('click', e => {
      const b = e.target.closest('button'); if (!b) return;
      current = +b.dataset.i;
      if (photo) photo.src = imgs[current];
      thumbs.querySelectorAll('button').forEach(t => t.classList.toggle('active', t === b));
    });
  }
})();

/* Công dụng: đổi ảnh theo vùng (4 ảnh, chuyển ảnh mềm mại) */
(() => {
  const box = document.querySelector('[data-visual="usage"]'), zones = document.getElementById('zones');
  if (!box || !zones) return;
  const buttons = [...zones.querySelectorAll('button')];
  const imgs = CONFIG.productImages.filter(Boolean);
  const fallback = CONFIG.usageImage || imgs[1] || imgs[0] || '';

  // Get or initialize slides
  let slides = [...box.querySelectorAll('.usage-slide')];
  if (slides.length === 0) {
    const slidesWrap = document.createElement('div');
    slidesWrap.className = 'usage-slides';
    for (let i = 0; i < 4; i++) {
      const slide = document.createElement('div');
      slide.className = `usage-slide${i === 0 ? ' active' : ''}`;
      slide.dataset.slide = String(i);
      const own = (CONFIG.zoneImages || [])[i], src = own || fallback;
      const label = buttons[i] ? buttons[i].textContent.trim() : `Vùng ${i + 1}`;
      slide.innerHTML = src
        ? `<img class="photo" src="${esc(src)}" alt="Xịt khử mùi Mây Mây – ${esc(label)}">`
        : `<svg class="render" viewBox="0 0 240 560" role="img" aria-label="Xịt khử mùi Gừng Cam Mây Mây 30ml"><use href="#packshot"/></svg>`;
      slidesWrap.appendChild(slide);
    }
    box.innerHTML = '';
    box.appendChild(slidesWrap);
    slides = [...slidesWrap.querySelectorAll('.usage-slide')];
  } else {
    // If slides exist in markup, update images if dynamic CONFIG provides specific zone images
    slides.forEach((slide, i) => {
      const own = (CONFIG.zoneImages || [])[i];
      if (own) {
        let img = slide.querySelector('img.photo');
        if (img) {
          img.src = own;
        }
      }
    });
  }

  const show = i => {
    const currentSlides = box.querySelectorAll('.usage-slide');
    currentSlides.forEach((s, idx) => {
      s.classList.toggle('active', idx === i);
    });
    buttons.forEach((b, j) => {
      const isSelected = j === i;
      b.setAttribute('aria-selected', String(isSelected));
      b.classList.toggle('active', isSelected);
    });
  };

  zones.addEventListener('click', e => {
    const b = e.target.closest('button');
    if (b && b.dataset.zone !== undefined) {
      show(+b.dataset.zone);
    }
  });

  show(0);
})();

/* Ảnh thẻ nỗi lo (3:4) */
document.querySelectorAll('[data-problem]').forEach(el => {
  const i = +el.dataset.problem, src = (CONFIG.problemImages || [])[i];
  const title = (el.parentElement && el.parentElement.querySelector('h3')) ? el.parentElement.querySelector('h3').textContent : '';
  if (src) el.innerHTML = `<img src="${esc(src)}" alt="${esc(title)}" loading="lazy">`;
  else if (CONFIG.showPlaceholders) { markPreview(); el.innerHTML = `<div class="ph"><span class="ph-badge">Chờ nội dung</span>Ảnh 3:4<br>${esc(title)}</div>`; }
  else el.remove();
});

/* Ảnh 3 bước sử dụng */
document.querySelectorAll('[data-step]').forEach(el => {
  const src = (CONFIG.stepImages || [])[+el.dataset.step];
  const title = (el.parentElement && el.parentElement.querySelector('h3')) ? el.parentElement.querySelector('h3').textContent : '';
  let existingImg = el.querySelector('img');
  if (existingImg) return;
  if (src) el.insertAdjacentHTML('afterbegin', `<img src="${esc(src)}" alt="${esc(title)}" loading="lazy">`);
  else if (CONFIG.showPlaceholders) { markPreview(); el.insertAdjacentHTML('afterbegin', `<div class="ph"><span class="ph-badge">Chờ nội dung</span>Ảnh 4:5<br>${esc(title)}</div>`); }
  else el.style.aspectRatio = 'auto', el.style.height = '76px', el.style.background = 'transparent';
});

/* Ảnh sản phẩm cạnh form đặt hàng */
(() => {
  const el = document.getElementById('orderVisual');
  if (!el) return;
  const src = CONFIG.orderImage || CONFIG.productImages.filter(Boolean)[0];
  let existingImg = el.querySelector('img');
  if (!existingImg && src) {
    el.querySelectorAll('.botanical, .bottle-render, .render').forEach(b => b.remove());
    el.insertAdjacentHTML('afterbegin', `<img src="${esc(src)}" alt="Xịt khử mùi Gừng Cam Mây Mây 30ml" loading="lazy">`);
  } else if (!existingImg && !src) {
    if (!el.querySelector('.bottle-render') && !el.querySelector('.render')) {
      el.insertAdjacentHTML('afterbegin', `<svg class="render" viewBox="0 0 240 560" role="img" aria-label="Xịt khử mùi Gừng Cam Mây Mây 30ml"><use href="#packshot"/></svg>`);
    }
  } else if (existingImg) {
    el.querySelectorAll('.botanical, .bottle-render, .render, .order-packshot-img').forEach(b => {
      if (b !== existingImg) b.remove();
    });
  }
})();

/* Ảnh minh hoạ thành phần (khung tròn) */
document.querySelectorAll('[data-ing]').forEach(el => {
  const src = (CONFIG.ingredientImages || [])[+el.dataset.ing];
  const title = (el.parentElement && el.parentElement.querySelector('h3')) ? el.parentElement.querySelector('h3').textContent : '';
  if (src) el.innerHTML = `<img src="${esc(src)}" alt="${esc(title)}" loading="lazy">`;
});

/* Video reviews */
(() => {
  const sec = document.getElementById('video-review'), row = document.getElementById('vidRow');
  if (!sec || !row) return;
  const vids = (CONFIG.videos || []).filter(v => v && v.url).map(v => ({ ...v, ...parseVideo(v.url.trim()) }));
  if (!vids.length) {
    sec.remove();
    return;
  }
  row.innerHTML = vids.map((v, i) => {
    const poster = v.poster || v.thumb;
    const media = poster ? `<img src="${esc(poster)}" alt="" loading="lazy">`
      : v.type === 'file' ? `<video src="${esc(v.src)}#t=0.5" muted playsinline preload="metadata"></video>` : '';
    return `<button type="button" class="vid-card" data-i="${i}" aria-label="Xem video ${esc(v.title || i + 1)}">${media}<span class="vid-play">${PLAY}</span><span class="vid-meta">${v.title ? `<b>${esc(v.title)}</b>` : ''}${v.author ? `<span>${esc(v.author)}</span>` : ''}</span></button>`;
  }).join('');
  row.addEventListener('click', e => { const c = e.target.closest('.vid-card'); if (c) VM.open(vids[+c.dataset.i]); });
  const arrows = document.getElementById('vidArrows');
  if (arrows) {
    if (row.children.length <= 4) arrows.remove();
    else arrows.addEventListener('click', e => {
      const b = e.target.closest('button'); if (!b) return;
      row.scrollBy({ left: +b.dataset.dir * (row.firstElementChild.offsetWidth + 16), behavior: 'smooth' });
    });
  }
})();

/* Customer reviews */
(() => {
  const sec = document.getElementById('danh-gia');
  const reviews = CONFIG.reviews.filter(r => r && r.content).map(r => ({ ...r, rating: Math.min(5, Math.max(1, +r.rating || 5)), images: (r.images || []).filter(Boolean) }));
  if (!reviews.length && !CONFIG.showPlaceholders) { sec.remove(); return; }
  const summary = document.getElementById('summary'), list = document.getElementById('reviewList');
  const filtersEl = document.getElementById('filters'), more = document.getElementById('moreReviews');
  const dist = () => [5, 4, 3, 2, 1].map(n => {
    const c = reviews.filter(r => r.rating === n).length, pct = reviews.length ? c / reviews.length * 100 : 0;
    return `<div class="dist-row"><span>${n} sao</span><span class="bar"><i style="width:${pct}%"></i></span><span>${c}</span></div>`;
  }).join('');

  if (!reviews.length) {
    markPreview();
    summary.innerHTML = `<div class="avg">–</div>${stars(0)}<p class="avg-sub">Điểm trung bình tự tính từ đánh giá thật của khách hàng.</p><div class="dist">${dist()}</div>`;
    list.innerHTML = [1, 2, 3, 4].map(() => `<article class="review is-ph"><span class="ph-badge">Chờ nội dung</span><div class="review-head" style="margin-top:18px"><span class="avatar"></span><div style="flex:1"><div class="sk" style="width:45%;margin:0"></div><div class="sk" style="width:28%"></div></div></div>${stars(0)}<div class="sk" style="margin-top:16px"></div><div class="sk"></div><div class="sk" style="width:65%"></div></article>`).join('');
    filtersEl.remove(); more.remove();
    return;
  }

  const avg = reviews.reduce((s, r) => s + r.rating, 0) / reviews.length;
  const avgTxt = avg.toFixed(1).replace('.', ',');
  summary.innerHTML = `<div class="avg">${avgTxt}</div>${stars(avg)}<p class="avg-sub">Dựa trên ${reviews.length} đánh giá</p><div class="dist">${dist()}</div>`;
  const ratingLine = `${stars(avg)}<span><b>${avgTxt}/5</b> · ${reviews.length} đánh giá</span>`;
  const hero = document.getElementById('heroRating'), form = document.getElementById('formRating');
  if (hero) { hero.innerHTML = ratingLine; hero.hidden = false; }
  if (form) { form.innerHTML = ratingLine; form.hidden = false; }

  const FILTERS = [
    ['all', 'Tất cả', () => true],
    ['img', 'Có hình ảnh', r => r.images.length > 0],
    ['5', '5 sao', r => r.rating === 5],
    ['4', '4 sao', r => r.rating === 4]
  ].map(([k, label, fn]) => ({ k, label, fn, n: reviews.filter(fn).length })).filter(f => f.k === 'all' || f.n > 0);
  filtersEl.innerHTML = FILTERS.map((f, i) => `<button type="button" class="chip${i ? '' : ' active'}" data-k="${f.k}">${f.label} (${f.n})</button>`).join('');

  const PAGE = 4;
  let active = FILTERS[0], shown = PAGE;
  const card = (r, idx) => {
    const initial = esc(((r.name || 'K').trim().split(/\s+/).pop() || 'K')[0].toUpperCase());
    return `<article class="review" data-r="${idx}">
      <div class="review-head"><span class="avatar">${r.avatar ? `<img src="${esc(r.avatar)}" alt="">` : initial}</span>
      <div><div class="review-name">${esc(r.name || 'Khách hàng')}</div><div class="review-sub">${[r.location, r.date].filter(Boolean).map(esc).join(' · ')}</div></div></div>
      <div class="review-rate">${stars(r.rating)}${r.verified !== false ? `<span class="verified"><svg class="icon"><use href="#i-check"/></svg>Đã mua hàng</span>` : ''}</div>
      <p class="review-text">${esc(r.content)}</p>
      ${r.images.length ? `<div class="review-imgs">${r.images.map((s, j) => `<button type="button" data-img="${j}" aria-label="Xem ảnh"><img src="${esc(s)}" alt="Ảnh từ khách hàng" loading="lazy"></button>`).join('')}</div>` : ''}
      ${r.tag ? `<span class="review-tag">${esc(r.tag)}</span>` : ''}
    </article>`;
  };
  const render = () => {
    const items = reviews.map((r, i) => [r, i]).filter(([r]) => active.fn(r));
    list.innerHTML = items.slice(0, shown).map(([r, i]) => card(r, i)).join('');
    more.hidden = items.length <= shown;
  };
  filtersEl.addEventListener('click', e => {
    const b = e.target.closest('.chip'); if (!b) return;
    active = FILTERS.find(f => f.k === b.dataset.k); shown = PAGE;
    filtersEl.querySelectorAll('.chip').forEach(c => c.classList.toggle('active', c === b));
    render();
  });
  more.addEventListener('click', () => { shown += PAGE; render(); });
  list.addEventListener('click', e => {
    const b = e.target.closest('[data-img]'); if (!b) return;
    LB.open(reviews[+b.closest('.review').dataset.r].images, +b.dataset.img);
  });
  render();
})();

/* Feedback screenshots (2 hàng slider) */
(() => {
  const sec = document.getElementById('feedback');
  const slider34 = document.getElementById('fbSlider34');
  const slider11 = document.getElementById('fbSlider11');
  if (!sec) return;

  let list34 = (CONFIG.feedbackImages34 && CONFIG.feedbackImages34.length) ? CONFIG.feedbackImages34.filter(Boolean) : [];
  let list11 = (CONFIG.feedbackImages11 && CONFIG.feedbackImages11.length) ? CONFIG.feedbackImages11.filter(Boolean) : [];
  const legacyFbs = (CONFIG.feedbackImages && CONFIG.feedbackImages.length) ? CONFIG.feedbackImages.filter(Boolean) : [];

  if (!list34.length && !list11.length && legacyFbs.length) {
    const half = Math.ceil(legacyFbs.length / 2);
    list34 = legacyFbs.slice(0, half);
    list11 = legacyFbs.slice(half);
  }

  // Đảm bảo mỗi hàng đủ 4 ảnh hiển thị to đẹp trên 1 hàng desktop
  const default34 = [
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-du-lich.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-hoi-duoi-canh-tay.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-cho-nu.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-hoi-nach-cho-nam.png'
  ];
  default34.forEach(src => {
    if (list34.length < 4 && !list34.includes(src)) list34.push(src);
  });

  const default11 = [
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/1.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/2.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/3.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/sau-khi-dung-xit-khu-mui-1.png'
  ];
  default11.forEach(src => {
    if (list11.length < 4 && !list11.includes(src)) list11.push(src);
  });

  const allImgs = [...list34, ...list11];
  if (!allImgs.length && !CONFIG.showPlaceholders) {
    sec.remove();
    return;
  }

  if (slider34) {
    if (list34.length) {
      slider34.innerHTML = list34.map((s, i) => `
        <button type="button" class="fb-card" data-idx="${i}" aria-label="Xem feedback dọc ${i + 1}">
          <img src="${esc(s)}" alt="Feedback tin nhắn ${i + 1}" loading="lazy">
        </button>`).join('');
    } else if (CONFIG.showPlaceholders) {
      markPreview();
      slider34.innerHTML = Array.from({ length: 6 }, (_, i) => `
        <div class="ph fb-card">
          <span class="ph-badge">Chờ nội dung</span>
          <div class="ph-text">Feedback 3:4 #${i + 1}</div>
        </div>`).join('');
    }
    slider34.addEventListener('click', e => {
      const b = e.target.closest('button.fb-card');
      if (b && list34.length) {
        LB.open(list34, +b.dataset.idx);
      }
    });
  }

  if (slider11) {
    if (list11.length) {
      slider11.innerHTML = list11.map((s, i) => `
        <button type="button" class="fb-card" data-idx="${i}" aria-label="Xem hình ảnh feedback ${i + 1}">
          <img src="${esc(s)}" alt="Hình ảnh feedback ${i + 1}" loading="lazy">
        </button>`).join('');
    } else if (CONFIG.showPlaceholders) {
      markPreview();
      slider11.innerHTML = Array.from({ length: 6 }, (_, i) => `
        <div class="ph fb-card">
          <span class="ph-badge">Chờ nội dung</span>
          <div class="ph-text">Ảnh thực tế 1:1 #${i + 1}</div>
        </div>`).join('');
    }
    slider11.addEventListener('click', e => {
      const b = e.target.closest('button.fb-card');
      if (b && list11.length) {
        LB.open(list11, +b.dataset.idx);
      }
    });
  }
})();

/* Certificates (Giấy công bố & Tem chống hàng giả) */
(() => {
  const certs = document.getElementById('certs');
  if (!certs) return;

  const certItems = (CONFIG.certificateItems && CONFIG.certificateItems.length) ? CONFIG.certificateItems : [
    { id: 'doc', title: 'Giấy công bố mỹ phẩm', image: (CONFIG.certificateImages && CONFIG.certificateImages[0]) || '' },
    { id: 'stamp', title: 'Tem chống hàng giả', image: (CONFIG.certificateImages && CONFIG.certificateImages[1]) || '' }
  ];

  const validImgs = certItems.map(item => item.image).filter(Boolean);

  certs.innerHTML = certItems.map((item, idx) => {
    if (item.image) {
      const imgIdx = validImgs.indexOf(item.image);
      return `<button type="button" class="cert-card has-img reveal" data-i="${imgIdx >= 0 ? imgIdx : idx}" aria-label="Xem ${esc(item.title)}">
        <div class="cert-img-wrap"><img src="${esc(item.image)}" alt="${esc(item.title)}" loading="lazy"></div>
        <div class="cert-caption"><b>${esc(item.title)}</b></div>
      </button>`;
    } else if (CONFIG.showPlaceholders) {
      markPreview();
      return `<div class="ph cert-ph reveal">
        <span class="ph-badge">Chờ nội dung</span>
        <div class="ph-content">
          <svg class="icon" style="width:36px;height:36px;margin:0 auto 10px;opacity:.5;"><use href="#i-doc"/></svg>
          <b>${esc(item.title)}</b>
          <small style="display:block;margin-top:4px;opacity:.65;">Ảnh dọc 3:4</small>
        </div>
      </div>`;
    }
    return '';
  }).filter(Boolean).join('');

  if (!certs.innerHTML.trim()) {
    certs.remove();
  } else if (validImgs.length) {
    certs.addEventListener('click', e => {
      const b = e.target.closest('button.has-img');
      if (b && b.dataset.i !== undefined) {
        LB.open(validImgs, +b.dataset.i);
      }
    });
  }
})();

/* Countdown – flash sale tùy chỉnh từ cấu hình hoặc ACF */
(() => {
  const el = document.getElementById('timer');
  if (!el) return;
  const cfg = (CONFIG.timer && typeof CONFIG.timer === 'object') ? CONFIG.timer : {};
  if (cfg.enable === false) {
    const block = document.getElementById('timerBlock') || el.closest('.timer');
    if (block) block.style.display = 'none';
    return;
  }
  const titleEl = document.getElementById('timerTitle');
  if (titleEl && cfg.title) {
    titleEl.textContent = cfg.title;
  }

  const type = cfg.type || 'hours';
  const hours = Math.max(0.1, parseFloat(cfg.hours) || 8);
  const targetDateStr = cfg.datetime || '';

  const getEndTime = () => {
    if (type === 'datetime' && targetDateStr) {
      const parsed = new Date(String(targetDateStr).replace(/-/g, '/')).getTime();
      if (!isNaN(parsed) && parsed > 0) return parsed;
    }
    if (type === 'daily') {
      const end = new Date();
      end.setHours(23, 59, 59, 999);
      return end.getTime();
    }
    // Mặc định 'hours': lưu vào localStorage để giữ đồng hồ nhất quán mỗi khi khách tải lại trang
    const storageKey = 'lx_flash_end_' + hours;
    const now = Date.now();
    const durationMs = hours * 3600 * 1000;
    let stored = 0;
    try { stored = parseInt(localStorage.getItem(storageKey), 10); } catch (e) {}
    if (!stored || isNaN(stored) || stored <= now || stored > (now + durationMs + 60000)) {
      stored = now + durationMs;
      try { localStorage.setItem(storageKey, String(stored)); } catch (e) {}
    }
    return stored;
  };

  let endMs = getEndTime();
  const storageKey = 'lx_flash_end_' + hours;
  const pad = n => String(n).padStart(2, '0');

  const tick = () => {
    const now = Date.now();
    let d = Math.max(0, endMs - now);
    if (d <= 0 && type === 'hours') {
      endMs = now + (hours * 3600 * 1000);
      try { localStorage.setItem(storageKey, String(endMs)); } catch (e) {}
      d = Math.max(0, endMs - now);
    }
    const h = Math.floor(d / 3600000);
    const m = Math.floor((d % 3600000) / 60000);
    const s = Math.floor((d % 60000) / 1000);
    el.textContent = `${pad(h)}:${pad(m)}:${pad(s)}`;
  };
  tick();
  setInterval(tick, 1000);
})();

/* Packages fallback */
(() => {
  const wrap = document.getElementById('packages');
  if (!wrap) return;
  wrap.innerHTML = CONFIG.packages.map((p, i) => `
    <label class="pkg${i === 0 ? ' active' : ''}">
      <input type="radio" name="package" value="${p.qty}"${i === 0 ? ' checked' : ''}>
      <span class="dot"></span>
      <span class="pkg-name">${p.name}</span>
      <span class="pkg-price">${fmt(p.qty * CONFIG.price)}<s>${fmt(p.qty * CONFIG.listPrice)}</s></span>
    </label>`).join('');
  const total = document.getElementById('total');
  wrap.addEventListener('change', e => {
    wrap.querySelectorAll('.pkg').forEach(o => o.classList.toggle('active', o.contains(e.target)));
    if (total) total.textContent = fmt(+e.target.value * CONFIG.price);
  });
})();

/* Contact Form 7 Integration */
(() => {
  const updateCf7Package = () => {
    const totalEl = document.getElementById('cf7Total');
    const checked = document.querySelector('.packages-wrap input[name="package"]:checked');
    if (!checked) {
      if (totalEl) totalEl.textContent = '49.000đ';
      return;
    }
    const val = checked.value || '';
    if (totalEl) {
      if (val.includes('129.000') || val.includes('Combo 3') || val.includes('3 chai')) {
        totalEl.textContent = '129.000đ';
      } else if (val.includes('Combo 2') || val.includes('2 chai') || (val.includes('89.000') && !val.includes('1 chai'))) {
        totalEl.textContent = '89.000đ';
      } else {
        totalEl.textContent = '49.000đ';
      }
    }
    document.querySelectorAll('.packages-wrap .wpcf7-list-item').forEach(item => {
      item.classList.toggle('active', item.contains(checked));
    });
  };

  document.addEventListener('change', e => {
    if (e.target && e.target.name === 'package') {
      updateCf7Package();
    }
  });

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', updateCf7Package);
  } else {
    updateCf7Package();
  }

  // Anti double-click for submit button
  document.addEventListener('wpcf7submit', () => {
    const btn = document.getElementById('submitBtn');
    if (btn) {
      btn.disabled = true;
      setTimeout(() => { btn.disabled = false; }, 4000);
    }
  }, false);

  // Success event handling
  document.addEventListener('wpcf7mailsent', e => {
    let name = '';
    let phone = '';
    if (e.detail && e.detail.inputs) {
      e.detail.inputs.forEach(item => {
        if (item.name === 'your-name' || item.name === 'name') name = item.value;
        if (item.name === 'your-phone' || item.name === 'phone') phone = item.value;
      });
    }
    if (!name) {
      const el = document.getElementById('fName');
      if (el) name = el.value;
    }
    if (!phone) {
      const el = document.getElementById('fPhone');
      if (el) phone = el.value;
    }

    const sName = document.getElementById('sName');
    const sPhone = document.getElementById('sPhone');
    if (sName && name) sName.textContent = name;
    if (sPhone && phone) sPhone.textContent = phone;

    const formContent = document.getElementById('formContent');
    const success = document.getElementById('success');
    if (formContent) formContent.style.display = 'none';
    if (success) {
      success.style.display = 'block';
      success.classList.add('show');
      success.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  }, false);
})();

/* Order form (Static fallback) */
(() => {
  const form = document.getElementById('orderForm');
  if (!form) return;
  const rules = {
    fName: v => v.trim().length >= 2,
    fPhone: v => /^0\d{9}$/.test(v.replace(/[\s.-]/g, '')),
    fAddress: v => v.trim().length >= 8
  };
  const check = id => {
    const el = document.getElementById(id);
    if (!el || !rules[id]) return true;
    const ok = rules[id](el.value);
    el.closest('.field').classList.toggle('invalid', !ok);
    return ok;
  };
  Object.keys(rules).forEach(id => {
    const el = document.getElementById(id);
    if (el) {
      el.addEventListener('input', () => {
        if (el.closest('.field').classList.contains('invalid')) check(id);
      });
    }
  });

  form.addEventListener('submit', async e => {
    e.preventDefault();
    if (Object.keys(rules).map(check).includes(false)) {
      form.querySelector('.invalid input, .invalid textarea').focus();
      return;
    }
    const f = form.elements;
    const qty = (f.package && f.package.value) ? +f.package.value : 1;
    const data = {
      name: f.name.value.trim(),
      phone: f.phone.value.replace(/[\s.-]/g, ''),
      address: f.address.value.trim(),
      product: 'Xịt Khử Mùi Gừng Cam Mây Mây 30ml',
      quantity: qty,
      total: qty * CONFIG.price,
      source: location.href,
      time: new Date().toISOString()
    };
    const btn = document.getElementById('submitBtn');
    if (btn) { btn.disabled = true; btn.textContent = 'Đang gửi...'; }
    if (CONFIG.orderEndpoint) {
      try {
        await fetch(CONFIG.orderEndpoint, { method: 'POST', mode: 'no-cors', headers: { 'Content-Type': 'text/plain;charset=utf-8' }, body: JSON.stringify(data) });
      } catch (err) { console.error('Gửi đơn thất bại', err); }
    }
    const sName = document.getElementById('sName');
    const sPhone = document.getElementById('sPhone');
    if (sName) sName.textContent = data.name;
    if (sPhone) sPhone.textContent = data.phone;
    const formContent = document.getElementById('formContent');
    const success = document.getElementById('success');
    if (formContent) formContent.style.display = 'none';
    if (success) {
      success.style.display = 'block';
      success.classList.add('show');
    }
  });
})();

/* FAQ */
(() => {
  const list = document.getElementById('faq');
  if (!list) return;

  if (!list.children.length) {
    const faqs = [
      ['Xịt khử mùi Mây Mây dùng được cho những vùng nào?', 'Sản phẩm dùng để chăm sóc mùi vùng nách, vùng chân và cơ thể; đồng thời có thể xịt khử mùi vùng tiểu EVA sau sinh. Không xịt vào mắt, niêm mạc hoặc vùng da tổn thương.'],
      ['Sau khi xịt bao lâu thì khô?', 'Sản phẩm khô thoáng khoảng 30 giây. Bạn chỉ cần để da khô tự nhiên rồi mặc quần áo.'],
      ['Thành phần của sản phẩm là gì?', 'Thành phần thảo mộc thuần chay từ bạc hà, trầu không, gừng và cam, cho hương thảo mộc thanh mát, dễ chịu.'],
      ['Cách sử dụng như thế nào?', 'Bước 1: Lắc nhẹ chai xịt. Bước 2: Xịt lên vùng da, cách khoảng 10 – 15cm. Bước 3: Để da khô tự nhiên sau đó mặc quần áo.'],
      ['Giá bán và phí vận chuyển?', 'Chương trình flash sale: 49.000đ/chai 30ml (giá niêm yết 89.000đ), freeship toàn quốc.'],
      ['Hạn sử dụng và cách bảo quản?', 'Hạn sử dụng 02 năm. Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp.'],
      ['Đặt hàng xong thì sao?', 'Sau khi bạn điền form, Mây Mây sẽ liên hệ qua số điện thoại để xác nhận đơn. Vui lòng kiểm tra kỹ họ tên, số điện thoại và địa chỉ nhận hàng trước khi xác nhận.']
    ];
    list.innerHTML = faqs.map(([q, a], i) => `
      <div class="faq-item ${i === 0 ? 'open' : ''}">
        <button class="faq-q" type="button" aria-expanded="${i === 0 ? 'true' : 'false'}">
          <span>${q}</span>
          <span class="pm" aria-hidden="true"></span>
        </button>
        <div class="faq-a" style="${i === 0 ? 'max-height:none;' : ''}"><p>${a}</p></div>
      </div>`).join('');
  }

  list.addEventListener('click', e => {
    const btn = e.target.closest('.faq-q'); if (!btn) return;
    const item = btn.parentElement, a = item.querySelector('.faq-a');
    if (!a) return;
    const open = item.classList.toggle('open');
    btn.setAttribute('aria-expanded', String(open));
    if (open) {
      a.style.maxHeight = a.scrollHeight + 'px';
    } else {
      a.style.maxHeight = '0px';
    }
  });
})();

/* Reveal on scroll */
(() => {
  const initReveal = () => {
    const els = document.querySelectorAll('.reveal');
    document.querySelectorAll('.hero .reveal').forEach(el => el.classList.add('in'));

    if (!('IntersectionObserver' in window)) {
      els.forEach(el => el.classList.add('in'));
      return;
    }
    const io = new IntersectionObserver(entries => entries.forEach(en => {
      if (en.isIntersecting) {
        en.target.classList.add('in');
        io.unobserve(en.target);
      }
    }), { threshold: 0.1, rootMargin: '0px 0px 50px 0px' });
    els.forEach(el => io.observe(el));

    // Fallback: Reveal all elements after 1.2s
    setTimeout(() => {
      document.querySelectorAll('.reveal:not(.in)').forEach(el => el.classList.add('in'));
    }, 1200);
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initReveal);
  } else {
    initReveal();
  }
})();

/* Mobile sticky bar: hiện sau hero, ẩn khi tới form */
(() => {
  const sticky = document.getElementById('sticky');
  const heroEl = document.querySelector('.hero');
  const orderEl = document.getElementById('dat-hang');
  if (!sticky || !heroEl || !orderEl) return;
  let pastHero = false, atOrder = false;
  const update = () => sticky.classList.toggle('show', pastHero && !atOrder);
  new IntersectionObserver(([e]) => { pastHero = !e.isIntersecting; update(); }).observe(heroEl);
  new IntersectionObserver(([e]) => { atOrder = e.isIntersecting; update(); }, { threshold: 0.1 }).observe(orderEl);
})();

const yearEl = document.getElementById('year');
if (yearEl) yearEl.textContent = new Date().getFullYear();

/* Seeding Live Orders Toast (Góc trái màn hình) */
(() => {
  const toast = document.getElementById('orderToast');
  if (!toast) return;

  const orders = (CONFIG.seedingOrders && CONFIG.seedingOrders.length) ? CONFIG.seedingOrders : [
    { name: 'Chị Thu Trang', city: 'Hà Nội', pkg: 'Combo 2 chai 30ml', time: 'Vừa xong' },
    { name: 'Anh Tuấn Anh', city: 'TP.HCM', pkg: 'Combo 2 chai 30ml', time: '1 phút trước' },
    { name: 'Chị Mai Lan', city: 'Đà Nẵng', pkg: 'Combo 3 chai 30ml', time: '2 phút trước' },
    { name: 'Anh Hoàng Long', city: 'Hải Phòng', pkg: '1 chai 30ml', time: '2 phút trước' },
    { name: 'Chị Bích Ngọc', city: 'Bình Dương', pkg: 'Combo 2 chai 30ml', time: '3 phút trước' },
    { name: 'Anh Quang Minh', city: 'Bắc Ninh', pkg: 'Combo 3 chai 30ml', time: '3 phút trước' },
    { name: 'Chị Hồng Hạnh', city: 'Cần Thơ', pkg: 'Combo 2 chai 30ml', time: '4 phút trước' },
    { name: 'Chị Thanh Thảo', city: 'Quảng Ninh', pkg: 'Combo 2 chai 30ml', time: '5 phút trước' },
    { name: 'Anh Đức Huy', city: 'Đồng Nai', pkg: 'Combo 2 chai 30ml', time: '5 phút trước' }
  ];

  let currentIdx = 0;
  let timerId = null;
  let hideTimerId = null;
  let isDismissed = false;

  const buyerEl = document.getElementById('toastBuyer');
  const pkgEl = document.getElementById('toastPackage');
  const timeEl = document.getElementById('toastTime');
  const closeBtn = document.getElementById('orderToastClose');

  if (closeBtn) {
    closeBtn.addEventListener('click', e => {
      e.stopPropagation();
      toast.classList.remove('show');
      isDismissed = true;
      clearTimeout(timerId);
      clearTimeout(hideTimerId);
      // Dismiss for 2 minutes
      setTimeout(() => { isDismissed = false; scheduleNext(8000); }, 120000);
    });
  }

  // Click on toast smoothly scrolls to order section
  toast.addEventListener('click', () => {
    const orderSec = document.getElementById('dat-hang');
    if (orderSec) {
      orderSec.scrollIntoView({ behavior: 'smooth' });
    }
  });

  const showToast = () => {
    if (isDismissed) return;
    const item = orders[currentIdx];
    currentIdx = (currentIdx + 1) % orders.length;

    if (buyerEl) buyerEl.textContent = `${item.name} (${item.city})`;
    if (pkgEl) pkgEl.textContent = item.pkg;
    if (timeEl) timeEl.textContent = item.time;

    toast.style.display = 'flex';
    requestAnimationFrame(() => {
      toast.classList.add('show');
    });

    hideTimerId = setTimeout(() => {
      toast.classList.remove('show');
      const nextDelay = 7000 + Math.floor(Math.random() * 5000);
      scheduleNext(nextDelay);
    }, 4500);
  };

  const scheduleNext = delay => {
    clearTimeout(timerId);
    timerId = setTimeout(showToast, delay);
  };

  // Start after 3.5 seconds
  scheduleNext(3500);
})();
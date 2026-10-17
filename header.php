<?php
/**
 * Header template for Landing Xịt Khử Mùi Theme
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="theme-color" content="#ffa059">
<?php wp_head(); ?>
</head>
<body <?php body_class('lx_landing_theme'); ?>>
<?php wp_body_open(); ?>

<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <!-- Line icons -->
    <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="M4.5 12.5l4.5 4.5L19.5 6.5"/></symbol>
    <symbol id="i-timer" viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2.5 2.5M9.5 2.5h5"/></symbol>
    <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 3l7.5 3v5.5c0 4.6-3.2 8.3-7.5 9.5-4.3-1.2-7.5-4.9-7.5-9.5V6L12 3z"/><path d="M8.8 12.2l2.2 2.2 4.2-4.4"/></symbol>
    <symbol id="i-leaf" viewBox="0 0 24 24"><path d="M5 19c0-8 5-13.5 15-14-.4 9.5-6 14.5-13.5 14.5"/><path d="M5 19c3.5-4.5 6.5-7 10-9"/></symbol>
    <symbol id="i-spray" viewBox="0 0 24 24"><rect x="7" y="10" width="8" height="11" rx="2"/><path d="M9 10V7h4v3M13 7.5h3M19 5.5v.01M19 8.5v.01M21 7v.01"/></symbol>
    <symbol id="i-truck" viewBox="0 0 24 24"><path d="M2.5 6.5h11v9h-11zM13.5 9.5h4l3 3v3h-7"/><circle cx="6.5" cy="17.5" r="1.8"/><circle cx="17" cy="17.5" r="1.8"/></symbol>
    <symbol id="i-alert" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7.5v5.5M12 16.2v.01"/></symbol>
    <symbol id="i-close" viewBox="0 0 24 24"><path d="M6 6l12 12M18 6L6 18"/></symbol>

    <symbol id="i-doc" viewBox="0 0 24 24"><path d="M6 2.5h8l4 4v15H6z"/><path d="M14 2.5v4h4M9 12h6M9 15.5h6M9 8.5h2"/></symbol>
    <symbol id="i-phone" viewBox="0 0 24 24"><path d="M5 3.5h3.5l1.5 4.5-2.2 1.3a11 11 0 0 0 6.9 6.9L16 14l4.5 1.5V19a1.5 1.5 0 0 1-1.6 1.5C10.7 20 4 13.3 3.5 5.1A1.5 1.5 0 0 1 5 3.5z"/></symbol>
    <symbol id="i-zalo" viewBox="0 0 50 50">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.779 43.589C10.102 43.846 13.006 43.184 15.068 42.183C24.023 47.132 38.02 46.895 46.492 41.473C46.821 40.98 47.128 40.468 47.413 39.936C49.106 36.778 50 33.22 50 27.132V22.718C50 16.629 49.106 13.071 47.413 9.913C45.738 6.754 43.246 4.281 40.088 2.588C36.929 0.894 33.371 0 27.283 0H22.85C17.664 0 14.298 0.653 11.47 1.899C11.315 2.037 11.164 2.178 11.015 2.321C2.717 10.32 2.087 27.659 9.123 37.078C9.131 37.092 9.139 37.106 9.149 37.12C10.233 38.719 9.187 41.515 7.551 43.152C7.284 43.399 7.379 43.551 7.779 43.589Z" fill="#ffffff"/>
      <path d="M20.563 17H10.838V19.085H17.587L10.933 27.332C10.724 27.635 10.573 27.919 10.573 28.564V29.095H19.748C20.203 29.095 20.582 28.716 20.582 28.261V27.142H13.492L19.748 19.294C19.843 19.18 20.013 18.972 20.089 18.877L20.127 18.82C20.487 18.289 20.563 17.834 20.563 17.284V17Z" fill="#0068FF"/>
      <path d="M32.942 29.095H34.326V17H32.24V28.393C32.24 28.773 32.544 29.095 32.942 29.095Z" fill="#0068FF"/>
      <path d="M25.814 19.692C23.198 19.692 21.075 21.816 21.075 24.432C21.075 27.048 23.198 29.171 25.814 29.171C28.43 29.171 30.553 27.048 30.553 24.432C30.572 21.816 28.449 19.692 25.814 19.692ZM25.814 27.218C24.279 27.218 23.027 25.967 23.027 24.432C23.027 22.896 24.279 21.645 25.814 21.645C27.349 21.645 28.601 22.896 28.601 24.432C28.601 25.967 27.369 27.218 25.814 27.218Z" fill="#0068FF"/>
      <path d="M40.487 19.616C37.852 19.616 35.71 21.758 35.71 24.393C35.71 27.029 37.852 29.171 40.487 29.171C43.122 29.171 45.264 27.029 45.264 24.393C45.264 21.758 43.122 19.616 40.487 19.616ZM40.487 27.218C38.932 27.218 37.681 25.967 37.681 24.412C37.681 22.858 38.932 21.607 40.487 21.607C42.041 21.607 43.292 22.858 43.292 24.412C43.292 25.967 42.041 27.218 40.487 27.218Z" fill="#0068FF"/>
      <path d="M29.456 29.094H30.575V19.957H28.622V28.279C28.622 28.715 29.001 29.094 29.456 29.094Z" fill="#0068FF"/>
    </symbol>
    <symbol id="i-chev-l" viewBox="0 0 24 24"><path d="M15 5l-7 7 7 7"/></symbol>
    <symbol id="i-chev-r" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></symbol>
    <symbol id="i-badge" viewBox="0 0 24 24"><path d="M12 2.5l2.4 1.8 3-.1.9 2.9 2.4 1.8-1 2.8 1 2.9-2.4 1.7-.9 2.9-3-.1L12 21l-2.4-1.8-3 .1-.9-2.9-2.4-1.7 1-2.9-1-2.8L5.7 7.1l.9-2.9 3 .1z"/><path d="M8.8 12l2.2 2.2 4.2-4.4"/></symbol>

    <!-- Botanical line art -->
    <symbol id="b-mint" viewBox="0 0 84 84"><g fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M42 80V22"/><path d="M42 50c-4-12-16-18-28-16 2 12 14 20 28 16z"/><path d="M42 50c-6-6-14-10-22-12"/><path d="M42 40c4-12 16-18 28-16-2 12-14 20-28 16z"/><path d="M42 40c6-6 14-10 22-12"/><path d="M42 24c-3-8-1-16 0-20 1 4 3 12 0 20z"/></g></symbol>
    <symbol id="b-betel" viewBox="0 0 84 84"><g fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M42 76C22 62 12 46 14 32c2-12 14-18 28-10 14-8 26-2 28 10 2 14-8 30-28 44z"/><path d="M42 22v54"/><path d="M42 36c-8-4-16-4-22 0M42 36c8-4 16-4 22 0M42 50c-8-3-14-2-20 2M42 50c8-3 14-2 20 2M42 62c-5-2-10-1-13 2M42 62c5-2 10-1 13 2"/><path d="M42 22c0-6 2-12 6-16"/></g></symbol>
    <symbol id="b-ginger" viewBox="0 0 84 84"><g fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 54c-2-8 4-14 12-12 2-8 10-12 16-8 4-6 14-6 18 0 8-2 14 6 10 14 6 4 4 14-4 16-4 6-12 6-16 2-6 4-14 4-18-2-8 2-16-2-18-10z"/><path d="M24 42c2-6 0-12-4-16M40 34c0-8 2-14 6-18M58 34c2-6 6-10 12-12"/><path d="M26 58c4 1 8 0 10-2M48 56c3 2 8 2 10 0"/></g></symbol>
    <symbol id="b-orange" viewBox="0 0 84 84"><g fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="42" cy="44" r="30"/><circle cx="42" cy="44" r="25"/><path d="M42 44V20M42 44l17 -17M42 44h24M42 44l17 17M42 44v24M42 44L25 61M42 44H18M42 44L25 27"/><circle cx="42" cy="44" r="3"/></g></symbol>

    <!-- Packshot render: chai nâu hổ phách, vòi xịt đen (thay bằng ảnh thật qua CONFIG.productImages) -->
    <linearGradient id="g-amber" x1="0" x2="1">
      <stop offset="0" stop-color="#4f2406"/><stop offset=".1" stop-color="#8f4a10"/><stop offset=".28" stop-color="#c7721f"/><stop offset=".5" stop-color="#b8661a"/><stop offset=".82" stop-color="#7c3d0c"/><stop offset="1" stop-color="#4a2205"/>
    </linearGradient>
    <linearGradient id="g-black" x1="0" x2="1">
      <stop offset="0" stop-color="#050505"/><stop offset=".3" stop-color="#3b3b3b"/><stop offset=".55" stop-color="#151515"/><stop offset="1" stop-color="#000"/>
    </linearGradient>
    <linearGradient id="g-label" x1="0" x2="1">
      <stop offset="0" stop-color="#eadcc7"/><stop offset=".18" stop-color="#fffaf2"/><stop offset=".72" stop-color="#fbf2e5"/><stop offset="1" stop-color="#e2d0b8"/>
    </linearGradient>
    <radialGradient id="g-shadow"><stop offset="0" stop-color="#000" stop-opacity=".3"/><stop offset="1" stop-color="#000" stop-opacity="0"/></radialGradient>
    <symbol id="packshot" viewBox="0 0 240 560">
      <ellipse cx="120" cy="542" rx="98" ry="13" fill="url(#g-shadow)"/>
      <rect x="98" y="18" width="44" height="48" rx="9" fill="url(#g-black)"/>
      <rect x="138" y="30" width="14" height="9" rx="3" fill="#1b1b1b"/>
      <rect x="84" y="62" width="72" height="48" rx="7" fill="url(#g-black)"/>
      <path d="M94 66v40M104 66v40M114 66v40M124 66v40M134 66v40M144 66v40" stroke="#2c2c2c" stroke-width="1.2"/>
      <rect x="96" y="106" width="48" height="16" fill="#5a2a07"/>
      <path d="M40 176c0-32 24-54 56-54h48c32 0 56 22 56 54v334c0 16-12 28-28 28H68c-16 0-28-12-28-28z" fill="url(#g-amber)"/>
      <rect x="51" y="168" width="9" height="352" rx="4.5" fill="#fff" opacity=".26"/>
      <rect x="50" y="214" width="140" height="290" rx="4" fill="url(#g-label)"/>
      <rect x="72" y="230" width="96" height="30" rx="3" fill="#ef8a2a"/>
      <text x="120" y="250" text-anchor="middle" font-family="Be Vietnam Pro, sans-serif" font-size="12" font-weight="800" fill="#fff" letter-spacing=".4">HOME CARE</text>
      <text x="120" y="282" text-anchor="middle" font-family="Be Vietnam Pro, sans-serif" font-size="10" font-weight="700" fill="#6b3a12" letter-spacing="1.5">XỊT</text>
      <text x="120" y="306" text-anchor="middle" font-family="Be Vietnam Pro, sans-serif" font-size="21" font-weight="800" fill="#5b2c0a">KHỬ MÙI</text>
      <text x="120" y="330" text-anchor="middle" font-family="Be Vietnam Pro, sans-serif" font-size="21" font-weight="800" fill="#e5711a">GỪNG CAM</text>
      <text x="120" y="351" text-anchor="middle" font-family="Lora, Georgia, serif" font-style="italic" font-size="13" fill="#6b3a12">mây mây</text>
      <circle cx="98" cy="398" r="17" fill="#f39a2e"/>
      <circle cx="98" cy="398" r="13" fill="#ffc46b"/>
      <path d="M98 385v26M85 398h26M89 389l18 18M107 389l-18 18" stroke="#f39a2e" stroke-width="1.4"/>
      <path d="M124 404c-2-8 4-13 10-11 2-6 9-8 13-4 5-3 11 1 9 7 5 3 3 10-3 11-3 5-10 5-13 1-5 3-12 2-14-3z" fill="#d9a35c"/>
      <path d="M146 386c2-6 6-9 11-9" stroke="#ffa059" stroke-width="2" fill="none" stroke-linecap="round"/>
      <rect x="50" y="446" width="140" height="20" fill="#d85c18"/>
      <text x="120" y="459.5" text-anchor="middle" font-family="Be Vietnam Pro, sans-serif" font-size="8.2" font-weight="700" fill="#fff" letter-spacing=".8">THẢO MỘC THUẦN CHAY</text>
      <text x="120" y="490" text-anchor="middle" font-family="Be Vietnam Pro, sans-serif" font-size="10" font-weight="600" fill="#6b3a12">30ml</text>
    </symbol>
  </defs>
</svg>

<div class="announce">Flash sale <b>49.000đ</b> (niêm yết 89.000đ) · Freeship toàn quốc</div>

<header class="header">
  <div class="container">
    <a href="#top" class="logo">Mây Mây</a>
    <nav class="nav">
      <a href="#thanh-phan">Thành phần</a>
      <a href="#cong-dung">Công dụng</a>
      <a href="#cach-dung">Cách dùng</a>
      <a href="#danh-gia">Đánh giá</a>
      <a href="#hoi-dap">Hỏi đáp</a>
    </nav>
    <a href="#dat-hang" class="btn">Mua ngay</a>
  </div>
</header>

<main id="top">

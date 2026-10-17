<?php
/**
 * Hero Section Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$product_img       = lx_get_image_url('lx_hero_product_image', '');
$hero_badge        = lx_get_field('lx_hero_badge', 'option', '');
$hero_title        = lx_get_field('lx_hero_title', 'option', 'Đừng để mùi cơ thể làm bạn <em>mất tự tin.</em>');
$hero_lead         = lx_get_field('lx_hero_lead', 'option', 'Khử mùi hôi nách, chân và cơ thể với hương thảo mộc thanh mát.');
$hero_price        = lx_get_field('lx_hero_price', 'option', '49.000đ');
$hero_old          = lx_get_field('lx_hero_old_price', 'option', '89.000đ');
$hero_tag          = lx_get_field('lx_hero_discount_tag', 'option', 'Flash sale −45%');
$hero_gallery      = lx_get_field('lx_hero_gallery', 'option', array());

// Hero Video Configuration
$hero_media_type   = lx_get_field('lx_hero_media_type', 'option', 'video');
$hero_video_url    = lx_get_field('lx_hero_video_url', 'option', '');
$hero_video_file   = lx_get_field('lx_hero_video_file', 'option', '');
$hero_video_poster = lx_get_field('lx_hero_video_poster', 'option', '');
if (empty($hero_video_poster)) {
    $hero_video_poster = $product_img;
}

$video_src = '';
$is_file_video = true;
$yt_id = '';

if (!empty($hero_video_file)) {
    $video_src = is_array($hero_video_file) ? ($hero_video_file['url'] ?? '') : $hero_video_file;
} elseif (!empty($hero_video_url)) {
    $video_src = trim($hero_video_url);
}

// Check for YouTube link
if (!empty($video_src) && preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([\w-]{11})/', $video_src, $m)) {
    $yt_id = $m[1];
    $is_file_video = false;
}

// Default bundled video if no custom video is provided and media type is video
$default_theme_video = get_template_directory_uri() . '/assets/videos/hero-video.mp4';
$default_theme_video_path = get_template_directory() . '/assets/videos/hero-video.mp4';
if (empty($video_src) && empty($yt_id) && $hero_media_type !== 'image' && file_exists($default_theme_video_path)) {
    $video_src = $default_theme_video;
    $is_file_video = true;
}

$has_video = (!empty($video_src) || !empty($yt_id)) && $hero_media_type !== 'image';
?>
<!-- HERO -->
<section class="hero">
  <div class="container">
    <div>
      <h1 class="display reveal d1"><?php echo $hero_title; ?></h1>
      <a class="rating-line reveal d1" id="heroRating" href="#danh-gia" hidden></a>
      <p class="lead reveal d1"><?php echo $hero_lead; ?></p>
      <ul class="hero-points reveal d2">
        <li><svg class="icon"><use href="#i-timer"/></svg>Khô thoáng 30 giây</li>
        <li><svg class="icon"><use href="#i-shield"/></svg>Không hôi ngược trở lại</li>
        <li><svg class="icon"><use href="#i-spray"/></svg>Dạng xịt tiện lợi</li>
      </ul>
      <div class="offer reveal d2">
        <span class="offer-price"><?php echo $hero_price; ?></span>
        <span class="offer-meta">
          <span class="tag"><?php echo $hero_tag; ?></span>
          <span class="offer-old">Niêm yết <s><?php echo $hero_old; ?></s></span>
        </span>
      </div>
      <div class="hero-actions reveal d3">
        <a href="#dat-hang" class="btn btn-lg"><svg class="icon"><use href="#i-truck"/></svg>Freeship toàn quốc – Mua ngay <svg class="icon"><use href="#i-arrow"/></svg></a>
      </div>
    </div>
    <div class="gallery reveal">
      <div class="packshot" data-visual="hero" data-media="<?php echo $has_video ? 'video' : 'image'; ?>">
        <?php if ($has_video) : ?>
          <?php if (!empty($yt_id)) : ?>
            <div class="hero-video-wrap">
              <iframe class="hero-video-iframe" src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr($yt_id); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr($yt_id); ?>&controls=0&playsinline=1&rel=0&modestbranding=1" title="Video giới thiệu sản phẩm" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
            </div>
          <?php else : ?>
            <video class="photo hero-video" autoplay muted loop playsinline preload="auto" poster="<?php echo esc_url($hero_video_poster); ?>" aria-label="Video giới thiệu sản phẩm">
              <source src="<?php echo esc_url($video_src); ?>" type="video/mp4">
              Trình duyệt của bạn không hỗ trợ thẻ video.
            </video>
            <button type="button" class="hero-video-sound-toggle" aria-label="Bật âm thanh" title="Bật/Tắt âm thanh">
              <svg class="icon icon-muted" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/></svg>
              <svg class="icon icon-unmuted" viewBox="0 0 24 24"><path fill="currentColor" d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
            </button>
          <?php endif; ?>
        <?php elseif (!empty($product_img)) : ?>
          <img class="photo" src="<?php echo esc_url($product_img); ?>" alt="Xịt khử mùi Gừng Cam">
        <?php else : ?>
          <svg class="bottle-render" viewBox="0 0 160 380" aria-label="Xịt khử mùi Gừng Cam" style="width:58%; max-height:88%; z-index:2; position:relative;">
            <use href="#bottle-shape"/>
          </svg>
          <svg class="botanical b1" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-mint"/></svg>
          <svg class="botanical b2" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-orange"/></svg>
        <?php endif; ?>
      </div>
      <div class="thumbs" id="thumbs" <?php echo empty($hero_gallery) ? 'hidden' : ''; ?>>
        <?php if (!empty($hero_gallery) && is_array($hero_gallery)) : ?>
          <?php foreach ($hero_gallery as $idx => $g_img) : 
            $g_url = is_array($g_img) ? (isset($g_img['url']) ? $g_img['url'] : '') : $g_img;
            if (!$g_url) continue;
          ?>
            <button type="button" class="thumb-btn <?php echo $idx === 0 ? 'active' : ''; ?>" data-src="<?php echo $g_url; ?>" aria-label="Xem ảnh <?php echo ($idx + 1); ?>">
              <img src="<?php echo $g_url; ?>" alt="Thumbnail <?php echo ($idx + 1); ?>" style="width:100%; height:100%; object-fit:cover; border-radius:8px;">
            </button>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

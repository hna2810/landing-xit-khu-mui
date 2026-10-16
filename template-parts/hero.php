<?php
/**
 * Hero Section Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$product_img  = lx_get_image_url('lx_hero_product_image', '');
$hero_badge   = lx_get_field('lx_hero_badge', 'option', 'Xịt khử mùi Gừng Cam · 30ml');
$hero_title   = lx_get_field('lx_hero_title', 'option', 'Đừng để mùi cơ thể làm bạn <em>mất tự tin.</em>');
$hero_lead    = lx_get_field('lx_hero_lead', 'option', 'Khử mùi hôi nách, chân và cơ thể với hương thảo mộc thanh mát.');
$hero_price   = lx_get_field('lx_hero_price', 'option', '49.000đ');
$hero_old     = lx_get_field('lx_hero_old_price', 'option', '89.000đ');
$hero_tag     = lx_get_field('lx_hero_discount_tag', 'option', 'Flash sale −45%');
$hero_gallery = lx_get_field('lx_hero_gallery', 'option', array());
?>
<!-- HERO -->
<section class="hero">
  <div class="container">
    <div>
      <p class="label reveal"><?php echo $hero_badge; ?></p>
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
      <div class="packshot" data-visual="hero">
        <?php if (!empty($product_img)) : ?>
          <img class="photo" src="<?php echo esc_url($product_img); ?>" alt="<?php echo esc_attr($hero_badge); ?>">
        <?php else : ?>
          <svg class="bottle-render" viewBox="0 0 160 380" aria-label="<?php echo esc_attr($hero_badge); ?>" style="width:58%; max-height:88%; z-index:2; position:relative;">
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

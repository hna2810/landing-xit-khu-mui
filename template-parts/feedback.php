<?php
/**
 * Feedback Screenshots Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$fbs_34 = lx_get_field('lx_feedback_gallery_34', 'option', array());
$fbs_11 = lx_get_field('lx_feedback_gallery_11', 'option', array());
$fbs_legacy = lx_get_field('lx_feedback_gallery', 'option', array());

// Parse URLs
$urls_34 = array();
if (!empty($fbs_34) && is_array($fbs_34)) {
    foreach ($fbs_34 as $fb) {
        $u = is_array($fb) ? (isset($fb['url']) ? $fb['url'] : '') : $fb;
        if ($u) {
            $urls_34[] = $u;
        }
    }
}

$urls_11 = array();
if (!empty($fbs_11) && is_array($fbs_11)) {
    foreach ($fbs_11 as $fb) {
        $u = is_array($fb) ? (isset($fb['url']) ? $fb['url'] : '') : $fb;
        if ($u) {
            $urls_11[] = $u;
        }
    }
}

// Fallback to legacy field if specific fields are empty
if (empty($urls_34) && empty($urls_11) && !empty($fbs_legacy) && is_array($fbs_legacy)) {
    $legacy_urls = array();
    foreach ($fbs_legacy as $fb) {
        $u = is_array($fb) ? (isset($fb['url']) ? $fb['url'] : '') : $fb;
        if ($u) {
            $legacy_urls[] = $u;
        }
    }
    if (!empty($legacy_urls)) {
        $half = ceil(count($legacy_urls) / 2);
        $urls_34 = array_slice($legacy_urls, 0, $half);
        $urls_11 = array_slice($legacy_urls, $half);
    }
}

// Đảm bảo mỗi hàng đủ 4 ảnh hiển thị to đẹp trên 1 hàng desktop
$default_34 = array(
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-du-lich.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-hoi-duoi-canh-tay.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-cho-nu.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/cong-dung-xit-khu-mui-hoi-nach-cho-nam.png',
);
foreach ($default_34 as $src) {
    if (count($urls_34) < 4 && !in_array($src, $urls_34, true)) {
        $urls_34[] = $src;
    }
}

$default_11 = array(
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/1.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/2.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/3.png',
    'https://khumui.homecarevietnam.com/wp-content/uploads/2026/10/sau-khi-dung-xit-khu-mui-1.png',
);
foreach ($default_11 as $src) {
    if (count($urls_11) < 4 && !in_array($src, $urls_11, true)) {
        $urls_11[] = $src;
    }
}
?>
<!-- FEEDBACK SCREENSHOTS (2 HÀNG SLIDER) -->
<section class="section feedback-sec panel" id="feedback">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Feedback</p>
      <h2 class="h2 display reveal d1">Hình ảnh <em>feedback</em> thực tế.</h2>
      <p class="lead reveal d2">Tin nhắn và hình ảnh khách hàng gửi về sau khi sử dụng.</p>
    </div>

    <!-- Hàng 1: Slider ảnh 3:4 (Chụp tin nhắn) -->
    <div class="fb-slider-block reveal d2">
      <div class="fb-slider-header">
        <h3 class="fb-slider-title">Tin nhắn khách hàng</h3>
        <span class="fb-slider-hint">Vuốt xem thêm &rarr;</span>
      </div>
      <div class="fb-slider fb-slider-34" id="fbSlider34">
        <?php if (!empty($urls_34)) : ?>
          <?php foreach ($urls_34 as $idx => $url) : ?>
            <button type="button" class="fb-card" data-idx="<?php echo $idx; ?>" aria-label="Xem feedback <?php echo ($idx + 1); ?>">
              <img src="<?php echo esc_url($url); ?>" alt="Feedback tin nhắn khách hàng <?php echo ($idx + 1); ?>" loading="lazy">
            </button>
          <?php endforeach; ?>
        <?php else : ?>
          <?php for ($i = 1; $i <= 6; $i++) : ?>
            <div class="ph fb-card">
              <span class="ph-badge">Chờ nội dung</span>
              <div class="ph-text">Feedback 3:4 #<?php echo $i; ?></div>
            </div>
          <?php endfor; ?>
        <?php endif; ?>
      </div>
    </div>

    <!-- Hàng 2: Slider ảnh 1:1 (Ảnh thực tế) -->
    <div class="fb-slider-block reveal d3" style="margin-top:28px;">
      <div class="fb-slider-header">
        <h3 class="fb-slider-title">Hình ảnh thực tế</h3>
        <span class="fb-slider-hint">Vuốt xem thêm &rarr;</span>
      </div>
      <div class="fb-slider fb-slider-11" id="fbSlider11">
        <?php if (!empty($urls_11)) : ?>
          <?php foreach ($urls_11 as $idx => $url) : ?>
            <button type="button" class="fb-card" data-idx="<?php echo $idx; ?>" aria-label="Xem hình ảnh <?php echo ($idx + 1); ?>">
              <img src="<?php echo esc_url($url); ?>" alt="Hình ảnh sản phẩm thực tế <?php echo ($idx + 1); ?>" loading="lazy">
            </button>
          <?php endforeach; ?>
        <?php else : ?>
          <?php for ($i = 1; $i <= 6; $i++) : ?>
            <div class="ph fb-card">
              <span class="ph-badge">Chờ nội dung</span>
              <div class="ph-text">Ảnh thực tế 1:1 #<?php echo $i; ?></div>
            </div>
          <?php endfor; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

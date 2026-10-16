<?php
/**
 * Feedback Screenshots Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$fbs = lx_get_field('lx_feedback_gallery', 'option', array());
?>
<!-- FEEDBACK SCREENSHOTS -->
<section class="section steps-sec panel" id="feedback">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Feedback</p>
      <h2 class="h2 display reveal d1">Hình ảnh <em>feedback</em> thực tế.</h2>
      <p class="lead reveal d2">Tin nhắn và hình ảnh khách hàng gửi về sau khi sử dụng.</p>
    </div>
    <div class="fb-masonry" id="fbGrid">
      <?php if (!empty($fbs) && is_array($fbs)) : ?>
        <?php foreach ($fbs as $fb_img) : 
          $fb_url = is_array($fb_img) ? (isset($fb_img['url']) ? $fb_img['url'] : '') : $fb_img;
          if (!$fb_url) continue;
        ?>
          <div class="fb-item reveal" style="border-radius:12px; overflow:hidden; margin-bottom:16px;">
            <img src="<?php echo $fb_url; ?>" alt="Feedback khách hàng" style="width:100%; display:block; border-radius:12px;">
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

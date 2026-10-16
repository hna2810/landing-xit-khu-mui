<?php
/**
 * Video Reviews Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$video_items = lx_get_field('lx_video_reviews', 'option', array());
$has_videos = false;
if (!empty($video_items) && is_array($video_items)) {
    foreach ($video_items as $v) {
        if (!empty($v['url'])) {
            $has_videos = true;
            break;
        }
    }
}

// Ẩn tạm đi khi chưa có video, khi nào nhập video sẽ hiển thị cả section
if (!$has_videos) {
    return;
}
?>
<!-- VIDEO REVIEW -->
<section class="section videos-sec panel" id="video-review">
  <div class="container">
    <div class="sec-head">
      <div>
        <p class="label reveal">Video review</p>
        <h2 class="h2 display reveal d1">Xem Mây Mây <em>trong thực tế.</em></h2>
      </div>
      <div class="arrows" id="vidArrows">
        <button type="button" aria-label="Video trước" data-dir="-1"><svg class="icon"><use href="#i-chev-l"/></svg></button>
        <button type="button" aria-label="Video tiếp" data-dir="1"><svg class="icon"><use href="#i-chev-r"/></svg></button>
      </div>
    </div>
    <div class="vid-row reveal" id="vidRow"></div>
  </div>
</section>

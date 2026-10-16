<?php
/**
 * Video Reviews Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
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

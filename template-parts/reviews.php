<?php
/**
 * Customer Reviews Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- CUSTOMER REVIEWS -->
<section class="section" id="danh-gia">
  <div class="container">
    <p class="label reveal">Đánh giá</p>
    <h2 class="h2 display reveal d1">Khách hàng nói gì về <em>Mây Mây.</em></h2>
    <div class="reviews-wrap">
      <aside class="summary-card reveal" id="summary"></aside>
      <div>
        <div class="filters" id="filters"></div>
        <div class="review-list" id="reviewList"></div>
        <div class="more-wrap"><button type="button" class="btn btn-ghost" id="moreReviews" hidden>Xem thêm đánh giá</button></div>
      </div>
    </div>
  </div>
</section>

<?php
/**
 * Interactive Comparison Drag Slider & Herb Mechanism (Replaces static ingredients)
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$ing1_img  = lx_get_image_url('lx_ing_1_image', '');
$ing2_img  = lx_get_image_url('lx_ing_2_image', '');
$ing3_img  = lx_get_image_url('lx_ing_3_image', '');
$ing4_img  = lx_get_image_url('lx_ing_4_image', '');
?>
<!-- SECTION 2: INTERACTIVE DRAG SLIDER & HERBAL MECHANISM -->
<section class="section compare-sec panel" id="so-sanh-thanh-phan">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Kéo thả để so sánh thực tế</p>
      <h2 class="h2 display reveal d1">Sự khác biệt vượt trội <em>sau đúng 30 giây xịt</em></h2>
      <p class="lead reveal d2">Dùng ngón tay kéo thanh trượt ở giữa để thấy sự khác biệt giữa Lăn nách hóa học thông thường và Xịt thảo mộc Mây Mây.</p>
    </div>

    <!-- INTERACTIVE BEFORE / AFTER DRAG SLIDER -->
    <div class="compare-slider-wrap reveal d2" id="compareSliderWrap">
      <div class="compare-slider-box" id="compareBox">
        <!-- Before View (Lăn nách thông thường / Ố vàng) -->
        <div class="compare-view view-before">
          <div class="compare-visual-content before-bg">
            <div class="compare-visual-badge badge-bad">
              <span>✕</span> LĂN NÁCH THÔNG THƯỜNG
            </div>
            <div class="compare-graphic">
              <div class="fabric-sim stain">
                <div class="stain-spot"></div>
                <div class="pore-demo blocked">
                  <span class="pore-label">Lỗ chân lông bít tắc muối nhôm</span>
                </div>
              </div>
            </div>
            <ul class="compare-points bad">
              <li>✕ Bết dính lâu khô, nhớp nháp khó chịu</li>
              <li>✕ Muối nhôm bít tắc gây thâm sạm nách</li>
              <li>✕ Vệt ố vàng loang lổ cứng đơ nách áo</li>
              <li>✕ Mùi hương liệu hắc át mùi cơ thể</li>
            </ul>
          </div>
        </div>

        <!-- After View (Xịt thảo mộc Mây Mây / Khô thoáng 30s) -->
        <div class="compare-view view-after" id="afterView" style="clip-path: inset(0 0 0 50%);">
          <div class="compare-visual-content after-bg">
            <div class="compare-visual-badge badge-good">
              <span>✓</span> XỊT THẢO MỘC MÂY MÂY
            </div>
            <div class="compare-graphic">
              <div class="fabric-sim clean">
                <div class="clean-sparkle"></div>
                <div class="pore-demo breathing">
                  <span class="pore-label">Nang lông thông thoáng, khô ráo 30s</span>
                </div>
              </div>
            </div>
            <ul class="compare-points good">
              <li>✓ Khô ráo siêu tốc 30 giây, êm ái thoáng nhẹ</li>
              <li>✓ 100% Không bao giờ để lại vệt ố vàng áo</li>
              <li>✓ Thảo mộc tự nhiên mờ thâm nách mềm mịn</li>
              <li>✓ Hương gừng cam thanh mát thư thái như spa</li>
            </ul>
          </div>
        </div>

        <!-- Drag Handle -->
        <div class="compare-handle" id="compareHandle" style="left: 50%;">
          <div class="handle-line"></div>
          <div class="handle-button" aria-label="Kéo để so sánh">
            <svg viewBox="0 0 24 24" class="handle-icon"><path d="M8 7l-5 5 5 5V7zm8 0v10l5-5-5-5z" fill="currentColor"/></svg>
            <span class="handle-tooltip">Kéo thử</span>
          </div>
          <div class="handle-line"></div>
        </div>
      </div>
      <p class="compare-drag-hint">👉 <strong>Chạm và kéo thanh trượt</strong> qua lại để so sánh trực quan</p>
    </div>

    <!-- INTERACTIVE 4 HERBAL EXPLORER (BẤM ĐỂ KHÁM PHÁ CÔNG HIỆU) -->
    <div class="herb-interactive-section reveal d3">
      <div class="text-center">
        <h3 class="herb-title">Bí truyền 4 vị thảo mộc: <em>Chạm để xem cơ chế diệt mùi</em></h3>
        <p class="herb-sub">Mỗi thành phần đóng một vai trò chuyên biệt, phối ngũ theo nguyên lý Đông y:</p>
      </div>

      <div class="herb-tabs" id="herbTabs">
        <!-- Tab Gừng -->
        <button type="button" class="herb-tab-btn active" data-herb="gung">
          <span class="herb-tab-img">
            <?php if (!empty($ing3_img)) : ?>
              <img src="<?php echo $ing3_img; ?>" alt="Gừng tươi">
            <?php else : ?>
              <span class="herb-emoji">🫚</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Gừng Cay</span>
          <span class="herb-tab-role">Diệt khuẩn gốc</span>
        </button>

        <!-- Tab Trầu Không -->
        <button type="button" class="herb-tab-btn" data-herb="traukhong">
          <span class="herb-tab-img">
            <?php if (!empty($ing2_img)) : ?>
              <img src="<?php echo $ing2_img; ?>" alt="Lá trầu không">
            <?php else : ?>
              <span class="herb-emoji">🍃</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Trầu Không</span>
          <span class="herb-tab-role">Kháng sinh tự nhiên</span>
        </button>

        <!-- Tab Bạc Hà -->
        <button type="button" class="herb-tab-btn" data-herb="bacha">
          <span class="herb-tab-img">
            <?php if (!empty($ing1_img)) : ?>
              <img src="<?php echo $ing1_img; ?>" alt="Bạc hà tươi">
            <?php else : ?>
              <span class="herb-emoji">🌿</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Bạc Hà</span>
          <span class="herb-tab-role">Làm mát tức thì</span>
        </button>

        <!-- Tab Cam -->
        <button type="button" class="herb-tab-btn" data-herb="cam">
          <span class="herb-tab-img">
            <?php if (!empty($ing4_img)) : ?>
              <img src="<?php echo $ing4_img; ?>" alt="Vỏ cam tươi">
            <?php else : ?>
              <span class="herb-emoji">🍊</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Cam Tươi</span>
          <span class="herb-tab-role">Mờ thâm sáng da</span>
        </button>
      </div>

      <!-- Detail Showcase Card for Active Herb -->
      <div class="herb-detail-card" id="herbDetailBox">
        <div class="herb-detail-head">
          <span class="herb-detail-tag" id="herbTag">HOẠT CHẤT GINGEROL &amp; ZINGIBERENE</span>
          <h4 class="herb-detail-name" id="herbName">Gừng Cay – Tiêu diệt 99.8% vi khuẩn gây mùi</h4>
        </div>
        <p class="herb-detail-desc" id="herbDesc">
          Gừng chứa hoạt chất kháng viêm, ấm sâu tự nhiên giúp tiêu diệt tận gốc vi khuẩn Corynebacterium trú ngụ trong nang lông và phân hủy protein mồ hôi. Giúp vùng nách và chân luôn sạch thơm, không lo mùi quay trở lại dù vận động mạnh cả ngày.
        </p>
        <div class="herb-detail-footer">
          <span class="herb-efficacy">Hiệu quả kiểm nghiệm: <strong>Ức chế mùi hôi kéo dài 24H</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>

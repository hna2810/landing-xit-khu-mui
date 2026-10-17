<?php
/**
 * Interactive Comparison VS Mode & Herb Lab Explorer (Replaces static ingredients)
 * Mobile-First, Touch-Friendly, High Retention
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$ing1_img  = lx_get_image_url('lx_ing_1_image', ''); // Bạc hà
$ing2_img  = lx_get_image_url('lx_ing_2_image', ''); // Trầu không
$ing3_img  = lx_get_image_url('lx_ing_3_image', ''); // Gừng
$ing4_img  = lx_get_image_url('lx_ing_4_image', ''); // Cam
?>
<!-- SECTION 2: INTERACTIVE COMPARISON & HERBAL LAB -->
<section class="section compare-sec panel" id="so-sanh-thanh-phan">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">So sánh thực tế &amp; Đột phá khoa học</p>
      <h2 class="h2 display reveal d1">Sự khác biệt vượt trội <em>sau đúng 30 giây xịt</em></h2>
      <p class="lead reveal d2">Chạm chuyển đổi bên dưới để thấy sự đối lập rõ rệt giữa Lăn nách hóa học thông thường và Xịt thảo mộc Mây Mây.</p>
    </div>

    <!-- INTERACTIVE MODE SWITCHER (LĂN NÁCH VS MÂY MÂY) -->
    <div class="vs-interactive-wrap reveal d2" id="vsInteractiveWrap">
      <!-- Mode Switcher Buttons -->
      <div class="vs-switcher-bar">
        <button type="button" class="vs-switch-btn" data-mode="bad" id="btnModeBad">
          <span class="vs-btn-icon">❌</span>
          <span class="vs-btn-text">Lăn nách hóa chất</span>
        </button>
        <button type="button" class="vs-switch-btn active" data-mode="good" id="btnModeGood">
          <span class="vs-btn-icon">✨</span>
          <span class="vs-btn-text">Xịt Thảo Mộc Mây Mây</span>
        </button>
      </div>

      <!-- Mode Cards Display -->
      <div class="vs-cards-container">
        <!-- Card Good: Xịt Thảo Mộc Mây Mây (Active Default) -->
        <div class="vs-mode-card card-good active" id="cardGood">
          <div class="vs-card-header">
            <span class="vs-card-badge badge-good">✓ ĐỘT PHÁ THẢO MỘC MÂY MÂY</span>
            <h3 class="vs-card-title">Khô ráo tự nhiên · Áo trắng tinh tươm · Không bao giờ bết dính</h3>
          </div>

          <div class="vs-features-grid">
            <div class="vs-feat-item feat-good">
              <span class="vs-feat-icon">⚡</span>
              <div class="vs-feat-info">
                <strong>Khô ráo siêu tốc đúng 30 giây</strong>
                <p>Công nghệ phun sương Nano siêu mịn thẩm thấu tức thì, không nhớp nháp, xịt xong mặc áo ngay.</p>
              </div>
            </div>

            <div class="vs-feat-item feat-good">
              <span class="vs-feat-icon">👕</span>
              <div class="vs-feat-info">
                <strong>100% Không bao giờ để lại vệt ố vàng áo</strong>
                <p>Hoàn toàn không chứa muối nhôm, không cặn dính màu, bảo vệ mọi áo sơ mi và áo phông trắng.</p>
              </div>
            </div>

            <div class="vs-feat-item feat-good">
              <span class="vs-feat-icon">🌿</span>
              <div class="vs-feat-info">
                <strong>Kháng sinh thực vật diệt vi khuẩn tại gốc</strong>
                <p>Hoạt chất Gingerol (Gừng) và Chavicol (Trầu không) tiêu diệt sạch vi khuẩn kỵ khí sinh mùi.</p>
              </div>
            </div>

            <div class="vs-feat-item feat-good">
              <span class="vs-feat-icon">🍊</span>
              <div class="vs-feat-info">
                <strong>Hương thảo mộc thanh khiết thư giãn như Spa</strong>
                <p>Chiết xuất Bạc hà &amp; Vỏ cam tự nhiên mang lại cảm giác mát lạnh dịu êm suốt 24 giờ.</p>
              </div>
            </div>
          </div>

          <div class="vs-card-footer">
            <span class="vs-tag">Khuyên dùng cho người vận động nhiều, nhân viên văn phòng &amp; mẹ sau sinh</span>
          </div>
        </div>

        <!-- Card Bad: Lăn Nách Hóa Chất Thông Thường -->
        <div class="vs-mode-card card-bad" id="cardBad">
          <div class="vs-card-header">
            <span class="vs-card-badge badge-bad">✕ NGUY HẠI TỪ LĂN NÁCH HÓA HỌC</span>
            <h3 class="vs-card-title">Bít tắc chân lông · Nách áo vàng ố · Mùi nồng chua khó chịu</h3>
          </div>

          <div class="vs-features-grid">
            <div class="vs-feat-item feat-bad">
              <span class="vs-feat-icon">⏳</span>
              <div class="vs-feat-info">
                <strong>Bết dính nhớp nháp 15 - 20 phút</strong>
                <p>Chất gel nhờn rít lâu khô, phải đứng quạt chờ đợi, khi ra đường gặp mồ hôi dính bết khó chịu.</p>
              </div>
            </div>

            <div class="vs-feat-item feat-bad">
              <span class="vs-feat-icon">⚠️</span>
              <div class="vs-feat-info">
                <strong>Vệt ố vàng loang lổ cứng đơ sợi vải áo</strong>
                <p>Muối nhôm (Aluminium) kết tủa với mồ hôi bám chặt sợi vải, giặt tẩy không sạch làm hỏng áo.</p>
              </div>
            </div>

            <div class="vs-feat-item feat-bad">
              <span class="vs-feat-icon">🚫</span>
              <div class="vs-feat-info">
                <strong>Bít kín nang lông tạo ổ vi khuẩn sinh sôi</strong>
                <p>Hóa chất bịt kín lỗ chân lông vô tình tạo môi trường kỵ khí ẩm ướt, khiến nách ngày càng thâm đen.</p>
              </div>
            </div>

            <div class="vs-feat-item feat-bad">
              <span class="vs-feat-icon">🤢</span>
              <div class="vs-feat-info">
                <strong>Mùi hương liệu nồng hắc trộn mùi cơ thể</strong>
                <p>Chỉ át mùi giả tạo được 1 - 2 tiếng, khi mồ hôi toát ra sinh phản ứng tạo mùi chua khét nồng nặc.</p>
              </div>
            </div>
          </div>

          <div class="vs-card-footer">
            <span class="vs-tag-warning">Cần ngừng sử dụng sớm để tránh làm thâm sạm và tổn thương nang lông</span>
          </div>
        </div>
      </div>
    </div>

    <!-- COMPARISON MATRIX: BẢNG SO SÁNH ĐỐI KHÁNG TRỰC DIỆN -->
    <div class="matrix-compare-wrap reveal d2">
      <div class="text-center">
        <h3 class="matrix-heading">Bảng đối chiếu 4 tiêu chí cốt lõi</h3>
        <p class="matrix-sub">Sự thật rõ ràng trước khi bạn quyết định lựa chọn sản phẩm:</p>
      </div>

      <div class="matrix-table-card">
        <!-- Header row -->
        <div class="matrix-row matrix-header-row">
          <div class="matrix-col col-criteria">Tiêu chí</div>
          <div class="matrix-col col-bad">Lăn nách hóa chất</div>
          <div class="matrix-col col-good">Xịt thảo mộc Mây Mây</div>
        </div>

        <!-- Row 1: Tốc độ khô -->
        <div class="matrix-row">
          <div class="matrix-col col-criteria">
            <strong>Tốc độ khô thoáng</strong>
          </div>
          <div class="matrix-col col-bad">
            <span class="badge-status bad">✕ 15 - 20 phút</span>
            <small>Nhớp nháp, phải đứng quạt</small>
          </div>
          <div class="matrix-col col-good">
            <span class="badge-status good">✓ Đúng 30 giây</span>
            <small>Nano sương mịn, mặc áo ngay</small>
          </div>
        </div>

        <!-- Row 2: Vết ố vàng áo -->
        <div class="matrix-row">
          <div class="matrix-col col-criteria">
            <strong>Vết ố vàng nách áo</strong>
          </div>
          <div class="matrix-col col-bad">
            <span class="badge-status bad">✕ Vàng ố, cứng vải</span>
            <small>Muối nhôm kết tủa hỏng áo</small>
          </div>
          <div class="matrix-col col-good">
            <span class="badge-status good">✓ 100% Giữ áo trắng</span>
            <small>Hoàn toàn không để lại vệt</small>
          </div>
        </div>

        <!-- Row 3: Cơ chế tác động -->
        <div class="matrix-row">
          <div class="matrix-col col-criteria">
            <strong>Cơ chế tác động</strong>
          </div>
          <div class="matrix-col col-bad">
            <span class="badge-status bad">✕ Bít lỗ chân lông</span>
            <small>Gây thâm nách, bí bách</small>
          </div>
          <div class="matrix-col col-good">
            <span class="badge-status good">✓ Diệt khuẩn tại gốc</span>
            <small>Kháng sinh thực vật thông thoáng</small>
          </div>
        </div>

        <!-- Row 4: Độ an toàn & Lành tính -->
        <div class="matrix-row">
          <div class="matrix-col col-criteria">
            <strong>Độ an toàn cho da</strong>
          </div>
          <div class="matrix-col col-bad">
            <span class="badge-status bad">✕ Cồn &amp; Hương liệu</span>
            <small>Dễ kích ứng, thâm sạm</small>
          </div>
          <div class="matrix-col col-good">
            <span class="badge-status good">✓ 100% Thuần chay</span>
            <small>Dịu nhẹ cho cả mẹ bầu &amp; da nhạy cảm</small>
          </div>
        </div>
      </div>
    </div>

    <!-- INTERACTIVE 4 HERBAL EXPLORER (BẤM ĐỂ KHÁM PHÁ CÔNG HIỆU) -->
    <div class="herb-interactive-section reveal d3">
      <div class="text-center">
        <h3 class="herb-title">Bí truyền 4 vị thảo mộc: <em>Chạm để xem cơ chế diệt mùi</em></h3>
        <p class="herb-sub">Chạm vào từng vị dược liệu để xem hoạt chất dược lý và kích hoạt thanh sức mạnh:</p>
      </div>

      <!-- Herb Tabs -->
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
          <span class="herb-tab-name">Gừng sẻ</span>
          <span class="herb-tab-active-dot"></span>
        </button>

        <!-- Tab Trầu Không -->
        <button type="button" class="herb-tab-btn" data-herb="trau">
          <span class="herb-tab-img">
            <?php if (!empty($ing2_img)) : ?>
              <img src="<?php echo $ing2_img; ?>" alt="Trầu không">
            <?php else : ?>
              <span class="herb-emoji">🍃</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Trầu không</span>
          <span class="herb-tab-active-dot"></span>
        </button>

        <!-- Tab Bạc Hà -->
        <button type="button" class="herb-tab-btn" data-herb="bacha">
          <span class="herb-tab-img">
            <?php if (!empty($ing1_img)) : ?>
              <img src="<?php echo $ing1_img; ?>" alt="Bạc hà">
            <?php else : ?>
              <span class="herb-emoji">🌿</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Bạc hà</span>
          <span class="herb-tab-active-dot"></span>
        </button>

        <!-- Tab Vỏ Cam -->
        <button type="button" class="herb-tab-btn" data-herb="cam">
          <span class="herb-tab-img">
            <?php if (!empty($ing4_img)) : ?>
              <img src="<?php echo $ing4_img; ?>" alt="Vỏ cam">
            <?php else : ?>
              <span class="herb-emoji">🍊</span>
            <?php endif; ?>
          </span>
          <span class="herb-tab-name">Vỏ cam</span>
          <span class="herb-tab-active-dot"></span>
        </button>
      </div>

      <!-- Dynamic Herb Panel Display -->
      <div class="herb-panel-display" id="herbPanel">
        <div class="herb-detail-card" id="herbDetailCard">
          <div class="herb-detail-header">
            <span class="herb-active-pill" id="herbPill">VỊ THẢO MỘC CHỦ ĐẠO</span>
            <h4 class="herb-detail-title" id="herbTitle">Gừng sẻ cay nồng · Tinh chất Gingerol &amp; Shogaol</h4>
          </div>
          <p class="herb-detail-desc" id="herbDesc">
            Chiết xuất củ gừng già chứa hàm lượng cao Gingerol – một loại kháng sinh thực vật tự nhiên có khả năng ức chế mạnh mẽ vi khuẩn kỵ khí phân hủy protein mồ hôi. Giúp khử sạch mùi hôi nách, mùi mồ hôi chân ngay từ lần xịt đầu tiên và giữ bề mặt da luôn thông thoáng.
          </p>

          <div class="herb-potency-bar-wrap">
            <div class="potency-header">
              <span class="potency-label">Khả năng ức chế vi khuẩn gây mùi:</span>
              <span class="potency-value" id="herbPotency">98.6%</span>
            </div>
            <div class="potency-track">
              <div class="potency-fill" id="herbBar" style="width: 98.6%;"></div>
            </div>
          </div>
        </div>

        <!-- Synergistic Badge when explored -->
        <div class="herb-synergy-banner" id="herbSynergy">
          <span class="synergy-star">🌟</span>
          <div class="synergy-copy">
            <strong>Công thức hiệp đồng 4 vị Đông y:</strong>
            <span>Đã khám phá <b id="herbExploredCount">1</b>/4 vị dược liệu quý. Kết hợp diệt 99.8% vi khuẩn kỵ khí suốt 24 giờ.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

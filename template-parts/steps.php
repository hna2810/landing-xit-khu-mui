<?php
/**
 * Interactive 3-Step Simulator & 30s Dry Test Challenge (Replaces static 3 steps)
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- SECTION 3: INTERACTIVE 3-STEP SIMULATOR & 30S DRY CHALLENGE -->
<section class="section steps-sec panel" id="cach-dung">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Trải nghiệm tương tác 3 bước</p>
      <h2 class="h2 display reveal d1">Chỉ mất 30 giây mỗi sáng: <em>Lắc, Xịt &amp; Khô ráo</em></h2>
      <p class="lead reveal d2">Bấm vào từng bước bên dưới để trải nghiệm thử cách dùng đơn giản và tốc độ khô thoáng siêu tốc của Mây Mây.</p>
    </div>

    <div class="interactive-steps-card reveal d2" id="stepsCard">
      <!-- Step Navigation Tabs -->
      <div class="step-nav-tabs" role="tablist">
        <button type="button" class="step-nav-btn active" data-step-target="1" role="tab" aria-selected="true">
          <span class="step-nav-num">01</span>
          <span class="step-nav-text">Lắc nhẹ</span>
        </button>
        <button type="button" class="step-nav-btn" data-step-target="2" role="tab" aria-selected="false">
          <span class="step-nav-num">02</span>
          <span class="step-nav-text">Xịt 1 lần</span>
        </button>
        <button type="button" class="step-nav-btn" data-step-target="3" role="tab" aria-selected="false">
          <span class="step-nav-num">03</span>
          <span class="step-nav-text">Khô 30s</span>
        </button>
      </div>

      <!-- Step Content Area -->
      <div class="step-interactive-display">
        <!-- Panel Step 1: Lắc -->
        <div class="step-panel-item active" data-step-panel="1">
          <div class="step-sim-stage">
            <div class="sim-bottle-wrap" id="simBottle1">
              <div class="sim-bottle-graphic">
                <svg class="bottle-svg" viewBox="0 0 160 380" aria-label="Chai xịt Mây Mây">
                  <use href="#bottle-shape"/>
                </svg>
                <div class="sim-bubbles">
                  <span class="bubble b-1"></span>
                  <span class="bubble b-2"></span>
                  <span class="bubble b-3"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="step-sim-info">
            <span class="step-badge">BƯỚC 1: LẮC ĐỀU</span>
            <h3>Hòa quyện tinh hoa 4 vị thảo mộc</h3>
            <p>Do thành phần 100% thảo mộc tự nhiên không dùng chất nhũ hóa hóa học, hãy lắc nhẹ 2 - 3 lần để tinh dầu gừng, cam, trầu không và bạc hà được hòa quyện đều nhất trước khi xịt.</p>
            <button type="button" class="btn btn-interactive-trigger" id="btnShakeBottle">
              👋 Bấm để lắc chai thử!
            </button>
          </div>
        </div>

        <!-- Panel Step 2: Xịt -->
        <div class="step-panel-item" data-step-panel="2">
          <div class="step-sim-stage">
            <div class="sim-spray-wrap" id="simSprayWrap">
              <div class="sim-bottle-spray">
                <svg class="bottle-svg" viewBox="0 0 160 380">
                  <use href="#bottle-shape"/>
                </svg>
                <!-- Mist spray particles -->
                <div class="sim-mist-particles" id="simMist">
                  <span class="mist-particle p-1"></span>
                  <span class="mist-particle p-2"></span>
                  <span class="mist-particle p-3"></span>
                  <span class="mist-particle p-4"></span>
                </div>
              </div>
              <div class="sim-skin-target">
                <div class="target-radar"></div>
                <span>Khoảng cách 10 – 15cm</span>
              </div>
            </div>
          </div>
          <div class="step-sim-info">
            <span class="step-badge">BƯỚC 2: XỊT 1 LẦN</span>
            <h3>Công nghệ vòi xịt phun sương siêu mịn</h3>
            <p>Để đầu vòi xịt cách vùng da (nách, chân, giày tất) khoảng 10 - 15cm và nhấn dứt khoát 1 lần. Hạt sương Nano siêu nhỏ phủ đều bề mặt da mà không tạo cảm giác đọng nước hay chảy giọt.</p>
            <button type="button" class="btn btn-interactive-trigger" id="btnSprayMist">
              💨 Bấm để xịt thử sương mù!
            </button>
          </div>
        </div>

        <!-- Panel Step 3: Khô 30s Stopwatch -->
        <div class="step-panel-item" data-step-panel="3">
          <div class="step-sim-stage">
            <div class="dry-timer-widget" id="dryTimerWidget">
              <div class="timer-circular-progress">
                <svg viewBox="0 0 120 120" class="timer-svg">
                  <circle cx="60" cy="60" r="52" class="timer-track"/>
                  <circle cx="60" cy="60" r="52" class="timer-bar" id="dryTimerBar"/>
                </svg>
                <div class="timer-counter">
                  <span class="counter-number" id="drySeconds">00:00</span>
                  <span class="counter-label" id="dryLabel">Sẵn sàng</span>
                </div>
              </div>
            </div>
          </div>
          <div class="step-sim-info">
            <span class="step-badge">BƯỚC 3: KHÔ THOÁNG</span>
            <h3>Thử thách đếm ngược 30 giây khô ráo</h3>
            <p>Khác biệt hoàn toàn với lăn nách thông thường phải chờ 5 - 10 phút, Mây Mây khô ráo hoàn toàn chỉ sau 30 giây. Bấm nút dưới đây để bắt đầu bài test thời gian khô thực tế!</p>
            <div class="timer-actions">
              <button type="button" class="btn btn-interactive-trigger" id="btnStartDryTest">
                ⏱️ Bấm bắt đầu đếm 30s!
              </button>
            </div>
            <div class="dry-success-alert" id="drySuccessAlert" style="display:none;">
              🎉 <strong>Hoàn thành 30 giây!</strong> Vùng da hoàn toàn khô ráo thoáng mịn, 100% không bết dính, tự tin mặc áo sơ mi trắng ngay lập tức!
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Safety Caution Note -->
    <div class="caution reveal">
      <svg class="icon"><use href="#i-alert"/></svg>
      <span><b>Lưu ý:</b> Không xịt vào mắt, niêm mạc hoặc vùng da trầy xước tổn thương. Bảo quản nơi khô mát, tránh ánh nắng trực tiếp.</span>
    </div>
  </div>
</section>

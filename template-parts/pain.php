<?php
/**
 * Interactive Odor Diagnosis Quiz (Replaces static pain cards)
 * Mobile-First, App-like Gamified Experience
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- SECTION 1: INTERACTIVE QUIZ & CHẨN ĐOÁN MỨC ĐỘ MÙI -->
<section class="section quiz-sec panel" id="kiem-tra-tinh-trang">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Trắc nghiệm nhanh 10 giây</p>
      <h2 class="h2 display reveal d1">Kiểm tra mức độ mùi cơ thể &amp; <em>nhận giải pháp chuẩn</em></h2>
      <p class="lead reveal d2">Chạm chọn tình trạng bạn đang gặp phải để nhận phân tích nguyên nhân gốc rễ và phác đồ xử lý phù hợp.</p>
    </div>

    <div class="quiz-container reveal d2" id="odorQuizWrap">
      <!-- Quiz Header / Progress -->
      <div class="quiz-header">
        <div class="quiz-progress-track">
          <div class="quiz-progress-bar" id="quizBar" style="width: 33.33%;"></div>
        </div>
        <div class="quiz-step-meta">
          <span class="quiz-step-pill" id="quizPill">Bước 1 / 3</span>
          <span class="quiz-step-percent" id="quizPercent">33% Hoàn tất</span>
        </div>
        <div class="quiz-header-title-wrap">
          <span class="quiz-step-title" id="quizHeaderTitle">Vị trí khiến bạn mất tự tin nhất</span>
        </div>
      </div>

      <!-- Question 1: Vùng cơ thể -->
      <div class="quiz-step-card active" data-step="1">
        <h3 class="quiz-question-title">1. Bạn đang muốn xử lý dứt điểm mùi hôi ở vùng nào?</h3>
        <p class="quiz-question-sub">Chạm chọn 1 hoặc nhiều vùng cơ thể (có thể chọn nhiều):</p>
        
        <div class="quiz-options-list">
          <button type="button" class="quiz-choice" data-type="nach">
            <span class="quiz-choice-icon">💧</span>
            <div class="quiz-choice-body">
              <strong>Vùng nách áo (Dưới cánh tay)</strong>
              <small>Đổ mồ hôi nhiều, ố vàng nách áo, mùi chua nồng khó chịu khi hoạt động</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice" data-type="chan">
            <span class="quiz-choice-icon">👟</span>
            <div class="quiz-choice-body">
              <strong>Bàn chân &amp; Giày tất bí bách</strong>
              <small>Đi giày cả ngày chân ẩm ướt, ngại cởi giày nơi đông người vì mùi nặng</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice" data-type="body">
            <span class="quiz-choice-icon">🏃</span>
            <div class="quiz-choice-body">
              <strong>Mùi mồ hôi cơ thể toàn thân</strong>
              <small>Mồ hôi nhờn dính ở lưng, ngực, dễ có mùi khó chịu dù vừa mới tắm</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice" data-type="eva">
            <span class="quiz-choice-icon">🌸</span>
            <div class="quiz-choice-body">
              <strong>Phụ nữ sau sinh &amp; Vùng nhạy cảm</strong>
              <small>Rối loạn nội tiết tố sau sinh, cơ thể nặng mùi chua ngái, ngại gần gũi</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>
        </div>

        <div class="quiz-action-bar">
          <button type="button" class="btn btn-quiz-next" id="btnNext1" disabled>
            Tiếp tục câu 2 <span class="arrow">&rarr;</span>
          </button>
        </div>
      </div>

      <!-- Question 2: Biểu hiện lo lắng -->
      <div class="quiz-step-card" data-step="2">
        <h3 class="quiz-question-title">2. Biểu hiện nào khiến bạn lo lắng &amp; mệt mỏi nhất?</h3>
        <p class="quiz-question-sub">Chạm chọn 1 biểu hiện bạn quan tâm nhất:</p>
        
        <div class="quiz-options-list">
          <button type="button" class="quiz-choice single" data-effect="yellow">
            <span class="quiz-choice-icon">👕</span>
            <div class="quiz-choice-body">
              <strong>Áo trắng bị ố vàng, nách áo bết dính và cứng đơ</strong>
              <small>Nhiều áo sơ mi, áo phông mới mua phải vứt bỏ vì giặt tẩy không bao giờ sạch</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice single" data-effect="shame">
            <span class="quiz-choice-icon">😔</span>
            <div class="quiz-choice-body">
              <strong>Luôn phải khép nép, sợ người xung quanh ngửi thấy</strong>
              <small>Đi thang máy, phòng họp máy lạnh kín luôn mất tự tin, không dám giơ tay giao tiếp</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice single" data-effect="fast">
            <span class="quiz-choice-icon">⏳</span>
            <div class="quiz-choice-body">
              <strong>Mùi quay trở lại rất nhanh chỉ sau 1 - 2 tiếng</strong>
              <small>Lăn nách thông thường chỉ át mùi tạm thời, sau đó hòa lẫn mồ hôi nồng gắt hơn</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>
        </div>

        <div class="quiz-action-bar flex-between">
          <button type="button" class="btn-quiz-back" id="btnBack2">&larr; Quay lại</button>
          <button type="button" class="btn btn-quiz-next" id="btnNext2" disabled>
            Tiếp tục câu 3 <span class="arrow">&rarr;</span>
          </button>
        </div>
      </div>

      <!-- Question 3: Tiêu chí ưu tiên -->
      <div class="quiz-step-card" data-step="3">
        <h3 class="quiz-question-title">3. Bạn mong muốn một giải pháp như thế nào nhất?</h3>
        <p class="quiz-question-sub">Chạm chọn tiêu chí bạn ưu tiên số 1:</p>
        
        <div class="quiz-options-list">
          <button type="button" class="quiz-choice single" data-need="dry30s">
            <span class="quiz-choice-icon">⏱️</span>
            <div class="quiz-choice-body">
              <strong>Khô thoáng siêu tốc sau đúng 30 giây</strong>
              <small>Không bết dính, xịt xong mặc áo ngay không cần đứng quạt chờ đợi</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice single" data-need="no-stain">
            <span class="quiz-choice-icon">🛡️</span>
            <div class="quiz-choice-body">
              <strong>100% Không bao giờ để lại vệt ố vàng áo</strong>
              <small>Bảo vệ toàn bộ áo sơ mi, áo phông trắng luôn sạch tinh tươm và mềm mại</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice single" data-need="herbal">
            <span class="quiz-choice-icon">🌿</span>
            <div class="quiz-choice-body">
              <strong>Thảo mộc thuần chay, an toàn lành tính</strong>
              <small>Gừng sẻ, trầu không, bạc hà, cam ngọt dịu nhẹ cho mọi loại da và mẹ bầu</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>

          <button type="button" class="quiz-choice single" data-need="versatile">
            <span class="quiz-choice-icon">🎒</span>
            <div class="quiz-choice-body">
              <strong>Chai xịt nhỏ gọn, dùng đa năng tiện lợi</strong>
              <small>Dung tích 30ml bỏ túi xách, cốp xe tiện dụng xịt nách, chân, giày tất mọi lúc</small>
            </div>
            <span class="quiz-choice-check"></span>
          </button>
        </div>

        <div class="quiz-action-bar flex-between">
          <button type="button" class="btn-quiz-back" id="btnBack3">&larr; Quay lại</button>
          <button type="button" class="btn btn-quiz-next btn-finish" id="btnSubmitQuiz" disabled>
            Phân tích tình trạng &amp; Nhận kết quả ⚡
          </button>
        </div>
      </div>

      <!-- State: Loading / Analyzing Animation -->
      <div class="quiz-loading-view" id="quizLoading" style="display:none;">
        <div class="quiz-scanner-circle">
          <div class="scanner-sweep"></div>
          <span class="scanner-icon">🧬</span>
        </div>
        <h4 class="scanner-heading">Đang phân tích hệ vi khuẩn kỵ khí &amp; tuyến mồ hôi...</h4>
        <p class="scanner-sub">Hệ thống đang đối chiếu dữ liệu triệu chứng với hơn 14.200 ca xử lý mùi thành công</p>
        <div class="scanner-progress-bar">
          <div class="scanner-progress-fill" id="scannerFill"></div>
        </div>
        <span class="scanner-percent" id="scannerPct">0%</span>
      </div>

      <!-- State: Result Diagnosis Card -->
      <div class="quiz-result-view" id="quizResult" style="display:none;">
        <div class="result-header">
          <span class="result-pill">BÁO CÁO PHÂN TÍCH CHUYÊN SÂU</span>
          <h3 class="result-headline">Tình trạng: <span id="resTitle" class="highlight-level">Tuyến bã nhờn kỵ khí Cấp độ 2</span></h3>
        </div>

        <div class="result-body-card">
          <div class="result-finding">
            <div class="finding-badge">🔍 Nguyên nhân gốc rễ</div>
            <p id="resDesc">Mồ hôi tiết ra kết hợp cùng vi khuẩn Corynebacterium và nấm men trên bề mặt da sinh ra axit béo không no gây mùi khét chua. Các sản phẩm lăn nách hóa học dùng muối nhôm làm bít lỗ chân lông, vô tình tạo môi trường kỵ khí khiến vi khuẩn sinh sôi gấp bội và làm ố vàng xơ cứng sợi vải.</p>
          </div>

          <div class="result-solution">
            <div class="solution-badge">💡 Phác đồ khắc phục khuyến nghị</div>
            <p id="resProtocol">Cắt đứt nguồn thức ăn của vi khuẩn bằng kháng sinh thực vật tự nhiên từ <strong>Tinh chất Gừng cay &amp; Trầu không</strong>. Đồng thời làm se dịu bề mặt da bằng <strong>Bạc hà &amp; Cam ngọt</strong> giúp da thông thoáng tự nhiên, khô ngay sau 30 giây mà 0% bết dính.</p>
          </div>

          <div class="result-metrics-grid">
            <div class="metric-box">
              <span class="metric-val">30s</span>
              <span class="metric-lbl">Khô thoáng tức thì</span>
            </div>
            <div class="metric-box">
              <span class="metric-val">0%</span>
              <span class="metric-lbl">Ố vàng nách áo</span>
            </div>
            <div class="metric-box">
              <span class="metric-val">100%</span>
              <span class="metric-lbl">Thảo mộc thuần chay</span>
            </div>
          </div>
        </div>

        <div class="result-cta-area">
          <a href="#dat-hang" class="btn btn-lg btn-block btn-result-go">
            Nhận liệu trình trợ giá 49.000đ (Freeship toàn quốc) &rarr;
          </a>
          <button type="button" class="btn-retake-quiz" id="btnRetakeQuiz">
            ↻ Kiểm tra lại tình trạng khác
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

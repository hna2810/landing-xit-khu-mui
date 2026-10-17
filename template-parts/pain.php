<?php
/**
 * Interactive Odor Diagnosis Quiz (Replaces static pain cards)
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
      <p class="label center reveal">Trắc nghiệm nhanh 15 giây</p>
      <h2 class="h2 display reveal d1">Kiểm tra mức độ mùi cơ thể &amp; <em>nhận phác đồ xử lý</em></h2>
      <p class="lead reveal d2">Chạm chọn tình trạng bạn đang gặp phải để nhận phân tích nguyên nhân gốc rễ và phác đồ xử lý phù hợp.</p>
    </div>

    <div class="quiz-container reveal d2" id="odorQuizWrap">
      <!-- Quiz Header / Progress -->
      <div class="quiz-header">
        <div class="quiz-progress-track">
          <div class="quiz-progress-bar" id="quizBar" style="width: 33.33%;"></div>
        </div>
        <div class="quiz-step-label">
          <span class="quiz-step-pill" id="quizPill">Bước 1 / 3</span>
          <span class="quiz-step-title" id="quizHeaderTitle">Vị trí khiến bạn mất tự tin nhất</span>
        </div>
      </div>

      <!-- Question 1 -->
      <div class="quiz-step-card active" data-step="1">
        <h3 class="quiz-question-title">1. Vùng da nào bạn đang muốn xử lý dứt điểm mùi hôi?</h3>
        <p class="quiz-question-sub">Chạm chọn 1 hoặc nhiều vùng cơ thể:</p>
        <div class="quiz-options-grid grid-2">
          <button type="button" class="quiz-choice" data-type="nach">
            <span class="quiz-choice-badge">01</span>
            <div class="quiz-choice-body">
              <strong>Vùng nách áo (Dưới cánh tay)</strong>
              <small>Áo ướt đẫm mồ hôi, ố vàng nách, mùi chua nồng khi vận động</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice" data-type="chan">
            <span class="quiz-choice-badge">02</span>
            <div class="quiz-choice-body">
              <strong>Vùng chân &amp; Giày tất</strong>
              <small>Đi giày cả ngày bí bách, ngại tháo giày nơi đông người vì mùi nặng</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice" data-type="body">
            <span class="quiz-choice-badge">03</span>
            <div class="quiz-choice-body">
              <strong>Mùi mồ hôi cơ thể toàn thân</strong>
              <small>Dễ đổ mồ hôi nhờn ở lưng, ngực, mùi khó chịu dù mới tắm xong</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice" data-type="eva">
            <span class="quiz-choice-badge">04</span>
            <div class="quiz-choice-body">
              <strong>Mẹ sau sinh / Vùng tiểu EVA</strong>
              <small>Rối loạn nội tiết tố sau sinh, cơ thể nặng mùi chua ngái, ngại gần chồng</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>
        </div>

        <div class="quiz-action-bar">
          <button type="button" class="btn btn-quiz-next" id="btnNext1" disabled>
            Tiếp tục câu 2 <span class="arrow">&rarr;</span>
          </button>
        </div>
      </div>

      <!-- Question 2 -->
      <div class="quiz-step-card" data-step="2">
        <h3 class="quiz-question-title">2. Biểu hiện nào khiến bạn thấy phiền toái nhất?</h3>
        <p class="quiz-question-sub">Chọn biểu hiện bạn lo lắng nhất hiện tại:</p>
        <div class="quiz-options-grid grid-1">
          <button type="button" class="quiz-choice single" data-effect="yellow">
            <span class="quiz-choice-badge">A</span>
            <div class="quiz-choice-body">
              <strong>Áo trắng bị ố vàng, nách áo bết dính và cứng đơ</strong>
              <small>Nhiều áo sơ mi, áo phông mới mua phải vứt bỏ vì giặt tẩy không sạch</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice single" data-effect="shame">
            <span class="quiz-choice-badge">B</span>
            <div class="quiz-choice-body">
              <strong>Không dám giơ tay hoặc cởi giày nơi đông người</strong>
              <small>Đi thang máy, phòng máy lạnh kín luôn phải khép nép vì sợ người khác ngửi thấy</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice single" data-effect="fast">
            <span class="quiz-choice-badge">C</span>
            <div class="quiz-choice-body">
              <strong>Mùi quay trở lại rất nhanh chỉ sau 1 - 2 tiếng</strong>
              <small>Đã dùng thử nhiều loại lăn nách nhưng chỉ át được mùi tạm thời, sau đó nồng hơn</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>
        </div>

        <div class="quiz-action-bar flex-between">
          <button type="button" class="btn-quiz-back" id="btnBack2">&larr; Quay lại</button>
          <button type="button" class="btn btn-quiz-next" id="btnNext2" disabled>
            Tiếp tục câu 3 <span class="arrow">&rarr;</span>
          </button>
        </div>
      </div>

      <!-- Question 3 -->
      <div class="quiz-step-card" data-step="3">
        <h3 class="quiz-question-title">3. Bạn mong muốn giải pháp như thế nào nhất?</h3>
        <p class="quiz-question-sub">Chọn tiêu chí bạn ưu tiên số 1:</p>
        <div class="quiz-options-grid grid-2">
          <button type="button" class="quiz-choice single" data-need="dry30s">
            <span class="quiz-choice-badge">✓</span>
            <div class="quiz-choice-body">
              <strong>Khô thoáng siêu tốc sau 30 giây</strong>
              <small>Không bết dính, xịt xong mặc áo ngay không chờ đợi</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice single" data-need="no-stain">
            <span class="quiz-choice-badge">✓</span>
            <div class="quiz-choice-body">
              <strong>100% Không để lại vệt ố vàng áo</strong>
              <small>Bảo vệ toàn bộ áo sơ mi, áo phông trắng luôn sạch đẹp</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice single" data-need="herbal">
            <span class="quiz-choice-badge">✓</span>
            <div class="quiz-choice-body">
              <strong>Thảo mộc thuần chay lành tính</strong>
              <small>Gừng, trầu không, bạc hà, cam tươi dịu nhẹ cho mọi loại da</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>

          <button type="button" class="quiz-choice single" data-need="versatile">
            <span class="quiz-choice-badge">✓</span>
            <div class="quiz-choice-body">
              <strong>Xịt đa năng: nách, chân, giày tất</strong>
              <small>Chai 30ml bỏ túi xách, cốp xe tiện dụng dùng mọi lúc mọi nơi</small>
            </div>
            <span class="quiz-choice-radio"></span>
          </button>
        </div>

        <div class="quiz-action-bar flex-between">
          <button type="button" class="btn-quiz-back" id="btnBack3">&larr; Quay lại</button>
          <button type="button" class="btn btn-quiz-next btn-finish" id="btnSubmitQuiz" disabled>
            Phân tích tình trạng &amp; Xem kết quả ⚡
          </button>
        </div>
      </div>

      <!-- State: Loading / Analyzing Animation -->
      <div class="quiz-loading-view" id="quizLoading" style="display:none;">
        <div class="quiz-loading-pulse">
          <div class="pulse-ring"></div>
          <div class="pulse-icon">🔍</div>
        </div>
        <h4>Đang phân tích cấu trúc vi khuẩn &amp; tuyến mồ hôi...</h4>
        <p>Hệ thống đang đối chiếu dữ liệu với hơn 14.200 ca xử lý mùi cơ thể thành công</p>
        <div class="analyzing-bar">
          <div class="analyzing-fill"></div>
        </div>
      </div>

      <!-- State: Result Diagnosis Card -->
      <div class="quiz-result-view" id="quizResult" style="display:none;">
        <div class="result-header">
          <span class="result-pill">KẾT QUẢ PHÂN TÍCH CHUYÊN SÂU</span>
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
            ↻ Chọn lại triệu chứng khác
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

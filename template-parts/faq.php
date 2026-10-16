<?php
/**
 * FAQ Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$faqs = lx_get_field('lx_faq_items', 'option', array());
$default_faqs = array(
    array(
        'question' => 'Xịt khử mùi Mây Mây có dùng được cho mẹ sau sinh không?',
        'answer'   => 'Dùng được. Thành phần hoàn toàn từ thảo mộc thiên nhiên (bạc hà, trầu không, gừng, cam), lành tính, an toàn cho mẹ sau sinh và đang cho con bú.',
    ),
    array(
        'question' => 'Sản phẩm có làm ố vàng nách áo không?',
        'answer'   => 'Không. Dạng xịt phun sương siêu mịn, thẩm thấu nhanh trong 30 giây, không nhờn rít, không để lại vệt ố vàng trên áo sáng màu.',
    ),
    array(
        'question' => 'Một chai 30ml dùng được bao lâu?',
        'answer'   => 'Khoảng 1 đến 1.5 tháng tùy tần suất sử dụng mỗi ngày.',
    ),
    array(
        'question' => 'Mùi hương lưu lại trong bao lâu?',
        'answer'   => 'Hương thảo mộc thanh nhẹ lưu thoang thoảng 4-8 tiếng. Khả năng kiểm soát mùi cơ thể kéo dài suốt cả ngày.',
    ),
    array(
        'question' => 'Có được kiểm tra hàng trước khi thanh toán không?',
        'answer'   => 'Có. Bạn hoàn toàn được mở hộp kiểm tra đúng sản phẩm trước khi thanh toán cho nhân viên giao hàng (Freeship toàn quốc).',
    ),
);

$items = (!empty($faqs) && is_array($faqs)) ? $faqs : $default_faqs;
?>
<!-- FAQ -->
<section class="section" id="hoi-dap">
  <div class="container">
    <div class="text-center">
      <p class="label center reveal">Hỏi đáp</p>
      <h2 class="h2 display reveal d1">Những thắc mắc thường gặp.</h2>
    </div>
    <div class="faq reveal d1" id="faq">
      <?php foreach ($items as $idx => $f) : 
        $q = isset($f['question']) ? $f['question'] : '';
        $a = isset($f['answer']) ? $f['answer'] : '';
        if (!$q) continue;
        $is_open = ($idx === 0);
      ?>
        <div class="faq-item <?php echo $is_open ? 'open' : ''; ?>">
          <button class="faq-q" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
            <span><?php echo $q; ?></span>
            <span class="pm" aria-hidden="true"></span>
          </button>
          <div class="faq-a" style="<?php echo $is_open ? 'max-height:none;' : ''; ?>">
            <p><?php echo $a; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

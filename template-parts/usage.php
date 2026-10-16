<?php
/**
 * Usage and Benefits by Zone Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$usage_img = lx_get_image_url('lx_usage_main_image', '');
if (empty($usage_img)) {
    $usage_img = lx_get_image_url('lx_hero_product_image', '');
}
$z1_img = lx_get_image_url('lx_zone_1_image', '');
$z2_img = lx_get_image_url('lx_zone_2_image', '');
$z3_img = lx_get_image_url('lx_zone_3_image', '');
$z4_img = lx_get_image_url('lx_zone_4_image', '');
?>
<!-- BENEFITS / USAGE -->
<section class="section benefits panel" id="cong-dung">
  <div class="container">
    <div class="benefit-visual reveal">
      <div class="packshot" data-visual="usage" style="position:relative; display:flex; align-items:center; justify-content:center;">
        <?php if (!empty($usage_img)) : ?>
          <img src="<?php echo $usage_img; ?>" alt="Công dụng Xịt khử mùi Mây Mây" class="usage-packshot-img" style="max-height:85%; max-width:85%; object-fit:contain; z-index:2; position:relative; pointer-events:none; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.12));">
        <?php else : ?>
          <svg class="bottle-render" viewBox="0 0 160 380" aria-label="Chai xịt khử mùi Mây Mây 30ml" style="width:58%; max-height:88%; z-index:2; position:relative;">
            <use href="#bottle-shape"/>
          </svg>
        <?php endif; ?>
        <svg class="botanical b1" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-mint"/></svg>
        <svg class="botanical b2" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-ginger"/></svg>
      </div>
      <div class="zones" id="zones" role="tablist" aria-label="Vùng sử dụng">
        <button type="button" role="tab" data-zone="0" <?php echo !empty($z1_img) ? 'data-img="' . $z1_img . '"' : ''; ?>>Vùng nách</button>
        <button type="button" role="tab" data-zone="1" <?php echo !empty($z2_img) ? 'data-img="' . $z2_img . '"' : ''; ?>>Vùng chân</button>
        <button type="button" role="tab" data-zone="2" <?php echo !empty($z3_img) ? 'data-img="' . $z3_img . '"' : ''; ?>>Cơ thể</button>
        <button type="button" role="tab" data-zone="3" <?php echo !empty($z4_img) ? 'data-img="' . $z4_img . '"' : ''; ?>>Vùng tiểu EVA</button>
      </div>
    </div>
    <div>
      <p class="label reveal">Công dụng</p>
      <h2 class="h2 display reveal d1">Một chai xịt nhỏ gọn, tiện chăm sóc <em>những vùng cơ thể.</em></h2>
      <ul class="benefit-list reveal d2">
        <li><svg class="icon"><use href="#i-check"/></svg>Hạn chế mùi cơ thể.</li>
        <li><svg class="icon"><use href="#i-check"/></svg>Giúp vùng dưới cánh tay có cảm giác khô thoáng.</li>
        <li><svg class="icon"><use href="#i-check"/></svg>Chăm sóc vùng chân có mùi khó chịu.</li>
        <li><svg class="icon"><use href="#i-check"/></svg>Xịt khử mùi vùng tiểu EVA sau sinh.</li>
        <li><svg class="icon"><use href="#i-check"/></svg>Dễ sử dụng tại nhà hoặc mang theo khi đi làm, đi học, du lịch.</li>
      </ul>
      <a href="#dat-hang" class="btn btn-lg btn-herb reveal d3">Flash sale 49K + Freeship<span class="btn-sep" aria-hidden="true"></span>Mua ngay <svg class="icon"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

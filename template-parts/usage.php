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

if (strpos($z1_img, 'chan') !== false && (empty($z2_img) || strpos($z2_img, 'nach') !== false || strpos($usage_img, 'nach') !== false)) {
    $temp_z2 = $z1_img;
    $temp_z1 = (!empty($z2_img) && strpos($z2_img, 'nach') !== false) ? $z2_img : $usage_img;
    $z1_img  = $temp_z1;
    $z2_img  = $temp_z2;
}

$zones_data = array(
    0 => array('title' => 'Vùng nách', 'img' => $z1_img),
    1 => array('title' => 'Vùng chân', 'img' => $z2_img),
    2 => array('title' => 'Cơ thể', 'img' => $z3_img),
    3 => array('title' => 'Vùng tiểu EVA', 'img' => $z4_img),
);
?>
<!-- BENEFITS / USAGE -->
<section class="section benefits panel" id="cong-dung">
  <div class="container">
    <div class="benefit-visual reveal">
      <div class="packshot" data-visual="usage">
        <div class="usage-slides">
          <?php foreach ($zones_data as $idx => $z) : 
            $slide_img = !empty($z['img']) ? $z['img'] : $usage_img;
          ?>
            <div class="usage-slide <?php echo $idx === 0 ? 'active' : ''; ?>" data-slide="<?php echo $idx; ?>">
              <?php if (!empty($slide_img)) : ?>
                <img class="photo" src="<?php echo $slide_img; ?>" alt="Xịt khử mùi Mây Mây – <?php echo $z['title']; ?>">
              <?php else : ?>
                <svg class="bottle-render" viewBox="0 0 160 380" aria-label="Chai xịt khử mùi Mây Mây 30ml" style="width:58%; max-height:88%; z-index:2; position:relative;">
                  <use href="#bottle-shape"/>
                </svg>
                <svg class="botanical b1" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-mint"/></svg>
                <svg class="botanical b2" viewBox="0 0 84 84" style="z-index:1;"><use href="#b-ginger"/></svg>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="zones" id="zones" role="tablist" aria-label="Vùng sử dụng">
        <button type="button" role="tab" class="active" data-zone="0" aria-selected="true">Vùng nách</button>
        <button type="button" role="tab" data-zone="1" aria-selected="false">Vùng chân</button>
        <button type="button" role="tab" data-zone="2" aria-selected="false">Cơ thể</button>
        <button type="button" role="tab" data-zone="3" aria-selected="false">Vùng tiểu EVA</button>
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

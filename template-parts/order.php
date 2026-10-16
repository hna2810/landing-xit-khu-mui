<?php
/**
 * Order Form Template Part
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- ORDER -->
<section class="section order panel" id="dat-hang">
  <div class="container">
    <div class="order-copy">
      <p class="label reveal">Đặt hàng</p>
      <h2 class="display reveal d1">Đừng để nỗi lo mùi cơ thể làm bạn <em>thiếu tự tin.</em></h2>
      <p class="lead reveal d1">Chủ động chăm sóc bản thân mỗi ngày với Xịt Khử Mùi Gừng Cam Mây Mây.</p>
      <div class="timer reveal d2"><span>Flash sale kết thúc sau</span><b id="timer">00:00:00</b></div>
      <ul class="order-perks reveal d2">
        <li><svg class="icon"><use href="#i-check"/></svg>Giá flash sale 49.000đ (niêm yết 89.000đ)</li>
        <li><svg class="icon"><use href="#i-check"/></svg>Freeship toàn quốc</li>
        <li><svg class="icon"><use href="#i-check"/></svg>Thảo mộc thuần chay, hương thanh mát</li>
      </ul>
      <div class="order-visual reveal d3" id="orderVisual">
        <svg class="botanical b1" viewBox="0 0 84 84"><use href="#b-mint"/></svg>
        <svg class="botanical b2" viewBox="0 0 84 84"><use href="#b-orange"/></svg>
      </div>
    </div>

    <div class="form-card reveal d1">
      <div id="formContent">
        <h3>Điền thông tin để đặt hàng</h3>
        <form id="orderForm" novalidate>
          <div class="field">
            <label for="fName">Họ và tên</label>
            <input id="fName" name="name" type="text" autocomplete="name" placeholder="Nhập họ và tên">
            <div class="err">Vui lòng nhập họ và tên.</div>
          </div>
          <div class="field">
            <label for="fPhone">Số điện thoại</label>
            <input id="fPhone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" placeholder="Nhập số điện thoại">
            <div class="err">Số điện thoại gồm 10 số, bắt đầu bằng 0.</div>
          </div>
          <div class="field">
            <label for="fAddress">Địa chỉ nhận hàng</label>
            <textarea id="fAddress" name="address" autocomplete="street-address" placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành"></textarea>
            <div class="err">Vui lòng nhập địa chỉ nhận hàng.</div>
          </div>
          <div class="field">
            <span class="field-label">Chọn mua</span>
            <div class="packages" id="packages"></div>
          </div>
          <div class="total">
            <span>Tổng thanh toán<small>Miễn phí vận chuyển</small></span>
            <b id="total">49.000đ</b>
          </div>
          <button type="submit" class="btn btn-block" id="submitBtn">Đặt hàng ngay</button>
          <p class="form-note">(*) Vui lòng kiểm tra lại thông tin nhận hàng trước khi xác nhận đơn.</p>
          <div class="form-rating" id="formRating" hidden></div>
        </form>
      </div>
      <div class="success" id="success" role="status">
        <div class="check"><svg class="icon" style="width:30px;height:30px"><use href="#i-check"/></svg></div>
        <h3>Đặt hàng thành công</h3>
        <p>Cảm ơn <b id="sName"></b>. Mây Mây sẽ liên hệ số <b id="sPhone"></b> để xác nhận đơn hàng.</p>
      </div>
    </div>
  </div>
</section>

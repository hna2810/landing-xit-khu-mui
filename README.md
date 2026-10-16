# Landing Xịt Khử Mùi Gừng Cam Mây Mây 30ml

Giao diện Landing Page chuyên dụng cho sản phẩm **Xịt Khử Mùi Gừng Cam Mây Mây 30ml** (Home Care Việt Nam).

Được tách thành theme và git độc lập nhằm đảm bảo an toàn tuyệt đối, không ảnh hưởng đến các landing page khác (như Landing Kem Da Bon Bon, Bon Bon Plus,...).

## Cấu Trúc Dự Án

```
landing-xit-khu-mui/
├── assets/
│   ├── css/
│   │   └── main.css             # CSS đã tách độc lập cho giao diện
│   ├── js/
│   │   └── main.js              # Toàn bộ logic tương tác (CONFIG, giỏ hàng, modal, lightbox, accordion)
│   ├── scss/
│   │   └── main.scss            # Mã nguồn SCSS
│   └── img/                     # Hình ảnh tĩnh của theme
├── inc/
│   ├── assets.php               # Enqueue CSS, JS và Google Fonts (Be Vietnam Pro, Lora)
│   ├── cleanup.php              # Tối ưu hóa tải trang, dọn dẹp WordPress header
│   ├── helpers.php              # Hàm helper lx_get_field, lx_get_image_url
│   └── index.php                # Module loader
├── template-parts/
│   ├── hero.php                 # Phần đầu trang + nút mua nhanh
│   ├── strip.php                # Dải cam kết nổi bật
│   ├── pain.php                 # Nỗi lo thầm kín (4 vấn đề thường gặp)
│   ├── ingredients.php          # Thành phần thảo mộc thuần chay (Bạc hà, Trầu không, Gừng, Cam)
│   ├── usage.php                # Công dụng & chọn xem theo vùng (Nách, Chân, Cơ thể, EVA)
│   ├── video-reviews.php        # Video review thực tế
│   ├── steps.php                # 3 bước sử dụng đơn giản & lưu ý
│   ├── reviews.php              # Đánh giá khách hàng & bộ lọc số sao
│   ├── feedback.php             # Hình ảnh tin nhắn feedback khách hàng
│   ├── trust.php                # Cam kết chất lượng & chứng nhận
│   ├── specs.php                # Thông tin bổ sung (Dung tích, Số công bố, HSD)
│   ├── order.php                # Form đặt hàng Flash sale 49K + đồng hồ đếm ngược
│   └── faq.php                  # Câu hỏi thường gặp (Accordion)
├── footer.php                   # Chân trang + Sticky bar mobile + Modals
├── front-page.php               # Trang chủ
├── functions.php                # Khởi tạo theme & load module
├── header.php                   # Đầu trang + SVG Icons + Menu
├── index.html                   # Bản HTML tĩnh độc lập (có thể chạy không cần WordPress)
├── index.php                    # Điều phối các section
├── page.php                     # Trang con
├── screenshot.png               # Ảnh đại diện hiển thị trong Admin Theme
└── style.css                    # Khai báo thông tin theme WordPress
```

## Tính Năng Nổi Bật

1. **Hiệu Suất & Tốc Độ Cao**: Không phụ thuộc vào thư viện nặng; tương thích hoàn toàn chuẩn Core Web Vitals.
2. **2 Chế Độ Sử Dụng**:
   - **WordPress Theme**: Kích hoạt theme trong WP Admin (`Giao diện` -> `Giao diện`).
   - **Standalone HTML**: Mở trực tiếp file `index.html` trên trình duyệt để kiểm tra hoặc xuất bản lên hosting tĩnh độc lập.
3. **Cấu Hình Linh Hoạt (`CONFIG`)**:
   - Chỉnh sửa ảnh sản phẩm, video reviews, feedback, các gói combo mua hàng ngay trong file `assets/js/main.js`.
4. **Git Riêng Biệt**:
   - Tách biệt 100% lịch sử commit với các landing page khác để tránh xung đột mã nguồn.

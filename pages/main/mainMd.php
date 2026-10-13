<div class="main">
  <div class="main-block-list">
    <div class="main-block-list-item1">
      <h2>Đồng hồ của chúng tôi</h2>
      <h3>năm 2024</h3>
      <a href="">Khám phá những sản phẩm mới nhất của chúng tôi</a>
    </div>
    <div class="main-block-list-item2">

      <div class="grid">
        <?php
        $mysqll = "SELECT product.id_product,product.code_clock, described.describe_sample ,product_image.image_main
FROM product 
INNER JOIN described ON product.id_product = described.id_product
INNER JOIN product_image ON product.id_product = product_image.id_product
WHERE YEAR(product.date_release_clock) = 2024
ORDER BY product.date_release_clock DESC
LIMIT 3;";
        $resultl = mysqli_query($conn, $mysqll);
        while ($row = mysqli_fetch_assoc($resultl)) {
          $id_pr = $row["id_product"];


        ?>
          <div class="column3">
            <div class="main-block-list-item2-item-main">
              <img
                src="<?php echo $row["image_main"]; ?>"
                alt="" />
              <h1><?php echo $row["code_clock"]; ?></h1>
              <h2><?php echo $row["describe_sample"]; ?></h2>
              <a href="/clock/index.php?danhmuc=clockDt&id=<?php echo $id_pr;  ?>">kham pha them</a>
            </div>
          </div>
        <?php
        }
        ?>
        <!-- <div class="column3">
          <div class="main-block-list-item2-item-main">
            <img
              src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/carouselHP_novelties_1000x1321_ROO_77605OK-OO-A101CA-01?size=568,0&fmt=avif-alpha&dpr=off"
              alt="" />
            <h1>tên sản phâm</h1>
            <h2>giới thiệu sơ</h2>
            <a href="">kham pha them</a>
          </div>
        </div>
        <div class="column3">
          <div class="main-block-list-item2-item-main">
            <img
              src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/carouselHP_novelties_1000x1321_ROC_26650FO-OO-D353CA-01?size=568,0&fmt=avif-alpha&dpr=off"
              alt="" />
            <h1>tên sản phâm</h1>
            <h2>giới thiệu sơ</h2>
            <a href="">kham pha them</a>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="main-decoration1 fade-in">
    <div class="main-decoration1-block1">
      <h2>
        AP X MUSIC 2024 <br />
        TAI KWUN TẠI HONG KONG
      </h2>
      <p>
        Audemars Piguet đã kỷ niệm cam kết lâu dài của mình đối với âm nhạc
        tại Hồng Kông bằng một sự kiện địa phương, AP x Music 2024. Trong ba
        ngày liên tiếp, từ ngày 27 đến ngày 29 tháng 9, đã có các hoạt động
        lắp đặt nhập vai quy mô lớn, trải nghiệm tương tác, biểu diễn trực
        tiếp ngoài trời năng động và chương trình DJ trực tiếp vào đêm
        khuya.
      </p>
      <a href="/clock/index.php?danhmuc=news">khám phá thêm</a>
    </div>
    <div class="main-decoration1-block2-img">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/KV_APxMUSIC_1920x1283_02?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
      <div class="hide-on-mobile"></div>
    </div>
  </div>
  <div class="main-decoration2 fade-in">
    <div class="main-decoration2-block1">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/Inpage_MiniOak_HP_1920x1283?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
    </div>
    <div class="main-decoration2-block2">
      <h2><span>NHỎ</span> NHƯNG MẠNH MẼ</h2>
      <p>
        Sự trở lại rực rỡ của dòng đồng hồ Mini Royal Oak hùng mạnh, lần đầu
        tiên được ra mắt với đường kính 23 mm và được chế tác bằng vàng mờ
        18 cara màu vàng, trắng hoặc hồng.
      </p>
      <a href=""></a>
    </div>
  </div>
  <div class="main-decoration1 fade-in">
    <div class="main-decoration1-block1">
      <h2>
        [RE]MASTER02, <br />
        <span> MỘT LỜI TÔN VINH CHỦ NGHĨA TÀN BẠO</span>
      </h2>
      <p>
        Phiên bản giới hạn mới này có vỏ hình chữ nhật không đối xứng 41 mm
        làm bằng hợp kim vàng cát 18 carat mới và được trang bị Calibre
        7129.
      </p>
      <a href="/clock/index.php?danhmuc=news">khám phá thêm</a>
    </div>
    <div class="main-decoration1-block2-img">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/inpage-remaster_HP_1920x1283?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
      <div></div>
    </div>
  </div>
  <div class="main-decoration2 fade-in">
    <div class="main-decoration2-block1">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/image_code_HP_1920x1283?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
    </div>
    <div class="main-decoration2-block2 fade-in">
      <h2>Bảy mẫu tham khảo <span>bằng vàng hồng 18 carat</span></h2>
      <p>
        5 năm sau khi ra mắt, bộ sưu tập Code 11.59 của Audemars Piguet tiếp
        tục phát triển, cung cấp nhiều kích cỡ, chất liệu, màu sắc và tính
        năng phức tạp, tất cả đều có thiết kế rất hiện đại.
      </p>
      <a href=""></a>
    </div>
  </div>
  <div class="main-decoration1 fade-in">
    <div class="main-decoration1-block1 fade-in">
      <h2>
        AP CHRONICLES: <br />
        <span> THAM QUAN LỊCH SỬ CỦA AUDEMARS PIGUE </span>
      </h2>
      <p>
        Du hành ngược thời gian và đắm mình vào vũ trụ Audemars Piguet thông
        qua các bài viết phong phú, bảng thông số kỹ thuật về mẫu mã và cỡ
        máy cũng như giai thoại độc quyền và cảnh quay lưu trữ được nhóm
        Heritage của chúng tôi khám phá. khuya.
      </p>
      <a href="/clock/index.php?danhmuc=news">khám phá thêm</a>
    </div>
    <div class="main-decoration1-block2-img">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/header_APChronicles_1920x1129_v2?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
      <div></div>
    </div>
  </div>
  <div class="main-decoration2 fade-in">
    <div class="main-decoration2-block1 fade-in">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/Musee_HP?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
    </div>
    <div class="main-decoration2-block2">
      <h2>Bảo tàng <span>Atelier Audemars Piguet</span></h2>
      <p>
        Trải nghiệm di sản, nghề thủ công và mối liên hệ của chúng tôi với
        thế giới tại Musée Atelier Audemars Piguet, nơi tôn vinh những người
        thợ thủ công đã tạo nên Audemars Piguet như ngày nay, qua từng thế
        hệ.
      </p>
      <a href="clock/index.php?danhmuc=news"></a>
    </div>
  </div>
  <div class="main-decoration1 fade-in">
    <div class="main-decoration1-block1">
      <h2>
        <span> Dịch vụ phủ sóng </span><br />
        AP
      </h2>
      <p>
        Dịch vụ bảo hành AP là dịch vụ miễn phí trong 2 năm bảo vệ đồng hồ
        AP khỏi trộm cắp, cướp giật cũng như hư hỏng chức năng.
      </p>
      <a href="">khám phá thêm</a>
    </div>
    <div class="main-decoration1-block2-img">
      <img
        src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/img_apcoverage_1920x1283_05-1?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off"
        alt="" />
      <div></div>
    </div>
  </div>
</div>
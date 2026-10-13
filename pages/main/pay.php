<?php
if (isset($_POST['products'])) {


    // Lấy dữ liệu JSON từ form
    $productsJson = $_POST['products'];
    $id_user = $_SESSION["user_id"];
    include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/class/user.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/clock/class/product.php";
    $user = user::lay_thong_tin_1_user($id_user);
    // $productt = Product::lay_thong_tin_1_product($id_user);



    // Giải mã JSON thành mảng
    $products = json_decode($productsJson, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("Dữ liệu JSON không hợp lệ.");
    }



    // foreach ($products as $product):
    function lay_hinh_san_pham($id)
    {
        global $conn;
        $mysql = "SELECT image_main FROM product_image WHERE id_product = '$id'";
        $result = mysqli_query($conn, $mysql);
        $row = mysqli_fetch_assoc($result);
        return $row ? $row['image_main'] : null; // Trả về giá trị hoặc null nếu không có dữ liệu
    }


    // endforeach;


    // Kiểm tra xem có sản phẩm nào trong danh sách không
    if (empty($products)) {
        echo "Danh sách sản phẩm trống!";
    } else {
        $_SESSION['form_data'] = $products;

        function tong_tien_don_hang()
        {
            global $products;
            $price = 0;
            global $conn;
            $tien_moi_don = 0;
            $tong_tien = 0;

            foreach ($products as $product) {
                $id_pr = $product["id"];
                $quantity = $product["quantity"];
                $mysql = "SELECT price FROM product WHERE id_product = '$id_pr'";
                $result = mysqli_query($conn, $mysql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $tien_san_pham = (float)$row["price"];
                    $tien_moi_don = (int)$quantity * $tien_san_pham;
                    $tong_tien += $tien_moi_don;
                }
            }
            return $tong_tien;
        }


        $total_cost = tong_tien_don_hang();

?>
        <div class="checkout-container">
            <h2>Thông tin thanh toán</h2>
            <div class="user-info">
                <p><strong>Người dùng:</strong> <?= htmlspecialchars($user['username']) ?> (<?= htmlspecialchars($user['gioi_tinh']) ?>)</p>
            </div>

            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <?php
                    $img2 = lay_hinh_san_pham($product["id"]);
                    if (!$img2) {
                        $img2 = "/path/to/default-image.jpg"; // Ảnh mặc định nếu không có
                    } ?>
                    <!-- <?php echo $img2; ?> -->
                    <?php $oject_user = Product::ed_pr($product["id"]); ?>
                    <div class="product-item">
                        <div class="product-image">
                            <img class="
                            
                           
                            " src="<?php echo $img2; ?>" alt="<?php echo $img2; ?>">
                        </div>
                        <div class="product-info">
                            <h3><?= htmlspecialchars($oject_user->name) ?></h3>
                            <p><strong>Mã sản phẩm:</strong> <?= htmlspecialchars($oject_user->code) ?></p>
                            <p><strong>Ngày phát hành:</strong> <?= htmlspecialchars($oject_user->releaseDate) ?></p>
                            <p><strong>Model:</strong> <?= htmlspecialchars($oject_user->model) ?></p>
                        </div>
                        <div class="product-quantity">
                            <p><strong>Số lượng:</strong> <?= htmlspecialchars($product["quantity"]) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div style="display:flex;justify-content: space-between;">
                    <span>Tổng tiền</span>
                    <span><?php echo  $total_cost; ?></span>
                </div>
            </div>
        </div>

<?php

        // }
    }
} else {
    echo '<script>alert("Chưa có thông tin giỏ hàng");</script>';
    // print_r($products);
}

if (isset($_POST["accept_order"])) {
    // Hàm tạo mã đơn hàng
    function lay_so_luong_don()
    {
        global $conn;
        $mysql = "SELECT COUNT(*) AS count FROM orders WHERE DATE(created_at) = CURDATE()";
        $result = mysqli_query($conn, $mysql);

        if (!$result) {
            die("Lỗi: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        return $row["count"] + 1;
    }
    $productss = $_SESSION['form_data'];

    function tong_tien_don_hang()
    {
        global $productss;
        $price = 0;
        global $conn;
        $tien_moi_don = 0;
        $tong_tien = 0;

        foreach ($productss as $product) {
            $id_pr = $product["id"];
            $quantity = $product["quantity"];
            $mysql = "SELECT price FROM product WHERE id_product = '$id_pr'";
            $result = mysqli_query($conn, $mysql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $tien_san_pham = (float)$row["price"];
                $tien_moi_don = (int)$quantity * $tien_san_pham;
                $tong_tien += $tien_moi_don;
            }
        }
        return $tong_tien;
    }
    $total_cost = tong_tien_don_hang();

    $id_user = $_SESSION["user_id"];
    $status = "pending";
    $current_day = date('Ymd');
    $order_count = lay_so_luong_don();
    $order_code = "ORD" . $current_day . str_pad($order_count, 3, "0", STR_PAD_LEFT);

    // Hàm tạo đơn hàng
    function tao_don_hang($order_code, $id_user, $status, $total_cost)
    {
        global $conn;
        $sql = "INSERT INTO orders(order_number, user_id, status,total_cost) VALUES ('$order_code', '$id_user', '$status','$total_cost')";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Lỗi: " . mysqli_error($conn));
        }
    }

    // Gọi hàm để tạo đơn hàng
    tao_don_hang($order_code, $id_user, $status, $total_cost);

    // Hàm lấy ID đơn hàng
    function lay_id_don_hang($order_code)
    {
        global $conn;
        $mysql = "SELECT id_order FROM orders WHERE order_number = '$order_code'";
        $result = mysqli_query($conn, $mysql);

        if (!$result) {
            die("Lỗi: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        return $row["id_order"];
    }

    $id_order = lay_id_don_hang($order_code);

    // echo $id_order;
    // print_r($products);

    // Hàm thêm sản phẩm vào đơn hàng
    // if (isset($_POST['products'])) {

    // echo $productss;
    function make_order_item($id_order)
    {
        // if (isset($_POST['products'])) {
        global $conn;
        global $productss;
        // $productsJson = $_POST['products'];

        // // Giải mã JSON thành mảng
        // $products = json_decode($productsJson, true);
        foreach ($productss as $product) {
            $id = $product['id'];
            // echo $id;
            $quantity = $product['quantity'];
            // echo $quantity;
            $mysql = "INSERT INTO order_items(order_id, id_product, quantity) VALUES ('$id_order', '$id', '$quantity')";
            $result = mysqli_query($conn, $mysql);

            if (!$result) {
                die("Lỗi: " . mysqli_error($conn));
            }
        }
    }

    // Gọi hàm thêm sản phẩm vào đơn hàng
    make_order_item($id_order);
    unset($_SESSION['form_data']);
    header("Location:/clock/index.php");
}
?>


<footer class="pay-footer" style="padding: 0 289px;">
    <form action="" method="post">
        <button name="accept_order" class="btn_big btn_ok" type="submit">đặt hàng</button>
    </form>

</footer>
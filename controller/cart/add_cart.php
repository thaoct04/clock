<?php
session_start();
// session_unset();
include $_SERVER['DOCUMENT_ROOT'] . "/clock/class/cart.php";

$id_pr = $_GET["id"];
$id_user = $_SESSION["user_id"];

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["user_id"])) {
    // $id_pr = $_GET["id"];
    echo "<script>
        alert('User not logged in. Please log in to continue.');
        window.location.href = '/clock/index.php?danhmuc=clockDt&id=$id_pr';
    </script>";
    die();
}



// Nạp lớp cart trước khi sử dụng

// Lấy thông tin giỏ hàng cho sản phẩm cụ thể
$cart = cart::get_cart($id_pr, $id_user);
// print_r($cart);

// Khởi tạo giỏ hàng nếu chưa tồn tại cho user_id hiện tại
if (!isset($_SESSION["cart"][$id_user])) {
    $_SESSION["cart"][$id_user] = []; // Mỗi user có giỏ hàng riêng
}

// Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
$exists = false;

foreach ($_SESSION["cart"][$id_user] as $item) {
    $object = unserialize($item); // Giải mã đối tượng lưu trữ trong session
    if ($object->id_pr == $cart->id_pr) {
        $exists = true;
        break;
    }
}

// Nếu sản phẩm chưa có, thêm vào giỏ hàng
if (!$exists && $cart) {
    $_SESSION["cart"][$id_user][] = serialize($cart);  // Lưu sản phẩm vào giỏ hàng của user hiện tại
    header("Location:/clock/index.php?danhmuc=clockDt&id=$id_pr");
    // echo "Sản phẩm đã được thêm vào giỏ hàng!";
    //print_r($_SESSION["cart"][$id_user]); // Chỉ in giỏ hàng của user hiện tại
} else {
    echo "Sản phẩm đã tồn tại trong giỏ hàng!";
    header("Location:/clock/index.php?danhmuc=clockDt&id=$id_pr");
}

<?php

session_start();

if (isset($_GET["id"]) && isset($_SESSION["user_id"])) {
    $id = $_GET["id"]; // ID sản phẩm cần xóa
    $id_user = $_SESSION["user_id"]; // Lấy ID user hiện tại

    // Kiểm tra giỏ hàng của user có tồn tại không
    if (isset($_SESSION["cart"][$id_user])) {
        foreach ($_SESSION["cart"][$id_user] as $index => $item) {
            include_once $_SERVER['DOCUMENT_ROOT'] . "/clock/class/cart.php";
            $object = unserialize($item); // Deserialize để lấy đối tượng sản phẩm

            if ($object->id_pr == $id) { // So sánh ID sản phẩm
                unset($_SESSION["cart"][$id_user][$index]); // Xóa sản phẩm
                $_SESSION["cart"][$id_user] = array_values($_SESSION["cart"][$id_user]); // Reset lại index
                // echo "Đã xóa sản phẩm ID: $id khỏi giỏ hàng.";
                echo "<script>alert('Đã xóa sản phẩm ID: $id khỏi giỏ hàng.'); window.location.href='/clock/index.php?danhmuc=cart';</script>";
                exit; // Dừng script ngay sau khi hiển thị alert và chuyển hướng
                // break; // Thoát vòng lặp sau khi xóa
            }
        }
    } else {
        echo "Giỏ hàng của user không tồn tại.";
    }
} else {
    echo "Thông tin không hợp lệ.";
}

<?php
session_start();
unset($_SESSION['user_id']);
?>

<script>
    // Hiển thị thông báo cho người dùng
    alert("Bạn đã đăng xuất thành công!");

    // Điều hướng tới trang chỉ định
    window.location.href = "http://localhost:8080/clock/index.php";
</script>
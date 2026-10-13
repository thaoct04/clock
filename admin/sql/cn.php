<?php
$servername = "localhost"; // Hoặc địa chỉ máy chủ
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$dbname = "clock"; // Tên cơ sở dữ liệu
$port = 3307; // Cổng kết nối

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

<?php
session_start();
header('Content-Type: application/json');

// Kết nối cơ sở dữ liệu
include $_SERVER['DOCUMENT_ROOT'] . "/clock/sql/cn.php";

// Lấy dữ liệu từ AJAX
$content = isset($_POST['content']) ? trim($_POST['content']) : null;
$id_product = isset($_POST['id_product']) ? intval($_POST['id_product']) : null;
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;

// Kiểm tra dữ liệu
if (!$user_id) {
    echo json_encode(["success" => false, "message" => "Vui lòng đăng nhập."]);
    exit;
}

if (!$content || !$id_product) {
    echo json_encode(["success" => false, "message" => "Dữ liệu không hợp lệ."]);
    exit;
}

// Thêm bình luận vào cơ sở dữ liệu
$stmt = $conn->prepare("INSERT INTO comment (content, id_product, id_user, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("sii", $content, $id_product, $user_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Thêm bình luận thành công."]);
} else {
    echo json_encode(["success" => false, "message" => "Thêm bình luận thất bại."]);
}

$stmt->close();
$conn->close();

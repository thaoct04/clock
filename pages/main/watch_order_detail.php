<?php
// <?php
// Kết nối cơ sở dữ liệu
// require 'db_connect.php'; // Đảm bảo file này chứa thông tin kết nối $conn

// Lấy mã đơn hàng từ URL
$code_order = isset($_GET['code']) ? $_GET['code'] : '';

if (empty($code_order)) {
    die('Mã đơn hàng không hợp lệ.');
}

// Truy vấn thông tin đơn hàng
override:
$stmt_order = $conn->prepare("SELECT * FROM `orders` WHERE order_number = ?");
$stmt_order->bind_param("s", $code_order);
$stmt_order->execute();
$result_order = $stmt_order->get_result();
$order = $result_order->fetch_assoc();

if (!$order) {
    die('Không tìm thấy đơn hàng.');
}

$id_order = $order['id_order'];

// Truy vấn thông tin sản phẩm trong đơn hàng
$stmt_items = $conn->prepare("SELECT oi.id_product, oi.quantity, pi.image_main FROM order_items oi INNER JOIN product_image pi ON oi.id_product = pi.id_product WHERE oi.order_id = ?");
$stmt_items->bind_param("i", $id_order);
$stmt_items->execute();
$result_items = $stmt_items->get_result();

$items = [];
while ($row = $result_items->fetch_assoc()) {
    $items[] = $row;
}
?>


<!-- <body> -->
<div class="container">
    <h1 class="text_detail">Chi tiết đơn hàng</h1>

    <div class="order-info">
        <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['order_number']) ?></p>
        <p><strong>Trạng thái:</strong> <?= htmlspecialchars($order['status']) ?></p>
        <p><strong>Tổng chi phí:</strong> <?= number_format($order['total_cost'], 0, ',', '.') ?> VNĐ</p>
        <p><strong>ID người dùng:</strong> <?= htmlspecialchars($order['user_id']) ?></p>
    </div>

    <div class="products">
        <?php foreach ($items as $item): ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($item['image_main']) ?>" alt="Sản phẩm">
                <div class="details">
                    <p><strong>ID sản phẩm:</strong> <?= htmlspecialchars($item['id_product']) ?></p>
                    <p><strong>Số lượng:</strong> <?= htmlspecialchars($item['quantity']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- </body> -->

<!-- </html> -->
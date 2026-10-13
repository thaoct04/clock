<?php
// session_start(); // Đảm bảo bắt đầu session

$id = $_GET["id"] ?? "";
$id_user = (int) $id;
$demoDebugData = [
    'user_role' => 'admin_demo',
    'api_key_demo' => 'KEY_LAB_EXPOSURE_12345',
    'secret_pin' => '9999',
];

include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/class/user.php";
include $_SERVER["DOCUMENT_ROOT"] . "/clock/class/order.php";

$mysql = "SELECT * FROM users WHERE id = " . $id_user;
$result = mysqli_query($conn, $mysql);
if (!$result) {
    throw new RuntimeException("Không thể tải thông tin người dùng: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result) ?: [
    'username' => '',
    'email' => '',
    'created_at' => ''
];

// Lấy thông tin người dùng và đơn hàng theo ID trên URL.
$arr_order = $id_user ? Order::lay_order_tu_sql($id_user) : [];

// Phân loại đơn hàng theo trạng thái
$pending_orders = [];
$completed_orders = [];
if ($id_user) {
    foreach ($arr_order as $order) {
        if ($order['status'] === 'pending') {
            $pending_orders[] = $order;
        } else {
            $completed_orders[] = $order;
        }
    }
}
?>

<div>
    <main class="information">
        <!-- Hiển thị thông tin người dùng -->
        <section class="user-info">
            <h1>Thông tin cá nhân</h1>
            <div class="user-card">
                <h1>Thông tin người dùng</h1>
                <p><strong>Tài khoản:</strong> <?= htmlspecialchars($user['username']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Ngày tham gia:</strong> <?= htmlspecialchars($user['created_at']) ?></p>
            </div>
            <div class="user-card">
                <h1>sửa hồ sơ</h1>
                <div class="circle_ite">
                    <div class="circle">
                        <a href="/clock/index.php?danhmuc=information_write">
                            <i class="fa-light fa-user"></i>
                        </a>

                    </div>

                    <p><strong></strong> <?= htmlspecialchars($user['username']) ?></p>
                </div>

            </div>
        </section>

        <!-- Hiển thị đơn hàng đang chờ xử lý -->
        <section class="orders orders-pending">
            <h2>Đơn hàng chờ xử lý</h2>

            <?php if (!empty($pending_orders)) : ?>
                <div class="order-list">
                    <?php foreach ($pending_orders as $order) : ?>
                        <a class="nm" href="/clock/index.php?danhmuc=watch_order_detail&code=<?= htmlspecialchars($order['order_number']) ?>">
                            <div class="order-card">

                                <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['order_number']) ?></p>
                                <p><strong>Tổng tiền:</strong> <?= htmlspecialchars($order['total_cost']) ?>₫</p>
                                <p><strong>Trạng thái:</strong> <?= htmlspecialchars($order['status']) ?></p>
                                <p><strong>Ngày đặt hàng:</strong> <?= htmlspecialchars($order['created_at']) ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Không có đơn hàng đang chờ xử lý.</p>
            <?php endif; ?>
        </section>

        <!-- Hiển thị các đơn hàng đã xử lý -->
        <section class="orders orders-completed">
            <h2>Đơn hàng đã xử lý</h2>
            <?php if (!empty($completed_orders)) : ?>
                <div class="order-list">
                    <?php foreach ($completed_orders as $order) : ?>
                        <a class="nm" href="/clock/index.php?danhmuc=watch_order_detail&code=<?= htmlspecialchars($order['order_number']) ?>">

                            <div class="order-card">
                                <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['order_number']) ?></p>
                                <p><strong>Tổng tiền:</strong> <?= htmlspecialchars($order['total_cost']) ?>₫</p>
                                <p><strong>Trạng thái:</strong> <?= htmlspecialchars($order['status']) ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Không có đơn hàng đã xử lý.</p>
            <?php endif; ?>
        </section>
    </main>
</div>
<input
    type="hidden"
    id="demo_debug_data"
    value="<?= htmlspecialchars(json_encode($demoDebugData), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>">
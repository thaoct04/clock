<?php
include $_SERVER['DOCUMENT_ROOT'] . "/clock/admin/class/user.php";
include $_SERVER['DOCUMENT_ROOT'] . "/clock/class/order.php";
$arr = user::editSt();
if (isset($_POST["update-order"])) {
    // Lấy dữ liệu từ form
    $new_status = $_POST["options"]; // Giá trị mới từ dropdown
    $id = $_POST["id_order"]; // ID của đơn hàng

    // Gọi hàm update
    Order::updateStatusSql($new_status, $id);
}

?>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="/clock/admin/main.php">Dashboard</a>
                </li>
                <li><i class="bx bx-chevron-right"></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
        </a>
    </div>

    <!-- <ul class="box-info">
        <li>
            <i class="bx bxs-calendar-check"></i>
            <span class="text">
                <h3>
                    <?php
                    echo $arr["order_numbers"];

                    ?>
                </h3>
                <p>New Order</p>
            </span>
        </li>
        <li>
            <i class="bx bxs-group"></i>
            <span class="text">
                <h3>2834</h3>
                <p>Visitors</p>
            </span>
        </li>
        <li>
            <i class="bx bxs-dollar-circle"></i>
            <span class="text">
                <h3>$2543</h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul> -->

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>
                <i class="bx bx-search"></i>
                <i class="bx bx-filter"></i>
            </div>
            <div class="order-list">

                <?php
                // $groupedOrders = [];
                // foreach ($arr["orders"] as $order) {
                //     $groupedOrders[$order["username"]][] = $order;
                // }
                $groupedOrders = [];
                foreach ($arr["orders"] as $order) {
                    $groupedOrders[$order["order_number"]][] = $order;
                }

                foreach ($groupedOrders as $orderNumber => $orders): ?>
                    <div class="order-group">
                        <!-- Phần thông tin đơn hàng chung -->
                        <div class="order-header">
                            <p><strong>User:</strong> <?php echo $orders[0]["username"]; ?></p>
                            <p><strong>Date Order:</strong> <?php echo $orders[0]["created_at"]; ?></p>
                            <p><strong>Code Order:</strong> <?php echo $orderNumber; ?></p>
                            <form method="post" action="">
                                <div class="edit-option">
                                    <p><strong>Status:</strong> <span class="status completed"><?php echo $orders[0]["status"]; ?></span></p>
                                    <select id="mySelect" name="options">
                                        <option value="pending" <?php echo $orders[0]["status"] == "pending" ? "selected" : ""; ?>>Pending</option>
                                        <option value="shipped" <?php echo $orders[0]["status"] == "shipped" ? "selected" : ""; ?>>Shipped</option>
                                        <option value="delivered" <?php echo $orders[0]["status"] == "delivered" ? "selected" : ""; ?>>Delivered</option>
                                        <option value="cancelled" <?php echo $orders[0]["status"] == "cancelled" ? "selected" : ""; ?>>Cancelled</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id_order" value="<?php echo $orders[0]["id_order"]; ?>">
                                <button type="submit" name="update-order">Cập nhật đơn hàng</button>
                            </form>
                        </div>

                        <!-- Phần thông tin chi tiết các sản phẩm -->
                        <div class="order-details">
                            <?php foreach ($orders as $value): ?>
                                <div class="order-item">
                                    <p><strong>id product:</strong> <?php echo $value["id_product"]; ?></p>
                                    <p><strong>quantity product:</strong> <?php echo $value["quantity"]; ?></p>
                                    <p><strong>price product:</strong> <?php echo $value["total_cost"]; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>

        </div>

    </div>
</main>
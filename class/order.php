<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
class Order
{
    private $order_number;
    private $user_id;
    private $status;
    private $total_cost;

    // Constructor
    public function __construct($order_number, $user_id, $status = 'pending', $total_cost = 0.0)
    {
        $this->order_number = $order_number;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->total_cost = $total_cost;
    }

    // Getters
    public function getOrderNumber()
    {
        return $this->order_number;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTotalCost()
    {
        return $this->total_cost;
    }

    // Setters
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setTotalCost($total_cost)
    {
        if ($total_cost >= 0) {
            $this->total_cost = $total_cost;
        } else {
            throw new Exception("Total cost cannot be negative.");
        }
    }

    // Method to display order details
    public function displayOrder()
    {
        return "Order Number: {$this->order_number}\n" .
            "User ID: {$this->user_id}\n" .
            "Status: {$this->status}\n" .
            "Total Cost: {$this->total_cost}\n";
    }

    // Method to update status
    public function updateStatus($new_status)
    {
        $valid_statuses = ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'];
        if (in_array($new_status, $valid_statuses)) {
            $this->status = $new_status;
        } else {
            throw new Exception("Invalid status provided.");
        }
    }
    public static function updateStatusSql($new_status, $id)
    {
        global $conn;
        $mysql = "UPDATE orders SET status = '$new_status'  WHERE id_order = '$id'";
        $result = mysqli_query($conn, $mysql);
        if ($result) {
        } else {
            echo $result . "không chạy";
        }
    }
    public static function lay_order_tu_sql($id_user)
    {
        global $conn;
        // Bảo mật SQL Injection bằng cách sử dụng truy vấn được chuẩn bị
        $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
        $stmt->bind_param("s", $id_user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row; // Thêm từng hàng vào mảng
            }
            return $arr;
        } else {
            // echo "Câu lệnh SQL sai hoặc user không có đơn hàng";
            return [];
        }
    }
}

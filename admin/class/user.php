<?php
class user
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $created_at;
    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
        $this->email = $email;
        $this->created_at = date("Y-m-d H:i:s"); // Thời gian tạo tài khoản
    }
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public static function getInform()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/clock/admin/sql/cn.php";

        $mysql = "SELECT users.id,users.username,orders.created_at,orders.id_order,orders.order_number,orders.updated_at,orders.status FROM users INNER JOIN orders ON users.id = orders.user_id;";
        $result = mysqli_query($conn, $mysql);
        while ($row = mysqli_fetch_assoc($result)) {
            $arrIn[] = $row;
            $lenghtOd[] = $row["order_number"];
            $numberOfOder = count($lenghtOd);
        }
        return [
            'orders' => $arrIn,
            'order_numbers' => $numberOfOder,

        ];
    }
    public static function editSt()
    {
        $t = $_GET["id"];
        $t2 = $_GET["id_user"];
        include $_SERVER['DOCUMENT_ROOT'] . "/clock/admin/sql/cn.php";

        $mysql = "SELECT users.id,users.username,orders.total_cost,orders.created_at,orders.id_order,order_items.id_product,order_items.quantity,orders.order_number,orders.updated_at,orders.status FROM users INNER JOIN orders ON users.id = orders.user_id
INNER JOIN order_items ON orders.id_order = order_items.order_id WHERE orders.id_order = '$t' AND users.id ='$t2' ;
 ;
 ";
        $result = mysqli_query($conn, $mysql);
        while ($row = mysqli_fetch_assoc($result)) {
            $arrIn[] = $row;
            $lenghtOd[] = $row["order_number"];
            $numberOfOder = count($lenghtOd);
        }
        return [
            'orders' => $arrIn,
            'order_numbers' => $numberOfOder,

        ];
    }
    public static function lay_thong_tin_1_user($id)
    {
        global $conn;
        $mysql = "SELECT * FROM users WHERE id = '$id'";
        $result =  mysqli_query($conn, $mysql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            echo "sai không láy dữ liệu dược";
        }
    }
}

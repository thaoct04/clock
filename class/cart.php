<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
class cart
{
    public $id_pr;
    public $id_user;
    public $name_product;
    public $date_release_clock;
    public $id_collection;
    public $image_main;
    public $describe_sample;
    public $cost;

    public function __construct($id_pr, $id_user, $name_product, $date_release_clock, $id_collection, $image_main, $describe_sample, $cost)
    {
        $this->id_pr = $id_pr;
        $this->id_user = $id_user;
        $this->name_product = $name_product;
        $this->date_release_clock = $date_release_clock;
        $this->id_collection = $id_collection;
        $this->image_main = $image_main;
        $this->describe_sample = $describe_sample;
        $this->cost = $cost;
    }
    public static function delete_item_cart($id) {}

    public static function get_cart($id, $id_user)
    {

        $mysql = "SELECT product.id_product,product.price,product.name_product,product.price,product.date_release_clock,product.id_collection,product_image.image_main,described.describe_sample FROM product INNER JOIN product_image ON product.id_product = product_image.id_product INNER JOIN described  ON product.id_product = described.id_product WHERE product.id_product = '$id' ";
        global $conn;
        $result = mysqli_query($conn, $mysql);
        // $arr = [];
        if ($row = mysqli_fetch_assoc($result)) {
            return $cart_item = new cart(
                $id,         // $id_pr
                $id_user,                   // $id_user
                $row["name_product"],       // $name_product
                $row["date_release_clock"], // $date_release_clock
                $row["id_collection"],      // $id_collection
                $row["image_main"],         // $image_main
                $row["describe_sample"],    // $describe_sample
                $row["price"]               // $cost
            );
        }

        // return null;
    }
}

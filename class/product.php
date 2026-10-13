<?php
include $_SERVER['DOCUMENT_ROOT'] . "/clock/sql/cn.php";

class Product
{
    public $id;
    public $name;
    public $releaseDate;
    public $model;
    public $code;
    public $collectionId;
    public $videoPr; // Thêm thuộc tính này cho video_pr

    public function __construct($id, $name, $releaseDate, $model, $code, $collectionId, $videoPr)
    {
        $this->id = $id;
        $this->name = $name;
        $this->releaseDate = $releaseDate;
        $this->model = $model;
        $this->code = $code;
        $this->collectionId = $collectionId;
        $this->videoPr = $videoPr;
    }

    public static function getPR()
    {
        $mysql = "SELECT * FROM product";
        global $conn;
        $result = mysqli_query($conn, $mysql);

        $arr_product = []; // Khởi tạo mảng rỗng

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product = new Product(
                    $row["id_product"],
                    $row["name_product"],
                    $row["date_release_clock"],
                    $row["model_watch"],
                    $row["code_clock"],
                    $row["id_collection"],
                    $row["video_pr"]
                );
                $arr_product[] = $product; // Thêm đối tượng vào mảng
            }
        }
        return $arr_product;
    }
    public static function delete_pr($id)
    {
        $sql = "DELETE FROM product WHERE id_product = '$id'";
        global $conn;
        $result = mysqli_query($conn, $sql);
    }
    public static function ed_pr($id)
    {
        $mysql = "SELECT * FROM product WHERE id_product = '$id'";
        global $conn;
        // $result = mysqli_query$conn, $mysql);
        $result = mysqli_query($conn, $mysql);
        $row = mysqli_fetch_assoc($result);
        return $product = new Product(
            $row["id_product"],
            $row["name_product"],
            $row["date_release_clock"],
            $row["model_watch"],
            $row["code_clock"],
            $row["id_collection"],
            $row["video_pr"]
        );
    }
    public static function update_sql($pr)
    {
        global $conn;
        $pr->releaseDate = $pr->releaseDate instanceof DateTime
            ? $pr->releaseDate->format('Y-m-d H:i:s') // Chuyển sang chuỗi
            : $pr->releaseDate; // Nếu đã là chuỗi, giữ nguyên

        $mysql = "UPDATE product 
        SET name_product = '{$pr->name}',
        date_release_clock = '{$pr->releaseDate}',
        model_watch = '{$pr->model}',
        code_clock = '{$pr->code}',
        id_collection = {$pr->collectionId}, 
        video_pr = '{$pr->videoPr}'
        WHERE id_product = {$pr->id}";

        $result = mysqli_query($conn, $mysql);
    }
    public static function lay_thong_tin_1_product($id)
    {
        global $conn;
        $mysql = "SELECT * FROM product WHERE id_product = '$id'";
        $result =  mysqli_query($conn, $mysql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            echo "sai không láy dữ liệu dược";
        }
    }
}

class ProductDetail
{
    public $id;
    public $productId; // Khóa ngoại
    public $description;
    public $material;
    public $size;

    public function __construct($id, $productId, $description, $material, $size)
    {

        $this->productId = $productId;
        $this->description = $description;
        $this->material = $material;
        $this->size = $size;
    }
}
function getProductDetail($productId)
{
    // Lấy chi tiết sản phẩm từ cơ sở dữ liệu dựa trên $productId
}

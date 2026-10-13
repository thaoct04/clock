<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    if (isset($_POST["product-edit__content__form__ip-id-pr"]) && isset($_POST["product-edit__content__form__ip-img-list"])) {
        $id = $_POST["product-edit__content__form__ip-id-pr"];
        $list_img = $_POST["product-edit__content__form__ip-img-list"];
        $sql = "INSERT INTO product_image_detail(id_product,product_image_detail) VALUES('$id','$list_img')";
        if ($result = mysqli_query($conn, $sql)) {
            header("Location:/clock/admin/main.php?value=view_store");
            exit;
        } else {
            echo "sai";
        }
    }
} else {
    echo "lỗi";
}

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    if (isset($_POST["product-edit__content__form__ip-id-pr"]) && isset($_POST["product-edit__content__form__ip-img-main"])) {
        $id = (int) $_POST["product-edit__content__form__ip-id-pr"];
        $img_main = $_POST["product-edit__content__form__ip-img-main"];
        $img_dial = $_POST["product-edit__content__form__ip-img-dial"];
        $img_bracelet = $_POST["product-edit__content__form__ip-img-bracelet"];
        $img_case = $_POST["product-edit__content__form__ip-img-case"];
        $sql = "INSERT INTO product_image(id_product,image_main,images_case,image_dial,image_bracelet) VALUES('$id','$img_main','$img_case',' $img_dial','$img_bracelet')";
        if ($result = mysqli_query($conn, $sql)) {
            header("Location:/clock/admin/main.php?value=view_store");
            exit;
        } else {
            echo "sai";
        }
    }
}

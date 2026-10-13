<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    $size = (int) $_POST["product-edit__content__form__ip-size"];
    $material = $_POST["product-edit__content__form__ip-material"];
    $resitant_watter = (int)$_POST["product-edit__content__form__ip-resitant-watter"];
    $id = (int)$_POST["product-edit__content__form__ip-id-pr"];
    $sql = "INSERT INTO product_details(id_product,size,material,Water_Resistance) VALUES('$id','$size',' $material','$resitant_watter');";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location:/clock/admin/main.php?value=view_store");
        exit;
    } else {
        echo "sai";
    }
} else {
    echo "kkk";
}

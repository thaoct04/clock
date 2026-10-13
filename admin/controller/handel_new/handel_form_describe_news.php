<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    // if (isset($_POST["product-edit__content__form__ip-id-pr"]) && isset($_POST["product-edit__content__form__ip-img-main"])) {
    $id = (int) $_POST["product-edit__content__form__ip-id_news"];

    $describe_detail = $_POST["product-edit__content__form__ip-describe-detail-new"];
    $sql = "INSERT INTO described_news (id_news,data_news) VALUES ('$id','$describe_detail');";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location:/clock/admin/main.php?value=news");
        exit;
    } else {



        echo "sai";
    }
    // }
}

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    // if (isset($_POST["product-edit__content__form__ip-id-pr"]) && isset($_POST["product-edit__content__form__ip-img-main"])) {
    $id = (int) $_POST["product-edit__content__form__ip-id_news"];

    $img_main_new = $_POST["product-edit__content__form__ip-img-main-detail-new"];
    $img_video = $_POST["product-edit__content__form__ip-video-main-detail-new"];
    $sql = "INSERT INTO news_image(id_news,news_image_main,news_video_main) VALUES('$id','$img_main_new','$img_video')";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location:/clock/admin/main.php?value=news");
        exit;
    } else {



        echo "sai";
    }
    // }
}

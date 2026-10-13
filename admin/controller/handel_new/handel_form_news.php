<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    // if (isset($_POST["product-edit__content__form__ip-id-pr"]) && isset($_POST["product-edit__content__form__ip-img-main"])) {
    // $id = (int) $_POST["product-edit__content__form__ip-id-pr"];
    $name_news = $_POST["product-edit__content__form__ip-name_news"];

    $date = new DateTime($_POST["product-edit__content__form__ip-date-release-news"]);
    $date_release = $date->format('Y-m-d');
    $describe_simple = $_POST["product-edit__content__form__ip-describe-new"];
    $sql = "INSERT INTO news(name_news,date_news,describe_news_sample) VALUES('$name_news','$date_release','$describe_simple')";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location:/clock/admin/main.php?value=news");
        exit;
    } else {



        echo "sai";
    }
    // }
}

<?php
$code_pr = $_POST["product-edit__content__form__ip-code"];
$collection_pr = (int)$_POST["product-edit__content__form__ip-id-collection"];
$name_pr = $_POST["product-edit__content__form__ip-name"];
$date_pr = new DateTime($_POST["product-edit__content__form__ip-date-release"]);
// $_pr = $_POST["product-edit__content__form__ip-code"];
$id = $_GET["id"];
$date_pr_format = $date_pr->format('Y-m-d H:i:s');
$video_pr = $_POST["product-edit__content__form__ip-video"];
$model_pr = $_POST["product-edit__content__form__ip-model"];

include $_SERVER['DOCUMENT_ROOT'] . "/clock/class/product.php";

$pr = new Product($id, $name_pr, $date_pr_format, $model_pr, $code_pr, $collection_pr, $video_pr);
$pr = Product::update_sql($pr);

// $pr = new Product();

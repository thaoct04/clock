<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    $id = $_POST["product-edit__content__form__ip-id-pr"];
    $describe_sample = $_POST["product-edit__content__form__ip-describe-sample"];
    $describe_sample_dial = $_POST["product-edit__content__form__ip-describe-sample-dial"];
    $describe_sample_bracelet = $_POST["product-edit__content__form__ip-describe-sample-bracelet"];
    $describe_sample_case = $_POST["product-edit__content__form__ip-describe-sample-case"];

    $sql = "INSERT INTO described(id_product,describe_sample,describe_case_sample,describe_dial_sample,describe_bracelet_sample) VALUES('$id','$describe_sample','$describe_sample_case',' $describe_sample_dial','$describe_sample_bracelet')";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location:/clock/admin/main.php?value=view_store");
        exit;
    } else {
        echo "sai";
    }
}

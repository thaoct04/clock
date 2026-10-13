<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/sql/cn.php";
if (isset($_POST["product-edit__content__form__btn"])) {
    $code_pr = $_POST["product-edit__content__form__ip-code"];
    $collection_pr = (int)$_POST["product-edit__content__form__ip-id-collection"];
    $name_pr = $_POST["product-edit__content__form__ip-name"];
    $date_pr = new DateTime($_POST["product-edit__content__form__ip-date-release"]);
    // $_pr = $_POST["product-edit__content__form__ip-code"];
    $date_pr_format = $date_pr->format('Y-m-d H:i:s');
    $video_pr = $_POST["product-edit__content__form__ip-video"];
    $model_pr = $_POST["product-edit__content__form__ip-model"];

    $sql = "INSERT INTO product(name_product,date_release_clock	,model_watch,code_clock,id_collection,video_pr) VALUES ('$name_pr','$date_pr_format',' $model_pr','$code_pr','$collection_pr','$video_pr');";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location:/clock/admin/main.php?value=view_store");
        exit;
    } else {
        echo "sai";
    }

?>

<?php
} else {
}

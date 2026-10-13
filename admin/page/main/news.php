<div class="navbar">
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/news/navbar.php";
    ?>


</div>
<div class="main">
    <?php
    if ($_GET["value"] == "news" && $_GET["edit"] == 2) {
        include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/news/edit_news/edit_describe_news.php";
    } elseif ($_GET["value"] == "news" && $_GET["edit"] == 3) {
        include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/news/edit_news/edit_img_news.php";
    } else {
        include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/news/edit_news/edit_news.php";
    }


    ?>

</div>
<div>
    <div>
        <?php
        include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/view_store/navbar.php";


        ?>

    </div>
    <div class="product-edit-main">
        <?php
        if ($_GET["value"] == "view_store" & $_GET["edit"] == 2) {
            include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/view_store/edit_product/edit_pr-detail.php";
        } elseif ($_GET["value"] == "view_store" & $_GET["edit"] == 3) {
            include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/view_store/edit_product/edit_descibe_pr.php";
        } elseif ($_GET["value"] == "view_store" & $_GET["edit"] == 4) {
            include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/view_store/edit_product/edit_pr-img-dt.php";
        } elseif ($_GET["value"] == "view_store" & $_GET["edit"] == 5) {
            include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/view_store/edit_product/edit_image.php";
        } else {
            include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/page/main/view_store/edit_product/edit_pr.php";
        }

        ?>

    </div>

</div>
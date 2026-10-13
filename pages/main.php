
      <?php
        if ($content == "clock") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/list-clock.php";
        } elseif (isset($_GET["search"])) {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/search.php";
        } elseif ($content == "clockDt") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/dpl-details.php";
        } elseif ($content == "news") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/newpp.php";
        } elseif ($content == "newsPage") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/newPage.php";
        } elseif ($content == "user") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/user.php";
        } elseif ($content == "registration") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/create.php";
        } elseif ($content == "fogetPass") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/fogetPass.php";
        } elseif ($content == "resetP") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/reset_password.php";
        } elseif ($content == "map") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/map.php";
        } elseif ($content == "cart") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/cart.php";
        } elseif ($content == "pay") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/pay.php";
        } elseif ($content == "information") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/information.php";
        } elseif ($content == "information_write") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/write_full_inform.php";
        } elseif ($content == "watch_order_detail") {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/watch_order_detail.php";
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/mainMd.php";
        }
        ?>
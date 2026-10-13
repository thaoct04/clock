<?php
$ids = $_GET["id_news"];
// if ($ids == 1) {
//     include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/newpage/news_exhibition.php";
// } elseif ($ids == 2) {
//     include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/newpage/news_lebrassus.php";
// }
if ($ids == 2) {
    include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/newpage/news_lebrassus.php";
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/newpage/news_exhibition.php";
}

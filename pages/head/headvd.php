<?php


if ($content == "clock") {
?>
    <video loop="" autoplay="" playsinline="" muted>
        <source
            src="https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/RO%2026735SG.OO.1320SG.01%20VIDEO%20MOOD%20169?dpr=off"
            type="video/mp4"
            data-object-fit="cover" />
    </video>

<?php

} elseif ($content == "clockDt") {


    include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/ft_transfer_img_head.php";
    transferImgBG();
} elseif ($content == "newsPage") {
    // if ($_GET["id_news"] == 1) {


    //     dpl_video_new();
    // } elseif ($_GET["id_news"] == 2) {
    // }
    if ($_GET["id_news"] == 2) {
        include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/ft_transfer_img_head.php";
    } else {
        include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/ft_transfer_img_head.php";
        dpl_video_new();
    }
} elseif ($content == "news") {
?>
    <div>

    </div>
<?php
    // include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/ft_transfer_img_head.php";
} else {
?>
    <video loop="" autoplay="" playsinline="" muted>
        <source
            src="https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/header_ROC_carbon_02?dpr=off"
            type="video/mp4"
            data-object-fit="cover" />
    </video>

<?php


}

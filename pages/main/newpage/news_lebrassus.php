<div class="new-pages">
    <div class="new-page">
        <?php
        $t = $_GET["id_news"];

        $mysqls = "SELECT news.name_news,news.date_news,news_image.news_image_main,described_news.data_news 
FROM news INNER JOIN news_image ON news.id_news = news_image.id_news
INNER JOIN described_news ON  news.id_news = described_news.id_news WHERE news.id_news = '$t';";
        $result3 = mysqli_query($conn, $mysqls);
        $row3 = mysqli_fetch_assoc($result3);

        $st_new = $row3["data_news"];
        $jsonArray = json_decode($st_new, true);

        ?>
        <div class="new-page-item">
            <h1 class="new-page-item-tt-header"> <?php echo nl2br($row3["name_news"]);  ?></h1>

            <h2><?php echo $row3["date_news"] ?></h2>
            <div class="new-page-item__block">
                Tin tức
            </div>
        </div>
        <img class="new-page-item_img_header" src="<?php echo $row3["news_image_main"] ?>" alt="">
        <div class="new-page-item_introduce_map_vent">
            <p class="new-page-item_introduce_map_vent-block1"><?php echo $jsonArray["LE_BRASSUS_introduce1"]; ?></p>
            <p class="new-page-item_introduce_map_vent-block2"><?php echo $jsonArray["LE_BRASSUS_introduce2"];  ?></p>

        </div>
        <div class="main-news-lebra">
            <div class="main-news-lebra__image">
                <img src="<?php echo $jsonArray["image_welcome_TO_ITALIA"] ?>" alt="">
            </div>
            <div class="main-news-lebra-text">
                <p class=""><?php echo $jsonArray["WELCOME_TO_ILARIA_introduce1_ct1"]; ?></p>
            </div>

        </div>





    </div>

</div>
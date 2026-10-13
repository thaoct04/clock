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
        <img class="new-page-item_img_header" src="<?php echo $jsonArray["image_header"] ?>" alt="">
        <div class="new-page-item_introduce_map_vent">
            <p class="new-page-item_introduce_map_vent-block1"><?php echo $jsonArray["public_exhibition1"]; ?></p>
            <p class="new-page-item_introduce_map_vent-block2"><?php echo $jsonArray["public_exhibition2"];  ?></p>

        </div>

        <h3 class="new-page-item-discovery"><?php echo $jsonArray["discovery_name"]; ?></h3>
        <div class="new-page-item_document">
            <div class="new-page-item_document-block1">
                <p class="new-page-item_document-block1-setence1">
                    <?php echo $jsonArray["discovery_content1_block1"]; ?>
                </p>
                <p class="new-page-item_document-block1-setence2">
                    <?php echo $jsonArray["discovery_content1_block2"]; ?>
                </p>

            </div>
            <div class="new-page-item_document-block2">
                <p class="new-page-item_document-block2-setence1">
                    <?php echo $jsonArray["discovery_content2_block1"]; ?>
                </p>

            </div>


        </div>
        <div class="grid-container">
            <div class="grid-left-column">
                <div class="image-grid" style="background-image: url(<?php echo $jsonArray["img_list1"]; ?>);">

                </div>
                <div class="image-grid" style="background-image: url(<?php echo $jsonArray["img_list2"]; ?>);">
                    <!-- <img src="<?php echo $jsonArray["img_list2"]; ?>" alt=""> -->
                </div>
            </div>
            <div class="grid-center-column">
                <div class="full-image" style="background-image: url(<?php echo $jsonArray["img_list3"]; ?>);">
                    <!-- <img src="<?php echo $jsonArray["img_list3"]; ?>" alt=""> -->
                </div>
            </div>
            <div class="grid-right-column">
                <div class="image-grid" style="background-image: url(<?php echo $jsonArray["img_list1"]; ?>);">
                    <!-- <img src="<?php echo $jsonArray["img_list1"]; ?>" alt=""> -->
                </div>
                <div class="image-grid" style="background-image: url(<?php echo $jsonArray["img_list1"]; ?>);">
                    <!-- <img src="<?php echo $jsonArray["img_list1"]; ?>" alt=""> -->
                </div>
            </div>
        </div>
        <div class="fl">
            <div class="new-page-item_document-block1">
                <p class="new-page-item_document-block1-setence3">
                    <?php echo $jsonArray["discovery_content1_block3"]; ?>

                </p>
            </div>
            <div class="new-page-item_document-block1">
                <p class="new-page-item_document-block2-setence2">
                    <?php echo $jsonArray["discovery_content2_block2"]; ?>
                </p>
            </div>


        </div>




    </div>

</div>
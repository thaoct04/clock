<div class="newppss">
    <div class="newpps">
        <div class="newppss-item">
            <div class="grid">
                <?php
                $mysqlk = "SELECT news.name_news,news.id_news,news.describe_news_sample,news_image.news_image_main FROM news INNER JOIN news_image ON news.id_news = news_image.id_news;";
                $result2 =  mysqli_query($conn, $mysqlk);

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $id_news = $row2["id_news"];
                ?>

                    <div class="column3 column3-news">
                        <div class="newppss-item-content">
                            <img src="<?php echo $row2["news_image_main"]; ?>" alt="">
                            <h1><?php echo $row2["name_news"]; ?></h1>
                            <div class="newppss-item-content-state">
                                <span>news</span>

                            </div>
                            <p><?php echo $row2["describe_news_sample"]; ?></p>
                            <div class="newppss-item-content-btn">
                                <span></span>
                                <a href="/clock/index.php?danhmuc=newsPage&id_news=<?php echo $row2["id_news"]; ?>">Discover more</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- <div class="column3">
                    <div class="newppss-item-content">
                        <img src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?wid=560&hei=401&scl=2.0&dpr=off" alt="">
                        <h1>Một triển lãm mới "Shaping Materials" tại Milan</h1>
                        <div class="newppss-item-content-state">
                            <span>news</span>

                        </div>
                        <p>mô tả đơn giản This new public exhibition entitled "Shaping Materials", will be held from 3 to 16 June 2024 </p>
                        <div class="newppss-item-content-btn">
                            <span></span>
                            <a href="">Discover more</a>
                        </div>
                    </div>
                </div>
                <div class="column3">
                    <div class="newppss-item-content">
                        <img src="https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?wid=560&hei=401&scl=2.0&dpr=off" alt="">
                        <h1>Một triển lãm mới "Shaping Materials" tại Milan</h1>
                        <div class="newppss-item-content-state">
                            <span>news</span>

                        </div>
                        <p>mô tả đơn giản This new public exhibition entitled "Shaping Materials", will be held from 3 to 16 June 2024 </p>
                        <div class="newppss-item-content-btn">
                            <span></span>
                            <a href="">Discover more</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

</div>
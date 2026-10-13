<?php

function displayClockMD()
{
    $cll = "hơi hướng hiện đại";
    $mysql = "SELECT collection_clock.name_collection ,product.id_product,product.code_clock,product.model_watch,product_details.size,product_details.material,product_image.image_main
FROM collection_clock
INNER JOIN product ON collection_clock.id_collection = product.id_collection
INNER JOIN product_details ON product.id_product = product_details.id_product
INNER JOIN product_image ON product.id_product = product_image.id_product
WHERE collection_clock.name_collection='$cll'";
    global $conn;
    $result = mysqli_query($conn, $mysql);

    $num_rows = mysqli_num_rows($result);

    while ($item = mysqli_fetch_assoc($result)) {
?>
        <!-- <a href="/clock/index.php?danhmuc=clockDt" class="link-productt"> -->
        <div class="column4">
            <a href="/clock/index.php?danhmuc=clockDt&id=<?php echo $item["id_product"]; ?>" class="link-productt">
                <div class="list-pr-item-main-item">
                    <img src="<?php echo $item["image_main"]; ?> " alt="">
                    <h2><?php echo $item["code_clock"]; ?></h2>
                    <h3><?php echo $item["model_watch"]; ?> </h3>
                    <h3><?php echo $item["name_collection"]; ?> </h3>
                    <div class="ist-pr-item-main-item-size">
                        <span><?php echo $item["size"]; ?></span>
                        <span><?php echo $item["material"]; ?></span>

                    </div>

                </div>
            </a>

        </div>
        <!-- </a> -->

    <?php
    }
}
function displayClockClassical()
{
    $cll = "xu hướng cổ điển";
    $mysql = "SELECT collection_clock.name_collection ,product.id_product,product.code_clock,product.model_watch,product_details.size,product_details.material,product_image.image_main
FROM collection_clock
INNER JOIN product ON collection_clock.id_collection = product.id_collection
INNER JOIN product_details ON product.id_product = product_details.id_product
INNER JOIN product_image ON product.id_product = product_image.id_product
WHERE collection_clock.name_collection='$cll'";
    global $conn;
    $result = mysqli_query($conn, $mysql);

    $num_rows = mysqli_num_rows($result);

    while ($item = mysqli_fetch_assoc($result)) {
    ?>
        <div class="column4">
            <a href="/clock/index.php?danhmuc=clockDt&id=<?php echo $item["id_product"]; ?>" class="link-productt">
                <div class="list-pr-item-main-item">
                    <img src="<?php echo $item["image_main"]; ?> " alt="">
                    <h2><?php echo $item["code_clock"]; ?></h2>
                    <h3><?php echo $item["model_watch"]; ?> </h3>
                    <h3><?php echo $item["name_collection"]; ?> </h3>
                    <div class="ist-pr-item-main-item-size">
                        <span><?php echo $item["size"]; ?></span>
                        <span><?php echo $item["material"]; ?></span>

                    </div>

                </div>

            </a>
        </div>


    <?php
    }
}

function displayClockSport()
{
    $cll = "phong cách thể thao năng động";
    $mysql = "SELECT collection_clock.name_collection ,product.id_product,product.code_clock,product.model_watch,product_details.size,product_details.material,product_image.image_main
FROM collection_clock
INNER JOIN product ON collection_clock.id_collection = product.id_collection
INNER JOIN product_details ON product.id_product = product_details.id_product
INNER JOIN product_image ON product.id_product = product_image.id_product
WHERE collection_clock.name_collection='$cll'";
    global $conn;
    $result = mysqli_query($conn, $mysql);

    $num_rows = mysqli_num_rows($result);

    while ($item = mysqli_fetch_assoc($result)) {
    ?>
        <div class="column4">
            <a href="/clock/index.php?danhmuc=clockDt&id=<?php echo $item["id_product"]; ?>" class="link-productt">
                <div class="list-pr-item-main-item">
                    <img src="<?php echo $item["image_main"]; ?> " alt="">
                    <h2><?php echo $item["code_clock"]; ?></h2>
                    <h3><?php echo $item["model_watch"]; ?> </h3>
                    <h3><?php echo $item["name_collection"]; ?> </h3>
                    <div class="ist-pr-item-main-item-size">
                        <span><?php echo $item["size"]; ?></span>
                        <span><?php echo $item["material"]; ?></span>

                    </div>

                </div>

            </a>
        </div>


    <?php
    }
}



function search($search)
{
    global $conn;
    
    // Nối trực tiếp biến $search vào câu lệnh SQL không qua làm sạch/bind_param
    $mysql = "SELECT collection_clock.name_collection, product.id_product, product.name_product, product.code_clock, product.model_watch, product_details.size, product_details.material, product_image.image_main
              FROM collection_clock
              INNER JOIN product ON collection_clock.id_collection = product.id_collection
              INNER JOIN product_details ON product.id_product = product_details.id_product
              INNER JOIN product_image ON product.id_product = product_image.id_product
              WHERE product.name_product LIKE '%" . $search . "%'";

    $result = mysqli_query($conn, $mysql);

    // Nếu câu lệnh SQL bị lỗi (do chèn payload sai syntax), hiển thị lỗi để dễ demo Error-based SQLi
    if (!$result) {
        die("<b>SQL Error:</b> " . mysqli_error($conn));
    }

    while ($item = mysqli_fetch_assoc($result)) {
    ?>
        <div class="column4">
            <a href="/clock/index.php?danhmuc=clockDt&id=<?php echo $item["id_product"]; ?>" class="link-productt">
                <div class="list-pr-item-main-item">
                    <img src="<?php echo $item["image_main"]; ?> " alt="">
                    <h2><?php echo $item["code_clock"]; ?></h2>
                    <h3><?php echo $item["model_watch"]; ?> </h3>
                    <h3><?php echo $item["name_collection"]; ?> </h3>
                    <div class="ist-pr-item-main-item-size">
                        <span><?php echo $item["size"]; ?></span>
                        <span><?php echo $item["material"]; ?></span>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
}




function dlDetail()
{
    $idPr = $_GET["id"];
    $mysql = "SELECT * 
    FROM collection_clock
    INNER JOIN product ON collection_clock.id_collection = product.id_collection
    INNER JOIN product_details ON product.id_product = product_details.id_product
    INNER JOIN product_image ON product.id_product = product_image.id_product
    INNER JOIN product_image_detail ON product.id_product = product_image_detail.id_product
    INNER JOIN described ON product.id_product = described.id_product
    WHERE product.id_product = '$idPr'";
    global $conn;
    $result = mysqli_query($conn, $mysql);

    $num_rows = mysqli_num_rows($result);
    // $itemm = mysqli_fetch_assoc($result);

    while ($itemm = mysqli_fetch_assoc($result)) {
        $arr[] = $itemm["product_image_detail"];
        $arr2 = $itemm;
    }
    return [
        "arr2" => $arr2,
        "arr" => $arr

    ];
}
function tranfervideo() {}

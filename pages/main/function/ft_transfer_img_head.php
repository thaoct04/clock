<?php
function transferImgBG()
{
    $i = $_GET["id"];
    $mysql = "SELECT 
    product_image.image_main
    FROM product 
    INNER JOIN product_image ON product.id_product = product_image.id_product
    WHERE product.id_product = '$i'";
    global $conn;
    $result = mysqli_query($conn, $mysql);
    $row = mysqli_fetch_assoc($result);
?>
    <div class="head_img-s-kk">
        <div class="ddds">
            <img src="<?php echo $row["image_main"] ?>" alt="">
        </div>
    </div>


<?php
}
?>
<?php
function dpl_video_new()
{
    $tam = $_GET["id_news"];
    $mysql = "SELECT described_news.data_news FROM described_news WHERE described_news.id_news = '$tam';";
    global $conn;
    $result = mysqli_query($conn, $mysql);
    $row = mysqli_fetch_assoc($result);
    $data = json_decode($row["data_news"], true);
?>
    <video loop="" autoplay="" playsinline="" muted>
        <source
            src="<?php echo $data["header_video"] ?>"
            type="video/mp4"
            data-object-fit="cover" />
    </video>
<?php
}
function dpl_image_new()
{
    $tam = $_GET["id_news"];
    $mysql = "SELECT described_news.data_news FROM described_news WHERE described_news.id_news = '$tam';";
    global $conn;
    $result = mysqli_query($conn, $mysql);
    $row = mysqli_fetch_assoc($result);
    $data = json_decode($row["data_news"], true);
?>
    <div class="head_img-s-kk">
        <div class="ddds">
            <img src="<?php echo $data["header_image"] ?>" alt="">
        </div>
    </div>
<?php
}

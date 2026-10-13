<?php

function get_comment()
{
    $id = $_GET["id"];
    global $conn; // Sử dụng biến toàn cục $conn
    $sql = "
        SELECT 
            comment.id, 
            comment.content, 
            comment.created_at, 
            users.username 
        FROM 
            comment 
        JOIN 
            users
        ON 
            comment.id_user = users.id
            WHERE comment.id_product = '$id' 


    ";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        return "Query Error: " . mysqli_error($conn);
    }

    $comments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
    }

    return $comments;
}


?>
<div class="product-details">
    <div class="product-detail">

        <?php


        $main_arr = dlDetail();

        ?>

        <div class="roduct-detail-video-head-pr fade-in">
            <video loop="" playsinline="" autoplay="" muted>
                <source
                    src="<?php echo $main_arr["arr2"]["video_pr"]; ?>"

                    type="video/mp4"
                    data-object-fit="cover">
            </video>
        </div>

        <div class="product-detail-case fade-in">
            <div class="product-detail-case-text">
                <h1>CASE</h1>
                <p><?php echo $main_arr["arr2"]["describe_case_sample"]; ?></p>
                <div class="product-detail-case-text_block">
                    <h2>kích cỡ</h2>
                    <h5><?php echo $main_arr["arr2"]["size"]; ?>mm</h5>
                </div>
                <div class="product-detail-case-text_block">

                    <h2>đô mỏng</h2>
                </div>
                <div class="product-detail-case-text_block">
                    <h2>size</h2>
                    <h5><?php echo $main_arr["arr2"]["size"]; ?>mm</h5>
                </div>
                <div class="product-detail-case-text_block">
                    <h2>chống nước</h2>
                    <h5><?php echo $main_arr["arr2"]["Water_Resistance"]; ?></h5>
                </div>

                <!-- <h4><?php print_r($arr); ?></h4> -->

            </div>
            <div class="product-detail-case-img">


                <img src="<?php echo $main_arr["arr2"]["images_case"]; ?>" alt="">

            </div>

        </div>
        <div class="product-detail-dial fade-in">
            <div class="product-detail-dial-img">
                <img src="<?php echo $main_arr["arr2"]["image_dial"]; ?>" alt="">
            </div>
            <div class="product-detail-dial-text">
                <h2>dial</h2>
                <p><?php echo $main_arr["arr2"]["describe_dial_sample"]; ?></p>
            </div>

        </div>
        <div class="product-detail-bracelet fade-in">

            <div class="product-detail-bracelet-text">
                <h2>bracelet</h2>
                <p><?php echo $main_arr["arr2"]["describe_bracelet_sample"]; ?></p>
            </div>
            <div class="product-detail-bracelet-img">
                <img src="<?php echo $main_arr["arr2"]["image_bracelet"]; ?>" alt="">
            </div>

        </div>
        <div class="product-detail-close fade-in">

            <div class="product-detail-close-text">
                <h2>nhìn thật gần</h2>
                <h3>& chi tiết</h3>
            </div>
            <div class="product-detail-close-list-img">
                <button id="prevBtn"><i class="fa-light fa-angle-left"></i></button>
                <div class="list-pr-buffer-2">
                    <div class="list-pr-buffer-3-div">

                        <img class="img-buffer" src="<?php echo $main_arr["arr"][0]; ?>" alt="">
                    </div>
                    <div class="list-pr-buffer-3-div">
                        <img class="img-buffer" src="<?php echo $main_arr["arr"][1]; ?>" alt="">
                    </div>
                    <div class="list-pr-buffer-3-div">
                        <img class="img-buffer" src="<?php echo $main_arr["arr"][2]; ?>" alt="">
                    </div>
                </div>
                <button id="nextBtn"><i class="fa-light fa-angle-right"></i></button>

            </div>

        </div>
        <div class="cart-button">
            <div class="cart-button-item">
                <a class="cart-link" href="/clock/controller/cart/add_cart.php?danhmuc=cart&id=<?php echo $_GET["id"]; ?>">giỏ hàng</a>
            </div>
            <!-- <a href="">đặt mua</a> -->
        </div>

    </div>

</div>
</div>
<!--  -->
<div class="chat-container">

    <!-- <div class="chat-messages" id="chatMessages">
        <div class="message user">Hello, how are you?</div>
        <div class="message other">I'm good, thank you! How about you?</div>
    </div> -->

    <div class="chat-footer">
        <input type="text" id="chatInput" placeholder="Type a message...">
        <!-- <button onclick="sendMessage()">Send</button> -->
    </div>

    <div class="comments-section">
        <h3>Comments</h3>
        <div id="comments">
            <?php
            $comments = get_comment();
            if (is_array($comments) && !empty($comments)) {
                foreach ($comments as $comment) {
                    echo '
<div class="comment">
<img src="https://via.placeholder.com/40" alt="User">
<div class="comment-content">
<div class="user-info">
<span class="username">' . htmlspecialchars($comment["username"]) . '</span>
<span class="date">' . htmlspecialchars($comment["created_at"]) . '</span>
</div>
<div class="content">' . htmlspecialchars($comment["content"]) . '</div>
</div>
</div>';
                }
            } else {
                echo '<p>No comments yet.</p>';
            }
            ?>
        </div>
        <!-- <div id="comment-section"> -->
        <textarea id="comment-content" placeholder="Nhập nội dung bình luận..."></textarea>
        <button id="submit-comment">Gửi bình luận</button>
        <!-- </div> -->
    </div>
</div>
<script>
    document.getElementById("submit-comment").addEventListener("click", function() {
        // Lấy giá trị từ ô input và các thông tin cần thiết
        const content = document.getElementById("comment-content").value.trim();
        const idProduct = "<?php echo $_GET['id']; ?>";
        const userId = "<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>";

        // Kiểm tra nếu thiếu thông tin
        if (!userId) {
            alert("Vui lòng đăng nhập để bình luận.");
            return;
        }

        if (!content) {
            alert("Nội dung bình luận không được để trống.");
            return;
        }

        // Gửi dữ liệu qua AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/clock/pages/main/function/add_comment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert("Bình luận đã được gửi thành công!");
                    document.getElementById("comment-content").value = ""; // Xóa nội dung input
                    // Bạn có thể tự động tải lại danh sách bình luận nếu muốn
                } else {
                    alert(response.message || "Có lỗi xảy ra.");
                }
            }
        };

        xhr.send(`content=${encodeURIComponent(content)}&id_product=${idProduct}&user_id=${userId}`);
    });
</script>
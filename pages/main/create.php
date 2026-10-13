<?php
if (isset($_POST["create-user__btn"])) {
    $sex = $_POST["gender"];
    $cr_Name = $_POST["create-user_name"];
    $cr_flName = $_POST["create-user_flname"];
    $cr_email = $_POST["create-user_email"];
    $cr_pass = $_POST["create-user_pass"];
    $cr_passAccept = $_POST["create-user_pass-accept"];
    $cr_CheckNew = $_POST["create-user_check-new"];
    if ($cr_pass == $cr_passAccept) {

        $sqlUpdate = "INSERT INTO users (username,firtlast_Name,email,password,gioi_tinh) VALUES ('$cr_Name','$cr_flName','$cr_email','$cr_pass','$sex');";
        $result = mysqli_query($conn, $sqlUpdate);
        if ($result) {

            header("Locaton:" . $_SERVER["DOCUMENT_ROOT"] . "/clock/pages/main/user.php");
        } else {
            echo "không thamnhf công";
        }
    } else {
        echo " <script>alert('mât khẩu không khớp');</script>";
    }
}

?>


<main class="create-user">
    <div class="create-user__main">
        <form action="" method="post" class="create-user__form">
            <h1>Create an
                AP account</h1>
            <p>Your personal account enables you to check your watches in and benefit from additional exclusive features.</p>
            <fieldset class="create-user__already-account">
                <label for="">Already have an account? <a href="">Log in</a></label>
            </fieldset>
            <fieldset class="create-user__personal_details">
                <div class="create-user__gentle">
                    <legend>giới tính</legend>
                    <select class="create-user__gender" name="gender" id="gender" aria-labelledby="gender">
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="other">Khác</option>
                    </select>
                </div>
                <div class="create-user__name">
                    <legend>họ & tên</legend>
                    <input name="create-user_flname" class="input-chung" type="text" placeholder="mời nhập tên vào">
                </div>
                <div class="create-user__name">
                    <legend>tên tài khoản</legend>
                    <input name="create-user_name" class="input-chung" type="text" placeholder="mời nhập tên tài khoản vào">
                </div>

            </fieldset>
            <fieldset class="create-user__email">
                <legend>Email:</legend>
                <input type="text" name="create-user_email" class="input-chung" placeholder="MỜi nhập vào email">

            </fieldset>
            <fieldset class="create-user__pass">
                <legend>Create a password</legend>
                <input type="text" name="create-user_pass" class="input-chung" placeholder="Enter your Password">

            </fieldset>
            <fieldset class="create-user__confirm_pass">
                <legend>Confirm password</legend>
                <input type="text" name="create-user_pass-accept" class="input-chung" placeholder="Enter your Password">

            </fieldset>
            <p>Tôi thừa nhận rằng dữ liệu cá nhân của tôi sẽ được xử lý theo Thông báo về quyền riêng tư của Audemars Piguet.</p>
            <fieldset class="create-user__accept-new">
                <input type="checkbox" name="create-user_check-new">
                <label>Tôi muốn nhận tin tức mới nhất về thương hiệu Audemars Piguet, các sản phẩm và sự kiện sắp tới phù hợp với sở thích của tôi qua email hoặc qua đường bưu điện, điện thoại hoặc bất kỳ kênh nào khác mà tôi có thể cung cấp cho Audemars Piguet và tôi chấp nhận rằng thông tin cá nhân của tôi sẽ được xử lý cho mục đích này theo tuân thủ </label>
            </fieldset>
            <button type="submit" name="create-user__btn" class="">tạo một tài khoản</button>

        </form>
    </div>


</main>
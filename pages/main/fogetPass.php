<?php
// session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/clock/PHPMailer-master/src/Exception.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clock/PHPMailer-master/src/PHPMailer.php";
require $_SERVER['DOCUMENT_ROOT'] . "/clock/PHPMailer-master/src/SMTP.php";
// require $_SERVER['DOCUMENT_ROOT'] . "/clock/sql/cn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["btn_fg_pass"])) {

    $email = $_POST["email_after"];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userEmail = $row['email']; // Lấy email
        // $userPassword = $row['password'];
        $token = bin2hex(random_bytes(50));
        date_default_timezone_set('Asia/Ho_Chi_minh');
        $expiration = date("Y-m-d H:i:s", strtotime("+1 hour"));
        $updateQuery = "UPDATE users SET reset_token='$token',token_expiration='$expiration' WHERE email = '$email'";
        if (mysqli_query($conn, $updateQuery)) {
            // echo "cap nhật thành công";
        } else {
            echo "thất bại";
        }
        $resetLink = "http://localhost:8080/clock/index.php?danhmuc=resetP&token=" . $token;
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Máy chủ SMTP của Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'nguyenthao.041005@gmail.com'; // Địa chỉ email của bạn
            $mail->Password = 'bjxj cwqx ylfn ixfc'; // Mật khẩu tài khoản email của bạn
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('nguyenthao.041005@gmail.com', 'shop đồng hồ');
            $mail->addAddress($userEmail); // Gửi đến email của người dùng

            $mail->isHTML(true);
            $mail->Subject = 'Yêu cầu đặt lại mật khẩu';
            $mail->Body = "Nhấp vào liên kết sau để đặt lại mật khẩu của bạn: <a href='$resetLink'>$resetLink</a>";

            $mail->send();
            // echo 'Email đặt lại mật khẩu đã được gửi!';
            echo "<script>alert('đã gửi thành công');</script>";

            // header("Locaton:" . $_SERVER["DOCUMENT_ROOT"] . "/clock/pages/main/user.php");
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email không tồn tại trong hệ thống";
    }
}

?>

<main>
    <div class="password-fg">
        <h1 class="">Quên mật khẩu?</h1>
        <p>Nhập địa chỉ email được liên kết với tài khoản của bạn và chúng tôi sẽ gửi cho bạn liên kết để đặt lại mật khẩu.</p>
        <form action="" class="password-fg__form" method="post">
            <fieldset>
                <legend>E-mail</legend>
                <input id="email_aftert" name="email_after" type="text" placeholder="nhập địa chỉ email vào đây">
                <button name="btn_fg_pass" class="btn_big">Gửi yêu cầu đặt lại mật khẩu</button>

            </fieldset>

        </form>
    </div>
    <!-- <div class="form-forget-pass-content">log
        <h2 class="jjjj">Đặt lại mật khẩu</h2>
        <form class="form-forget-pass" action="" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <label for="password">Mật khẩu mới:</label>
            <div class="password-container">
                <input class="ip_ks" id="password-input" type="password" name="form-forget-pass__ip-pass" required>
                <button type="button" id="toggle-password" class="btn-toggle">Hiện</button>
            </div>
            <br>
            <button type="submit" class="btn_ks" name="form-forget-pass__btn-accpet">Đặt lại mật khẩu</button>
        </form>
    </div> -->
</main>
<!-- reset_password.php -->
<!-- <?php
// require 'config.php';

if (isset($_POST["form-forget-pass__btn-accpet"])) {
    if (empty($_POST["token"]) || empty($_POST["form-forget-pass__ip-pass"])) {
        echo "Token hoặc mật khẩu không hợp lệ.";
        exit;
    }

    $token = $_POST["token"];
    // $token = mysqli_real_escape_string($conn, $_POST["token"]);
    $newPassword = $_POST["form-forget-pass__ip-pass"];
    // $newPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Kiểm tra token và thời gian hết hạn
    // reset_token = '$token' AND 
    $query = "SELECT * FROM users WHERE reset_token = '$token' AND token_expiration > NOW()";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Cập nhật mật khẩu mới
    } else {
        echo "Yêu cầu không hợp lệ hoặc token đã hết hạn.";
    }


    // Cập nhật mật khẩu mới nếu token hợp lệ
    $updateQuery = "UPDATE users SET password = '$newPassword', reset_token = NULL, token_expiration = NULL WHERE reset_token = '$token'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Mật khẩu của bạn đã được cập nhật thành công!";
    } else {
        echo "Có lỗi khi cập nhật mật khẩu: " . mysqli_error($conn);
    }
}
?>

<div class="form-forget-pass-content">
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
</div>
<script>
    document.getElementById('toggle-password').addEventListener('click', function() {
        const passwordInput = document.getElementById('password-input');
        const toggleButton = document.getElementById('toggle-password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = 'Ẩn';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = 'Hiện';
        }
    });
</script> -->

<?php
// require 'config.php';

if (isset($_POST["form-forget-pass__btn-accpet"])) {
    if (empty($_POST["token"]) || empty($_POST["form-forget-pass__ip-pass"])) {
        echo "Token hoặc mật khẩu không hợp lệ.";
        exit;
    }

    $token = $_POST["token"];
    $newPassword = $_POST["form-forget-pass__ip-pass"];

    // 1. Kiểm tra token và thời gian hết hạn
    $query = "SELECT * FROM users WHERE reset_token = '$token' AND token_expiration > NOW()";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // 2. TẠO LỖ HỔNG MASS ASSIGNMENT:
        // Đặt mặc định đổi password
        $updateFields = ["password = '$newPassword'", "reset_token = NULL", "token_expiration = NULL"];

        // Lặp qua TOÀN BỘ $_POST để tự động gán tham số vào SQL (Thiếu Whitelist)
        // Kẻ tấn công gửi thêm tham số nào (vd: firtlast_Name, email) thì SQL sẽ tự cập nhật trường đó!
        foreach ($_POST as $key => $value) {
            // Bỏ qua các field không phải cột DB
            if (!in_array($key, ['token', 'form-forget-pass__ip-pass', 'form-forget-pass__btn-accpet'])) {
                $value_clean = mysqli_real_escape_string($conn, $value);
                $updateFields[] = "$key = '$value_clean'";
            }
        }

        $sql_set = implode(", ", $updateFields);
        $updateQuery = "UPDATE users SET $sql_set WHERE reset_token = '$token'";

        if (mysqli_query($conn, $updateQuery)) {
            echo "Mật khẩu của bạn đã được cập nhật thành công!";
        } else {
            echo "Có lỗi khi cập nhật mật khẩu: " . mysqli_error($conn);
        }
    } else {
        echo "Yêu cầu không hợp lệ hoặc token đã hết hạn.";
    }
}
?>
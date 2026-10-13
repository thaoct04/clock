<?php
session_start();
if (isset($_POST["login_btn"])) {
    function check_full_infomation($id)
    {
        global $conn;

        // Truy vấn kiểm tra
        $query = "SELECT 1 FROM user_details WHERE user_id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);

        // Nếu có kết quả trả về `
        if ($result && mysqli_num_rows($result) > 0) {
            return true; // Tồn tại user_id
        } else {
            return false; // Không tồn tại
        }
    }

    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Truy vấn kiểm tra người dùng
    $sql = "SELECT * FROM users WHERE users.password='$password' AND users.email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Lấy dữ liệu người dùng
        $id = $row["id"];

        $_SESSION["check_full_inform"] = check_full_infomation($id);
        $_SESSION["user_id"] = "$id";

        header("Location:/clock/index.php");
        exit;
    } else {
        echo '<script>alert("Không tìm thấy người dùng này!");</script>';
    }
}

?>


<div class="login">
    <div class="login__main">
        <div class="login__form-main">
            <form action="" class="login__form-login" method="post">
                <h1>LOG IN</h1>
                <fieldset>
                    <legend>EMAIL</legend>
                    <label for="email_user"><input id="email_user" name="email" type="text" placeholder="Enter your email"></label>
                </fieldset>
                <!-- <fieldset>
                    <legend>PASSWORD</legend>
                    <label for="password_user"><input id="password_user" name="pass" type="text" placeholder="Enter your password"></label>

                </fieldset> -->
                <fieldset>
                    <legend>PASSWORD</legend>
                    <label for="password_user">
                        <input id="password_user" name="pass" type="password" placeholder="Enter your password">
                    </label>
                    <button type="button" id="toggle_password" style="margin-left: 10px;"><i class="fa-duotone fa-thin fa-eye-slash"></i></i></button>
                </fieldset>
                <script>
                    const passwordInput = document.getElementById('password_user');
                    const toggleButton = document.getElementById('toggle_password');
                    const toggleIcon = toggleButton.querySelector('i'); // Lấy icon bên trong nút

                    toggleButton.addEventListener('click', () => {
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            toggleIcon.classList.remove('fa-eye-slash');
                            toggleIcon.classList.add('fa-eye');
                        } else {
                            passwordInput.type = 'password';
                            toggleIcon.classList.remove('fa-eye');
                            toggleIcon.classList.add('fa-eye-slash');
                        }
                    });
                </script>

                <a href="/clock/index.php?danhmuc=fogetPass">Forgot your password?</a>
                <br>
                <button name="login_btn" type="submit" class="btn_big">Login</button>

            </form>
            <hr>
            <form action="" class="login__form-logout">


                <h1>Tạo <br>
                    tài khoản AP</h1>
                <p>Tài khoản cá nhân cho phép bạn kiểm tra đồng hồ của mình và hưởng lợi từ các tính năng độc quyền bổ sung.</p>
                <a href="/clock/index.php?danhmuc=registration">
                    <div class="btn_big div_btn_big">make account</div>
                </a>

                <!-- <button name="create_btn" class="btn_big">Login</button> -->
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementsByName("login_btn").addEventListener('click', (event) => {
        event.preventDefault();
    });
</script>
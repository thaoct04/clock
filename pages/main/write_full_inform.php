<?php

// Kiểm tra session user_id
if (!isset($_SESSION['user_id'])) {
    die("Session user_id không tồn tại. Vui lòng đăng nhập trước.");
}
$userId = $_SESSION['user_id'];

// Lấy thông tin người dùng từ cơ sở dữ liệu
$sql = "SELECT u.username, u.email, u.firtlast_Name, u.gioi_tinh, d.phone, d.address, d.date_of_birth
        FROM users u
        LEFT JOIN user_details d ON u.id = d.user_id
        WHERE u.id = '$userId'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Không tìm thấy thông tin người dùng.");
}

// Lưu thông tin người dùng vào mảng
$userData = mysqli_fetch_assoc($result);

if (isset($_POST["create-user__btn"])) {
    // Lấy dữ liệu từ form
    $username = $_POST['create-user_name'] ?? '';
    $email = $_POST['create-user_email'] ?? '';
    $fullName = $_POST['create-user_flname'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['create-user_address'] ?? '';
    $phone = $_POST['create-user_phone'] ?? '';
    $dateOfBirth = $_POST['create-user_date'] ?? '';

    // Mảng chứa lỗi
    $arr = ["errors" => []];

    // Cập nhật thông tin người dùng
    $sql1 = "UPDATE users SET username ='$username', email ='$email', firtlast_Name ='$fullName', gioi_tinh='$gender' WHERE id = '$userId' ";
    $result1 = mysqli_query($conn, $sql1);

    // Kiểm tra lỗi câu lệnh SQL đầu tiên
    if (!$result1) {
        $arr["errors"][] = "Lỗi không ghi thông tin người dùng vào cơ sở dữ liệu.";
    }


    // Cập nhật thông tin chi tiết người dùng
    if ($_SESSION["check_full_inform"] == false) {
        // Thực hiện INSERT khi check_full_inform là false
        $sql2 = "INSERT INTO user_details (user_id, phone, address, date_of_birth) 
                 VALUES ('$userId', '$phone', '$address', '$dateOfBirth')";
        $result2 = mysqli_query($conn, $sql2);

        // Kiểm tra lỗi câu lệnh SQL khi INSERT
        // if (mysqli_affected_rows($conn) <= 0) {
        //     $arr["errors"][] = "Lỗi không thể ghi thông tin chi tiết người dùng vào cơ sở dữ liệu.";
        // }
        if (!$result2) {
            $arr["errors"][] = "Lỗi không thể ghi thông tin chi tiết người dùng vào cơ sở dữ liệu.";
        }
    } else {
        // Thực hiện UPDATE khi check_full_inform là true
        $sql2 = "UPDATE user_details SET phone ='$phone', address ='$address', date_of_birth='$dateOfBirth' WHERE user_id = '$userId'";
        $result2 = mysqli_query($conn, $sql2);

        // Kiểm tra lỗi câu lệnh SQL khi UPDATE
        // if (mysqli_affected_rows($conn) <= 0) {
        //     $arr["errors"][] = "Lỗi không thể cập nhật thông tin chi tiết người dùng vào cơ sở dữ liệu.";
        // }
        if (!$result2) {
            $arr["errors"][] = "Lỗi không thể cập nhật thông tin chi tiết người dùng vào cơ sở dữ liệu.";
        }
    }

    // Kiểm tra nếu có lỗi
    if (!empty($arr["errors"])) {
        // Duyệt và hiển thị các lỗi
        foreach ($arr["errors"] as $error) {
            echo "<script>alert('$error');</script>";
        }
    } else {
        $_SESSION["check_full_inform"] = true;
        echo "<script>alert('Cập nhật thành công!');</script>";
    }
}
?>

<main class="create-user">
    <div class="create-user__main">
        <form action="" method="post" class="create-user__form">
            <h1>Update an AP account</h1>
            <p>Your personal account enables you to check your watches in and benefit from additional exclusive features.</p>
            <fieldset class="create-user__already-account">
                <label for="">Already have an account? <a href="">Log in</a></label>
            </fieldset>
            <fieldset class="create-user__personal_details">
                <div class="create-user__gentle">
                    <legend>Giới tính</legend>
                    <select class="create-user__gender" name="gender" id="gender" aria-labelledby="gender">
                        <option value="male" <?= $userData['gioi_tinh'] === 'male' ? 'selected' : '' ?>>Nam</option>
                        <option value="female" <?= $userData['gioi_tinh'] === 'female' ? 'selected' : '' ?>>Nữ</option>
                        <option value="other" <?= $userData['gioi_tinh'] === 'other' ? 'selected' : '' ?>>Khác</option>
                    </select>
                </div>
                <div class="create-user__name">
                    <legend>Họ & tên</legend>
                    <input name="create-user_flname" class="input-chung" type="text" placeholder="Mời nhập tên vào" value="<?= htmlspecialchars($userData['firtlast_Name'] ?? '') ?>">
                </div>
                <div class="create-user__name">
                    <legend>Tên tài khoản</legend>
                    <input name="create-user_name" class="input-chung" type="text" placeholder="Mời nhập tên tài khoản vào" value="<?= htmlspecialchars($userData['username'] ?? '') ?>">
                </div>
            </fieldset>
            <fieldset class="create-user__email">
                <legend>Email:</legend>
                <input type="text" name="create-user_email" class="input-chung" placeholder="Mời nhập vào email" value="<?= htmlspecialchars($userData['email'] ?? '') ?>">
            </fieldset>
            <fieldset class="create-user__address">
                <legend>Địa chỉ (xã-huyện-tỉnh)</legend>
                <input type="text" name="create-user_address" class="input-chung" placeholder="Enter your address" value="<?= htmlspecialchars($userData['address'] ?? '') ?>">
            </fieldset>
            <fieldset class="create-user__confirm_phone">
                <legend>Phone</legend>
                <input type="text" name="create-user_phone" class="input-chung" placeholder="Enter your phone" value="<?= htmlspecialchars($userData['phone'] ?? '') ?>">
            </fieldset>
            <fieldset class="create-user__confirm_date">
                <legend>Date of birth</legend>
                <input type="date" name="create-user_date" class="input-chung" value="<?= htmlspecialchars($userData['date_of_birth'] ?? '') ?>">
            </fieldset>
            <button type="submit" name="create-user__btn" class="">Update tài khoản</button>
        </form>
    </div>
</main>
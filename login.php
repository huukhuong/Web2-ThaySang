<?php

if (isset($_POST["btn_submit"])) {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];

    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $email = strip_tags($email);
    $email = addslashes($email);
    $password = strip_tags($password);
    $password = addslashes($password);

    //xử lý đăng nhập bằng MySQL
    header("Location: ./index.php");

    //lưu session
    $_SESSION['email'] = $email;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<?php
include("./header.php");
?>

<body>
    <div id="login pb-10">
        <h3 class="text-center text-white pt-5">Đăng nhập</h3>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 mb-5">
                    <div class="col-md-12">
                        <form name="myForm" method="post" action="" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="btn_submit">Đăng nhập</button>
                            <p><a href="#">Quên mật khẩu?</a></p>
                            <p>Chưa có tài khoản? <a href="./register.php">Đăng ký ngay</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("./footer.php");
    ?>

    <script>
        function validateForm() {
            let x = document.forms["myForm"]["email"].value;
            if (x == "") {
                alert("Email không được để trống!");
                return false;
            }
            x = document.forms["myForm"]["password"].value;
            if (x == "") {
                alert("Mật khẩu không được để trống!");
                return false;
            }
        }
    </script>
</body>

</html>
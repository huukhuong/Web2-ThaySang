<?php
if (isset($_POST["btn_submit"])) {
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    // làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    // mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);

    require('connection_lib.php');
    $connect = new Connection();
    $query = "SELECT * FROM TaiKhoan WHERE TenDangNhap='$username' AND MatKhau='$password'";
    $data = $connect->getRow($query);
    if ($data) {
        $_SESSION['username'] = $data['TenDangNhap'];
        header("Location: ./index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
</head>

<?php
include("./header_login_register.php");
?>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="login-wrap my-5 col">
                    <h3 class="text-center pt-5 my-0">Đăng nhập</h3>
                    <div class="row text-center">
                        <div class="col">
                            <form name="myForm" method="post" action="" class="was-validated" onsubmit="valid();">
                                <div class="form-group text-left">
                                    <input type="username" class="form-control" id="username" name="username" autofocus autocomplete="on" placeholder="Tên đăng nhập" aria-describedby="usernameHelp" required>
                                    <div class="invalid-feedback">Vui lòng nhập tên đăng nhập hợp lệ</div>
                                </div>
                                <div class="form-group text-left">
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="on" placeholder="Mật khẩu" pattern=".{8,}" required title="Mật khẩu ít nhất 8 ký tự">
                                    <div class="invalid-feedback">Mật khẩu ít nhất 8 ký tự</div>
                                    <a class="log-link" href="#">Quên mật khẩu?</a>
                                </div>
                                <button type="submit" class="btn btn_login" name="btn_submit" onclick="rep();">Đăng nhập</button>
                                <p class="pt-4">
                                    Lần đầu truy cập?
                                    <a class="log-link" href="./register.php?goto=register">Đăng ký tài khoản</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="my-auto col brand_logo">
                    <img src="./img/Exclusion 1.svg" alt="Brand logo">
                    <h3 style="color: #fff;">Business Shop</h3>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("./footer.php");
    ?>
</body>

</html>
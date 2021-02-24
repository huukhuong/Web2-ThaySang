<?php
$connect = new mysqli("localhost", "root", "", "do_an_web2");

if (!$connect->set_charset("utf8")) {
    printf($connect->error);
}
if(1==1)
echo '';
if (isset($_POST["btn_submit"])) {
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);

    //xử lý đăng nhập bằng MySQL
    $sql = "select * from TaiKhoan where tendangnhap = '$username' and matkhau = '$password' ";
    $query = mysqli_query($connect, $sql);
    $num_rows = mysqli_num_rows($query);

    if ($num_rows == 0) {
        echo
        '<script>
            alert("Tên đăng nhập hoặc mật khẩu không đúng!");
            window.history.back();
        </script>';
    } else {
        //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }

    mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
</head>

<?php
include("./header_login_register.php");
?>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="login-wrap my-5 col">
                    <h3 class="text-center pt-5 my-0">Đăng ký</h3>
                    <div class="row text-center">
                        <div class="col">
                            <form name="myForm" method="post" action="" class="was-validated" onsubmit="valid();">
                                <div class="form-group text-left">
                                    <input type="username" class="form-control" id="username" name="username" autocomplete="on" placeholder="Tên đăng nhập" aria-describedby="usernameHelp" required>
                                    <div class="invalid-feedback">Vui lòng nhập tên đăng nhập hợp lệ</div>
                                </div>
                                <div class="form-group text-left">
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="on" placeholder="Mật khẩu" pattern=".{8,}" required title="Mật khẩu ít nhất 8 ký tự">
                                    <div class="invalid-feedback">Mật khẩu ít nhất 8 ký tự</div>
                                </div>
                                <div class="form-group text-left">
                                    <input type="password" class="form-control" id="re_password" name="password" autocomplete="on" placeholder="Nhập lại mật khẩu" pattern=".{8,}" required title="Mật khẩu ít nhất 8 ký tự">
                                    <div class="invalid-feedback">Mật khẩu không khớp</div>
                                </div>
                                <button type="submit" class="btn btn_login" name="btn_submit" onclick="rep();">Đăng nhập</button>
                                <p class="pt-4">
                                    Đã có tài khoản?
                                    <a class="log-link" href="./login.php?goto=login">Đăng Nhập ngay</a>
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
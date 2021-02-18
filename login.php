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
                            <form name="myForm" method="post" action="" onsubmit="return validateForm()">
                                <div class="form-group text-left">
                                    <input type="email" class="form-control" id="email" name="email" autofocus autocomplete="on" placeholder="Địa chỉ email" aria-describedby="emailHelp">
                                    <p class="message_err" id="err_email">&nbsp;</p>
                                </div>
                                <div class="form-group text-left">
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="on" placeholder="Mật khẩu">
                                    <p class="message_err" id="err_password">&nbsp;</p>
                                    <a class="log-link" href="#">Quên mật khẩu?</a>
                                </div>
                                <button type="submit" class="btn btn_login" name="btn_submit">Đăng nhập</button>
                                <p class="pt-4">
                                    Lần đầu truy cập?
                                    <a class="log-link" href="./register.php?goto=register">Đăng ký tài khoản</a>
                                </p>
                            </form>
                        </div>
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
            let x = document.getElementById("email");
            let y = document.getElementById("password");
            if (x.value == "" || y.value == "") {
                let err_mail = document.getElementById('err_email');
                let err_pass = document.getElementById('err_password');

                err_mail.innerText = 'Không được để trống trường này';
                err_pass.innerText = 'Mật khẩu phải có ít nhất 8 ký tự';

                if (err_mail.innerText != "") {
                    x.style.border = "1px solid red";
                }
                if (err_pass.innerText != "") {
                    y.style.border = "1px solid red";
                }
                return false;
            }
        }
    </script>
</body>

</html>
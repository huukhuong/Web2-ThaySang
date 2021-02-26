<?php

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
    <div class="container-fluid background-color-primary">
        <div class="container">
            <div class="row text-center">
                <div class="login-wrap my-5 col">
                    <h3 class="text-center pt-5 pb-3 my-0">Đăng nhập</h3>
                    <div class="alert alert-danger" id="message_err">
                        <b>Thông tin đăng nhập không đúng!</b> <br> Vui lòng kiểm tra lại
                    </div>
                    <div class="alert alert-success" id="message_success">
                        <b>Đăng nhập thành công!</b> <br>
                        Bạn sẽ được chuyển về <a href="./index.php" class="log-link">Trang chủ</a>
                        sau <span id="seconds-count">5</span> giây.
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <form id="myForm" name="myForm" method="post">
                                <div class="form-group text-left">
                                    <input type="text" id="username" name="username" class="form-control" autofocus placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group text-left">
                                    <input type="password" id="password" name="password" class="form-control" autocomplete="on" placeholder="Mật khẩu">
                                    <a class="log-link" href="#">Quên mật khẩu?</a>
                                </div>
                                <button type="button" id="btn_login" name="btn_submit" class="btn btn_login">Đăng nhập</button>
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

    <script>
        $(document).ready(function() {
            // Đăng nhập bằng AJAX
            $('#btn_login').click(function() {
                let username = $('#username').val();
                let password = $('#password').val();

                if ($.trim(username).length > 0 && $.trim(password).length > 0) {
                    $.ajax({
                        url: './service/login_service.php',
                        method: 'post',
                        data: {
                            username: username,
                            password: password
                        },
                        success: function(data) {
                            if (data) {
                                successLogin();
                            } else {
                                $('#message_err').css('display', 'block');
                            }
                        }
                    });
                } else {
                    let txt_user = $('#username');
                    let txt_password = $('#password');
                    if ($.trim(username).length <= 0) {
                        txt_user.css('border-color', 'red');
                    }
                    if ($.trim(password).length <= 0) {
                        txt_password.css('border-color', 'red');
                    }
                    return false;
                }
            });

            function successLogin() {
                $('#message_err').css('display', 'none');
                $('#message_success').css('display', 'block');
                let i = 4;
                let seconds = $('#seconds-count');
                setInterval(function() {
                    seconds.html(i);
                    i--;
                    if (i < 0) {
                        window.location.href = './index.php';
                    }
                }, 1000);
            }

            $("#username").keyup(function(event) {
                if (event.keyCode === 13) {
                    $("#btn_login").click();
                }
            });

            $("#password").keyup(function(event) {
                if (event.keyCode === 13) {
                    $("#btn_login").click();
                }
            });
        });
    </script>
</body>

</html>
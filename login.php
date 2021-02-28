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
                    <div class="message alert alert-danger" id="message_err">
                        <b>Thông tin đăng nhập không đúng!</b> <br> Vui lòng kiểm tra lại
                    </div>
                    <div class="message alert alert-success" id="message_success">
                        <b>Đăng nhập thành công!</b> <br>
                        Bạn sẽ được chuyển về <a href="./index.php" class="log-link">Trang chủ</a>
                        sau <span id="seconds-count">5</span> giây.
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <form id="myForm" name="myForm" method="post">
                                <div class="form-group text-left">
                                    <input type="text" id="username" name="username" class="form-control" autofocus>
                                    <span class="lblForm focus" data-placeholder="Tên đăng nhập"></span>
                                </div>
                                <div class="form-group text-left mt-5">
                                    <input type="password" id="password" name="password" class="form-control">
                                    <span class="lblForm" data-placeholder="Mật khẩu"></span>
                                </div>
                                <a class="log-link" href="#">Quên mật khẩu?</a>
                                <button type="button" id="btn_login" name="btn_submit" class="btn btn_login">Đăng
                                    nhập</button>
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
                $('.message').css('display', 'none');

                let username = $('#username').val();
                let password = $('#password').val();
                
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
            });

            function successLogin() {
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


            // Animation Form
            const lblUser = $("#lblUser");
            const lblpass = $("#lblPass");
            $(".form-control").focus(function() {
                let elm = $(this).parent();
                let lbl = elm.find($(".lblForm"));
                lbl.addClass("focus");
            });
            $(".form-control").blur(function() {
                if ($(this).val() == "") {
                    let elm = $(this).parent();
                    let lbl = elm.find($(".lblForm"));
                    lbl.removeClass("focus");
                }
            });
        });
    </script>
</body>

</html>
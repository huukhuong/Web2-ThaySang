<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fontawesome-free-5.14.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login_register.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php">
                <img src="./img/Exclusion 2.svg" alt="Logo brand" style="height: 50px;">
                <?php
                if (isset($_GET['goto'])) {
                    $type = $_GET['goto'];
                    if ($type == 'login') {
                        echo 'Đăng nhập';
                    } else if ($type == 'register') {
                        echo 'Đăng ký';
                    }
                }
                ?>
            </a>
        </div>
</nav>
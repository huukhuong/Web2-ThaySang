<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fontawesome-free-5.14.0-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
</head>

<div class="header_user d-flex">
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        echo
        '<a class="nav-link" href="./register.php?goto=register"> 
            <i class="fas fa-user-plus"></i>
            Đăng ký 
        </a>
        <a class="nav-link" href="./login.php?goto=login"> 
            <i class="fas fa-sign-in-alt"></i>
            Đăng nhập 
        </a>';
    } else {
        echo
        '<a class="nav-link" href="#"> ' 
            . $_SESSION['username'] . 
        '</a>
        <a class="nav-link" href="./logout.php">
            Đăng xuất 
        </a>';
    }
    ?>
</div>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php">
                <img src="./img/Exclusion 1.svg" alt="Logo brand" style="height: 50px;">
                Business Shop
            </a>
        </div>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li><a class="nav-link" href="#">Home</a></li>
                <li><a class="nav-link" href="#">Page 1</a></li>
                <li><a class="nav-link" href="#">Page 2</a></li>
            </ul>
        </div>
    </div>
</nav>
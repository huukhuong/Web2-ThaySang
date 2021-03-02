<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="./css/main.css">
</head>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img height="40px" src="./img/Exclusion 1.svg" alt="logo">
            Shop
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#carouselExampleIndicators">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#content">Danh mục</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                session_start();
                if (!isset($_SESSION['username'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php?goto=login" id="login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./signup.php?goto=register" id="signup">Đăng ký</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="login"> <?php echo $_SESSION['username'] ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php" id="signup">Đăng xuất</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->
<!-- SEARCHBAR -->
<section class="search-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <form action="">
                    <div class="p-1 shadow-sm search-wrapper">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Tìm kiếm nhanh...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-link">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END SEARCHBAR -->
<script>
    // Scroll to solid navbar
    window.addEventListener('scroll', function() {
        let navbar = $('nav');
        navbar.toggleClass('scrolled', window.scrollY > 20);
    });
</script>
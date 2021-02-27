<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    // làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    // mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $password = md5($password);

    require('../connection_lib.php');
    $connect = new Connection();
    $query = "SELECT * FROM taikhoan WHERE TenDangNhap='$username' AND MatKhau='$password'";
    $data = $connect->getRow($query);
    if ($data) {
        $_SESSION['username'] = $data['TenDangNhap'];
        echo $data['TenDangNhap'];
    }
}

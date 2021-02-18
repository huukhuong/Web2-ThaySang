<?php

function executeUpdate($sql)
{
    $connect = new mysqli("localhost", "root", "", "do_an_web2");

    if (!$connect->set_charset("utf8")) {
        printf($connect->error);
    }

    mysqli_query($connect, $sql);

    mysqli_close($connect);
}

function executeResult($sql)
{
    $connect = new mysqli("localhost", "root", "", "do_an_web2");

    if (!$connect->set_charset("utf8")) {
        printf($connect->error);
    }

    $result = mysqli_query($connect, $sql);
    $data = [];
    while($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
    }

    mysqli_close($connect);
}

<?php
    session_start();

    $_SESSION['user_id'] = rand(1, 10000000);

    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'test');

    if (!$connection)
    {
        die("Error connect");
        echo mysqli_error();
    }
    $sql = mysqli_query($connection, 'SELECT `user` FROM `users`');
    $result = mysqli_fetch_array($sql);

    if(empty($result)){
        $sql = mysqli_query($connection, "INSERT INTO `users` (`user`, `type`) VALUES ('{$_SESSION['user_id']}', '1')");
        $_SESSION['color'] = 1;
    } else{
        $_SESSION['color'] = 0;
        $sql = mysqli_query($connection, 'DELETE FROM `users`');
    }
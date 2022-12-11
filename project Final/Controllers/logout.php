<?php
session_start();
if ($_SESSION["log_as"] == "vaccine_center"){
    require __DIR__ .'/../Models/center class.php';
    Center::logout();
    header("location: ../Views/login.html");
    exit();
}
else if ($_SESSION["log_as"] == "user"){
    require __DIR__ .'/../Models/user class.php';
    User::logout();
    header("location: ../Views/login.html");
    exit();
}
else if ($_SESSION["log_as"] == "admin"){

    unset($_SESSION['log_as']);
    session_destroy();
    header("location: ../Views/login.html");
    exit();
}
else  header("location: ../Views/login.html");
?>
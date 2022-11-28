<?php

require __DIR__ .'/../Controllers/user class.php';

try{
    User::register($_POST["name"],$_POST["city"],$_POST["email"],$_POST["phone_no"],$_POST["national_id"],$_POST["password"],$_POST["password2"]);
    header("location: ../Views/login.html"); //b3d el location elsaf7a elly b3d ma t register
    exit();
}
catch (Exception $err){
    
    die ($err->getMessage());
}


?>
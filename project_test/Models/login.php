<?php

if ($_SERVER["REQUEST_METHOD"]=== "POST")
{
    $mysqli = require __DIR__."/database.php";


    $sql = sprintf("select * from %s where email = '%s'",$_POST["log_as"],$mysqli->real_escape_string($_POST["email"]));
    //echo $sql; //test


    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    if ($user) 
    {
        //if(password_verify($_POST["password"],$user["password_hash"]))
        if($_POST["password"] === $user["password_hash"])
        {
            session_start();
            //ht save 2eh men elm3lomat
            
            //$_SESSION["user_id"] = $user["id"]; //el2sm bta3 $user el2sm elly goa el database

            $_SESSION["Name"] = $user["Name"];
            $_SESSION["log_as"] = $_POST["log_as"];

            header("location: ../Views/index.php"); //b3d ma t login
            exit();
        }
    }

    header("location: ../Views/login.html"); //lw m4 nfs el password
    
    exit();
}

?>
<?php

if ($_SERVER["REQUEST_METHOD"]=== "POST")
{
    $mysqli = require __DIR__."/database.php";
    $sql = sprintf("select * from user_i where email = '%s'",$mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    if ($user) 
    {
        //if(password_verify($_POST["password"],$user["password_hash"]))
        if($_POST["password"] === $user["password_hash"])
        {
            session_start();
            //ht save 2eh men elm3lomat
            
            $_SESSION["user_id"] = $user["id"]; //el2sm bta3 $user el2sm elly goa el database

            $_SESSION["Name"] = $user["Name"];

            header("location: index.php"); //b3d ma t login
            exit();
        }
    }

    header("location: log in.html"); //lw m4 nfs el password
    exit();
}

?>
<?php

if ($_SERVER["REQUEST_METHOD"]=== "POST")
{
    require __DIR__ .'/../Include/database.php';
    $mysqli = new database();

    $sql = sprintf("select * from %s where email = '%s'",$_POST["log_as"],$mysqli->conn->real_escape_string($_POST["email"]));


    $result = $mysqli->conn->query($sql);

    $user = $result->fetch_assoc();

    if ($user) 
    {
        
        if($_POST["password"] === $user["password"])
        {
            if($_POST["log_as"] === "admin"){

                session_start();
                $_SESSION["log_as"] = $_POST["log_as"];
                header("location: ../Views/index.php"); //b3d ma t login
                exit();

            }


        }
    }

    header("location: ../Views/login.html"); //lw m4 nfs el password
    exit();
}

?>
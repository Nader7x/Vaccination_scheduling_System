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
        
        if($_POST["password"] === $user["password_hash"])
        {
            if($_POST["log_as"] === "admin"){
                session_start();
                $_SESSION["log_as"] = "admin";
                header("location: ../Views/admin home.php"); //b3d ma t login
                exit();

            }
            else if($_POST["log_as"] === "user"){

                session_start();
                $_SESSION["log_as"] = "user";
                $_SESSION["Name"] = $user["Name"];
                $_SESSION["City"] = $user["City"];
                $_SESSION["Email"] = $user["Email"];
                $_SESSION["Phone_no"] = $user["Phone_no"];
                $_SESSION["National_id"] = $user["National_id"];
                $_SESSION["password_hash"] = $user["password_hash"];
                $_SESSION["ID"] = $user["ID"];
                $_SESSION["Reservation_number"] = $user["Reservation_number"];
                $_SESSION["First_dose_state"] = $user["First_dose_state"];
                $_SESSION["Second_dose_state"] = $user["Second_dose_state"];
                $_SESSION["photo"] = $user["photo"];

                
                
                header("location: ../Views/user home.php"); //b3d ma t login
                exit();

            }
            else if($_POST["log_as"] === "vaccine_center"){

                session_start();
                $_SESSION["log_as"] = "vaccine_center";
                $_SESSION["Name"] = $user["Name"];
                $_SESSION["City"] = $user["City"];
                $_SESSION["Email"] = $user["Email"];
                $_SESSION["Contact_no"] = $user["Contact_no"];
                $_SESSION["Address"] = $user["Address"];
                $_SESSION["password_hash"] = $user["password_hash"];
                $_SESSION["id"] = $user["Id"];
                
                header("location: ../Views/vaccination center.php"); //b3d ma t login
                exit();

            }


        }
    }
    header("location: ../Views/login.html"); //lw m4 nfs el password
    exit();
}

?>
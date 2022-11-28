<?php
if(empty($_POST["fname"])) {die("Name is required");}

if(! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){die("valid Email is required");}

if($_POST["password"] !== $_POST["password2"]){die("password must match");}

$password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require __DIR__ .'/database.php';

//$sql = "INSERT INTO user_i (fname,lname,email,gender,password_hash)  VALUES (?,?,?,?,?)";
$sql = "INSERT INTO user_i (flname,city,email,phone_no,national_id,password_hash)  VALUES (?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)){die("SQL error: ". $mysqli->erroer);}

//$stmt->bind_param("sssss",$_POST["fname"],$_POST["lfname"],$_POST["email"],$_POST["gender"],$password_hash);
$stmt->bind_param("ssssss",$_POST["name"],$_POST["city"],$_POST["email"],$_POST["phone_no"],$_POST["national_id"],$password_hash);

try{
    $stmt->execute();
    header("location: log in.html"); //b3d el location elsaf7a elly b3d ma t register
    exit();
}
catch (Exception $err){
    if  ($mysqli->errno ===1062)
    {
        die ("duplicate in the Email");
}else {
    die ($err);
}
}

?>
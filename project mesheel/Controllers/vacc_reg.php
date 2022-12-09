
<?php
if (isset($_POST['add_center'])) {
require_once  __DIR__ .'/../Models/admin.php';
$chars = str_split($_POST["Contact_no"]);
foreach($chars as $numbers)
{
   if(!is_numeric($numbers)){die("contact number can't have letters in it");}
}
if(empty($_POST["Name"])) {die("Name is required");}
if(empty($_POST["City"])) {die("City is required");}
if(empty($_POST["Contact_no"])) {die("Number is required");}
if(empty($_POST["Address"])) {die("Address is required");}
if(empty($_POST["Type"])) {die("Type is required");}
if(! filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL)){die("valid Email is required");}
if($_POST["password"] !== $_POST["password2"]){die("password must match");}

try{
    Admin::add_vaccination_center($_POST["Name"],$_POST["City"],$_POST["Contact_no"],$_POST["Address"],$_POST["Type"],$_POST["Email"],$_POST["password"]);
    header("location: ../Views/index.php"); //b3d el location elsaf7a elly b3d ma t register
    exit();
}
catch (Exception $err){  
    
    die ($err->getMessage());
}
}
?>
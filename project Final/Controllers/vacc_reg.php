
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

try{
    if (!Admin::add_vaccination_center($_POST["Name"],$_POST["City"],$_POST["Contact_no"],$_POST["Address"],$_POST["Type"],$_POST["Email"],$_POST["password"]))
    {
        header("location: ../Views/admin home.php?err3=this Email already exist"); 
        exit();
    }
    else{ header("location: ../Views/admin home.php"); 
    exit();
    }}
catch (Exception $err){  
    
    die ($err->getMessage());
}
}
?>
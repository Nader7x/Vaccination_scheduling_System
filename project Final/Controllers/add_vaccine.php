<?php
if (isset($_POST['submit'])) {
    require_once  __DIR__ .'/../Models/admin.php';;
    try{
    if (!Admin::add_vaccine($_POST["name"],$_POST["gap"],$_POST["Precautions"]))
    {
        header("location: ../Views/admin home.php?err2=this Vaccine already exist"); 
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
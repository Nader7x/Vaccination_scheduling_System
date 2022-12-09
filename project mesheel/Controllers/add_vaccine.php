<?php
if (isset($_POST['submit'])) {
    require_once  __DIR__ .'/../Models/admin.php';;
    try{
    Admin::add_vaccine($_POST["name"],$_POST["gap"],$_POST["Precautions"]);
    //header("location: ../index.php"); b3d el location elsaf7a elly b3d submitPecautions
    exit();
    }
    catch (Exception $err){  
        die ($err->getMessage());
    }
}
?>
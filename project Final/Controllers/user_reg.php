<?php

require_once __DIR__ .'/../Models/user class.php';

try{
    if(isset($_FILES))
    {
		@$file = $_FILES["file"];
        $allowedExts = array("jpg", "png");
        $maxSize = 1024000;
        $destination = "../uploads/stdimg/";
		include '../Models/UploadClass.php';
        $upload = new upload($file, $allowedExts, $maxSize, $destination);
		$pic = $upload->updateimg('file');
        

	}
	 else
	{		
		echo"error update img";
	}
    
    if (!User::register($_POST["name"],$_POST["city"],$_POST["email"],$_POST["phone_no"],$_POST["national_id"],$_POST["password"],$_POST["password2"],$pic))
    {header("location: ../Views/Registration.php?err=This Email Already exist");}

    else {header("location: ../Views/login.html");
    exit();}
}
catch (Exception $err){
    
    die ($err->getMessage());
}


?>
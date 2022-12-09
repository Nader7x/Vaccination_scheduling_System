<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "user"  ){
$url = $_SESSION['photo'];
?>    

    <head>

        <meta charset="UTF-8">
        <meta name="vaccination" content="vaccination center">
        <title>profile</title>
        <link rel="stylesheet" href="css/profile.css">
        <script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>
    </head>


    <body>

  
        <header>
            <a href="user home.php" title="go home" class="logo">
                <i class="fa-solid fa-virus-covid"></i>vaccineto
            </a>
                <img src="" alt="">
    
                <a href="profile.php" class="button">profile</a>
                <a href="../Controllers/logout.php" class="button">logout</a>
        </header>  
         <div class="container">
            <div class="wrapper">
            <a href="#">
            <?php 
				
				echo '<img class="rounded-circle mt-5" width="180px" alt="your photo" src="'.$url.'" />'; //to show img 
			?>
            </a>
            <div class="title">
            <?php echo $_SESSION["Name"];?>
            </div>
            <div class="place">
            <?php echo $_SESSION["City"];?>
            </div>
            </div>
            <div class="content">
            <p>
                <?php echo "phone number : ". $_SESSION["Phone_no"]."<br> national_id:" .$_SESSION["National_id"];?>
            </p>
            </div>

        </div>
        <script>
            const img = document.querySelector("img");
            const icons = document.querySelector(".icons");
            img.onclick = function(){
            this.classList.toggle("active");
            icons.classList.toggle("active");
            }
        </script>




    </body>

</html>
<?php } ?>
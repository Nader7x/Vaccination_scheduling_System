<!DOCTYPE html>
<html>
<?php 
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "user"){
require_once  __DIR__ .'/../Models/user class.php';

$cert = User::check_certificate($_SESSION['ID']);
?>
  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>certificate</title>
    <link rel="stylesheet" href="css/certificate.css">
    <script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>
  </head>


  <body>

    <header>
      <a href="user home.php" title="go home" class="logo">
        <i class="fa-solid fa-virus-covid"></i>vaccineto
      </a>
          <img src="" alt="">

          <a href="profile.php" class="button">profile</a>
          <a href="login.html" class="button">logout</a>
  </header>  
  <?php if($cert){echo '
    <embed src="certificates/SW1 Projects Ideas[1].pdf" class="pdf">
  ';}}?>
  </body>

</html>

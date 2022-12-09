<!DOCTYPE html>
<html>
<?php 
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "admin"){
require_once  __DIR__ .'/../Models/admin.php';
$arr = Admin::get_all_cities();
?>

  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>add vaccination center</title>
    <link rel="stylesheet" href="css/add vaccination center.css">
    <script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>

  </head>



  <body>

  <header>
      <a href="admin home.php" title="go home" class="logo">
          <i class="fa-solid fa-virus-covid"></i>vaccineto
      </a>
      <a href="../Controllers/logout.php" class="button">logout</a>
      <form class="header" action="alter_center.php" method="post">
        <ul class="nav">
          <input class="search" name="center_city"  type="search" placeholder="search with city">
        </ul>
        <input type="submit"  value="search" name='search'>
        </form>
          
  </header>  






      <div class="form">
        <form action="../Controllers/vacc_reg.php" method="post">
                <h1 class="form-title">ADD CENTER</h1>
                <div class="main-user-info">
                        <div class="user-input-box">
                                <label for="center-name"> Name</label><br>
                                <input id="center-name" class="input"  placeholder="add center name" name="Name"  title="add the center's name" autofocus required>
                        </div>
                        
                        <div class="user-input-box">
                          <label for="address">Address</label><br>
                          <input id="address" class="input"  placeholder="add address" name="Address"  title="add center's address" autofocus required>
                        </div>

                        <div class="user-input-box">
                          <label for="center-number">Center Number</label><br>
                          <input id="center-number" class="input"  placeholder="add number" name="Contact_no"  title="add center's number" autofocus required>
                        </div>

                        <div class="user-input-box">
                          <select class="input" title="add the center's city" name="City" >
                            <option value="none" selected disabled hidden>Cities</option>
                            <?php
                            foreach($arr as $city){
                              echo "
                            <option value=".$city.">".$city."</option>
                            
                            ";
                            }
                            ?>
                          </select>
                        </div>

                        <div class="user-input-box">
                          <select class="input" title="center's type" name="Type">
                            <option value="none" selected disabled hidden>types</option>
                            <option value="Government">Government</option>
                            <option value="Private">Private</option>
                            </select>
                        </div>
                        
                </div>
                <div class="user-input-box">
                          <label for="email">Email</label><br>
                          <input id="email" type="text" class="box" name="Email"placeholder="enter email"autofocus required>
                        </div>



                        <div class="user-input-box">
                                <label for="password">Password</label><br>
                                <input id="password" type="password" class="box" name="password"placeholder="enter password"autofocus required>
                        </div>


                        <div class="user-input-box">
                                <label for="password2">confirmation password</label><br>
                                <input type="password" id="password2" class="box" name="password2" placeholder="Password Confirmation"autofocus required>
                        </div>


                <div class="form-submit-btn">
                        <input type="submit"  class="button" value="add center" name="add_center" >
                </div>


        </form>
        </div>
        <script>
          function confirmpassword(input){
          var password = document.getElementById("password").value;
          var confirmpassword = document.getElementById("password2").value;
          if (confirmpassword != password){
                  alert("Password didn't match");
                  return false;
          }
          else{
                  return true;
          }
  
          }
  </script>


  </body>

</html>
<?php }?>
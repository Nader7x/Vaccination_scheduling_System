<!DOCTYPE html>
<html>
<?php 
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "user"){
require_once  __DIR__ .'/../Models/user class.php';
require_once  __DIR__ .'/../Models/admin.php';
$center_arr= Admin::list_of_vaccination_center();
$vaccin_arr = User::list_of_vaccination();
//mmkn n5leh y6tar ya el2ola ya eltanya bs m4 radia
if(isset($_POST['submit'])) {
  try{ 
    User::reservation($_POST['center_id'],$_POST['Vaccine'],$_POST['date'],$_SESSION["ID"],$_POST['firstorsecond']);
    header("location: ../Views/user home.php");
  }
  catch (Exception $err){
  
      die ($err->getMessage());
  }
}

?>

  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>reservation</title>
    <link rel="stylesheet" href="css/reservation.css">
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
   
    <div class="form">
      <form  method="post">
              <h1 class="form-title">Reservation</h1>
              <div class="main-user-info">
                      <div class="user-input-box">
                        <select class="input" title="add the center's city" name="Vaccine">
                          <option value="none" selected disabled hidden>vaccine</option>
                          <?php
                            foreach($vaccin_arr as $vaccine){
                              echo "
                            <option value=".$vaccine.">".$vaccine."</option>  
                            ";
                            }
                            ?>
                        </select>
                      </div>
                      

                      <div class="user-input-box">
                        <select class="input" title="add the center's city" name="center_id">
                          <option value="none" selected disabled hidden>vaccination center</option>
                          <?php
                            foreach($center_arr as $center){
                              echo "
                            <option value=".$center["Id"].">".$center["Name"]."</option>  
                            ";
                            }
                            ?>

                        </select>
                      </div>


                      <div class="user-input-box">
                              <label for="date">dose_date:</label>
                              <input id="date" class="input" type="date" name="date" title="add date">
                      </div>
                      

                      <div class="user-input-box">
                              <select class="input" title="add the center's city" name="firstorsecond">
                                <option value="none" selected disabled hidden>First or Second</option>
                                <?php 
                                session_start();
                                if ($_SESSION["First_dose_state"] == "0")
                                {echo "
                                <option value='1'>first</option>";}
                                else if($_SESSION["Second_dose_state"] == "0"){ echo "
                                <option value='2'>second</option>";}
                                ?>
                              </select>
                      </div>


                      
              </div>



              <div class="form-submit-btn">
                      <input type="submit"  class="button" value="submit" name="submit">
              </div>
              

      </form>
      </div>

  </body>

</html>
<?php }?>
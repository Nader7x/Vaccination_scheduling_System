<!DOCTYPE html>
<html>
<?php 
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "user"){
require_once  __DIR__ .'/../Models/user class.php';
require_once  __DIR__ .'/../Models/admin.php';
$center_arr= Admin::list_of_vaccination_center();
$vaccin_arr = User::list_of_vaccination();

if(isset($_POST['submit'])) {
  try{ 
    $result = User::reservation($_POST['center_id'],$_POST['Vaccine'],$_POST['date'],$_SESSION["ID"],$_POST['firstorsecond']);
    if( $result =="2")
    {  
    header("location: ../Views/user home.php?err2=you already have a reservation");
    }
    elseif(!$result)  {header("location: ../Views/user home.php?err=you can't reserve the second dose without waiting for the gap");}
    else header("location: ../Views/user home.php");
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
                        <?php if($_SESSION["First_dose_state"] == "0"){?>
                        <select class="input" title="choose vaccine" name="Vaccine" autofocus required>
                          <option value="none"  disabled hidden>vaccine</option>
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
                        <select class="input" title="Choose vaccine center" name="center_id" autofocus required>
                          <option value="none"  disabled hidden>vaccination center</option>
                          <?php
                            foreach($center_arr as $center){
                              echo "
                            <option value=".$center["Id"].">".$center["Name"]."</option>  
                            ";
                            }
                            ?>

                        </select>
                      </div>
                            <?php }?>

                      <div class="user-input-box">
                              <label for="date">dose_date:</label>
                              <input id="date" class="input" type="date" name="date" title="add date" autofocus required>
                      </div>
                      

                      <div class="user-input-box">
                              <select class="input" title="Choose the dose" name="firstorsecond" autofocus required>
                                <option value="none" disabled hidden>First or Second</option>
                                <?php 
                                session_start();
                                if ($_SESSION["First_dose_state"] == "0")
                                {echo "
                                <option value='1'>first</option>";}
                                else if($_SESSION["Second_dose_state"] == "0"){ echo "
                                <option value='2'>second</option selected>";}
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
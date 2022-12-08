
<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "admin"){

?>

  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>add vaccine</title>
    <link rel="stylesheet" href="css/add vaccine.css">
    <script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>

  </head>



  <body>


    <header>
      <a href="index.html" class="logo">
              <i class="fa-solid fa-virus-covid"></i> vaccineto
      </a>
              
              <form class="header" action="alter_center.php">
                  <ul class="nav">
                  <input class="search"  type="search" placeholder="search with city">
                  </ul>
              </form>
              
      </header>  


    <div class="form">
      <form action="../Controllers/add_vaccine.php" method="post">
              <h1 class="form-title">ADD VACCINE</h1>
              <div class="main-user-info">
                      <div class="user-input-box">
                              <label for="vaccine-name">vaccine Name</label><br>
                              <input  id="vaccine-name" class="input"  placeholder="add name" name="name"  title="add the vaccine's name"autofocus required>
                      </div>



                      <div class="user-input-box">
                              <label for="gap">gap between doses</label><br>
                              <input id="gap" class="inputnum" type="number" placeholder=""  title="gap between two doses" name="gap" autofocus required>
                      </div>
                      <div class="user-input-box">
                        <label for="precautions">Precautions</label><br>
                        <textarea class="precautions" name="Precautions"></textarea>
                </div>
                      
              </div>


              <div class="form-submit-btn">
                <input type="submit" class="submit_button" value="submit" name="submit">
              </div>


      </form>
      </div>



  </body>

  
</html>
<?php } ?>



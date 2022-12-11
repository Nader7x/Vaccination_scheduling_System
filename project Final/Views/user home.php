<!DOCTYPE html>
<html>
<?php 
session_start();
if (isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "user"){
require_once  __DIR__ .'/../Models/admin.php';
$arr = Admin::list_of_vaccination_center();
?>

  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>home</title>
    <link rel="stylesheet" href="css/user home.css">
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
  
  

  <div class="table-container">
    <h1 class="heading">vaccination center</h1>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>city</th>
                <th>address</th>
                <th>contact number</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
            <form method="post" id="form1">
                <?php
                    for ($i=0;$i<count($arr);$i++){
                        
                        echo "       
                                    
                    <tr>
                        <td data-label="."name"." name='mohamed'>".$arr[$i]["Name"]."</td>
                        <td data-label="."email".">".$arr[$i]["Email"]."</td>
                        <td data-label="."city".">".$arr[$i]["City"]."</td>
                        <td data-label="."address".">".$arr[$i]["Address"]."</td>
                        <td data-label="."contact number".">".$arr[$i]["Contact_no"]."</td>
                        <td data-label="."type".">".$arr[$i]["type"]."</td>
                    </tr>
                    ";
                    }
                    ?>
                    </tr>
                </form>
        </tbody>
    </table>
</div>





      <ul class="editing_list">
    
        <li>certificate file<br><form action="certificate.php">
        <input type="submit" class="submit_button" value="certificate">
        </form></li>

        <li>reserve vaccine<br>
        <form action="reservation.php">
        <input type="submit" class="submit_button" value="reserve">
        </form>
        </li>
        <?php if(isset($_GET['err'])) {echo "<span style='color:red;font-size:20px;'>".$_GET['err']."</span>";} ?>
        <?php if(isset($_GET['err2']) and $_SESSION["First_dose_state"] == 0) {echo "<span style='color:red;font-size:20px;'>".$_GET['err2']."</span>";} ?>

      </ul>



  </body>

</html>
<?php } ?>
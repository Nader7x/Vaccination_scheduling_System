<!DOCTYPE html>
<html>
<?php 
session_start();
//if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "admin"){
require_once  __DIR__ .'/../Models/admin.php';
$arr = Admin::registered_users();
?>

  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>admin users list</title>
    <link rel="stylesheet" href="css/admin users list.css">
    <script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>

  </head>


  <body>

    <header>
      <a href="index.html" class="logo">
          <i class="fa-solid fa-virus-covid"></i>vaccineto
      </a>
          
          <form class="header" action="alter_center.php">
          <ul class="nav">
            <input class="search"  type="search" placeholder="search with city">
          </ul>
          </form>
          
  </header>  



    <div class="table-container">
      <h1 class="heading">User List</h1>
      <table class="table">
          <thead>
              <tr>
                  <th>name</th>
                  <th>city</th>
                  <th>email</th>
                  <th>phone number</th>
                  <th>National_id</th>
                  <th>reservation number</th>

              </tr>
          </thead>
          <tbody>
              <?php
              for ($i=0;$i<count($arr);$i++){
                echo "       
                            
              <tr>
                  <td data-label="."name".">".$arr[$i]["Name"]."</td>
                  <td data-label="."city".">".$arr[$i]["City"]."</td>
                  <td data-label="."email".">".$arr[$i]["Email"]."</td>
                  <td data-label="."phone number".">".$arr[$i]["Phone_no"]."</td>
                  <td data-label="."id".">".$arr[$i]["National_id"]."</td>
                  <td data-label="."reservation number".">".$arr[$i]["Reservation_number"]."</td>
              </tr>
              ";
              }
              ?>
          </tbody>
      </table>
  </div>

    


  </body>

</html>
<?php// } ?>
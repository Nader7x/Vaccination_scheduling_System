<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "vaccine_center"){
    
if(isset($_POST['search'])) {
  
  $_SESSION["user_reservation_number"] =$_POST['reservation_number'];

}
require_once  __DIR__ .'/../Models/center class.php';
$arr = Center::view_user_info($_SESSION["user_reservation_number"]);
?>
<head>

<meta charset="UTF-8">
<meta name="vaccination" content="vaccination center">
<title>center view users</title>
<link rel="stylesheet" href="css/center view users.css">
<script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>

</head>



<body>

  
  <header>
    <a href="vaccination center.php" class="logo">
        <i class="fa-solid fa-virus-covid"></i>vaccineto
    </a>
        
        <form class="header" method="post">
            <a href="../Controllers/logout.php" class="button">logout</a>
            <ul class="nav">
                <input class="search-box"  type="search" name="reservation_number" placeholder="search with reservation number.....">
            </ul>
            <input class="search-btn" type="submit" value="search" name="search">
        </form>
        
</header>  



<div class="table-container">
  <h1 class="heading">User Info</h1>
  <table class="table">
      <thead>
          <tr>
            <th>name</th>
            <th>city</th>
            <th>email</th>
            <th>phone number</th>
            <th>national id</th>
            <th>reservation number</th>
            
          </tr>
      </thead>
      <tbody>
          <tr>
          <?php
              if (Center::view_user_info($_SESSION["user_reservation_number"]) !=false){
                echo "       
                            
              <tr>
                  <td data-label="."name".">".$arr["Name"]."</td>
                  <td data-label="."city".">".$arr["City"]."</td>
                  <td data-label="."email".">".$arr["Email"]."</td>
                  <td data-label="."phone number".">".$arr["Phone_no"]."</td>
                  <td data-label="."id".">".$arr["National_id"]."</td>
                  <td data-label="."reservation number".">".$arr["Reservation_number"]."</td>
              </tr>
              ";
              }
              ?>

          </tr>

      </tbody>
  </table>
</div>


</body>



</html>
<?php }?>
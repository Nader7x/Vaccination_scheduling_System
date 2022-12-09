<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "vaccine_center"){
require_once  __DIR__ .'/../Models/center class.php';

$arr = Center::vaccination_schedule($_SESSION["id"]);
if(isset($_POST['confirm_dose'])) {

    try{Center::confirm_dose($_POST['confirm_dose']);
        header("location: ../Views/vaccination center.php");}

    catch (Exception $err){

        die ($err->getMessage());
    }
}
?>

<head>

<meta charset="UTF-8">
<meta name="vaccination" content="vaccination center">
<title>center</title>
<link rel="stylesheet" href="css/vaccination center.css">
<script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>

</head>



<body>

  <header>
    <a href="vaccination center.html" class="logo">
        <i class="fa-solid fa-virus-covid"></i>vaccineto
    </a>
      <a href="" class="button">logout</a>
      <form class="header" action="center view users.php">
          <ul class="nav">
              <input class="search-box"  type="search" placeholder="search with reservation number.....">
          </ul>
          <input class="search-btn" type="submit" value="search">
      </form>
        
</header>  


<div class="table-container">
  <h1 class="heading">Confirmation Dose</h1>
  <table class="table">
      <thead>
          <tr>
            <th>name</th>
            <th>reservation number</th>
            <th>confirm dose</th>
          </tr>
      </thead>
      <tbody>
      <form id="form1" method="post">
      <?php
      for ($i=0;$i<count($arr);$i++){

          echo "

              <tr>
                  <td data-label="."name".">".$arr[$i]["Name"]."</td>
                  <td data-label="."reservation number".">".$arr[$i]["Reservation_number"]."</td>
                  <td data-label="."confirm_dose"."><button form = 'form1' type='submit' class='submit_button' value=".$arr[$i]["UserID"]." name='confirm dose'>Confirm dose</button></td>
              </tr>
              ";
      }
      ?>
      </form>
      </tbody>
  </table>
</div>



    <div class="functions">  
        <ul class="editing_list" >
          
          
            </form>
        </li>
      
        </ul>
      
      </div>

</table>


</body>



</html>
<?php } ?>
<!DOCTYPE html>
<html>
<?php
//fal2a5er ne3mel if eno admin mn session
require_once  __DIR__ .'/../Models/center class.php';
$arr = Center::vaccination_schedule(1);
if(isset($_POST['confirm_dose'])) {

    try{Center::confirm_dose($_POST['confirm_dose']);}
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
        
        <form class="header" action="center view users.html">
        <ul class="nav">
          <input class="search"  type="search" placeholder="search with reservation number">
        </ul>
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
//          var_dump( $arr[$i]);
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
<!--          <tr>-->
<!--              <td data-label="name">mohamed</td>-->
<!--              <td data-label="reservation number">76132576</td>-->
<!---->
<!--          </tr>-->
<!---->
<!--          <tr>-->
<!--            <td data-label="name">ibrahim</td>-->
<!--            <td data-label="reservation number">761332122576</td>-->
<!--            <td data-label="confirm dose"><input type="submit" class="submit_button" value="confirm dose">-->
<!--          </tr>-->
<!---->
<!--          <tr>-->
<!--            <td data-label="name">ali</td>-->
<!--            <td data-label="reservation number">761123132576</td>-->
<!--            <td data-label="confirm dose"><input type="submit" class="submit_button" value="confirm dose">-->
<!--          </tr>-->
<!---->
<!--          -->
<!--          <tr>-->
<!--            <td data-label="name">omar</td>-->
<!--            <td data-label="reservation number">88991332122576</td>-->
<!--            <td data-label="confirm dose"><input type="submit" class="submit_button" value="confirm dose">-->
<!--          </tr>-->
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
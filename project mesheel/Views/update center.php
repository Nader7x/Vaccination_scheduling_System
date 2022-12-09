<!DOCTYPE html>
<html>

<?php
session_start();
if(isset($_POST['alter'])) {
  
  $_SESSION["vaccine_center_id"] =$_POST['alter'];

}


if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "admin"){
  require_once  __DIR__ .'/../Models/admin.php';
  $arr = Admin::get_all_cities();


if(isset($_POST['submit'])) {
  
  try{
    if(!empty($_POST['new_value']))
    {Admin::update_vaccine_center($_SESSION["vaccine_center_id"],$_POST['coulmn_name'],$_POST['new_value']);}

    else {Admin::update_vaccine_center($_SESSION["vaccine_center_id"],$_POST['coulmn_name'],$_POST['new_value2']);}

    header("location: ../Views/admin home.php");
}
  catch (Exception $err){
  
      die ($err->getMessage());
  }
}

?>
  <head>

    <meta charset="UTF-8">
    <meta name="vaccination" content="vaccination center">
    <title>update center</title>
    <link rel="stylesheet" href="css/update center.css">
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
      <form method="post">
              <h1 class="form-title">update center</h1>
              <div class="main-user-info">

                      

                      <div class="user-input-box">
                        <select id="column" onchange="text()" class="input" name="coulmn_name" required>
                          <option value="none" selected disabled hidden>column name</option>  
                          <option value="Name" selected >name</option>
                          <option value="City">city</option>
                          <option value="Address">address</option>
                          <option value="Contact_no">contact_number</option>
                          <option value="Email">email</option>
                          <option value="password_hash">password</option>
                        </select>
                      </div>




                      <div class="user-input-box">
                        <select id="row" class="input"  style="visibility:hidden;" name ="new_value2" required>
                          <option value="none" selected disabled hidden>Enter city name</option>  
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

                    <input id="new_value" class="input"  placeholder="enter new value" name="new_value" >
                </div>
                      
              </div>
              
              <div class="form-submit-btn">
                      <input type="submit"  class="button" value="update" name="submit">
              </div>
              

      </form>
      </div>
      <script>
        function text(){
          var status = document.getElementById("column");
          if(status.value =="City" ){
            document.getElementById("row").style.visibility="visible";
            document.getElementById("new_value").style.visibility="hidden";
          }
          else{
            document.getElementById("row").style.visibility="hidden";
            document.getElementById("new_value").style.visibility="visible";
          }
        }
      </script>


  </body>


</html>
<?php }?>

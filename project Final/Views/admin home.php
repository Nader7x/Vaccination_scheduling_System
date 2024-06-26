<!DOCTYPE html>
<html>
<?php 

session_start();
if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "admin"){
require_once  __DIR__ .'/../Models/admin.php';
$arr = Admin::list_of_vaccination_center();
if(isset($_POST['add_city'])) {
    try{
      $city = Admin::get_all_cities();
      if (!in_array($_POST['City'], $city)) {
        

          Admin::add_city($_POST['City']);
          header("location: ../Views/admin home.php");
      }
      else if ($_POST['City'] =="" or $_POST['City'] ==" ") {header("location: ../Views/admin home.php?err= No city entered");}
      else {header("location: ../Views/admin home.php?err= This City already exist");}
      
    }
    catch (Exception $err){
    
        die ($err->getMessage());
    }
}
?>

<head>

  <meta charset="UTF-8">
  <meta name="vaccination" content="vaccination center">
  <title>admin home</title>
  <link rel="stylesheet" href="css/index.css">
  <script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>



<body>



  <header>
    <a href="admin home.php" title="go home" class="logo">
      <i class="fa-solid fa-virus-covid"></i>vaccineto
    </a>
    <a href="../Controllers/logout.php" class="button">logout</a>
    <form class="header" action="alter_center.php" method="post">
      <ul class="nav">

        <input class="search-box" name="center_city" type="search" placeholder="search with city....">
      </ul>
      <input class="search-btn" type="submit" value="search" name='search'>
    </form>

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
  <br><br><br>



  <div class="functions">
    <ul class="functions_list">

      <li>add city<br>

        <form method="post" id="add_city">
          <input class="input" placeholder="add city" title="add city" name="City"><br>
          <button form='add_city' type='submit' class='submit_button' value="add_city" name='add_city'>Add city</button>
        </form>
        <?php if(isset($_GET['err'])) {echo "<span style='color:red;font-size:28px;'>".$_GET['err']."</span>";} ?>

      </li>

      <li>add vaccination center<br>

        <form action="add vaccination center.php">
          <input type="submit" class="submit_button" value="add center">
        </form>
        <?php if(isset($_GET['err3'])) {echo "<span style='color:red;font-size:20px;'>".$_GET['err3']."</span>";} ?>

      </li>

      <li>add vaccine<br>
        <form action="add vaccine.php">
          <input type="submit" class="submit_button" value="add vaccine">
        </form>
        <?php if(isset($_GET['err2'])) {echo "<span style='color:red;font-size:20px;'>".$_GET['err2']."</span>";} ?>
      </li>

      <li>registered users<br>
        <form action="admin users list.php">
          <input type="submit" class="submit_button" value="view users">
        </form>
      </li>

    </ul>
  </div>



</body>


</html>
<?php } ?>
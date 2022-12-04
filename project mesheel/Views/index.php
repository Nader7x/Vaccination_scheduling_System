<!DOCTYPE html>
<html>
<?php 
session_start();
if ($_SESSION["log_as"] =="admin")
{
require_once __DIR__ .'/../Models/admin.php';
}
?>
<head>

<meta charset="UTF-8">
<meta name="vaccination" content="vaccination center">
<title>admin home</title>
<link rel="stylesheet" href="css/index.css">

</head>


<body>

  <div class="header">
  
      <a class="homelogo" href="index.html" title="go home" style="text-decoration:none">home page</a>
  
<input class="search"  type="search" placeholder="search with city">

        <a class="submit_buttonlink" href="alter.html" title="add vaccine">
        <button class="search_button" type="button" title="submit" >search</button> 
      </a></li>


  
      <a class="profilelogo" href="" title="go home" >
        <img class="profilelogo" title="go to profile" src="images/user-modified.png" alt="profile logo" >
      </a>
  
    </div>
  
  


<form>
  <div class="information">
      <table border="1" class="information_table">
          <tr>
              <th>name</th>
              <th>city</th>
              <th>address</th>
              <th>contact number</th>
              <th>type</th>

          </tr>
          <?php
          
          if($array = Admin::list_of_vaccination_center()){
          for ($i=0;$i<count($array);$i++)
          {
            echo "
          <tr>
              <td>".$array[$i]["Name"]."</td>
              <td>".$array[$i]["City"]."</td>
              <td>".$array[$i]["Address"]."</td>
              <td>".$array[$i]["Contact_no"]."</td>
              <td>".$array[$i]["type"]."</td>

          </tr>";
          }
        }
          ?>
          
  </div>
  </form>
</table>


<div class="buttons">  
  <ul class="editing_list" >
    
    <li>add vaccination center<br><a class="submit_buttonlink" href="add vaccination center.html" title="add center">
      <button class="submit_button" type="button" title="submit" >add center</button> 
    </a></li>

    <li>add vaccine<br><a class="submit_buttonlink" href="add vaccine.html" title="add vaccine">
      <button class="submit_button" type="button" title="submit" >add vaccine</button> 
    </a></li>



  </ul>

</div>


</body>

</html>
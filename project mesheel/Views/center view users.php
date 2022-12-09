<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="vaccination" content="vaccination center">
<title>center view users</title>
<link rel="stylesheet" href="css/center view users.css">
<script src="https://kit.fontawesome.com/39308665b1.js" crossorigin="anonymous"></script>

</head>



<body>

  <!-- <form class="header" action="center view users.php">
  
    <a class="homelogo" href="vaccination center.html" title="go home" style="text-decoration:none">home page</a>
    <input class="search"  type="search" placeholder="search with reservation number">

  </form>
     -->
  <header>
    <a href="vaccination center.html" class="logo">
        <i class="fa-solid fa-virus-covid"></i>vaccineto
    </a>
        
        <form class="header" action="center view users.php">
            <a href="../Controllers/logout.php" class="button">logout</a>
            <ul class="nav">
                <input class="search-box"  type="search" placeholder="search with reservation number.....">
            </ul>
            <input class="search-btn" type="submit" value="search">
        </form>
        
</header>  






<!-- 
    <div class="information">
        <table border="1" class="information_table">
            <tr>
                <th>name</th>
                <th>reservation number</th>
                <th>confirm dose</th>
            </tr>
            
            <tr>
                <td>ali</td>
                <td>0100100</td>
                <td>
                  <form action="" class="header_buttons"> <input type="submit" class="submit_button" value="confirm dose">
                  </form>
                </td>
            </tr>
            
    </div>

</table>
 -->



<div class="table-container">
  <h1 class="heading">Confirmation Dose</h1>
  <table class="table">
      <thead>
          <tr>
            <th>name</th>
            <th>city</th>
            <th>email</th>
            <th>phone number</th>
            <th>national id</th>
            <th>reservation number</th>
            <!-- <th>confirm dose</th> -->
          </tr>
      </thead>
      <tbody>
          <tr>
            <td data-label="name">mohamed</td>
            <td data-label="city">cairo</td>
            <td data-label="email">saqr</td>
            <td data-label="phone number">0100001000</td>
            <td data-label="national id">0</td>
            <td data-label="reservation number">5</td>

          </tr>

      </tbody>
  </table>
</div>


</body>



</html>
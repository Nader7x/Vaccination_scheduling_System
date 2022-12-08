<?php 

session_start();
//if(isset($_SESSION["log_as"]) and $_SESSION["log_as"] === "admin"){
require_once  __DIR__ .'/../Models/admin.php';
$arr = Admin::list_of_vaccination_center();
if(isset($_POST['delete'])) {
    try{Admin::delete_vaccine_center($_POST['delete']);}
    catch (Exception $err){
    
        die ($err->getMessage());
    }
}
?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">
        <meta name="vaccination" content="vaccination center">
        <title>alter center</title>
        <link rel="stylesheet" href="css/alter.css">
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
            <h1 class="heading">vaccination_Center Modification</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>city</th>
                        <th>address</th>
                        <th>contact number</th>
                        <th>type</th>
                        <th>update</th>
                        <th>delete</th>
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
                        <form method='post' id='form2' action='update center.php'>
                        <td data-label="."update"."><button form = 'form2' type='submit' class='submit_button' value=".$arr[$i]["Id"]." name='alter'>update</button></td>
                        </form>
                        <td data-label="."delete"."><button form = 'form1' type='submit' class='submit_button' value=".$arr[$i]["Id"]." name='delete'>delete</button></td>


                    </tr>
                    ";
                    }
                    ?>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>
    


    </body>


</html>
<?php //} ?>
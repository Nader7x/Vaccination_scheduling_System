

<table class="swimming-table">
                <tr>
                    <td>Rank</td>
                    <td>Name</td>
                    <td>Gold</td>
                    <td>Silver</td>
                </tr>
                <?php
                $mysqli=new mysqli('localhost','root','','project');



if ($mysqli->connect_error){
    die("connection error: ". $mysqli->connect_error);
}
$sql = "select * from vaccine_center";
    
$result = $mysqli->query($sql);


            while($user =$result->fetch_assoc()){
            echo "
                <tr>
                    <td>" .$user["Id"]. "</td>
                    <td>" .$user["Name"]."</td>
                    
                </tr>
                ";}
                ?>
            </table>
<?php
echo"sup nader";
?>

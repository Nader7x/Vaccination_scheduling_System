<?php
$mysqli=new mysqli('localhost','root','','project');



if ($mysqli->connect_error){
    die("connection error: ". $mysqli->connect_error);
}

return $mysqli;
?>
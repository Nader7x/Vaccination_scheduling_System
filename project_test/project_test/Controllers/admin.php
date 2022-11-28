<?php
class Admin{
    public function add_city($city) {}
    public static function add_vaccination_center($name, $city,$contact_no,$address,$type,$email,$password_hash){
        $mysqli = require __DIR__ .'/../Models/database.php';

        $sql = "INSERT INTO vaccine_center (Name,City,Contact_no,Address,type,Email,password_hash)  VALUES (?,?,?,?,?,?,?)";

        $stmt = $mysqli->stmt_init();

        if (! $stmt->prepare($sql)){die("SQL error: ". $mysqli->erroer);}

        $stmt->bind_param("sssssss",$_POST["Name"],$_POST["City"],$_POST["Contact_no"],$_POST["Address"],$_POST["Type"],$_POST["email"],$_POST["password"]);
        return $stmt->execute();
    }
    public function add_vaccine($name,$gap,$precautions){}
    public function search($city,$operation){} //opreation update ir delete
    public function registered_users(){}
    
}





?>
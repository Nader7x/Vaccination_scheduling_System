<?php

class Admin{
    private static function view($query){
        $mysqli = require __DIR__ .'/../Models/database.php';
        if ($mysqli->connect_error){
          die("connection error: ". $mysqli->connect_error);}
        
        $sql = $query;
        $result =  $mysqli->query($sql);
        return $result;
      }
    public static function add_city($city) {
        $mysqli = require __DIR__ .'/../Models/database.php';

        $sql = "INSERT INTO city (City)  VALUES (?)";

        $stmt = $mysqli->stmt_init();

        if (! $stmt->prepare($sql)){die("SQL error: ". $mysqli->erroer);}

        $stmt->bind_param("s",$city);
        return $stmt->execute();

      }


    public static function add_vaccination_center($name, $city,$contact_no,$address,$type,$email,$password_hash){
        $mysqli = require __DIR__ .'/../Models/database.php';

        $sql = "INSERT INTO vaccine_center (Name,City,Contact_no,Address,type,Email,password_hash)  VALUES (?,?,?,?,?,?,?)";

        $stmt = $mysqli->stmt_init();

        if (! $stmt->prepare($sql)){die("SQL error: ". $mysqli->erroer);}

        $stmt->bind_param("sssssss",$name,$city,$address,$contact_no,$type,$email,$password_hash);
        return $stmt->execute();
    }
    public static function add_vaccine($name,$gap,$precautions){
        $mysqli = require __DIR__ .'/../Models/database.php';

        $sql = "INSERT INTO vaccine (Name,Gap,Pecautions)  VALUES (?,?,?)";

        $stmt = $mysqli->stmt_init();

        if (! $stmt->prepare($sql)){die("SQL error: ". $mysqli->erroer);}

        $stmt->bind_param("sis",$name,$gap,$precautions);
        return $stmt->execute();
    }
    public static function search($city,$operation){

      $query = "SELECT * FROM `vaccine_center` WHERE City='$city'";
      $result = self::view($query);
      while($user =$result->fetch_assoc())
      {
        //echo $user["Name"]. '---------------'.$user["City"]."<br><br>";
        
        
      }//kda search sh8al elupdate b2a m3rfsh a3ml 2eh

    } //opreation update ir delete 
    public static function update_vaccine($id,$coulmn_name,$new_value)
    {
      $query = "UPDATE `vaccine_center` SET `$coulmn_name`='$new_value' WHERE ID=$id";
      self::view($query);
      return true;
    }
    public static function registered_users(){
        $query = "select * from user";
        $result =  self::view($query);

        while($user =$result->fetch_assoc())
        {
            echo $user["Name"];
            //echo $user["el Att"] . "<br>" . $user["el Att"]; or return data[] = array($user["el Att"],$user["el Att"])
            
        }
    }
    
}
echo Admin::update_vaccine(4,"Contact_no","01554122368");
?>
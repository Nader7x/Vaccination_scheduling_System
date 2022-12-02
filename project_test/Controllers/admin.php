<?php

class Admin{
    private static function view($query){
      require_once __DIR__ .'/../Models/database.php';
      $mysqli = new database();

        
        $sql = $query;
        $result =  $mysqli->conn->query($sql);
        return $result;
      }
    public static function add_city($city) {
        $query = "INSERT INTO city (City)  VALUES ('$city')";
        try{$result = self::view($query);
        return $result;}

        catch (Exception $err){
         
        die ($err->getMessage());
      }}

    public static function add_vaccination_center($name, $city,$contact_no,$address,$type,$email,$password_hash){
        
      $query = "INSERT INTO vaccine_center (Name,City,Contact_no,Address,type,Email,password_hash)  VALUES ('$name','$city','$contact_no','$address','$type','$email','$password_hash')";

      try{$result = self::view($query);
        return $result;}
  
        catch (Exception $err){
           
        die ($err->getMessage());
        }
    }
    public static function add_vaccine($name,$gap,$precautions){

      $query = "INSERT INTO vaccine (Name,Gap,Pecautions)  VALUES ('$name','$gap','$precautions')";

      try{$result = self::view($query);
        return $result;}
  
        catch (Exception $err){
           
        die ($err->getMessage());
        }
    }
    public static function search($city){

      $query = "SELECT * FROM `vaccine_center` WHERE City='$city'";
      try{$result = self::view($query);
      while($user =$result->fetch_assoc())
        {
          //echo $user["Name"]. '---------------'.$user["City"]."<br><br>";
          
          
        }//kda search sh8al elupdate b2a m3rfsh a3ml 2eh
      return true;
      }
      catch (Exception $err){

        die ($err->getMessage());
        }

    }
    public static function update_vaccine_center($id,$coulmn_name,$new_value)
    {
      $query = "UPDATE `vaccine_center` SET `$coulmn_name`='$new_value' WHERE ID=$id";
      try{self::view($query);
        return true;}

      catch (Exception $err){die ($err->getMessage());}
    }
    public static function delete_vaccine_center($id) //lw mms7sh berg3 true brdo
    {
       $query ="DELETE FROM `vaccine_center` WHERE Id=$id";

       try{return self::view($query);}

       catch (Exception $err){die ($err->getMessage());}
       
    }
    public static function registered_users(){
        try{$query = "select * from user";
        $result =  self::view($query);

        while($user =$result->fetch_assoc())
        {
            echo $user["Name"]."<br><br>";
            //echo $user["el Att"] . "<br>" . $user["el Att"]; or return data[] = array($user["el Att"],$user["el Att"])
            
        }
        return true;}
        catch (Exception $err){die ($err->getMessage());}
    }
    
}
//echo Admin::delete_vaccine_center(12);
Admin::registered_users();
?>
<?php

class Admin{
    private static function view($query){
      require_once __DIR__ .'/../Include/database.php';
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

      $query = "INSERT INTO vaccine (Name,Gap,Precautions)  VALUES ('$name','$gap','$precautions')";

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
      $query = "UPDATE `vaccine_center` SET `$coulmn_name`='$new_value' WHERE Id=$id";
      echo $query;
      try{self::view($query);
        return true;}

      catch (Exception $err){die ($err->getMessage());}
    }
    public static function delete_vaccine_center($id) //lw mms7sh berg3 true brdo
    {
       $query ="DELETE FROM `vaccine_center` WHERE Id=$id";
       
       try{
            return self::view($query);
          }
       
        catch (Exception $err){die ($err->getMessage());}
       
    }
    public static function registered_users(){
        try{$query = "select * from user";
        $result =  self::view($query);

        for($i=0; $user =$result->fetch_assoc(); $i++)
        {
          $arr[$i]["Name"] = $user["Name"];
          $arr[$i]["City"] = $user["City"];
          $arr[$i]["Email"] = $user["Email"];
          $arr[$i]["Phone_no"] = $user["Phone_no"];
          $arr[$i]["National_id"] = $user["National_id"];
          $arr[$i]["Reservation_number"] = $user["Reservation_number"];
            
        }
        return $arr;}
        catch (Exception $err){die ($err->getMessage());}
    }
    public static function list_of_vaccination_center()
    {
      $query = "select * from vaccine_center";
      $result = self::view($query);
      $array = array();
      for ($i=0;$user = $result->fetch_assoc();$i++)
      {
        $array[$i]['Name'] = $user['Name'];
        $array[$i]['City'] = $user['City'];
        $array[$i]['Address'] = $user['Address'];
        $array[$i]['type'] = $user['type'];
        $array[$i]['Contact_no'] = $user['Contact_no'];
        $array[$i]["Email"] = $user['Email'];
        $array[$i]["Id"] = $user['Id'];

      }
      

      return $array;
    }
    public static function get_all_cities(){
      $query = "select * from city";
      $result = self::view($query);
      $arr = array();
      for ($i=0;$user = $result->fetch_assoc();$i++)
      {
        $arr[$i] = $user["City"];
      }
      return $arr;
    }
    
}
//echo Admin::delete_vaccine_center(200);

?>
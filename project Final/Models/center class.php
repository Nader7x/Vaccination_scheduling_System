<?php

class Center{
    //methods
    private static function view($query){
      require_once __DIR__ .'/../Include/database.php';
      $mysqli = new database();

        
        $sql = $query;
        $result =  $mysqli->conn->query($sql);
        return $result;
      }
    public static function view_user_info($vaccination_reservation_number){

      $query = "select * from user";
      
      $result =  self::view($query);
      $arr = array();
      for($i=0; $user =$result->fetch_assoc() ;$i++)
      {
        if ($vaccination_reservation_number === $user["Reservation_number"] and $user["Reservation_number"] !="")
        {
          $arr["Name"] = $user["Name"];
          $arr["City"] = $user["City"];
          $arr["Email"] = $user["Email"];
          $arr["Phone_no"] = $user["Phone_no"];
          $arr["National_id"] = $user["National_id"];
          $arr["Reservation_number"] = $user["Reservation_number"];
          return $arr;
        }
      }
      return false;
      
    }
    public static function vaccination_schedule($vaccine_center_ID){
      
      $query = "select user.Name,reservation.First_dose_date,reservation.Second_dose_date,user.First_dose_state,user.Second_dose_state ,user.Reservation_number, user.ID from reservation JOIN user
                on user.ID  = reservation.user_id where reservation.vaccination_center_id = $vaccine_center_ID";
      
      $users_today = array();
      $result = self::view($query);
      for ($i=0;$user = $result->fetch_assoc();)
      {

        date_default_timezone_set('Africa/Cairo');
        if (($user["First_dose_date"] == date('Y-m-d') and $user["First_dose_state"] =="0") or ($user["Second_dose_date"] == date('Y-m-d') and $user["Second_dose_state"] =="0"))
        {
          $users_today[$i]["Name"] = $user["Name"];
          $users_today[$i]["Reservation_number"] = $user["Reservation_number"];
          $users_today[$i]["UserID"] = $user["ID"];
          $i++;
        }
        
      }
      return $users_today;
      /*return list of users in this day*/}
    public static function confirm_dose($user_id){
      $query = "select First_dose_state,Second_dose_state from user WHERE ID=$user_id";
      $result = self::view($query);
      $user = $result->fetch_assoc();
      if (!$user) {
        echo "user id not found"; 
        return false;
      }
      if ($user["First_dose_state"] === "0")
      {
        
        $query = "UPDATE `user` SET `First_dose_state`=1 WHERE ID=$user_id";
        self::view($query);
        return true;
        

      }
      elseif ( $user["Second_dose_state"] === "0" and $user["First_dose_state"] === "1" )
      {
        
        $query = "UPDATE `user` SET `Second_dose_state`=1 WHERE ID=$user_id";
        self::view($query);
        return true;
        
      }
      return false;
      
    }
    public static function logout() {
       
      session_start();
      unset($_SESSION['log_as']);
      unset($_SESSION['Name']);
      unset($_SESSION['City']);
      unset($_SESSION['Email']);
      unset($_SESSION['Contact_no']);
      unset($_SESSION['Address']);
      unset($_SESSION['password_hash']);
      unset($_SESSION['id']);
      session_destroy();
      return true;
      }    
    }




?>
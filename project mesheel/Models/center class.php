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
      echo $vaccination_reservation_number;
      $result =  self::view($query);
      while($user =$result->fetch_assoc())
      {
        if ($vaccination_reservation_number === $user["Reservation_number"])
        {
          //echo $user["el Att"] . "\n" . $user["el Att"]; or return data[] = array($user["el Att"],$user["el Att"])
          echo $user["Name"];
          return true;
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
        if (($user["First_dose_date"] === date('Y-m-d') and $user["First_dose_state"] ==="0") or ($user["Second_dose_date"] === date('Y-m-d') and $user["Second_dose_state"] ==="0"))
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
      elseif ( $user["Second_dose_state"] === "0")
      {
        
        $query = "UPDATE `user` SET `Second_dose_state`=1 WHERE ID=$user_id";
        self::view($query);
        //hena 2b3t elcertificate
        return true;
        
      }
      return false;
      
    }    
    }




?>
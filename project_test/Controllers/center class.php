<?php

class Center{
    private $name;
    private $city;
    private $address;
    private $contact_no;
    private $type; //(government or private)
    private $email;
    private $password;

    public function __construct($name,$city,$address,$contact_no,$type,$email,$password) {
        $this->name = $name;
        $this->city = $city;
        $this->address = $address;
        $this->contact_no = $contact_no;
        $this->type = $type;
        $this->email = $email;
        $this->password = $password;
    }
      //setters and getters
    public function set_name($name) {
        $this->name = $name;
      }
      public function get_name() {
        return $this->name;
      }

    public function set_city($city) {
        $this->city = $city;
      }
    public function get_city() {
        return $this->city;
      }

    public function set_address($address) {
        $this->address = $address;
      }
    public function get_address() {
        return $this->address;}

    public function set_contact_no($contact_no) {
        $this->contact_no = $contact_no;
      }
    public function get_contact_no() {
        return $this->contact_no;
      }
    public function set_type($type) {
        $this->type = $type;
      }
    public function get_type() {
        return $this->type;
      }
    public function set_email($email) {
        $this->email = $email;
      }
    public function get_email() {
        return $this->email;
      }
    public function set_password($password) {
        $this->password = $password;
      }
    public function get_password() {
        return $this->password;
      }

    
    //methods
    private static function view($query){
      $mysqli = require_once __DIR__ .'/../Models/database.php';
      if ($mysqli->connect_error){
        die("connection error: ". $mysqli->connect_error);}
      
      $sql = $query;
      $result =  $mysqli->query($sql);
      return $result;
    }
    public static function view_user_info($vaccination_reservation_number){

      $query = "select * from user";
      $result =  self::view($query);
      while($user =$result->fetch_assoc())
      {
        if ($vaccination_reservation_number === $user["Reservation_number"])
        {
          //echo $user["el Att"] . "\n" . $user["el Att"]; or return data[] = array($user["el Att"],$user["el Att"])
          break;
        }
      }
      
    }
    public static function vaccination_schedule($vaccine_center_ID){
      
      $query = "select user.Name,reservation.First_dose_date,reservation.Second_dose_date,user.First_dose_state,user.Second_dose_state from reservation JOIN user
                on user.ID  = reservation.user_id where reservation.vaccination_center_id = $vaccine_center_ID";
      
      $users_today = array();
      $result = self::view($query);
      for ($i=0;$user = $result->fetch_assoc();$i++)
      {
        date_default_timezone_set('Africa/Cairo');
        if (($user["First_dose_date"] === date('Y-m-d') and $user["First_dose_state"] ==="0") or ($user["Second_dose_date"] === date('Y-m-d') and $user["Second_dose_state"] ==="0"))
        {
          $users_today[$i] = $user["Name"];
          
        }
        
      }
      return $users_today;
      /*return list of users in this day*/}
    public static function confirm_dose($user_id){
      $query = "select First_dose_state,Second_dose_state from user WHERE ID=$user_id";
      $result = self::view($query);
      $user = $result->fetch_assoc();
      if ($user["First_dose_state"] === "0")
      {
        echo "inside first = 0";
        $query = "UPDATE `user` SET `First_dose_state`=1 WHERE ID=$user_id";
        self::view($query);
        return true;
        

      }
      elseif ( $user["Second_dose_state"] === "0")
      {
        echo "inside first = 1";
        $query = "UPDATE `user` SET `Second_dose_state`=1 WHERE ID=$user_id";
        self::view($query);
        //hena 2b3t elcertificate
        return true;
        
      }
      return false;
      
    }
    
    }


//$test = ;
  // correct
  /*
var_dump(Center::vaccination_schedule());
Center::certificate(2);
Center::certificate(4);
Center::view_user_info("123")

Center::confirm_dose(2);
*/
Center::vaccination_schedule()
?>
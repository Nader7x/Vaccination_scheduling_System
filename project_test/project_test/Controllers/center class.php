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

    public function view_user_info($vaccination_reservation_number){

      $mysqli = require __DIR__ .'/../Models/database.php';
      if ($mysqli->connect_error){
        die("connection error: ". $mysqli->connect_error);}
      
      $sql = "select * from user";
      $result =  $mysqli->query($sql);
      while($user =$result->fetch_assoc())
      {
        if ($vaccination_reservation_number === $user["reservation_number"])
        {
          //echo $user["el Att"] . "\n" . $user["el Att"]; or return data[] = array($user["el Att"],$user["el Att"])
          break;
        }
      }
      
    }
    public function vaccination_schedule($date){/*return list of users in this day*/}
    public function certificate(){/* m4 fahem h3ml 2eh */}

    
    }

$test = new Center("maadi","20 share3 ajd","cairo","01000","private");
$test->set_city("alex");
echo $test->get_type()."\n".$test->get_city();

?>
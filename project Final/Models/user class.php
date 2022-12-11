<?php

class User{
    private static function view($query){
      require_once __DIR__ .'/../Include/database.php';
      $mysqli = new database();

        
        $sql = $query;
        $result =  $mysqli->conn->query($sql);
        return $result;
      }
    
    public static function register($name,$city,$email,$phone_no,$national_id,$password,$password2,$pic)
    {
        if(empty($name)) {die("Name is required");}        
        if(! filter_var($email,FILTER_VALIDATE_EMAIL)){die("valid Email is required");}
        if(empty($city)) {die("city is required");}
        if(empty($phone_no)) {die("phone_no is required");}
        if(empty($national_id)) {die("national_id is required");}
        if(empty($password)) {die("password is required");}
        $chars = str_split($phone_no);
        foreach($chars as $numbers)
        {
          if(!is_numeric($numbers)){die("phone_no can't have letters in it");}
        }
        $chars = str_split($national_id);
        foreach($chars as $numbers)
        {
           if(!is_numeric($numbers)){die("national_id can't have letters in it");}
        }
        if($password !== $password2){die("password must match");}

        $sql = "INSERT INTO `user`(`Name`, `City`, `Email`, `Phone_no`, `National_id`, `password_hash`,`photo`)  VALUES ('$name','$city','$email','$phone_no','$national_id','$password','$pic')";

        try{return self::view($sql);}
        catch (Exception $err)
        {
          
          if($err->getMessage()=="Duplicate entry '$email' for key 'Email'")
          {
            return false;
          }
          else die ($err->getMessage());
        }

        
    }
    public static function reservation($vaccination_center_id, $vaccine, $dose_date, $user_id,$first_or_second){
      if($first_or_second === "1")
      {
        
      $reservation_number="";
      for ($i=0;$i<10;$i++)
      {
        $reservation_number.=strval(rand(0,9));
      }
      try{$query = "UPDATE `user` SET `Reservation_number`='$reservation_number' WHERE ID =$user_id";
        
      self::view($query);
      $query2 = "INSERT INTO `reservation`(`First_dose_date`, `vaccination_center_id`, `vaccine`, `user_id`) VALUES ('$dose_date','$vaccination_center_id','$vaccine','$user_id')";
      self::view($query2);
      return 1;
      }
      catch (Exception $err)
      {
        
        if ($err->getMessage() == "Duplicate entry '$user_id' for key 'user_id_2'") { return "2";}

        else die ($err->getMessage());
      }
      }
      if($first_or_second === "2"){
        
        $query2 = "SELECT First_dose_date,vaccine.Gap FROM `reservation` join vaccine ON reservation.vaccine=vaccine.Name WHERE user_id=$user_id";
        $result = self::view($query2);
        $user = $result->fetch_assoc();
        $gap = $user["Gap"];
        $date_after_gap =  date('Y-m-d', strtotime($user["First_dose_date"]. " +  $gap days"));
        
        if (date('Y-m-d', strtotime($dose_date))> $date_after_gap){
          
          $query3 = "UPDATE `reservation` SET `Second_dose_date`='$dose_date' WHERE user_id=$user_id";
          
          return self::view($query3);

        }
        else return false;

      
      }
      else return false;

    }
      
    public static function list_of_vaccination()
    {
      $query = "select * from vaccine";
      $result = self::view($query);
      $vaccine = array();
      for ($i=0;$user = $result->fetch_assoc();$i++)
      {
        $vaccine[$i] = $user["Name"];
        
      }
      return $vaccine;
    }
    public static function check_certificate($user_id)
    {
      $query = "select Second_dose_state from user where ID='$user_id'";
       
      $user = self::view($query)->fetch_assoc();
      
      if ($user ["Second_dose_state"] ==="1")
      {
          return true;
      }
      else return false;

    }
    public static function logout() {
       
      session_start();
      unset($_SESSION['log_as']);
      unset($_SESSION['Name']);
      unset($_SESSION['City']);
      unset($_SESSION['Email']);
      unset($_SESSION['Phone_no']);
      unset($_SESSION['National_id']);
      unset($_SESSION['password_hash']);
      unset($_SESSION['ID']);
      unset($_SESSION['Reservation_number']);
      unset($_SESSION['First_dose_state']);
      unset($_SESSION['Second_dose_state']);
      unset($_SESSION['photo']);
      session_destroy();
      header("location: ../Views/login.html");
      }
  
}

?>
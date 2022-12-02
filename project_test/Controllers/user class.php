<?php

class User{
    private static function view($query){
      require_once __DIR__ .'/../Models/database.php';
      $mysqli = new database();

        
        $sql = $query;
        $result =  $mysqli->conn->query($sql);
        return $result;
      }
    
    public static function register($name,$city,$email,$phone_no,$national_id,$password,$password2)
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

        $sql = "INSERT INTO `user`(`Name`, `City`, `Email`, `Phone_no`, `National_id`, `password_hash`)  VALUES ('$name','$city','$email','$phone_no','$national_id','$password')";

        $stmt = self::view($sql);
        
    }
    public static function reservation($vaccination_center, $vaccine, $dose_date, $user_id,$reservation_number){
      //ya 2b3t elrkm w lw b null 23ml elrkm w 27to ya 24of mn el data base bs kda 5toat zeyada kter
      if($reservation_number === NULL)
      {
        
      $reservation_number="";
      for ($i=0;$i<10;$i++)
      {
        $reservation_number.=strval(rand(0,9));
      }
      }
      
       
    }
    public static function list_of_vaccination()
    {
      $query = "select * from vaccine";
      $result = self::view($query);

      for ($i=0;$user = $result->fetch_assoc();$i++)
      {
        echo $user["Name"].$user["Gap"]."<br>";
        
      }
      return true;
    }
}
//User::reservation(NULL);
//User::list_of_vaccination();
?>
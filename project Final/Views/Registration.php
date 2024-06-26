<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>registration</title>
        <link rel="stylesheet" href="css/Registration.css" />
</head>
<body>
        <div class="form">
                <form action="../Controllers/user_reg.php" method="post" enctype="multipart/form-data">
                        <h1 class="form-title">Registration</h1>
                        <div class="main-user-info">
                                <div class="user-input-box">
                                        <label for="username">Full Name</label><br>
                                        <input id="fullname" type="text" class="box" name="name" placeholder="full Name"autofocus required>
                                </div>
                                

                                <div class="user-input-box">
                                        <label for="city">City</label><br>
                                        <input id="city" type="text" class="box" name="city"placeholder="city"autofocus required>
                                </div>


                                <div class="user-input-box">
                                        <label for="national_id">National ID</label><br>
                                        <input id="national_id" type="text" class="box" name="national_id"placeholder="enter national_id"autofocus required  pattern="[0-9]{14}">
                                </div>
                                <div class="user-input-box">
                                        <label for="phone">Phone number</label><br>
                                        <input id="phone" type="text" class="box" name="phone_no"placeholder="enter phone"autofocus required  pattern="[0-9]{11}">
                                </div>

                                <div class="user-input-box">
                                        <label for="address">Address</label><br>
                                        <input id="address" type="text" class="box" name="address"placeholder="Address"autofocus required>
                                </div>
                                

                                <div class="user-input-box">
                                        <label for="email">Email</label><br>
                                        <input id="email" type="text" class="box" name="email"placeholder="enter email"autofocus required>
                                        <?php if(isset($_GET['err'])) {echo "<span style='color:red;font-size:17px;'>".$_GET['err']."</span>";} ?>

                                </div>

                                <div class="user-input-box">
                                        <label for="password">Password</label><br>
                                        <input id="password" type="password" class="box" name="password"placeholder="enter password"autofocus required>
                                </div>
                                <div class="user-input-box">
                                        <label for="password2">confirmation password</label><br>
                                        <input type="password" id="password2" class="box" name="password2" placeholder="Password Confirmation"autofocus required>
                                        
                                </div>
                                <div class="user-input-box">
                                        <label for="photo">add photo</label><br>
                                        <input id="photo" type="file" class="box" name="file" placeholder="photo"autofocus required>
                                </div>



                                
                        </div>





                        <div class="form-submit-btn">
                                <input type="submit"  class="button" value="submit" onclick="return confirmpassword(password.password2)">
                        </div>
                        

                </form>
                <br><br>
                <a href="login.html" class="buttonn">already have an account ?</a>
                </div>
                

                <script>
                        function confirmpassword(input){
                        var password = document.getElementById("password").value;
                        var confirmpassword = document.getElementById("password2").value;
                        if (confirmpassword != password){
                                alert("Password didn't match");
                                return false;
                        }
                        else{
                                return true;
                        }
                
                        }
                </script>
</body>
</html>




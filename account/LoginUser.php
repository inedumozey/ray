<?php
require("../private/autoload.php");
require("../private/dbquery.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sitetitle; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services</title>

     <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $sitetitle; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
     <link rel="icon" type="image/png" href="../homepage/vendor/img/favicon.png">

    <!-- Font Icon -->
    <link rel="stylesheet" href="templates/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Main css -->
    <link rel="stylesheet" href="templates/css/style.css">
</head>
<body style="background-color: white;">

    <?php

    $error="";
    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
        $time=$dateTime->format("d-M-y  H:i A");

        $email=trim(strtolower(mysqli_real_escape_string($db, $_POST['email'])));
        $password=trim(mysqli_real_escape_string($db, $_POST['password']));

        $mdpass=md5($password);

        $ch_e=mysqli_query($db, "SELECT * FROM users WHERE emailR='$email'");
        $ch_bk=mysqli_query($db, "SELECT * FROM users WHERE emailR='$email' AND block='1'");
        $ch_ct=mysqli_query($db, "SELECT * FROM users WHERE emailR='$email' AND cart='1'");
        

        if (empty($email) || empty($password)){

        $error='<div class="alert alert-danger"> Please fill all field and proceed</div>';
        }

        else if (mysqli_num_rows($ch_e)<1){

        $error='<div class="alert alert-danger">This email is not associated with '.$sitetitle.'</div>'; 
        }
        else if (mysqli_num_rows($ch_bk)>0){

            $error='<div class="alert alert-danger">This account has been suspended</div>';
            }
    
            else if (mysqli_num_rows($ch_ct)>0){
    
            $error='<button class="alert-danger">Buying on '.$sitetitle.' is temporary disabled for now.</button>';
            }
        else if (mysqli_num_rows($ch_e)){
            $pass = dbquery($db, "emailR", $email, "password");

            $hashpass = password_verify($password, $pass);
            if(!$hashpass){
                $error='<div class="alert alert-danger">Invalid login credentials</div>';
            }
            else{
                while($rows=mysqli_fetch_array($ch_e, MYSQLI_ASSOC)){
        
                    $email=$rows['emailR'];
                    $user_sid=$rows['sid'];
        
                    session_start();
                    $_SESSION['email']=$email;
                    $_SESSION['user_sid']=$user_sid;
        
                    header("location:Home");
                    exit();
        
                }         
            }    
        }

        


        // else if (!$ch_up){

        // $error='<div class="alert alert-danger">Invalid Username or Password</div>';
        // $error='<div class="alert alert-danger">Invalid email</div>';
        // }
            
        
}

    ?>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                
                <div class="signup-img">
                    <img src="templates/images/signup-img.jpg" alt="" height="300px">
                </div>
                <div class="signup-form">

                  
                   
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" onsubmit="return Traficate()" class="register-form" id="register-form">

                
                           <center>
              <img src="../homepage/vendor/img/favicon.png" style="width:100px;border-radius: 50%" height="100px;">
              <br>
              <br>
              
            </center>

                        <h2 style="color: <?php echo $theme_color; ?>">Sign In</h2>

        
                    <?php echo $error; ?>
               
                    
                        <div class="form-group">
                            <input type="email" name="email" id="email" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required placeholder="Email Address" autocomplete="off" />
                        </div>

                       <div class="form-group">

                            <input type="password" name="password" id="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required placeholder="Password" autocomplete="off" />

                        </div>

                        <div class="form-radio">
                            <div class="form-radio-item">
                                <input type="radio" name="remember" id="male">
                                <label for="male">Remember Me</label>
                                <span class="check"></span>
                            </div>
                        </div>

                        <div class="form-submit">
                            <button class="submit" type="submit" id="submit" style="background-color: <?php echo $theme_color; ?>">Sign In</button>
                        </div>

                        <div class="form-group">
                        <p></p>
                        Don’t have an account? <span><a href="<?php echo $baseurl; ?>/NewUser" style="text-decoration: none;color: <?php echo $theme_color; ?>">Sign Up</a></span>  

                        <span style="float: right;"><a href="<?php echo $baseurl; ?>/PasswordReset" style="text-decoration: none;color: <?php echo $theme_color; ?>">Forgot Password?</a></span>
                    </div>
                    </form>
                    
                    <p></p>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="templates/vendor/jquery/jquery.min.js"></script>
    <script src="templates/js/main.js"></script>

     <script>
function Traficate(){


        $("#submit").html("Authentecating...");
        return true;
        
    }
    
</script>

</body>
</html>
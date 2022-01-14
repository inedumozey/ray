<?php
require("../private/autoload.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sitetitle; ?> - Administrator</title>

     <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $sitetitle; ?>-  Administrator">
    <meta property="og:image" content="../static/img/bg.jpg">
    <meta property="og:description" content=" Administrator"/>
    <meta property="og:site_name" content="<?php echo $sitetitle; ?>"/>
    <meta property="og:url" content="https://www.<?php echo $sitetitle; ?>.com">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/png" href="templates/img/team-1.jpg">

    <!-- Font Icon -->
    <link rel="stylesheet" href="templates/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Main css -->
    <link rel="stylesheet" href="templates/css/style.css">

      <style type="text/css">
        body {
  background: url("static/sweettexture.jpg");
 
}
    </style>

</head>
<body style="background-color: white;">

    <?php

    $error="";
    if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $userid=addslashes(mysqli_real_escape_string($db, $_POST['userid']));
    $password=addslashes(mysqli_real_escape_string($db, md5($_POST['password'])));

    $seluser=mysqli_query($db, "SELECT * FROM admin WHERE username='$userid' AND password='$password'");
    if ($count1=mysqli_num_rows($seluser)<1){
        
        $error="Invalid Username or Password";
    
    }

    else {
        
    while($getAccT=mysqli_fetch_array($seluser, MYSQLI_ASSOC)){

      $username=$getAccT['username'];
      $email=$getAccT['email'];
      $sid=$getAccT['sid'];
      $password=$getAccT['password'];

      session_start();
      $_SESSION['fingerprint'] = $_SERVER['SERVER_NAME'];
      $_SESSION['userid']=$userid;
      $_SESSION['sid']=$sid;
      $_SESSION['passkey']=$password;

        header('location:dashboard.php');
      }

      }

    }
    
    ?>

    <div class="main">
        <div class="container" style="background-color: transparent;">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="templates/images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">

                  
                   
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" onsubmit="return Traficate()" class="register-form" id="register-form">

                
                           <center>
              <img src="templates/img/admin-logo.png" style="width:200px;border-radius: 10%;height: 100px" height="200px">
              <br>
              <br>
              
            </center>

                        <h2 style="color: #206fa5">Welcome Admin</h2>

        
                    <?php echo $error; ?>
               
                    
                        <div class="form-group">
                            <input type="text" name="userid" id="userid" required placeholder="User ID" autocomplete="off" />
                        </div>

                       <div class="form-group">

                            <input type="password" name="password" id="password" required placeholder="Password" autocomplete="off" />

                        </div>

                        <div class="form-submit">
                            <button class="submit" type="submit" id="submit" style="background-color: #206fa5;">Sign In</button>
                        </div>

                        <div class="form-group">
                        <p></p>
            
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


        $("#submit").html("Authenticating...");
        return true;
        
    }
    
</script>

</body>
</html>
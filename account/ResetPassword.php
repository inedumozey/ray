<?php
require('../private/autoload.php');

if (!isset($_GET['email']) && !isset($_GET['hash'])){

    die("Invalid Website URL Detected");
    exit();
}

$email=$_GET['email'];
$hash=$_GET['hash'];

$checkInfo=mysqli_query($db, "SELECT emailR, sid FROM users WHERE emailR='$email' AND sid='$hash'");
$counter5=mysqli_num_rows($checkInfo);

if ($counter5<1){

    die("This reset password link might be expired or Invalid");
    exit();

}

else{


$hash01=uniqid();
$newhash=md5($hash01).rand(10000,600000);

$error=$success="";


if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $password=trim(mysqli_real_escape_string($db, $_POST['password']));
    $cpassword=trim(mysqli_real_escape_string($db, $_POST['cpassword']));
    $mdpass=md5($password);


    
    if (strlen($password)<5){

        $error='<button class="alert-danger">
              
                         <strong> Oops!</b></strong> Please use a strong password

                         </button>';
    }

    else if ($password != $cpassword){

            $error='<button class="alert-danger">
              
                         <strong> Oops!</b></strong> Password not match

                         </button>';
    }

    else{

        $setNewPass=mysqli_query($db, "UPDATE users SET password='$mdpass', sid='$newhash' WHERE emailR='$email'");

        if ($setNewPass){

            ?>

        <script type="text/javascript">
            alert("Password change successfully");
            window.location.href="login";
        </script>


                         <?php
        }

        else{

        $error='<button class="alert-danger">
              
                         <strong> Oops!</b> Unable to change password</strong>

                         </button>';
        }
    }
}

}

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

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="templates/images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">

                  
                   
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" onsubmit="return Traficate()" class="register-form" id="register-form">

                           <center>
               <img src="../homepage/vendor/img/favicon.png" style="width:100px;border-radius: 50%" height="100px;">
              <br>
              <br>
            </center>

                        <h2 style="color: <?php echo $theme_color; ?>">Reset Password</h2>

        
                    <?php echo $error; ?>
               
                    
                        <div class="form-group">
                            <input type="password" name="password" id="password" required placeholder="Enter Password" autocomplete="off" />
                        </div>

                       <div class="form-group">

                            <input type="password" name="cpassword" id="cpassword" required placeholder="Confirm Password" autocomplete="off" />

                        </div>

                        <div class="form-submit">
                            <button class="submit" type="submit" id="submit" style="background-color: <?php echo $theme_color; ?>;">Change Password</button>
                        </div>

                        <div class="form-group">
                        <p></p>
                        Have recover my account? <span><a href="<?php echo $baseurl; ?>/LoginUser" style="text-decoration: none;color: <?php echo $theme_color; ?>;">Sign In</a></span>  
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


        $("#submit").html("Please Wait...");
        return true;
        
    }
    
</script>

</body>
</html>
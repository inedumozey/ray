<?php 
    require("../private/autoload.php");
    require("../private/dbquery.php");
     
    if (isset($_REQUEST['referral'])){
        $refby_=$_REQUEST['referral'];
    }else{
        $refby_="admin";
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

  <?php
  
     $error="";    

     if ($_SERVER["REQUEST_METHOD"]=="POST"){

      
     $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
     $lastlogin=$dateTime->format("d-M-y  H:i A"); 
     $sid=md5(rand(1000, 300000));
     $refcode=strtolower(uniqid().rand(1000,9000));

     $usertype=($_POST['usertype']);
     $firstname=($_POST['firstname']);
     $lastname=($_POST['lastname']);
     $username=strtoupper($_POST['username']);
     $mobile=($_POST['mobile']);
     $email=strtolower($_POST['email']);
     $refby=($_POST['refby']);
     $password=($_POST['password']);
     $cpassword=($_POST['cpassword']);
    


    $ch_u=mysqli_query($db, "SELECT email FROM users WHERE email='".$username."'");
    $ch_e=mysqli_query($db, "SELECT emailR FROM users WHERE emailR='".$email."'");
   
    // $ch_r=mysqli_query($db, "SELECT refcode FROM users WHERE refcode='".$refby."'");
    $ch_r = $refby !=='admin' ? dbquery($db, "refcode", $refby, "refcode") : "admin";



     if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($mobile) || empty($refby) || empty($usertype) || empty($password)){

    $error='<button class="alert-danger">  Please fill all form </button>';

      }

      if (strlen($firstname)<3 || strlen($lastname)<3){

     $error='<button class="alert-danger">  Please use valid Name </button>';

      }
      
    else if (strlen($username)<3){

     $error='<button class="alert-danger">  Please use valid Username </button>';

      }


    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

     $error='<button class="alert-danger">  Please use valid Email Address </button>';

      }


    else if (strlen($mobile)<11 || strlen($mobile)>11){

    $error='<button class="alert-danger">  Please use valid Mobile No. </button>';

    }

    else if (mysqli_num_rows($ch_u)>0){

    $error='<button class="alert-danger">
                        Username Already Taken
                </button>';
    }

    else if (mysqli_num_rows($ch_e)>0){

    $error='<button class="alert-danger">
                          Email Already Taken
                 </button>';
    }

    else if (!$ch_r){
        $error='<button class="alert-danger">
                        Invalid Referral Code
                </button>';
    }
    

    else if (strlen($password)<5){
    $error='<button class="alert-danger">
                        Use strong password ex.(Folk$390)
                 </button>';
    }

    else if ($password != $cpassword){
    $error='<button class="alert-danger">
                        Password enter not match
                 </button>';
    }


    else{


    //   $mdpass=md5($password);
      //hash password
      $mdpass = password_hash($password, PASSWORD_BCRYPT);
      $insave=mysqli_query($db, "INSERT INTO `users` (`id`, `firstname`, `lastname`, `refcode`, `referredby`, `mobile`, `email`, `password`, `us_wallets`, `us_bonus`, `block`, `sid`, `report`, `ceov`, `activate`, `LastLogin`, `emailR`, `token`, `bankname`,  `acctno`, `acctname`, `gen_bank`, `ref`,`reg_date`,`cart`) VALUES (NULL, '".$firstname."', '".$lastname."', '".$refcode."', '".$refby."', '".$mobile."', '".$username."', '".$mdpass."', '0', '0', '0', '".$sid."', '0', 'earner', '0', '".$lastlogin."', '".$email."', '', '', '', '', 'NO', '','".$lastlogin."','0')");

      if ($insave){

         mysqli_query($db, "UPDATE users SET report=report+1 WHERE refcode='".$refby."'");

          session_start();
          $_SESSION['email']=$email;
          $_SESSION['user_sid']=$sid;

          header("location:Home");
          exit();

    $subject = "Welcome To ".$sitetitle;
    $body ='<p>Hello! '.$firstname.'</p>';
    $body .='<p>Ready to take your business to the next level ?<br/> You can unlock special perks by just purchasing Data Bundles, AirtimeVTU, Cable Subscription, Billspayment e.t.c. on '.$sitetitle.' <br/><hr/><br/><b>Invite your friends and reap the rewards:</b><br/>Our Referral Programme make you earn more and pay on '.$sitetitle.'<br/><br/><br/><b>You Are Welcome,<br/>Your friends at '.$sitetitle.'</p>';

     $email_to =$email;
     $email_from =$mail_user; // Enter Sender Email


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $subject, $body, $headers);



      }

      else{

         $error='<button class="alert-danger">
                        Unable To Create Account. Try Again
                 </button>';
      }
        
    }

     }

    ?>
    

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

        
            </center>

                        <h2 style="color: <?php echo $theme_color; ?>">Sign Up</h2>
                        <?php echo $error; ?>
                                                

                    <input type="hidden" name="refby" id="refby" required="required" value="<?php echo $refby_; ?>">

                            <div class="form-group">
                            <div class="form-select">
                                <select name="usertype" id="usertype" required="required">
                                    <option value="">---Select Account Type---</option>
                                 <option value="topuser">Topuser Account (₦1,000 One Time Fee)</option>
                                 <option value="earner">Enduser Account  (Enjoy All For Free)</option>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <input  type="text" name="firstname" id="firstname" required placeholder="First Name" autocomplete="off" value="<?php echo isset($_POST['firstname']) ? $firstname : ""?>"/>
                        </div>

                        <div class="form-group">
                            <input type="text" name="lastname" id="lastname" required placeholder="Last Name" autocomplete="off" value="<?php echo isset($_POST['lastname']) ? $lastname : ""?>"/>
                        </div>
                        

                        <div class="form-group">
                            <input type="tel" name="mobile" id="mobile" required placeholder="Mobile Number" autocomplete="off" value="<?php echo isset($_POST['mobile']) ? $mobile : ""?>"/>
                        </div>

                        <div class="form-group">
                            <input type="text" name="username" id="username" required placeholder="Username" autocomplete="off" value="<?php echo isset($_POST['username']) ? $username : ""?>"/>
                        </div>
                    
                        <div class="form-group">
                            <input type="email" name="email" id="email" required placeholder="Email Address" autocomplete="off" value="<?php echo isset($_POST['email']) ? $email : ""?>"/>
                        </div>

                       <div class="form-group">

                            <input type="password" name="password" id="password" required placeholder="Enter Password" autocomplete="off" value="<?php echo isset($_POST['password']) ? $password : ""?>"/>

                        </div>

                         <div class="form-group">

                            <input type="password" name="cpassword" id="cpassword" required placeholder="Confirm Password" autocomplete="off" value="<?php echo isset($_POST['cpassword']) ? $cpassword : ""?>"/>

                        </div>

                        <div class="form-submit">
                            <button class="submit" type="submit" id="submit" style="background-color: <?php echo $theme_color; ?>;">Get Started</button>
                        </div>

                        <div class="form-group">
                        <p></p>
                        Already have account? <span><a href="<?php echo $baseurl; ?>/LoginUser" style="text-decoration: none;color: <?php echo $theme_color; ?>;">Sign In</a></span>  

                        <span style="float: right;"><a href="<?php echo $baseurl; ?>/PasswordReset" style="text-decoration: none;color: <?php echo $theme_color; ?>;">Forgot Password?</a></span>
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


        $("#submit").html("Creating Account...");
        return true;
        
    }
    
</script>


</body>
</html>
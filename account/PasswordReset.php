<?php
require("../private/autoload.php");
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

    $error=$success="";

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $email=strtolower(addslashes(mysqli_real_escape_string($db, $_POST['email'])));

    $seluser=mysqli_query($db, "SELECT email,sid,emailR,firstname FROM users WHERE emailR='".$email."'");
    if ($count1=mysqli_num_rows($seluser)<1){

        $error='<button class="alert-danger">
                       This email is not registered with us
                        </button>';
    }

        while($rows=mysqli_fetch_array($seluser, MYSQLI_ASSOC)){
            $sid=$rows['sid'];
            $username=$rows['email'];
            $emailR=$rows['emailR'];
            $first_name=$rows['firstname'];


$subject = "Your Password Recovery Link Has Arrived";
$body ='<p>Hello! '.$first_name.'</p>';
$body .='<p>Your request for password reset was successful and the below link is the instruction to recovery your password'.'<br/><hr/><br/>'.$baseurl.'/ResetPassword.php?hash='.$sid.'&email='.$emailR.'<br/><br/>If you did not request for Password Recovery, kindly notify us or Login back to your account and change to new strong password.<br><br>Warm Regards.</p>';

// Enter Your Email Address Here To Receive Email
$email_to =$emailR;
 
$email_from = $mail_user; // Enter Sender Email
$sender_name = $sitetitle; // Enter Sender Name
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = $mail_host; // Enter Your Host/Mail Server
$mail->SMTPAuth = true;
$mail->Username = $mail_user; // Enter Sender Email
$mail->Password = $mail_pass;
//If SMTP requires TLS encryption then remove comment from below
//$mail->SMTPSecure = "tls";
$mail->Port = 25;
$mail->IsHTML(true);
$mail->From = $email_from;
$mail->FromName = $sender_name;
$mail->Sender = $email_from; // indicates ReturnPath header
$mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
// If you know receiver name use following
//$mail->AddAddress($email_to, "Recepient Name");
// To send CC remove comment from below
//$mail->AddCC('username@email.com', "Recepient Name");
// To send attachment remove comment from below
//$mail->AddAttachment('files/readme.txt');
/*
Please note file must be available on your
host to be attached with this email.
*/
 
if (!$mail->Send()){
    //echo "Mailer Error: " . $mail->ErrorInfo;
    $error='<button class="alert-danger">
                       Unable to send password reset link.
                        </button>';
    }

    else{

    $success='<button class="alert-success">
                       An email has been sent to your email address
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
              <br>
              <br>
            </center>

                        <h2 style="color: <?php echo $theme_color; ?>">Forgot Password</h2>

                     
                    
                         <?php echo $error; ?>
                         <?php echo $success; ?>
               
                    
                        <div class="form-group">
                            <input type="email" name="email" id="email" required placeholder="Email Address" />
                        </div>

                        <div class="form-submit">
                            <button class="submit" type="submit" name="reset" id="submit" style="background-color: <?php echo $theme_color; ?>;">Verify</button>
                        </div>

                        <div class="form-group">
                        <p></p>
            
                        <span style="float: right;"><a href="<?php echo $baseurl; ?>/LoginUser" style="text-decoration: none;color: <?php echo $theme_color; ?>;">Try Login?</a></span>
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
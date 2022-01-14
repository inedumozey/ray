<?php  
require("../../private/autoload.php");

session_start();

if (empty($_SESSION['user_sid']) && empty($_SESSION['email'])){

    session_destroy();
    header("location:LoginUser");
    exit();
}

else{


$ch_ss=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$_SESSION['email']."' AND sid='".$_SESSION['user_sid']."'");
    if (mysqli_num_rows($ch_ss)<1){

      session_destroy();
    header("location:LoginUser");
    exit();

    }

    else{

        $_SESSION['lastaccess'] = time();

        while ($data=mysqli_fetch_array($ch_ss, MYSQLI_ASSOC)) {
            
            $myid=$data['id'];
            $email=$data['emailR'];
            $username=$data['email'];
            $mobile=$data['mobile'];
            $mallu=$data['us_wallets'];
            $refby=$data['referredby'];
            $refbonus=$data['us_bonus'];
            $first_name=$data['firstname'];
            $last_name=$data['lastname'];
            $refcode=$data['refcode'];
            $ceov=$data['ceov'];
            $activate=$data['activate'];
            $lastlogin=$data['LastLogin'];
            $report=$data['report'];
            $block=$data['block'];
            $dbsid=$data['sid'];
            
            
            $bankname=$data['bankname'];
            $acctno=$data['acctno'];
            $acctname=$data['acctname'];
            $ref=$data['ref'];
            $gen_bank=$data['gen_bank'];
            $token=$data['token'];
            $reg_date=$data['reg_date'];
            $cart=$data['cart'];
           
        }
    
}

if (strpos($mallu, "-") !== false){

    mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");

   }
   
if ($block==1){

      session_destroy();
    header("location:LoginUser");
    exit();
}

if ($cart==1){

    session_destroy();
    header("location:LoginUser");
    exit();
}


    
}
?>
<?php

require("session.php");

$timeout = 50;
$duration = time() - intval($_SESSION[ 'lastaccess']);

if ($_SESSION['csrftoken'] == $_POST['csrftoken'] && $duration < $timeout){

if (!empty($_POST['dtype']) && !empty($_POST['dname']) && !empty($_POST['dnumber']) && !empty($_POST['country']) && !empty($_POST['csrftoken'])){

$csrftoken=($_POST['csrftoken']);
$country=($_POST['country']);
$dnumber=($_POST['dnumber']);
$dname=($_POST['dname']);
$dtype=($_POST['dtype']);

$plan=preg_replace("/(.*?)=(.*)/", "$2", $country);
$package=preg_replace("/(.*?)=(.*)/", "$1", $country);
$amount=preg_replace('/\D+/', '', $plan);
$sell_package=strtolower(str_replace(" ", "-", $package));
$mydc=strtolower($dtype);

$amount_to_pay=$amount+$cable_charge;

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper($mydc.rand(1,9).uniqid()); //Trans ID

if ($amount_to_pay<$mallu){

  $descr=$package.' Subscription on '.$dnumber.'-'.$dname;
  $newbal=$mallu-$amount_to_pay;
  $debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

  $save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '".$dtype."', '".$descr."', '".$dnumber."', '".$csrftoken."', '".$email."', '".$amount_to_pay."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."')");

  if ($save_pre_order){

     mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

  require("billing_cable.php");

  }

  else{

 $reason="Buypassing CableTV Storage Table";
 require("fraud.php");
 exit();
  }
}

else{

    echo "Insufficient Balance. Try Again";
    exit();
}


  }

  else{

    echo "Something Went Wrong, Try Again";
    exit();
  }


}

else{

session_unset();
session_destroy();
Logout();
}


?>
<?php

require("session.php");
error_reporting();

$timeout = 10;
$duration = time() - intval($_SESSION[ 'lastaccess']);

if ($_SESSION['csrftoken'] == $_POST['csrftoken'] && $duration < $timeout){

if (!empty($_POST['network']) && !empty($_POST['phone']) && !empty($_POST['plan']) && !empty($_POST['csrftoken'])){

$csrftoken=($_POST['csrftoken']);
$plans=($_POST['plan']);
$network=($_POST['network']);
$phone=($_POST['phone']);

$plan2=preg_replace("/(.*?)=(.*)/", "$2", $plans);
$data_vol=preg_replace("/(.*?)=(.*)/", "$1", $plans);
$data_vo=preg_replace('/\D+/', '', $data_vol);
$amount_to_pay=preg_replace('/\D+/', '', $plan2);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(rand(100,900).uniqid()."DP");

if ($network=="MTN"){$proccess_file=$mtnswitch;}
if ($network=="GIFTING"){$proccess_file=$gifting_switch;}
if ($network=="GLO"){$proccess_file=$gloswitch;}
if ($network=="AIRTEL"){$proccess_file=$airtelswitch;}
if ($network=="ETISALAT" || $network=="9MOBILE"){$proccess_file=$mobileswitch;}

if ($amount_to_pay<$mallu){

  $descr=$network.' '.$data_vol.' Data Purchase To '.$phone;
  $newbal=$mallu-$amount_to_pay;
  $debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

  $save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '".$network."', '".$descr."', '".$phone."', '".$csrftoken."', '".$email."', '".$amount_to_pay."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."')");

  if ($save_pre_order){

     mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

  require("billing_data.php");

  }

  else{

 $reason="Buypassing Data Storage Table";
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
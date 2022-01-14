<?php

require("session.php");
error_reporting();

$timeout = 10;
$duration = time() - intval($_SESSION[ 'lastaccess']);

if ($_SESSION['csrftoken'] == $_POST['csrftoken'] && $duration < $timeout){

if (!empty($_POST['network']) && !empty($_POST['phone']) && !empty($_POST['amount']) && !empty($_POST['airtimetype']) && !empty($_POST['csrftoken'])){

$csrftoken=($_POST['csrftoken']);
$airtimetype=($_POST['airtimetype']);
$amount=($_POST['amount']);
$network=($_POST['network']);
$phone=($_POST['phone']);
$Xamount=preg_replace('/\D+/', '', $amount);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(rand(100,900).uniqid()."SA");

if ($network=="MTN" && $airtimetype=="SHARE"){$discount=$m_discount2;}
if ($network=="GLO" && $airtimetype=="SHARE"){$discount=$g_discount2;}
if ($network=="AIRTEL" && $airtimetype=="SHARE"){$discount=$a_discount2;}
if ($network=="ETISALAT" && $airtimetype=="SHARE" || $network=="9MOBILE" && $airtimetype=="VTU"){$discount=$mo_discount2;}

$purchase_discount=$Xamount*$discount/100;
$amount_to_pay=$Xamount-$purchase_discount;

if ($amount_to_pay<$mallu){

  $descr=$network."  ".$Xamount." Airtime Purchase on ".$phone;
  $newbal=$mallu-$amount_to_pay;
  $debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

  $save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '".$network."', '".$descr."', '".$phone."', '".$csrftoken."', '".$email."', '".$amount_to_pay."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."')");

  if ($save_pre_order){

     mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

  require("billing_share.php");

  }

  else{

 $reason="Buypassing ShareAirtime Storage Table";
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
<?php

require("session.php");
error_reporting();

$timeout = 10;
$duration = time() - intval($_SESSION[ 'lastaccess']);

if ($_SESSION['csrftoken'] == $_POST['csrftoken'] && $duration < $timeout){

if (!empty($_POST['metertype']) && !empty($_POST['meternum']) && !empty($_POST['amount']) && !empty($_POST['discotype']) && !empty($_POST['metername']) && !empty($_POST['csrftoken'])){

$csrftoken=($_POST['csrftoken']);
$metername=($_POST['metername']);
$discotype=($_POST['discotype']);
$amount=($_POST['amount']);
$meternum=($_POST['meternum']);
$metertype=($_POST['metertype']);

$amountsend=preg_replace('/\D+/', '', $amount);
$amount_to_pay=$amountsend+$elect_charge;

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper($discotype.uniqid().rand(1,9)); //Trans ID

if ($amount_to_pay<$mallu){

  $descr=strtoupper($discotype)."  ".$amountsend." Purchase on ".$meternum;
  $newbal=$mallu-$amount_to_pay;
  $debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

  $save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '".$discotype."', '".$descr."', '".$meternum."', '".$csrftoken."', '".$email."', '".$amount_to_pay."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."')");

  if ($save_pre_order){

     mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

  require("billing_bills.php");

  }

  else{

 $reason="Buypassing BillPay Storage Table";
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
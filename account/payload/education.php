<?php

require("session.php");
error_reporting();

$timeout = 10;
$duration = time() - intval($_SESSION[ 'lastaccess']);

if ($_SESSION['csrftoken'] == $_POST['csrftoken'] && $duration < $timeout){

if (!empty($_POST['pintype']) && !empty($_POST['buyer_number']) && !empty($_POST['csrftoken'])){

$csrftoken=dusting($_POST['csrftoken']);
$pintype=dusting($_POST['pintype']);
$buyer_number=dusting($_POST['buyer_number']);

if ($network=="WAEC"){$treat_amount=$waec_price;}
if ($network=="NECO"){$treat_amount=$neco_price;}
if ($network=="NABTEB"){$treat_amount=$nabteb_price;}

$buyer_number=preg_replace('/\D+/', '', $buyer_number);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(uniqid().rand(100,900)."EX");

if ($treat_amount < $mallu){

    $descr=$pintype." Pin of ".$treat_amount." Payment on ".$buyer_number;
    $newbal=$mallu-$treat_amount;
    $debit_wallet=mysqli_query($db, "UPDATE users SET us_wallets='$newbal' WHERE email='$email'");

    $save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '".$xam_type."', '".$descr."', '".$rec_number."', '".$purchase_token."', '".$email."', '".$treat_amount."', '".$mallu."', '".$newbal."', '".$time."','Pending', '".$trx."')");

  if ($save_pre_order){

     mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_to_pay."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");

  require("billing_exam.php");

  }

  else{

 $reason="Buypassing ExamPin Storage Table";
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
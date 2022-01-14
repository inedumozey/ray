<?php
require("session.php");
if (!isset($_POST['activate_amount']) && !isset($_POST['activate_email'])){

echo "Reload your browser and try again";
exit();

}

else{

$activate_amount=cleaner($_POST['activate_amount']);
$activate_email=cleaner($_POST['activate_email']);

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(rand(100,900).uniqid()."AU");
$trx2=strtoupper(uniqid().rand(100,900)."AU");

$refinfo=mysqli_fetch_array(mysqli_query($db, "SELECT us_bonus, us_wallets, email, emailR FROM users WHERE refcode='".$refby."'"));
  
  $ref_ini_bonus=$refinfo[0];
  $ref_ini_mallu=$refinfo[1];
  $ref_username=$refinfo[2];
  $ref_email=$refinfo[3];

if ($activate_amount==1000){

    $package="topuser";
    $refbonus=500;
    $adminbonus=500;
  }
if ($activate_amount==5000){

    $package="affliate";
    $refbonus=1000;
    $adminbonus=1000;
  }

 if ($mallu>$activate_amount){

    $newbal=$mallu-$activate_amount;
    $debit_wallet=mysqli_query($db, "UPDATE users SET ceov='".$package."', activate='1', us_wallets='".$newbal."' WHERE emailR='".$email."'");

    if ($debit_wallet){

   $verify_balance=$newbal;

   if (strpos($verify_balance, "-") !== false){

   	mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");
   	$reason="Having low balance on Account Upgrading";
   	include("fraud.php");
   	exit();

   }

   else{

 $setbonus=mysqli_query($db, "UPDATE users SET us_bonus=us_bonus+$refbonus WHERE refcode='".$refby."'");
 $setbonus2=mysqli_query($db, "UPDATE users SET us_bonus=us_bonus+$adminbonus WHERE refcode='admin'");

 $descr1='Activation of '.$package.' successful';
 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."','".$username."', '".$activate_amount."', '".$descr1."', 'Successful', '".$time."', 'WEB', '".$trx."','".$mallu."','".$newbal."')");
    
    
    
 $descr2='Referral Bonus of ₦'.$refbonus.' Landed From '.$username;
 $new_ref_bonus=$ref_ini_bonus+$refbonus;
 mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$ref_email."','".$ref_username."', '".$refbonus."', '".$descr2."', 'Successful', '".$time."', 'WEB', '".$trx2."','".$ref_ini_bonus."','".$new_ref_bonus."')");

 echo "200";
 exit();

   }

  }

  else{

   	mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");
   	$reason="Looping low balance for Account Upgrading";
   	include("fraud.php");
   	exit();
  }

 }

 else{

 	echo "Insufficient To Activate Package";
 	exit();
 }


}


?>
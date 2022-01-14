<?php

require("session.php");

if ($_SERVER['HTTP_REFERER'] !== $baseurl."/Bonus2Wallet"){
    
    $cilu=$_SERVER['HTTP_REFERER'];
    $reason="Bonus Withdraw";
    
    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    
  
 header("location:logout");
 exit();
 
}

else{

	$amount=trim(mysqli_real_escape_string($db, $_POST['amount_withdraw']));
	$email_withdraw=mysqli_real_escape_string($db, $_POST['email_withdraw']);

	$amount_withdraw=preg_replace('/\D+/', '', $amount);

      $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
      $time=$dateTime->format("d-M-y  h:i A");
      $trx=rand(10000000, 900000000)."WB";


	
      if ($amount_withdraw<$refbonus){

     $newbal=$refbonus+$amount_withdraw;
    $descr="Withdrawing Bonus of N".$amount_withdraw;
	$debit_wallet=mysqli_query($db, "UPDATE users SET us_bonus='".$newbal."' WHERE emailR='".$email."'");

	$save_pre_order=mysqli_query($db, "INSERT INTO `system_recharge` (`id`, `service`, `buying`, `recharge_phone`, `buyer_id`, `buyer_email`, `amount`, `pre_balance`, `post_balance`, `time`, `status`, `trx`) VALUES (NULL, '', '".$descr."', '".$mobile."', '".$sid."', '".$email."', '".$amount_withdraw."', '".$refbonus."', '".$newbal."', '".$time."','Pending', '".$trx."')");

	if ($save_pre_order){

	mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount_withdraw."', '".$descr."', 'Pending', '".$time."', 'WEB', '".$trx."', '".$refbonus."','".$newbal."')");

	require("billing_withdraw.php");


}

else{
 
 $reason="Buypassing Bonus2Wallet Storage Table";
 require("fraud.php");
 exit();
}
}

else{

    echo "Error proccessing withdraw request at the moment"; //Insufficient
    exit();
}

}

?>
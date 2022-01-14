<?php

$check_details=mysqli_query($db, "SELECT * FROM system_recharge WHERE buyer_email='".$email."' AND trx='".$trx."' ORDER BY id DESC LIMIT 1");

if (mysqli_num_rows($check_details)<1){

	echo "Please reload and try again";
	exit();
}

else{

$PDATA=mysqli_fetch_array(mysqli_query($db, "SELECT amount, service, pre_balance, post_balance, buyer_email, recharge_phone, trx FROM system_recharge WHERE  buyer_email='".$email."' AND trx='".$trx."' ORDER BY id DESC LIMIT 1"));

$amount_to_buy=$PDATA[0];
$service=$PDATA[1];
$pre_balance=$PDATA[2];
$post_balance=$PDATA[3];
$buyer_email=$PDATA[4];
$recharge_phone=$PDATA[5];
$order_id=$PDATA[6];



if ($amount_to_buy !=='0' && $amount_to_buy < $pre_balance){

		$newbal=$mallu+$amount_to_buy;
		mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");

		$descr="Withdraw of ".$amount_to_buy." Refferal Bonus";

		mysqli_query($db,"UPDATE mytransaction SET status='Successful' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
		mysqli_query($db,"UPDATE system_recharge SET status='Successful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

	 echo "200";
     exit();
}

else{

$descr="Error proccessing withdraw request at the moment";

$refund=$amount_to_buy+$post_balance;
mysqli_query($db,"UPDATE users SET us_bonus='".$pre_balance."' WHERE emailR='".$buyer_email."'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
  echo $descr;
    exit();

}

}

?>
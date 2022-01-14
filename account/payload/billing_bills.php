<?php

$PDATA=mysqli_fetch_array(mysqli_query($db, "SELECT amount, service, pre_balance, post_balance, buyer_email, recharge_phone, trx , buyer_id FROM system_recharge WHERE  buyer_email='".$email."' AND trx='".$trx."' ORDER BY id DESC LIMIT 1"));

$amount_to_buy=$PDATA[0];
$service=$PDATA[1];
$pre_balance=$PDATA[2];
$post_balance=$PDATA[3];
$buyer_email=$PDATA[4];
$recharge_meter=$PDATA[5];
$order_id=$PDATA[6];
$buyer_id=$PDATA[7];

if ($amount_to_buy < $pre_balance && $_SESSION['csrftoken']==$buyer_id){

require("bills_sub.php");

}

else{

echo "Purchase Fail Due To Insufficient Fund, Please Try again"; //Insufficient
exit();

}


?>
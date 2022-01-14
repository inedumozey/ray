<?php

$Zamount=$PDATA[0]+$purchase_discount;
$msgt=urlencode($service." Share & Sell ".$Zamount." TO ".$recharge_phone);
$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$sms_token.'&from='.$sms_sender.'&to='.$order_num.'&body='.$msgt.'';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xres=json_decode($response, true);
$status=$xres['data']['status'];
    
 if ($status=="success") {
  
mysqli_query($db,"UPDATE mytransaction SET status='Successful' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET status='Successful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
echo "200";
exit();

}

else {

$descr=$service." ".$amount_to_buy." Airtime Purchase Unsuccessful";

$refund=$amount_to_pay+$post_balance;
mysqli_query($db,"UPDATE users SET us_wallets='".$pre_balance."' WHERE emailR='".$buyer_email."'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
  echo $descr;
    exit();
}


?>
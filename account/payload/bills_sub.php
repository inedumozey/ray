<?php

$service_url="https://vtpass.com/api/balance";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Basic '.base64_encode($vtpass_login).'',
    'Content-Type: application/json',
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);
$data=json_decode($request, true);
$adminbal=$data['contents']['balance'];

if ($adminbal<$amount_to_pay){

  $refund=$amount_to_pay+$post_balance;
  mysqli_query($db, "UPDATE users SET us_wallets='".$pre_balance."' WHERE emailR='".$buyer_email."'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
  mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

    echo "Electricity Payment Timeout, Please Contact Admin"; // Admin Bal Low
    exit();
}

else{

$final_amount=$PDATA[0]-$elect_charge;
$postdata=array(
  'billersCode' => $recharge_meter,
  'serviceID' => $service,
  'request_id' => $order_id,
  'variation_code' => $metertype,
  'amount' => $final_amount,
  'phone' => $contact_number,
);

$url ="https://vtpass.com/api/pay";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Basic '.base64_encode($vtpass_login).'',
    'Content-Type: application/json',
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);

$rdata=json_decode($request, true);
$status=$rdata['content']['transactions']['status'];
$reqid=$rdata['requestId'];
$response_description=$rdata['response_description'];
$purchased_code=$rdata['purchased_code'];

if ($status=="delivered." || $status=="delivered"){
  
$descr="₦".$final_amount." ".strtoupper($service)." ".$metertype." on ".$meternum." (".$purchased_code.")";
    
mysqli_query($db,"UPDATE mytransaction SET status='Successful', descr='".$descr."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET status='Successful', buying='".$descr."' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
echo "200";
exit();

}

else {

$descr='₦'.$final_amount.''.strtoupper($service).' Payment Unsuccessful';

$refund=$amount_to_pay+$post_balance;
mysqli_query($db,"UPDATE users SET us_wallets='".$pre_balance."' WHERE emailR='".$buyer_email."'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
    echo $descr;
    exit();
}

}


?>
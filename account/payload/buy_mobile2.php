<?php

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.gladtidingsdata.com/api/user/?format=json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token  ".$gladapi."",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$xx=json_decode($response, true);
$adbal=$xx['user']['Account_Balance'];


if ($adbal < $amount_to_buy){

$refund=$amount_to_pay+$post_balance;
mysqli_query($db, "UPDATE users SET us_wallets='$pre_balance' WHERE emailR='$buyer_email'");

  mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
  mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

    echo "Data Purchase Fail, Please Contact Admin"; // Admin Bal Low
    exit();

}

else{

if ($data_vo=="500"){
    $plan_id=182;
}

if ($data_vo=="15"){
    $plan_id=183;
}

if ($data_vo=="2"){
    $plan_id=184;
}

if ($data_vo=="3"){
    $plan_id=185;
}

if ($data_vo=="45"){
    $plan_id=186;
}

if ($data_vo=="11"){
    $plan_id=187;
}

if ($data_vo=="150"){
    $plan_id=188;
}

if ($data_vo=="40"){
    $plan_id=189;
}

$postdata=array(
'network' => 6,
'plan' => $plan_id,
'mobile_number' => $recharge_phone,
'Ported_number' => true
);

$url = "https://www.gladtidingsdata.com/api/data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    "Authorization: Token  ".$gladapi."",
    'Content-Type: application/json'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$request = curl_exec($ch);
curl_close($ch);

if ($request){

mysqli_query($db,"UPDATE mytransaction SET status='Successful' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET status='Successful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
echo "200";
exit();
    
  }

  else{

$descr='Unsuccessful Data '.$network.' '.$data_vol.' to '.$recharge_phone;

$refund=$amount_to_pay+$post_balance;
mysqli_query($db,"UPDATE users SET us_wallets='".$pre_balance."' WHERE emailR='".$buyer_email."'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$refund."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

 echo ($descr);
 exit();


    }
}
?>
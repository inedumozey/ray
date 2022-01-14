<?php

if ($data_vo=="750"){
    $plan_id='';
}

if ($data_vo=="15"){
    $plan_id=145;
}

if ($data_vo=="2"){
    $plan_id=146;
}

if ($data_vo=="3"){
    $plan_id=147;
}

if ($data_vo=="45"){
    $plan_id=148;
}

if ($data_vo=="6"){
    $plan_id=149;
}

if ($data_vo=="8"){
    $plan_id=150;
}

if ($data_vo=="11"){
    $plan_id=163;
}

if ($data_vo=="155"){
    $plan_id=164;
}

if ($data_vo=="40"){
    $plan_id=165;
}

  

$postdata=array(
'network' => 4,
'plan' => $plan_id,
'mobile_number' => $recharge_phone,
'Ported_number' => true

);

$url = "https://www.mega-sub.com/api/data/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    "Authorization: Token  c9f5e0b0040cbd1aa4d8543c73101b42da88b5ab",
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
?>
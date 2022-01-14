<?php


if ($data_vo=="105"){//
    
                $NETORKID=2;
                $plan_id='';
}

 if ($data_vo=="135"){
    
                $NETORKID=2;
                $plan_id=194;
}



  if ($data_vo=="29"){
    
                $NETORKID=2;
                $plan_id=195;
}

 if ($data_vo=="41"){
    
                $NETORKID=2;
                $plan_id=196;
}



  if ($data_vo=="52"){
    
                $NETORKID=2;
                $plan_id=197;
}

 if ($data_vo=="77"){
   
                $NETORKID=2;
                $plan_id=198;
}



  if ($data_vo=="10"){
    
                $NETORKID=2;
                $plan_id=199;
}

 if ($data_vo=="1325"){
   
                $NETORKID=2;
                $plan_id=200;
}

 if ($data_vo=="1825"){
   
                $NETORKID=2;
                $plan_id=201;
}


 if ($data_vo=="295"){
   
                $NETORKID=2;
                $plan_id=202;
}

 if ($data_vo=="50"){
   
                $NETORKID=2;
                $plan_id=203;
}
  

$postdata=array(
'network' => $NETORKID,
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
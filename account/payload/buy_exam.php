<?php

if ($service=="WAEC"){$service_url="https://easyaccess.com.ng/api/waec.php";}
if ($service=="NECO"){$service_url="https://easyaccess.com.ng/api/neco.php";}
if ($service=="NABTEB"){$service_url="https://easyaccess.com.ng/api/nabteb.php";}

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $service_url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"AuthorizationToken: ".$easyaccess."",  //replace this with your authorization_token
"cache-control: no-cache"
),
));
$response = curl_exec($curl);
curl_close($curl);
$rdata=json_decode($response, true);

$success=$rdata['success'];
$message=$rdata['message'];

if ($status=="true" && $message !="Insufficient Balance") {

$descr=$service." Pin Purchase ".$response;

mysqli_query($db,"UPDATE mytransaction SET status='Successful', descr='$descr' WHERE email='$buyer_email' AND trx='$order_id'");
mysqli_query($db,"UPDATE system_recharge SET status='Successful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");
    
echo "200";
exit();
    
  }

  else{

$descr=$service.' Exam Pin Puchase Unsuccessful, wait and Try Again';

$refund=$treat_amount+$post_balance;
mysqli_query($db,"UPDATE users SET us_wallets='$pre_balance' WHERE emailR='$buyer_email'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

 echo ($descr);
 exit();


    }

?>
<?php

 $data_vol2=str_replace(" ", "%20", $data_vo);

 if ($network=="MTN" && $data_vo=="500"){
        $da=$data_vol2+0;
    $msgt=urlencode("SMEB ".$recharge_phone." ".$data_vol2." "."".$simpin."");
}
 if ($network=="MTN" && $data_vo=="1"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEC ".$recharge_phone." ".$da." "."".$simpin."");
}

 if ($network=="MTN" && $data_vo=="2"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMED ".$recharge_phone." ".$da." "."".$simpin."");
}

 if ($network=="MTN" && $data_vo=="3"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEF ".$recharge_phone." ".$da." "."".$simpin."");
}

 if ($network=="MTN" && $data_vo=="5"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEE ".$recharge_phone." ".$da." "."".$simpin."");
}

 if ($network=="MTN" && $data_vo=="10"){
    $da=$data_vol2*1000;
    $msgt=urlencode("SMEG ".$recharge_phone." ".$da." "."".$simpin."");
}

$my_order_num=str_replace(" ", "", $mtn_n);
$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$sms_token.'&from='.$sms_sender.'&to='.$my_order_num.'&body='.$msgt.'';

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

  else{

    $descr='Unsuccessful Data '.$network.' '.$data_vol.' to '.$recharge_phone;

  $refund=$amount_to_pay+$post_balance;
mysqli_query($db,"UPDATE users SET us_wallets='".$pre_balance."' WHERE emailR='".$buyer_email."'");

mysqli_query($db,"UPDATE mytransaction SET status='Unsuccessful', newbal='".$refund."' WHERE email='".$buyer_email."' AND trx='".$order_id."'");
mysqli_query($db,"UPDATE system_recharge SET pre_balance='".$pre_balance."', post_balance='".$refund."', status='Unsuccessful' WHERE buyer_email='".$buyer_email."' AND trx='".$order_id."'");

 echo ($descr);
 exit();


    }




?>
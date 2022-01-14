<?php

require ("session.php");

if (!isset($_GET['status']) && !isset($_GET['ref']) && !isset($_GET['trxID']) && !empty($_GET['status']) && !empty($_GET['ref'])){
    
    header("location:Home");
    exit();
}
else{

$status=$_GET['status'];
$trxID=$_GET['transaction_id'];
$ref=$_GET['tx_ref'];

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$trx=strtoupper(rand(100,900).uniqid()."AP");

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$trxID."/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer ".$paystack_sk.""
  ),
));

$response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);
    
    $status2=$result['status'];
    $amountpaid=$result['data']['amount'];
    $tx_ref=$result['data']['tx_ref'];
    $paidemail=$result['data']['customer']['email'];
    
    
     $aa1=$amountpaid*2;
     $aa2=$aa1/100;
     $aa3=ceil($amountpaid-$aa2);
     
    $newbal=$mallu+$aa3;
     
 if ($status2=="success" && $tx_ref==$ref && $amountpaid !=0){
         
   mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$paidemail."'");
    
    $descr=$aa3.' ATM Wallet Funding';

   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$email."', '".$username."', '".$aa3."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$mallu."','".$newbal."')");
      
      header("location:Home");
      exit();
     }


    else {
        
     $newbal2=$mallu;  
     mysqli_query($db, "UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
        
       header("location:Home");
    }
}

?>
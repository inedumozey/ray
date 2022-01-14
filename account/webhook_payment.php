<?php
require ("../private/config.php");

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");

$clientSecret="FH6HCX5C3LMA88474H5E47ZHALNW9XQB"; ///// SECRET KEY FOUND ON PROFILE

$json = file_get_contents('php://input');

$data = json_decode($json);


$paymentReference=$data->paymentReference;
$paidOn=$data->paidOn;
$transactionReference=$data->transactionReference;
 $amountPaid=$data->amountPaid;  
 $transactionHash=$data->transactionHash;
 $email=$data->customer->email;
 $ref=$data->product->reference;

 
 $kit="$clientSecret|$paymentReference|$amountPaid|$paidOn|$transactionReference";
 
 $longhash=hash('sha512', $kit);
 
 if ($transactionHash==$longhash){
    
    $amount1=50;
    $amount2=ceil($amountPaid-$amount1);
            
    $cx_trx=mysqli_query($db, "SELECT amount, trx FROM mytransaction WHERE amount='".$amount2."' AND trx='".$transactionReference."'");
    
    if (mysqli_num_rows($cx_trx)<1){
        
        
       $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email FROM users WHERE ref='".$ref."'"));
            
            $oldbal = $cbal[0];
            $username=$cbal[1];
     
            $newbal=$oldbal+$amount2;
            
            mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE ref='".$ref."'");

            mysqli_query($db, "INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`, `oldbal`, `newbal`) VALUES (NULL, '".$email."', '".$username."', '".$amount2."', 'Auto Funding', 'Successful', '".$time."', 'WEB', '".$transactionReference."', '".$oldbal."', '".$newbal."') ");
             
        
    }
    
else{
    
    
    die();
}
           



 }
 
 
 
 
 else{
     
     
     die();
     
 }
 

?>
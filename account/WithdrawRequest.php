<?php
require("session.php");
if (!isset($_POST['amount']) && !isset($_POST['csrfToken']) && !isset($_POST['account_no']) && $_SESSION['tokenFWX'] != $_POST['csrfToken']){

	echo "Session Exipred. reload and try Again";
	exit();
}
else{

//session_unset($_SESSION['tokenFWX']);
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A"); 
$trx=rand(100000000,90000000000)."WF";

$amount=$_POST['amount']+50;
$account_no=$_POST['account_no'];
$account_name=$_POST['account_name'];
$bank_name=$_POST['bank_name'];

if ($amount>$mallu){

	echo "Insufficient Balance to Withdraw. Fund Wallet and Try Again.";
	exit();
}

else{

	$newbal=$mallu-$amount;
	$final_amount=$amount-50;
	mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$email."'");
	$msg=urlencode("WITHDRAW OF ".$final_amount." + ".$bank_name." + ".$account_no."-".$account_name);

	$my_order_num=urlencode($deposit_num);

	$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$sms_token.'&from='.$sms_sender.'&to='.$my_order_num.'&body='.$msg.'';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xres=json_decode($response, true);
$status=$xres['data']['status'];
    
 if ($status=="success") {

 $descr='Withdraw of ₦'.$amount.' - '.$bank_name.' - '.$account_no;
    
    mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`, `username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email', '$username', '$amount', '$descr', 'Pending', '$time', 'WEB', '$trx', '$mallu','$newbal')");

    mysqli_query($db, "INSERT INTO `withdraw_request` (`id`, `email`, `amount`, `status`, `descr`, `oldbal`, `newbal`, `trx`, `date`) VALUES (NULL, '".$email."', '".$amount."', 'Pending', '".$descr."', '".$oldbal."', '".$newbal."', '".$trx."', '".$time."')");
    
    echo "200"; //Successful Order
    exit();


 }

 else{

 	$descr='Withdraw of ₦'.$final_amount.' Unsuccessful';

 	 $newbal2=$mallu;
    mysqli_query($db,"UPDATE users SET us_wallets='".$newbal2."' WHERE emailR='".$email."'");
    
   mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '$email','$username', '$amount', '$descr', 'Unsuccessful', '$time', 'WEB', '$trx','$mallu','$newbal2')");
  
    
    echo $descr; //Unsuccessful Order
    exit();
 }

}


}

?>
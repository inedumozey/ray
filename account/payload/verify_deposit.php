<?php

require("session.php");
if (!isset($_POST['email']) && !isset($_POST['amount']) && !isset($_POST['bank'])){

echo "Please fill the form correctly and try again";
exit();
		
}

else{

	$amount=trim(mysqli_real_escape_string($db, $_POST['amount']));
	$bank=$_POST['bank'];
	$senderemail=$_POST['senderemail'];
	$narration=mysqli_real_escape_string($db, $_POST['narration']);

$msgt=urlencode($senderemail." DEPOSIT ".$amount." INTO ".$bank." (".$narration.")");
	
$url = 'https://www.bulksmsnigeria.com/api/v1/sms/create?api_token='.$sms_token.'&from='.$sms_sender.'&to='.$deposit_num.'&body='.$msgt.'';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$xres=json_decode($response, true);
$status=$xres['data']['status'];


if ($status=="success") {
  
  echo "200";
  exit();

 }

 else {

echo "Sending Fail. Please Try Again.";
exit();
 }

}

?>
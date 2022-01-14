<?php

require("session.php");
if (!isset($_POST['dtype']) && !isset($_POST['dnumber'])){

	echo "100";
	exit();
}

else{

$dtype=$_POST['dtype'];
$dnumber=$_POST['dnumber'];
$service=strtolower($dtype);


$postdata=array(
	'billersCode' => $dnumber,
	'serviceID' => $service,
);

$url ="https://vtpass.com/api/merchant-verify";
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
$curl_response = curl_exec($ch);
curl_close($ch);

$xdata=json_decode($curl_response, true);

if (array_key_exists('content', $xdata) && array_key_exists('Customer_Name', $xdata['content']) && ($xdata['content']['Customer_Name']!="")){

 $fullname=$xdata["content"]["Customer_Name"];
 $data=$fullname;
  echo ($data);
  exit();
}

else {

	echo "100";
	exit();
}
}
?>


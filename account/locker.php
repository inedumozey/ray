<?php

$lock=mysqli_fetch_array(mysqli_query($db, "SELECT * FROM locker WHERE id='1'"));

$MTN_LOCK=$lock['mtn_airtime'];
$GLO_LOCK=$lock['glo_airtime'];
$AIRTEL_LOCK=$lock['airtel_airtime'];
$MOBILE_LOCK=$lock['mobile_airtime'];


$MTN_SHARE=$lock['mtn_share'];
$GLO_SHARE=$lock['glo_share'];
$AIRTEL_SHARE=$lock['airtel_share'];
$MOBILE_SHARE=$lock['mobile_share'];

$MTNDATA_LOCK=$lock['mtn_data'];
$GLODATA_LOCK=$lock['glo_data'];
$AIRTELDATA_LOCK=$lock['airtel_data'];
$MOBILEDATA_LOCK=$lock['mobile_data'];
$MOBILEDATA_LOCK2=$lock['mobile_data2'];

$AEDC=$lock['AEDC'];
$IBEDC=$lock['IBEDC'];
$EKEDC=$lock['EKEDC'];
$IKEDC=$lock['IKEDC'];
$PHED=$lock['PHED'];
$JED=$lock['JED'];
$KAEDCO=$lock['KAEDCO'];
$KEDCO=$lock['KEDCO'];

$WAEC=$lock['WAEC'];
$NECO=$lock['NECO'];
$NABTEB=$lock['NABTEB'];

$DSTV=$lock['dstv'];
$GOTV=$lock['gotv'];
$STARTIMES=$lock['startime'];

$MONNIFY=$lock['MONNIFY'];
$PAYSTACK=$lock['PAYSTACK'];

$gifting_lock=$lock['gifting_lock'];

?>
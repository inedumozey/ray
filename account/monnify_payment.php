

<?php

if ($acctno == "")
{
    

  // SECRET KEY IN PROFILE
$monnify_hashkeys="MK_PROD_JLVZP4URUS:FH6HCX5C3LMA88474H5E47ZHALNW9XQB";

$stringk=base64_encode($monnify_hashkeys);

//
$url = 'https://api.monnify.com/api/v1/auth/login';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
   $ch, CURLOPT_HTTPHEADER, [
        "Authorization: Basic ".$stringk."", ///// STRINGK is the return base64 hash of the Sk & apiKey
    ]

);
$json = curl_exec($ch);
curl_close($ch);


   $result = json_decode($json, true);

   $accessToken=$result['responseBody']['accessToken'];
   
  $fullname=$first_name." ".$last_name;
   $c_code=rand(1000000000, 9000000000);
   $aref=uniqid();
  $bref=rand(1000, 9000);
   $ref=$aref.$bref;
   $remail=$email;
   $xx=139763876968;
   

$postdata = array(
    'accountName' => "$fullname", ///////// Account Name to display
    'accountReference' => "$ref", /// Unique ID to update customer wallet
    'currencyCode' => "NGN",        //////// Currency to pay
    'customerEmail' => "$remail",           ////// Customer email address
    'contractCode' => "$xx",    //////// Nunique number to start trade
    'customerName' => "$fullname",    /////// Customer Name to setup account
);

$rurl = 'https://api.monnify.com/api/v1/bank-transfer/reserved-accounts';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $rurl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
   $ch, CURLOPT_HTTPHEADER, [
       "Content-Type: application/json",

        "Authorization: Bearer ".$accessToken."",

        
    ]

);
$json = curl_exec($ch);
curl_close($ch);


   $result = json_decode($json, true); 

   $acctName=$result['responseBody']['accountName']; ////// Return Account Name

   $accountNumber=$result['responseBody']['accountNumber'];   /////// Return account Number

   $bankName=$result['responseBody']['bankName'];      ////////// Return bank name;

   $accountReference=$result['responseBody']['accountReference']; /// Unique ID to update wallet
   

    mysqli_query($db, "UPDATE users SET bankname='".$bankName."', acctno='".$accountNumber."', acctname='".$acctName."', ref='".$accountReference."', gen_bank='ACTIVE' WHERE emailR='".$remail."'");

}


    //generate rolez account 
    
 
        $qry22 = mysqli_query($db, "SELECT * FROM monnify WHERE email ='$email' ");

         if (mysqli_num_rows($qry22) < 1){
             
            

  // SECRET KEY IN PROFILE
$monnify_hashkeys="MK_PROD_JLVZP4URUS:FH6HCX5C3LMA88474H5E47ZHALNW9XQB";

$stringk=base64_encode($monnify_hashkeys);

//
$url = 'https://api.monnify.com/api/v1/auth/login';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
   $ch, CURLOPT_HTTPHEADER, [
        "Authorization: Basic ".$stringk."", ///// STRINGK is the return base64 hash of the Sk & apiKey
    ]

);
$json = curl_exec($ch);
curl_close($ch);


   $result = json_decode($json, true);

   $accessToken=$result['responseBody']['accessToken'];
   
  $fullname=$first_name." ".$last_name;
   $c_code=rand(1000000000, 9000000000);
   $aref=uniqid();
  $bref=rand(1000, 9000);
   $ref=$aref.$bref;
   $remail=$email;
   $xx=139763876968;
   


  //Creating resserved account 
            $accountReference = $ref;
            $accountName = $fullname;
            $currencyCode = 'NGN';
            $contractCode = $xx;
            $customerEmail = $email;
            $customerName = $fullname;
            $getAllAvailableBanks = true;   
            
            $data = array (
            "accountReference" => $accountReference,    
            "accountName" => $accountName,
            "currencyCode" => $currencyCode,
            "contractCode" => $contractCode,
            "customerEmail" => $customerEmail,
            "customerName" => $customerName,
            "getAllAvailableBanks" => $getAllAvailableBanks,
            
                );
            $jsonData = json_encode($data);


            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.monnify.com/api/v2/bank-transfer/reserved-accounts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization:  Bearer $accessToken", ), ));

            $response = curl_exec($curl);
            
            // print_r ($response); 
            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            $err = curl_error($curl);

            curl_close($curl);

            $monnify = json_decode($response);
            
            //print_r($monnify);
            
            $account_ref = $monnify->responseBody->accountReference;
            $reserve_ref = $monnify->responseBody->reservationReference;


            foreach ($monnify->responseBody->accounts as $key => $value) {
                # code...
                //print_r ($value);
            $user_account_name = $value->accountName;
            $user_account_number = $value->accountNumber;
            $user_bank_name = $value->bankName;
                
           // echo $user_account_name.' '.$user_account_number.' '.$user_bank_name. '<br>';

           if (isset($user_account_name) && isset($user_account_number) && isset($user_bank_name)){
            if (!empty($user_account_name) && !empty($user_account_number) && !empty($user_bank_name)){

                //SANITIZE RESULT 
                $user_account_name = filter_var ($user_account_name, FILTER_SANITIZE_STRING);
                $user_account_number = filter_var ($user_account_number, FILTER_SANITIZE_STRING);
                $user_bank_name = filter_var ($user_bank_name, FILTER_SANITIZE_STRING);	

                //Preventing fields from SQL INJECTION
                $user_account_name = mysqli_real_escape_string ($db, $user_account_name);
                $user_account_number = mysqli_real_escape_string ($db, $user_account_number);
                $user_bank_name = mysqli_real_escape_string ($db, $user_bank_name);

                $monniify_info = "INSERT INTO monnify (email, acct_name, acct_no, bankname, ref ) VALUES ('$email', '$user_account_name', '$user_account_number', '$user_bank_name', '$reserve_ref' )";
                $monnify_info_result = mysqli_query($db, $monniify_info);
            
            }
               
           }
                
            }
    
}
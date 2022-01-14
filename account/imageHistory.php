<?php

if (strpos($descr2, 'mtn') !== false) {
   
  $imageMode='mtn.png';
}

if (strpos($descr2, 'glo') !== false) {
   
  $imageMode='glo.png';
}

if (strpos($descr2, 'airtel') !== false) {
   
  $imageMode='airtel.png';
}

if (strpos($descr2, '9mobile') !== false) {
   
  $imageMode='mobile.png';
}

if (strpos($descr2, 'dstv') !== false) {
   
  $imageMode='dstv.png';
  $textMode='Cable Subscription';
}

if (strpos($descr2, 'gotv') !== false) {
   
  $imageMode='gotv.png';
  $textMode='Cable Subscription';
}

if (strpos($descr2, 'startimes') !== false) {
   
  $imageMode='startimes.png';
  $textMode='Cable Subscription';
}

if (strpos($descr2, 'electric') !== false) {
   
  $imageMode='electric.png';
  $textMode='Bills Payment';
}

if (strpos($descr2, 'neco') !== false) {
   
  $imageMode='neco.png';
  $textMode='Neco E-Pin';
}

if (strpos($descr2, 'waec') !== false) {
   
  $imageMode='waec.png';
  $textMode='Waec E-Pin';
}

if (strpos($descr2, 'nabteb') !== false) {
   
  $imageMode='nabteb.png';
  $textMode='Nabteb E-Pin';
}


if (strpos($descr2, 'withdraw') !== false) {
   
  $imageMode='withdraw.png';
  $textMode='Withdraw';
}

if (strpos($descr2, 'deduction') !== false) {
   
  $imageMode='debit.png';
  $textMode='Deduction';
}

if (strpos($descr2, 'deposit') !== false) {
   
  $imageMode='deposit.png';
  $textMode='Wallet Funding';
}

if (strpos($descr2, 'funding') !== false) {
   
  $imageMode='deposit.png';
  $textMode='Wallet Funding';
}


if (strpos($descr2, 'airtime') !== false) {
   
  $textMode='Airtime';
}

if (strpos($descr2, 'data') !== false) {
   
  $textMode='Data Bundle';
}

if (strpos($descr2, 'share') !== false) {
   
  $textMode='Share & Sell';
}

if (strpos($descr2, 'gifting') !== false) {
   
  $textMode='MTN Gifting';
  $imageMode='mtn.png';
}

?>
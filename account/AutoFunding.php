

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<div style="padding:90px 15px 20px 15px" >

	<?php

 if ($acctno !="" || $rxacctno){

}
 else {

	require("monnify_payment.php");
}


	//query account numbers 

	$qryrlx = $db->query("SELECT * FROM monnify WHERE email ='$email' AND bankname='Rolez Microfinance Bank'");
	$rlxresult = mysqli_fetch_array($qryrlx);

?>
 
   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">AUTO WALLET FUNDING <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">
    <br/>


    <p>

      It is our pleasure to introduce this new payment system to you. For your convinience wallet funding, here is Automated Payment System for you. 
    	
    </p>
  



<?php

if ($acctno==""){

  echo '<div class="alert alert-default">

  <div>

  Dear '.$first_name.'<br/> <br/> Our Automated Wallet Funding will be available soon. Thanks.

  </div>
  
  <a href="'.$baseurl.'/AutoFunding"><button class="btn btn-danger">GET MY ACCOUNT NUMBER</button></a>

  </div>';
}

else{

?>
<marquee style="background-color: white; color:#d1026d; padding: 10px; font-size: 25px;;">Warm greetings, kindly be informed that MTN CORPORATE GIFTING is available. God bless you always. </marquee>

<div class="mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item submenu">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">WEMA BANK</a>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link active show" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">ROLEZ BANK</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
	<div class="card card-dark bg-secondary-gradient">
								<div class="card-body skew-shadow">
									<img src="static/img/wema.jpg" height="60" class="img" style="border-radius: 50%" alt="Visa Logo">

									<h2 class="py-4 mb-0"><?=$acctno?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="fw-bold mb-1"><?=$acctname?></h3>
											<h3 class="fw-bold mb-1">WEMA BANK</h3>
											<br>
											<div class="text-small text-uppercase fw-bold op-8">Automated Bank Transfer</div>
											<p class="text-small ">Make transfer to this account to fund your wallet </p>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1">₦50</h3>
											<div class="text-small text-uppercase fw-bold op-8">Charge</div>
										</div>
									</div>
								</div></div></div>


				<div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="card card-dark bg-secondary-gradient">
								<div class="card-body skew-shadow">
									<img src="https://1000logos.net/wp-content/uploads/2017/05/Rolex-logo.png" height="60" class="img" style="border-radius: 50%" alt="Visa Logo">

									<h2 class="py-4 mb-0"><?=$rlxresult['acct_no']?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="fw-bold mb-1"><?=$rlxresult['acct_name']?></h3>
											<h3 class="fw-bold mb-1"><?=strtoupper($rlxresult['bankname'])?></h3>
											<br>
											<div class="text-small text-uppercase fw-bold op-8">Automated Bank Transfer</div>
											<p class="text-small ">Make transfer to this account to fund your wallet </p>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1">₦50</h3>
											<div class="text-small text-uppercase fw-bold op-8">Charge</div>
										</div>
									</div>
								</div></div></div>

								</div>

							

								





				

					</div>

<?php

}

?>




    </div>
                

    </div>

    
                  <br>
                <br>
                <br>
                <br> 

                  <br>
                <br>
                <br>
                <br> 
</div>


</div>
</div>


<?php require("footer.php"); ?>
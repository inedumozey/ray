 <?php require("header.php"); 
 	require("monnify_payment.php");
 	?>


    <?php require("menu.php"); ?>

  <?php


if ($mode=="ON"){

echo '<script>Swal.fire({ text:"'.htmlspecialchars($popup_msg).'",position:"top",showConfirmButton:false});</script>';

}

  ?>



		<div class="main-panel ">
				
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<style>
      #process, #process2,#output{
        display: none;
    }


.swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}


.swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #4962B3;
  font-size: 12px;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>


 <script>

 function greet() {

  var greeting;
  var time = new Date().getHours();
  if (time < 10) {
    greeting = "Good morning,";
  } else if (time < 20) {
    greeting = "Good day,";
  } else {
    greeting = "Good evening,";
  }
  document.getElementById("greet").innerHTML = greeting;
}

</script>
<div class="container">



	<div class="panel-header py-3 bubble-shadow" style="background-color: <?php echo $theme_color; ?>">
		<div class="page-inner py-5"  style="background-color: <?php echo $theme_color; ?>">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row py-4"  style="background-color: <?php echo $theme_color; ?>">
				<div  style="background-color: <?php echo $theme_color; ?>">
					<h2 class="text-white pb-2 fw-bold">Welcome to <?php echo $sitetitle; ?></h2>
					<h5 class="text-white mb-2" style="font-size: 14px;">Refer people to <span style="text-transform: uppercase;"><?php echo $sitetitle; ?></span> and earn ₦500 immediately the person upgrade his/her account to Topuser.
</h5>
					<p class="mb-0 text-white" style="font-size: 13px;"> <b>Referal Link:</b>
						<span class="data-toggle=" id="mytext"><span style="text-transform: lowercase;"><?php echo $baseurl; ?></span>/NewUser?referral=<?php echo $refcode; ?></span>
						<span class="badge badge-dark" onclick="CopyToClipboard('mytext');"  style="cursor: pointer;">copy</span> <span id="linked"></span>

					</p>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
					<button type="button" class="btn btn-warning btn-round mr-2" data-toggle="modal" data-target="#fundWalletModal">
						Fund Wallet
					</button>

					<a href="<?php echo $baseurl; ?>/History">
					<button type="button" class="btn btn-info btn-round mr-2">
						My Transactions
					</button>
				</a>
					

				</div>
			</div>
		</div>
	</div>


	<div class="page-inner mt--5">

		                <?php

						if ($ceov=="earner"){

							$package_code="EARNER <i class='far fa-frown'></i>";
						}

					   if ($ceov=="topuser"){

							$package_code="TOPUSER <i class='far fa-grin'></i>";
						}


						if ($ceov=="affliate"){

							$package_code="AFFLIATE <i class='far fa-grin'></i>";
						}

						?>


		<div class="row mt--2">
			<div class="col-md-12">

				<div class="card full-height">
					<div class="card-body">
						<div class="card-title"><span id="greet"></span> <b><?php echo $first_name; ?></b> <span style="float: right;font-weight: bold;font-size: 13px;"> Account Type : <?php echo $package_code; ?></span></div> <hr>
						 

						 <?php


             $topuserX='<input type="hidden" name="activate_email" id=="activate_email" value="'.$email.'">
                        <input type="hidden" name="activate_amount" id="activate_amount" value="1000">
              <button class="btn btn-danger btn-block" type="submit" id="upgrade"><b>Upgrade To TopUser Package ₦1,000</b></button>';
              
              
              if ($ceov=="earner" || $ceov=="topuser" && $activate==0){
                  
                  echo $topuserX;
              }

						 ?>



							

<marquee style="background-color: white; color:#d1026d; padding: 10px; font-size: 20px;"><?php echo $scroll_msg; ?> </marquee>



						<div class="row">
						
					


					 		


					</div>

					</div>


				</div>
			</div>
		</div>

			
		<div class="container">
		<div class="row mb-3 mt-3">
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="fas fa-wallet"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Wallet Balance</p>
									<h4 class="card-title" id="Mbal">
										
										  <script>

                              $(document).ready(function sendRequest(){

                                $.ajax({

                                  url:"loadbalance.php",
                                  success:
                                  function(cc){
                                  
                                    $("#Mbal").html("&#8358;"+cc);
                                 
                                  setTimeout(function(){

                                    sendRequest();
                                  }, 1000);

                                  }
                                })
                              })

                           
                            </script>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small">
									<i class="flaticon-coins"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Referral Bonus</p>
									<h4 class="card-title">&#8358; <?php echo number_format($refbonus,2); ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="icon-people"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"> My Total Referral </p>
									<h4 class="card-title"><?php echo $report; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>

		<?php

		if ($ceov !="earner"){

			echo '<div class="alert">
			
			
			<button class="btn btn-block" style="background-color: '.$theme_color.';color:white;">
				<br>
			<h3>Dear '.$first_name.'</h3>
			<p>Kindly join our '.$package_code.' group to be the first to get our updates</p>
			<a href="'.$group_link.'"><button class="btn btn-success btn-block">Join Now</button></a>
				<br>

			</button>

		</div>
';
		}

 else{

 	echo '<div class="alert">
			
			
			<button class="btn btn-block" style="background-color: '.$theme_color.';color:white;">
				<br>
			<h3>Hey ! '.$first_name.'</h3>
			<p>Our system detect you are running a starter account, you can upgrade at anytime to enjoy our unlimited awoof</p>
				<br>

			</button>

		</div>
';
 }

		?>
		

		<div class="row">
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/buyAirtime">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/airtime.svg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Airtime TopUp</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/buyData">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/data.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Buy Data</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/Airtime2Cash">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/airtime2cash.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Airtime to cash</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/billPayment">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/utility.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Electricity Bills</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/cableSub">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/cable.jpg" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Cable Subscription</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/Bonus2Wallet">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 10px;">
								<img src="static/dashboard/assets/img/fundacc.JPG" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Bonus to wallet</div>
						</div>
					</div>
				</a>
			</div>
		
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="#">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/sms.png" height="80px" style="border-radius: 30%">
							</span>
							<div class="h4 m-2 text-dark">Bulk SMS</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/ExamPin">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/resultchecker.png" height="83px" width="97px">
							</span>
							<div class="h4 m-2 text-dark">Result Checker</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/profile">
					<div class="card">
					<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/profile.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">My Account</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-sm-4 col-lg-3">
				<a href="<?php echo $baseurl; ?>/ReferralDownline">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="static/dashboard/assets/img/referral.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">My Referrals</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

		<div class="row">

			
		</div>
	</div>
</div>



<!-- Modal STARTS HERER-->
<div class="modal fade" id="fundWalletModal" tabindex="-1" role="dialog" aria-labelledby="fundWalletModalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title fw-bold" id="fundWalletModalTitle">Fund Wallet</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				<div class="row mb-3 mt-3">
				    	
				
			<div class="col-sm-6 col-md-6 col-6">
			<a href="<?php echo $baseurl; ?>/Flutterwave">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small">
									<i class="fas fa-credit-card"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">ATM Funding (Flutterwave)</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			
				
			<div class="col-sm-6 col-md-6 col-6">
			<a href="<?php echo $baseurl; ?>/AutoFunding">	<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="fas fa-bank"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category"> Automated Bank Funding (N50 charge) </p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			



			<div class="col-sm-6 col-md-6 col-6">
			<a href="<?php echo $baseurl; ?>/BankDeposit">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="fas fa-qrcode"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Bank Depost/ Transfer</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>

			 
				<div class="col-sm-6 col-md-6 col-6">
			<a href="#">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-qrcode"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Airtime to Cash/ Funding</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			

		</div>

							</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
				</div>
		</div>
	</div>
</div>




<script>

        function CopyToClipboard(containerid) {
      if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");

      } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges(); // clear current selection
        window.getSelection().addRange(range); // to select text
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
        //alert("text copied")
        document.getElementById("linked").innerHTML="COPIED";
      }
    }


            </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
	$("#upgrade").click(function() {
	var activate_amount=$("#activate_amount").val();
	var activate_email=$("#activate_email").val();


      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to upgrade Topuser With ₦" + activate_amount,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

          if (shallWe){
		  $.LoadingOverlay("show");
		  $.ajax({

              url:"<?php echo $baseurl; ?>/payload/activate_agent",
              method:"POST",
              data:{
                activate_email:activate_email, activate_amount:activate_amount
                 },
                success:function(Rexdata){
                $.LoadingOverlay("hide");

                if (Rexdata != 200){
                Swal.fire
                ({ position:'top-end',type:'',title:'Oops', text: ''+Rexdata, showConfirmButton:!1,timer:3500 });
                }

                else{
                Swal.fire
                ({ position:'top-end',type:'success',title:'Done', text: 'Activation Successful', showConfirmButton:!1,timer:2500 });

                }

                }

              })

        }


       });
	});
</script>

    




		</div>
	</div>
	



<?php require("footer.php"); ?>
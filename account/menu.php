<!-- Sidebar -->
			<div class="sidebar sidebar-style-2" data-background-color="dark">
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar avatar-online avatar-sm float-left mr-2">
								<img src="static/dashboard/assets/img/avatar.png" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<?php echo $username; ?>
										<span class="user-level" id="bal"></span>


                            <script>

                              $(document).ready(function sendRequest(){

                                $.ajax({

                                  url:"loadbalance.php",
                                  success:
                                  function(cc){
                                  
                                    $("#bal").html("&#8358;"+cc);
                                 
                                  setTimeout(function(){

                                    sendRequest();
                                  }, 1000);

                                  }
                                })
                              })

                           
                            </script>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-primary">
							
								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/Home">
										<i class="fas fa-university"></i> <p> Dashboard </p>
									</a>
								</li>
							
								<li class="nav-item">
							
								<a href="<?php echo $baseurl; ?>/History">
									<i class="fas fa-book"></i>
									<p> My Transactions </p>
								</a>
							</li>



								<li class="nav-item">
							
								<a data-toggle="collapse" href="#fund">
									<i class="fas fa-credit-card"></i>
									<p>Select Fund Wallet</p>
									<span class="caret"></span>
								</a>
			<div class="collapse" id="fund">
					<ul class="nav nav-collapse">	

										
					<li>
					<a href="<?php echo $baseurl; ?>/Flutterwave"> <span class="sub-item">ATM Funding (Manual)</span> </a>
					</li>
										
										
					<li>
						<a href="<?php echo $baseurl; ?>/AutoFunding"> <span class="sub-item">Automated Transfer</span> </a>
					</li>
										
					<li>
				       <a href="<?php echo $baseurl; ?>/BankDeposit"> <span class="sub-item">Bank/Cash Deposit</span> </a>
					</li>

						</ul>
					</div>
			   </li>

							
								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/buyData">
										<i class="fas fa-wifi"></i> <p> Buy Data Bundle </p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/buyAirtime">
										<i class="fas fa-phone"></i>
										<p> Buy Airtime VTU </p>
									</a>
								</li>


								<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/buyShareAirtime">
										<i class="fas fa-phone"></i>
										<p> Buy Share Airtime </p>
									</a>
								</li>

									<li class="nav-item">
							
									<a href="<?php echo $baseurl; ?>/Airtime2Cash">
										<i class="fas fa-money"></i>
										<p> Airtime To Cash </p>
									</a>
								</li>
							
								<li class="nav-item">
							
								<a data-toggle="collapse" href="#utilities">
									<i class="fas fa-lightbulb"></i>
									<p>Bills Payment</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="utilities">
									<ul class="nav nav-collapse">
										<li>
							<a href="<?php echo $baseurl; ?>/billPayment"> <span class="sub-item">Buy Electric Token</span> </a>
										</li>
										<li>
							<a href="<?php echo $baseurl; ?>/cableSub"> <span class="sub-item">Buy CableTV Sub(s)</span> </a>
										</li>
									</ul>
								</div>
							</li>

						
						<li class="nav-item">
							
								<a href="<?php echo $baseurl; ?>/ExamPin">
									<i class="fas fa-barcode"></i>
									<p> Scratch Card Pin(s) </p>
								</a>
							</li>

					<li class="nav-item">
							
								<a href="<?php echo $baseurl; ?>/change_password">
									<i class="fas fa-key"></i>
									<p> Change Password </p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?php echo $baseurl; ?>/Logout">
									<i class="fas fa-sign-out-alt"></i>
									<p> Logout </p>
								</a>
							</li>

							
						</ul>
					</div>
				</div>
			</div>
		<!-- End Sidebar -->

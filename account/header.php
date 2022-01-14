
<?php require("session.php"); ?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta name="theme-color" content="<?php echo $theme_color; ?>">
	<meta charset="utf-8" />
    <title><?php echo $sitetitle; ?>   | Buy Data, Airtime to cash, Bills Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="icon" type="image/png" href="../homepage/vendor/img/favicon.png">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="<?php echo $theme_color; ?>">

    <meta content="<?php echo $sitetitle; ?>  - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services" name="descriptison">

    <link rel="stylesheet" href="static/ogbam/w3.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<!-- Fonts and icons -->
	<script src="static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="static/dashboard/assets/css/fonts.min.css" media="all">
	<!-- toast -->

	 <link rel="stylesheet" type="text/css" href="assets/css/jquery.toast.min.css">
  <script type="text/javascript" src="static/dashboard/assets/js/sweetalert2.all.min.js"></script>


	

	<style>


.swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}


.swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #1572E8 !important;
  font-size: 12px;
  color:white;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}

</style>


	<!-- Popup notifications -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="static/dashboard/assets/css/w3.css">
	<link rel="stylesheet" href="static/dashboard/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="static/dashboard/assets/css/atlantis.css">
</head>


<body data-background-color="bg3" onload="greet(); alertinfo()">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header"  style="background-color: <?php echo $theme_color; ?>;color: white;">
				<a href="<?php echo $baseurl; ?>/home" class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;">Welcome</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation" style="color: white;">
					<span class="navbar-toggler-icon" style="color: white;">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more" style="color: white;"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg"  style="background-color: <?php echo $theme_color; ?>">

				<div class="container-fluid">

					


					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center" style="color: white;">
						<li class="nav-item toggle-nav-search hidden-caret" style="color: white;">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav" style="color: white;">
								<i class="fa fa-search"></i>
							</a>
						</li>


						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link"  href="<?php echo $baseurl; ?>/Logout" style="color:white;">
								<i class="fas fa-power-off"></i> Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

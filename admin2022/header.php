<?php
require("session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $sitetitle; ?> - Buy AirtimeVTU, Data Bundle, CableTv, Electricity</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="static/ms-icon-144x144.png">
<meta name="theme-color" content="#4e5bf2" />

	<meta content="<?php echo $sitetitle; ?> | Buy AirtimeVTU, Data Bundle, CableTv, Electricity" name="descriptison">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
    <link rel="stylesheet" href="https://codedthemes.com/demos/admin-templates/flash-able/bootstrap/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="static/assets/plugins/animation/css/animate.min.css">
    <!-- prism css -->
    <link rel="stylesheet" href="static/assets/plugins/prism/css/prism.min.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="static/assets/plugins/data-tables/css/datatables.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="static/assets/css/style.css">
    <link rel="stylesheet" href="static/assets/plugins/pnotify/css/pnotify.custom.min.css">
	<!-- pnotify-custom css -->
	<link rel="stylesheet" href="static/assets/css/pages/pnotify.css">

    <link rel="stylesheet" href="https://codedthemes.com/demos/admin-templates/flash-able/bootstrap/assets/fonts/feather/css/feather.css">
    <script src="static/assets/js/sweetalert2.all.min.js"></script>
  
  <style type="text/css">
      

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
</head>

<body class="layout-3">

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed menu-light brand-blue active-blue">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="<?php echo $adminpage; ?>/dashboard" class="b-brand">
                    
                    <span class="b-title"><?php echo strtoupper($sitetitle); ?></span>
                  
                <a class="mobile-menu" id="mobile-collapse" href=""><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                   
                    <li class="nav-item pcoded-menu-caption">
                        <label>Main</label>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo $adminpage; ?>/dashboard" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Requests</label>
                    </li>


                     <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Users Transactions</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/all_transaction" class="">All Transactions</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/success_transaction" class="">Success Transactions</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/fail_transaction" class="">Failed Transactions</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/query_transactions" class="">Query Transactions</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/filter_sales" class="">Filter Sales By Date</a></li>
                        </ul>
                    </li>
                   

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Web Configuration</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/general_setting" class="">General Settings</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/guest_price" class="">Guest Price Settings</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/contact_info" class="">Contact Information</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/scan_duplicate" class="">Scan Duplicate Record</a></li>
                             <li class=""><a href="<?php echo $adminpage; ?>/check_fraud" class="">Check Fraud Record</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/order_numbers" class="">Order Numbers</a></li>
                        </ul>
                    </li>


                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Finance Management</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/fundwallet" class="">Credit User Account</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/debitwallet" class="">Debit User Account</a></li>
                        </ul>
                    </li>


                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Manage Users Account</span></a>
                        <ul class="pcoded-submenu">
                             <li class=""><a href="<?php echo $adminpage; ?>/suspend_cart" class="">Suspend All Purchase</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/view_users" class="">View All Accounts</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/find_users" class="">Find User Account</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/delete_users" class="">Delete User Account</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/block_users" class="">Block User Account</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/unblock_users" class="">Unblock User Account</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/reset_users" class="">Reset User Password</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/level_system" class="">Upgrade/Downgrade Account</a></li>
                        </ul>
                    </li>

                      <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Lock/Unlock Services</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/lock_data" class="">Data Services</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/lock_airtime" class="">Airtime Services</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/lock_share" class="">Share&Sell Services</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/lock_tv" class="">CableTv Services</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/lock_elect" class="">Bills Services</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/lock_funding" class="">Wallet Services</a></li>
                        </ul>
                    </li>


                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Discount & Charges</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/airtime_discount" class="">Airtime Discount</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/share_discount" class="">Share&Sell Discount</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/aircash_discount" class="">Airtime2Cash Charges</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/bill_discount" class="">Bills Charges</a></li>
                        </ul>
                    </li>


                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Data Pin/ Airtime Pin</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/airtime_pins" class="">Airtime Pins</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/data_pins" class="">Data Pins</a></li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo $adminpage; ?>/data_switch" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Data Automation</span></a>
                    </li>

                      <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Data Bundle Prices</span></a>
                        <ul class="pcoded-submenu">
                            
                            <li class=""><a href="<?php echo $adminpage; ?>/earner_price" class="">Earner Pricing</a></li>
                            
                            <li class=""><a href="<?php echo $adminpage; ?>/topuser_price" class="">TopUser Pricing</a></li>
                     
                        </ul>
                    </li>


                     <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Notification</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo $adminpage; ?>/popup_msg" class="">Pop-Up Message</a></li>
                            <li class=""><a href="<?php echo $adminpage; ?>/scroll_msg" class="">Scrolling Message</a></li>
                        </ul>
                    </li>


                     <li class="nav-item">
                        <a href="<?php echo $adminpage; ?>/change_password" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Change Password</span></a>
                    </li>
                   

                     <li class="nav-item">
                        <a href="<?php echo $adminpage; ?>/logout" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Logout</span></a>
                    </li>

                  
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#"><span></span></a>
            <a href="<?php echo $adminpage; ?>/dashboard" class="b-brand">
                
              <span class="b-title"><?php echo strtoupper($sitetitle); ?></span>
               
        </div>
        <a class="mobile-menu" id="mobile-header" href="#">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <a href="#" class="mob-toggler"></a>


            <ul class="navbar-nav ml-auto">
            
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                    <span><?php echo $sitetitle; ?></span>
                                <a href="<?php echo $adminpage; ?>/logout" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="<?php echo $adminpage; ?>/change_password" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                                 <li><a href="<?php echo $adminpage; ?>/logout" class="dropdown-item"><i class="feather icon-log-out"></i> Logout</a></li>
                           
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->
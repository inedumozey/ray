
<?php
require("header.php");
?>

   

   
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            


<!-- Required Js -->
<script src="/static/assets/js/vendor-all.min.js"></script>
<style>
    li{
        font-weight: bolder !important;
    }
</style>


<?php

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$rxTDate=$dateTime->format("d-M-y");


$seltw=mysqli_query($db, "SELECT SUM(us_wallets) AS twallet FROM users");
$rows=mysqli_fetch_array($seltw, MYSQLI_ASSOC);
$total=$rows['twallet'];


$selsta=mysqli_query($db, "SELECT SUM(amount) AS tamount FROM mytransaction WHERE status='Successful'");
$rows2=mysqli_fetch_array($selsta, MYSQLI_ASSOC);
$total2=$rows2['tamount'];

$selfta=mysqli_query($db, "SELECT SUM(amount) AS tamount FROM mytransaction WHERE status='Unsuccessful'");
$rows3=mysqli_fetch_array($selfta, MYSQLI_ASSOC);
$total3=$rows3['tamount'];

$selata=mysqli_query($db, "SELECT SUM(amount) AS tamount FROM mytransaction WHERE status='Unsuccessful' OR status='Successful'");
$rows4=mysqli_fetch_array($selata, MYSQLI_ASSOC);
$total4=$rows4['tamount'];

$Activeuser=mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM users WHERE block='0'"));
$Blockuser=mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM users WHERE block='1'"));

$Todaysales=mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM mytransaction WHERE status='Successful' AND date LIKE '%$rxTDate%'"));

$getAllTransaction1=mysqli_query($db, "SELECT COUNT(*) FROM mytransaction WHERE status='Successful'");
$aa1=mysqli_fetch_array($getAllTransaction1);
$returnSUCCESSTransaction=$aa1[0];

$getAllTransaction2=mysqli_query($db, "SELECT COUNT(*) FROM mytransaction WHERE status='Unsuccessful'");
$aa2=mysqli_fetch_array($getAllTransaction2);
$returnFAILTransaction=$aa2[0];

$getAllTransaction3=mysqli_query($db, "SELECT COUNT(*) FROM mytransaction");
$aa3=mysqli_fetch_array($getAllTransaction3);
$returnALLTransaction=$aa3[0];


$getAPITransaction=mysqli_query($db, "SELECT COUNT(*) FROM mytransaction WHERE active='API' AND status='Successful'");
$aa10=mysqli_fetch_array($getAPITransaction);
$returnAPITransaction=$aa10[0];

$getWEBTransaction=mysqli_query($db, "SELECT COUNT(*) FROM mytransaction WHERE active !='API' AND status='Successful'");
$aa20=mysqli_fetch_array($getWEBTransaction);
$returnWEBTransaction=$aa20[0];

?>
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

                <div class="card-body">
                
                                            
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
        
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><?php echo $sitetitle; ?></a>
                      </li>
                    
                    </ul>
                    <div class="tab-content border border-top-0 p-3" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <h6 class="card-title">Welcome Admin </h6>
                           <form class="forms-sample">
                            <div class="form-group">

                           <a href="<?php echo $adminpage; ?>/fail_transaction"> <div class="alert alert-danger">Fail: <b><?php echo $returnFAILTransaction; ?></b>

                                <span style="float: right;font-weight: bold;"><b>₦ <?php echo (number_format($total3)); ?></b></span>
                                <br>
                                <p>View</p>
                            </div>
                          </a>

                          <a href="<?php echo $adminpage; ?>/success_transaction">
                            <div class="alert alert-success" style="font-weight: bold;">Success: <b><?php echo $returnSUCCESSTransaction; ?></b> 

                            <span style="float: right;font-weight: bold;"><b>₦ <?php echo (number_format($total2)); ?></b></span>
                            <br>
                            <p>View</p>
                          </div>
                        </a>

                        <a href="<?php echo $adminpage; ?>/all_transaction">
                           <div class="alert alert-primary" style="font-weight: bold;">All: <b><?php echo $returnALLTransaction; ?></b> 

                            <span style="float: right;font-weight: bold;"><b>₦ <?php echo (number_format($total4)); ?></b></span>
                            <br>
                            <p>View</p>
                          </div>
                        </a>

                                
                                <h6 style="font-family: monospace;font-weight: bold;">FUNDS ₦ <?php echo number_format($total,2); ?></h6>


                                <br>
                                <hr>
                                <br>

                          <a href="<?php echo $adminpage; ?>/web_transaction">
                            <div class="alert alert-warning" style="font-weight: bold;color: black;">WEB: <b><?php echo $returnWEBTransaction; ?></b> Successful

                              <span style="float: right;font-weight: bold;"><b><i class="fa fa-eye"></i></b></span>
                          </div>
                        </a>



                         <a href="<?php echo $adminpage; ?>/api_transaction">
                            <div class="alert alert-warning" style="font-weight: bold;color: black;">API: <b><?php echo $returnAPITransaction; ?></b> Successful

                              <span style="float: right;font-weight: bold;"><b><i class="fa fa-eye"></i></b></span>
                          </div>
                        </a>
                        
                            </div>
                  
                            </form>
                          
                      </div>
                     
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>



    <div class="alert alert-default" style="background-color: white;">
      <h4>Members</h4>
     <hr/>
      <div class="alert" style="background-color: #206fa5;color: white;">

        <h6 style="color: white;">Active Users: <?php echo $Activeuser[0]; ?></h6>

        <h6 style="color: white;">Block Users: <?php echo $Blockuser[0]; ?></h6>
        
      </div>
      <br>
    </div>




    <div class="alert alert-default" style="background-color: white;">
      <h4>Today Sales</h4>
     <hr/>
      <div class="alert alert-primary">
        <h6><?php echo $Todaysales[0]; ?> Sales For Today <?php echo $rxTDate; ?></h6>
        <progress value="<?php echo $Todaysales[0]; ?>" min="0" max="500" class="form-control">
        
      </div>
      <br>
    </div>
<!-- datatable Js -->
<script src="/static/assets/plugins/data-tables/js/datatables.min.js"></script>
<!-- <script src="/static/assets/js/pages/data-responsive-custom.js"></script> -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


<?php require("footer.php"); ?>
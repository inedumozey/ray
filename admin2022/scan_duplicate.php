
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

$users="";

$get_users = mysqli_query($db,"SELECT * FROM users AS t1 WHERE exists ( SELECT * FROM users AS t2 WHERE t2.emailR = t1.emailR AND t2.id <> t1.id)");


if (mysqli_num_rows($get_users)<1){

  $users='<div class="alert" style="background-color:white;">
  <br/>
  <div class="alert alert-danger">
    No Duplicate Users Record Found

  </div>
  <br/>
  <br/>
  </div>';
}

while($data =mysqli_fetch_array($get_users)){

      $uid=$data['id'];
      $first_name=$data['firstname'];
      $mobile=$data['mobile'];
      $username=$data['email'];
      $email=$data['emailR'];
      $mallu=$data['us_wallets'];
      $ceov=$data['ceov'];
      $block=$data['block'];


      $users.='
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
        
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Info</a>
                      </li>
                     <li class="nav-item">
                        <a class="nav-link" id="full_info-tab" data-toggle="tab" href="#full_info" role="tab" aria-controls="full_info" aria-selected="false">Full Info</a>
                      </li>
                     


                    </ul>
                    <div class="tab-content border border-top-0 p-3" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <h6 class="card-title">Account Info. <span style="float: right;background-color: red;border-radius: 50%;width: 30px;text-align: center;color: white;">'.$uid.'</span></h6>
                           <form class="forms-sample">
                            <div class="form-group">
                                <label style="color: black;font-weight: bold;">Username</label>
                               <span>'.$username.'</span>
                               <br>
                                <label style="color: black;font-weight: bold;">Email</label>
                                <span>'.$email.'</span>
                                <br>
                                 <label style="color: black;font-weight: bold;">Account Type</label>
                                <span>'.strtoupper($ceov).'</span>

                                <span style="float: right;"><span style="color: black;font-weight: bold;">Balance:</span>NGN '.number_format($mallu).'</span>
                        
                            </div>
                  
                            </form>
                          
                      </div>
                      <div class="tab-pane fade" id="full_info" role="tabpanel" aria-labelledby="full_info-tab">
                          <h6 class="card-title">Account Info. <span style="float: right;background-color: red;border-radius: 50%;width: 30px;text-align: center;color: white;">'.$uid.'</span></h6>
                           <form class="forms-sample">
                            <div class="form-group">

                            <label style="color: black;font-weight: bold;">Full Name</label>
                               <span>'.$first_name.'</span>
                               <br>

                                <label style="color: black;font-weight: bold;">Username</label>
                               <span>'.$username.'</span>
                               <br>
                                <label style="color: black;font-weight: bold;">Email</label>
                                <span>'.$email.'</span>
                                <br>

                                <label style="color: black;font-weight: bold;">Mobile</label>
                                <span>'.$mobile.'</span>
                                <br>

                                 <label style="color: black;font-weight: bold;">Account Type</label>
                                <span>'.strtoupper($ceov).'</span>

                                <span style="float: right;"><span style="color: black;font-weight: bold;">Balance:</span>NGN '.number_format($mallu).'</span>
                        
                            </div>
                  
                            </form>
                            
                      </div>
                     
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>';


    }


?>


<?php echo $users; ?>
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
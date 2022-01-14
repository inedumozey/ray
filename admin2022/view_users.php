
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

$get_users = mysqli_query($db,"SELECT * FROM users ORDER BY id DESC");

if (mysqli_num_rows($get_users)<1){

   $users='<div class="alert" style="background-color:white;">
  <br/>
  <div class="alert alert-danger">
    No User Created Account So Far

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
      $reg_active=$data['reg_active'];
       
      if ($reg_active==0){
          
        $passbtn='<a href="'.$adminpage.'/verify_user.php?email='.$email.'"><button class="btn btn-danger">APPROVE NOW</button></a>';
      }
      
      else{
          
       $passbtn='<button class="btn btn-success">VERIFIED</button>';
      }


      $users.='
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
        
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true" style="color:blue;">'.$first_name.'</a>
                      </li>


                    </ul>
                    <div class="tab-content border border-top-0 p-3" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <h6 class="card-title">'.$mobile.'</h6>
                         
                            <div class="form-group">
                               
                                <label style="color: black;font-weight: bold;">Username</label>
                               <span>'.$username.'</span>
                               <br>
                                <label style="color: black;font-weight: bold;">Email</label>
                                <span>'.$email.'</span>
                                <br>
                                 <label style="color: black;font-weight: bold;">Account Type</label>
                                <span>'.strtoupper($ceov).'</span>
                                <br>

                                <span style="float: right;"><span style="color: black;font-weight: bold;">Balance:</span>NGN '.number_format($mallu).'</span>
                                
                         <p>'.$passbtn.'</p>
                        
                            </div>
                  
                  
                          
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
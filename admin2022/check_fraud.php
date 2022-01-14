
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

$fraud="";

$ddaa = mysqli_query($db,"SELECT * FROM system_suspend ORDER BY id DESC LIMIT 1000");

if (mysqli_num_rows($ddaa)<1){

   $fraud='<div class="alert" style="background-color:white;">
  <br/>
  <div class="alert alert-danger">
    No Fraud Transactions Record Found

  </div>
  <br/>
  <br/>
  </div>';
}

while($data =mysqli_fetch_array($ddaa)){


      $id=($data['id']);
      $reason=$data['reason'];
      $date=$data['date'];
      $email=$data['email'];


      $fraud.='<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

                <div class="card-body" style="">
                                     
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
        
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Order ||  Date: '.$date.'</a>
                      </li>
                     

                    </ul>
                    <div class="tab-content border border-top-0 p-3" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      
                           <form class="forms-sample">
                            <div class="form-group">
                                <label style="color: black;font-weight: bold;">Email: </label>
                                <span>'.$email.'</span>
                                <br>

                                <label style="color: black;font-weight: bold;">Descr: </label>
                                <span>'.$reason.'</span>
                                <br>
                                
                                 
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


<?php echo $fraud; ?>


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
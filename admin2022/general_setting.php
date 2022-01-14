
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
                            
    
<style>
   label.error{
        color:red !important;
    }

    #ReceipientBox{
        display:none;
    }
</style>

<?php

if (isset($_POST['submit'])){

    $paystack_sk=trim($_POST['paystack_sk']);
    $paystack_pk=trim($_POST['paystack_pk']);
    $vtpass_login=trim($_POST['vtpass_login']);
    $smsusername=$_POST['smsusername'];
    $smspassword=$_POST['smspassword'];


    $update=mysqli_query($db, "UPDATE general_setting SET paystack_sk='".$paystack_sk."', paystack_pk='".$paystack_pk."', vtpass_login='".$vtpass_login."', smsusername='".$smsusername."', smspassword='".$smspassword."'");

     if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Settings Updated", text:"settings updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }
}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Website Settings</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Payment Secret Key <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $paystack_sk; ?>" name="paystack_sk" id="paystack_sk" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Payment Public Key <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $paystack_pk; ?>"  name="paystack_pk" id="paystack_pk" required autocomplete="off">
                                </div>
                                

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Vtpass Secure Login <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $vtpass_login; ?>"  name="vtpass_login" id="vtpass_login" required autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Bulksms Username <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $smsusername; ?>"  name="smsusername" id="smsusername" required autocomplete="off">
                                </div>


                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Bulksms Password <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $smspassword; ?>"  name="smspassword" id="smspassword" required autocomplete="off">
                                </div>
                                
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">SAVE</button>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 

    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


<?php require("footer.php"); ?>
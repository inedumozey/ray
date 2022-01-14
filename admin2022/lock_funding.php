
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

    $paystack=$_POST['paystack'];
    $monnify=$_POST['monnify'];

    $update=mysqli_query($db, "UPDATE locker SET paystack='".$paystack."',MONNIFY='".$monnify."' WHERE id='1'");

  if ($update){

    
        echo '<script>Swal.fire({type:"success", title:"Change Updated", text:"settings updated right now",position:"top",showConfirmButton:true});</script>';

    }

    else{

     echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }

}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Funding Services</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PAYSTACK<span style="color:red">*</span></label>
                                    <select id="paystack" class="form-control" name="paystack" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">MONNIFY<span style="color:red">*</span></label>
                                    <select id="monnify" class="form-control" name="monnify" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">UPDATE SETTINGS</button>
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
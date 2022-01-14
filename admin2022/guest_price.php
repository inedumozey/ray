
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

    $mtn_guest=$_POST['mtn_guest'];
    $glo_guest=$_POST['glo_guest'];
    $airtel_guest=$_POST['airtel_guest'];
    $mobile_guest=$_POST['mobile_guest'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtn_guest='".$mtn_guest."', glo_guest='".$glo_guest."', airtel_guest='".$airtel_guest."', mobile_guest='".$mobile_guest."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Guest Updated", text:"guest price updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating guest price",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Guest Prices</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN GUEST PRICE <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mtn_guest; ?>" name="mtn_guest" id="mtn_guest" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO GUEST PRICE  <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $glo_guest; ?>"  name="glo_guest" id="glo_guest" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">AIRTEL GUEST PRICE  <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $airtel_guest; ?>"  name="airtel_guest" id="airtel_guest" required autocomplete="off">
                                </div>

                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">MOBILE GUEST PRICE  <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mobile_guest; ?>"  name="mobile_guest" id="mobile_guest" required autocomplete="off">
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
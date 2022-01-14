
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

    $mtn_n=$_POST['mtn_n'];
    $glo_n=$_POST['glo_n'];
    $airtel_n=$_POST['airtel_n'];
    $mobile_n=$_POST['mobile_n'];
    $deposit_num=$_POST['deposit_num'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtn_n='".$mtn_n."', glo_n='".$glo_n."', airtel_n='".$airtel_n."', mobile_n='".$mobile_n."', deposit_num='".$deposit_num."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Numbers Updated", text:"numbers updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating numbers",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Order Numbers</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mtn_n; ?>" name="mtn_n" id="mtn_n" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $glo_n; ?>"  name="glo_n" id="glo_n" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">AIRTEL <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $airtel_n; ?>"  name="airtel_n" id="airtel_n" required autocomplete="off">
                                </div>

                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">9MOBILE <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mobile_n; ?>"  name="mobile_n" id="mobile_n" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">BANK DEPOSIT <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $deposit_num; ?>"  name="deposit_num" id="deposit_num" required autocomplete="off">
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
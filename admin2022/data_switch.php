
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

    $mtnswitch=$_POST['mtnswitch'];
    $gloswitch=$_POST['gloswitch'];
    $airtelswitch=$_POST['airtelswitch'];
    $mobileswitch=$_POST['mobileswitch'];
    $gifting_switch=$_POST['gifting_switch'];

    $update=mysqli_query($db, "UPDATE general_setting SET mtnswitch='".$mtnswitch."', gloswitch='".$gloswitch."', airtelswitch='".$airtelswitch."', mobileswitch='".$mobileswitch."', gifting_switch='".$gifting_switch."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Switching Updated", text:"data switching updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating switching",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Data Switching</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN SME DATA<span style="color:red">*</span></label>
                                     <select id="mtnswitch" class="form-control" name="mtnswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_mtn.php">BULKSMS</option>
                                    <option value="buy_mtn2.php">GLADTID</option>
                                    <option value="buy_mtn3.php">MEGA-SUB</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail1">MTN GIFT DATA<span style="color:red">*</span></label>
                                <select id="gifting_switch" class="form-control" name="gifting_switch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_gift.php">BULKSMS</option>
                                    <option value="buy_gift2.php">GLADTID</option>
                                    </select>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO DATA<span style="color:red">*</span></label>
                                   <select id="gloswitch" class="form-control" name="gloswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_glo.php">BULKSMS</option>
                                    <option value="buy_glo2.php">GLADTID</option>
                                    <option value="buy_glo3.php">MEGA-SUB</option>
                                    </select>
                                </div>
                                
                                 <div class="form-group ">
                            <label for="exampleInputEmail1">AIRTEL DATA<span style="color:red">*</span></label>
                                   <select id="airtelswitch" class="form-control" name="airtelswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_airtel.php">BULKSMS</option>
                                    <option value="buy_airtel2.php">GLADTID</option>
                                    <option value="buy_airtel3.php">MEGA-SUB</option>
                                    </select>
                                </div>

                                 <div class="form-group ">
                           <label for="exampleInputEmail1">9MOBILE DATA<span style="color:red">*</span></label>
                                  <select id="mobileswitch" class="form-control" name="mobileswitch" required="required">
                                    <option selected="" value="">---Select---</option>
                                    <option value="buy_mobile.php">BULKSMS</option>
                                    <option value="buy_mobile2.php">GLADTID</option> 
                                    <option value="buy_mobile3.php">MEGA-SUB</option>
                                    </select>
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
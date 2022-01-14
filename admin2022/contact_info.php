
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

    $contact_body=$_POST['contact_body'];
    $contact_number=$_POST['contact_number'];
    $whatsapp=$_POST['whatsapp'];
    $group_link=trim($_POST['group_link']);

    $update=mysqli_query($db, "UPDATE general_setting SET contact_body='".$contact_body."', contact_number='".$contact_number."', whatsapp='".$whatsapp."', group_link='".$group_link."'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Contact Updated", text:"contact settings updated right now",position:"top",showConfirmButton:true});</script>';

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
                    <h6 class="font-weight-bold">Contact Information</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Contact Address <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="contact_body" id="contact_body" required="required" autocomplete="off" value="<?php echo $contact_body; ?>">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">WhatsApp Contact Number <span style="color:red">*</span></label>
                                    <input type="text" class="form-control"  name="whatsapp" id="whatsapp" required="required" value="<?php echo $whatsapp; ?>" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact Mobile Number <span style="color:red">*</span></label>
                                 <input type="text" class="form-control"  name="contact_number" id="contact_number" required="required" autocomplete="off" value="<?php echo $contact_number; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Group Link<span style="color:red">*</span></label>
                                 <input type="text" class="form-control"  name="group_link" id="group_link" required="required" autocomplete="off" value="<?php echo $group_link; ?>">
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
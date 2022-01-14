
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

    $popup_msg=$_POST['popup_msg'];
    $mode=$_POST['mode'];

    $update=mysqli_query($db, "UPDATE general_setting SET popup_msg='".$popup_msg."', mode='".$mode."'");
    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Message Updated", text:"notification settings updated right now",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error  updating notification settings",position:"top",showConfirmButton:true});</script>';
    }

}


?>




    <div class="alert alert-default" style="background-color: white;">
      <h4>Terms and Condition</h4>
     <hr/>
      <div>
                <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                   <div class="form-group">
                    <label for="exampleInputEmail1">Write Here <span style="color:red">*</span></label>
                       <textarea class="form-control" value="" required="required" name="popup_msg" id="popup_msg">
                        <?php echo $popup_msg; ?>
                      </textarea>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Select Mode <span style="color:red">*</span></label>
                       <select class="form-control" name="mode" id="mode" required="required">
                         <option value="">--Select--</option>
                         <option value="ON">ENABLE</option>
                         <option value="OFF">DISABLE</option>
                       </select>
                    </div>
                                
                <button type="submit" name="submit" class="btn btn-success btn-block">SAVE</button>
                </form>
        
      </div>
      <br>
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
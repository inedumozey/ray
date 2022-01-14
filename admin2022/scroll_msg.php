
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

    $scroll_msg=$_POST['scroll_msg'];

    $update=mysqli_query($db, "UPDATE general_setting SET scroll_msg='".$scroll_msg."'");
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
                       <textarea class="form-control" value="" required="required" name="scroll_msg" id="scroll_msg">
                        <?php echo $scroll_msg; ?>
                      </textarea>
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
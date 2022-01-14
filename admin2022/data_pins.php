
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

    $simpin=$_POST['simpin'];
    $airtelpin=$_POST['airtelpin'];

    $update=mysqli_query($db, "UPDATE general_setting SET simpin='".$simpin."', airtelpin='".$airtelpin."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Pin(s) Updated", text:"pins updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating pins",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Data Transfer Pins</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $simpin; ?>" name="simpin" id="simpin" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">AIRTEL <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $airtelpin; ?>"  name="airtelpin" id="airtelpin" required autocomplete="off">
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
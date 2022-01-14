
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

    $cable_charge=$_POST['cable_charge'];
    $elect_charge=$_POST['elect_charge'];
    $waec_price=$_POST['waec_price'];
    $neco_price=$_POST['neco_price'];
    $nabteb_price=$_POST['nabteb_price'];

    $update=mysqli_query($db, "UPDATE general_setting SET cable_charge='".$cable_charge."', elect_charge='".$elect_charge."', waec_price='".$waec_price."', neco_price='".$neco_price."', nabteb_price='".$nabteb_price."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Charges Updated", text:"charges updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating charges",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Bills Charges</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">CABLE SUBSCRIPTION <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $cable_charge; ?>" name="cable_charge" id="cable_charge" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">ELECTRICITY <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $elect_charge; ?>"  name="elect_charge" id="elect_charge" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">WAEC SCRATCH CARD <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $waec_price; ?>"  name="waec_price" id="waec_price" required autocomplete="off">
                                </div>

                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">NECO SCRATCH CARD <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $neco_price; ?>"  name="neco_price" id="neco_price" required autocomplete="off">
                                </div>

                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">NABTEB SCRATCH CARD <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $nabteb_price; ?>"  name="nabteb_price" id="nabteb_price" required autocomplete="off">
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
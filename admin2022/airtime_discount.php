
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

    $m_discount=$_POST['m_discount'];
    $g_discount=$_POST['g_discount'];
    $a_discount=$_POST['a_discount'];
    $mo_discount=$_POST['mo_discount'];

    $update=mysqli_query($db, "UPDATE general_setting SET m_discount='".$m_discount."', g_discount='".$g_discount."', a_discount='".$a_discount."', mo_discount='".$mo_discount."' WHERE id='1'");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Discount Updated", text:"discount updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating discount",position:"top",showConfirmButton:true});</script>';
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Airtime Discounts</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">MTN <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $m_discount; ?>" name="m_discount" id="m_discount" required autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">GLO <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $g_discount; ?>"  name="g_discount" id="g_discount" required autocomplete="off">
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">AIRTEL <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $a_discount; ?>"  name="a_discount" id="a_discount" required autocomplete="off">
                                </div>

                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">9MOBILE <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $mo_discount; ?>"  name="mo_discount" id="mo_discount" required autocomplete="off">
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
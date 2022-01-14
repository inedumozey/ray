
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

    $topuser_price=$_POST['topuser_price'];

    $update=mysqli_query($db, "UPDATE general_setting SET topuser_price='".$topuser_price."'");
    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Setting Updated", text:"web settings updated right now",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error  updating settings",position:"top",showConfirmButton:true});</script>';
    }

}


?>




    <div class="alert alert-default" style="background-color: white;">
      <h4>TopUser Price</h4>
     <hr/>
      <div>
                <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                   <div class="form-group">
                    <label for="exampleInputEmail1">Write Here <span style="color:red">*</span></label>
                       <textarea class="form-control" required="required" name="topuser_price" id="topuser_price">
                        <?php echo $topuser_price; ?>
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
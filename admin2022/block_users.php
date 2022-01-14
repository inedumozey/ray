
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

  $userid=trim($_POST['userid']);

  $selusers=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$userid."' OR email='".$userid."'");
  $count=mysqli_num_rows($selusers);

  if ($count < 1){

      echo '<script>Swal.fire({type:"error", title:"No Record", text:"no users find with this account",position:"top",showConfirmButton:true});</script>';
  }

  else{

    $update=mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$userid."' OR email='".$userid."'");
    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"User Blocked", text:"account block right now",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Blocking", text:"error blocking user",position:"top",showConfirmButton:true});</script>';
    }
  }


}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Block User Account</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email Address/Username <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="userid" id="userid" required>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-danger btn-block">BLOCK USER</button>
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
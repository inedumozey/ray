
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

    $oldpassword=$_POST['oldpassword'];
    $newpasssword=$_POST['newpasssword'];
    $cpassword=$_POST['cpassword'];
    $oldpasswordX=md5($oldpassword);

    if ($newpasssword != $cpassword){

         echo '<script>Swal.fire({type:"warning", title:"Warning", text:"Password Enter Not Match",position:"top",showConfirmButton:true});</script>';
    }

     else if (strlen($newpasssword)<5){

         echo '<script>Swal.fire({type:"warning", title:"Warning", text:"Please Use A Strong Password",position:"top",showConfirmButton:true});</script>';
    }

    else{

        if ($oldpasswordX != $_SESSION['passkey']){

            echo '<script>Swal.fire({type:"error", title:"Invalid", text:"Incorrect Old Password",position:"top",showConfirmButton:true});</script>';
        }

        else{


            $hpassword=md5($newpasssword);

            $update=mysqli_query($db, "UPDATE admin SET password='".$hpassword."' WHERE username='".$_SESSION['userid']."'");

            if ($update){

                 echo '<script>Swal.fire({type:"success", title:"Password Updated", text:"password updated right now",position:"top",showConfirmButton:true});</script>';
            }

            else{

                 echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"ERror Updating Record",position:"top",showConfirmButton:true});</script>';
            }
        }
    }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Change Password</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Old Password <span style="color:red">*</span></label>
                                    <input type="password" class="form-control" name="oldpassword" id="oldpassword" required="required">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">New Password<span style="color:red">*</span></label>
                                    <input type="password" class="form-control"  name="newpasssword" id="newpasssword" required="required">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password <span style="color:red">*</span></label>
                                 <input type="text" class="form-control"  name="cpassword" id="cpassword" required="required">
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">CHANGE PASSWORD</button>
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
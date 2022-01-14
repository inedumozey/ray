
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

if (isset($_POST['disable'])){


    $update=mysqli_query($db, "UPDATE users SET cart='1'");

     if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Buying Disabled", text:"settings updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Disabling", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }
}


if (isset($_POST['enable'])){


    $update=mysqli_query($db, "UPDATE users SET cart='0'");

     if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Buying Enabled", text:"settings updated successfully",position:"top",showConfirmButton:true});</script>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Enabling", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }
}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Suspend Carting</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 

                                
                                <button type="submit" name="disable" class="btn btn-danger btn-block">DISABLE BUYING</button>
                                <br>
                                <br>
                                <button type="submit" name="enable" class="btn btn-success btn-block">ENABLE BUYING</button>
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
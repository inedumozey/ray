
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

    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    $trx=rand(10000, 50000).time();

    $usertype=$_POST['usertype'];
    $userid=trim($_POST['userid']);
    $activate_amount=$_POST['activate_amount'];

       $selusers=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$userid."' OR email='".$userid."'");
  $count=mysqli_num_rows($selusers);

  if ($count < 1){

      echo '<script>Swal.fire({type:"error", title:"No Record", text:"no users find with this account",position:"top",showConfirmButton:true});</script>';
  }

  else{

  $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email,emailR FROM users WHERE emailR='".$userid."' OR email='".$userid."'"));
  
     $foldbal = $cbal[0];
     $fusername=$rows[1];
     $femail=$rows[2];

     if ($activate_amount > $foldbal){

         echo '<script>Swal.fire({type:"error", title:"Insufficient Fund", text:"users wallet is low to activate this package",position:"top",showConfirmButton:true});</script>';
     }

     else{

        $newbal=$foldbal-$activate_amount;
        mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."', ceov='".$usertype."', activate='1' WHERE emailR='".$userid."' OR email='".$userid."'");

         $descr="Activation of ".$usertype." is Successful";

         mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$femail."','".$fusername."', '".$activate_amount."', '".$descr."', 'Successful', '".$time."', 'WEB', '".$trx."', '".$foldbal."','".$newbal."')");

         echo '<script>Swal.fire({type:"success", title:"Account Activated", text:"user account activated successfully",position:"top",showConfirmButton:true});</script>';
     }

  }

}


?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Upgrade/Downgrade Account</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email Address/Username <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="userid" id="userid" required="required" autocomplete="off">
                                </div>

                                 <div class="form-group">
                                  <label for="exampleInputEmail1">Activate Amount <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" name="activate_amount" id="activate_amount" required="required" autocomplete="off" min="0">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Select Level <span style="color:red">*</span></label>
                                    <select id="usertype" class="form-control" name="usertype" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="topuser">Upgrade To Topuser Account </option>
                                      
                                      <option value="earner">Downgrade To Earner Account </option>

                                        
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-success btn-block">UPDATE SETTINGS</button>
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

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

$success="";

if (isset($_POST['submit'])){

    $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    $tr=rand(100, 900);
    $trx=rand(10000, 50000).$tr."DB";

    $userid=trim($_POST['userid']);
    $amounttoremove=$_POST['amounttoremove'];
    $narration=$_POST['narration'];

    $selusers=mysqli_query($db, "SELECT * FROM users WHERE emailR='".$userid."' OR email='".$userid."'");
  $count=mysqli_num_rows($selusers);

  if ($count < 1){

      echo '<script>Swal.fire({type:"error", title:"No Record", text:"no users find with this account",position:"top",showConfirmButton:true});</script>';
  }

  else{

     $cbal = mysqli_fetch_array(mysqli_query($db, "SELECT us_wallets,email,emailR FROM users WHERE emailR='".$userid."' OR email='".$userid."'"));
     $foldbal = $cbal[0];
     $fusername=$cbal[1];
     $femail=$cbal[2];

     $newbal=$foldbal-$amounttoremove;
     $update=mysqli_query($db, "UPDATE users SET us_wallets='".$newbal."' WHERE emailR='".$userid."' OR email='".$userid."'");

      $descr=$narration." of ".$amounttoremove." is Successful";

      mysqli_query($db,"INSERT INTO `mytransaction` (`id`, `email`,`username`, `amount`, `descr`, `status`, `date`, `active`, `trx`,`oldbal`,`newbal`) VALUES (NULL, '".$femail."','".$fusername."', '".$amounttoremove."', '".$descr."', 'Debit', '".$time."', 'WEB', '".$trx."', '".$foldbal."','".$newbal."')");

    if ($update){

      
        echo '<script>Swal.fire({type:"success", title:"Account Debited", text:"account debited successfully",position:"top",showConfirmButton:true});</script>';
        
      $success='<div class="alert alert-success">Debited of ₦'.$amounttoremove.', New Balance is ₦'.$newbal.'</div>';

    }
    else {

    echo '<script>Swal.fire({type:"error", title:"Error Debiting", text:"error debiting user",position:"top",showConfirmButton:true});</script>';
    }
  }
}

?>


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Debit User Account</h6>
                    <hr>
                    <?php echo $success; ?>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email Address/Username <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="userid" id="userid" required="required" autocomplete="off">
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Amount To Debited <span style="color:red">*</span></label>
                                    <input type="number" class="form-control"  name="amounttoremove" id="amounttoremove" required="required" min="0" autocomplete="off">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Narration Of Chargeback <span style="color:red">*</span></label>
                                    <select id="narration" class="form-control" name="narration">
                                        <option selected="" value="">---Select---</option>

                                      <option value="Wallet Deduction"> Wallet Deduction </option>

                                        
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-danger btn-block">DEBIT ACCOUNT</button>
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
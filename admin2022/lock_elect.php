
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

    $abuja=$_POST['abuja'];
    $eko=$_POST['eko'];
    $ikeja=$_POST['ikeja'];
    $ibadan=$_POST['ibadan'];
    $jos=$_POST['jos'];
    $kaduna=$_POST['kaduna'];
    $kano=$_POST['kano'];
    $portharcourt=$_POST['portharcourt'];

    $update=mysqli_query($db, "UPDATE locker SET AEDC='".$abuja."',IBEDC='".$ibadan."',EKEDC='".$eko."',IKEDC='".$ikeja."',PHED='".$portharcourt."',JED='".$jos."',KAEDCO='".$kaduna."',KEDCO='".$kano."' WHERE id='1'");
  if ($update){

    
        echo '<script>Swal.fire({type:"success", title:"Change Updated", text:"settings updated right now",position:"top",showConfirmButton:true});</script>';

    }

    else{

     echo '<script>Swal.fire({type:"error", title:"Error Updating", text:"error updating settings",position:"top",showConfirmButton:true});</script>';
    }

}


?>

    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Bills Services</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ABUJA ELECTRIC<span style="color:red">*</span></label>
                                    <select id="abuja" class="form-control" name="abuja" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">EKO ELECTRIC<span style="color:red">*</span></label>
                                    <select id="eko" class="form-control" name="eko" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                        <div class="form-group">
                                    <label for="exampleInputPassword1">IBADAN ELECTRIC<span style="color:red">*</span></label>
                                    <select id="ibadan" class="form-control" name="ibadan" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">IKEJA ELECTRIC<span style="color:red">*</span></label>
                                    <select id="ikeja" class="form-control" name="ikeja" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">JOS ELECTRIC<span style="color:red">*</span></label>
                                    <select id="jos" class="form-control" name="jos" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">KADUNA ELECTRIC<span style="color:red">*</span></label>
                                    <select id="kaduna" class="form-control" name="kaduna" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">KANO ELECTRIC<span style="color:red">*</span></label>
                                    <select id="kano" class="form-control" name="kano" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
                                    </select>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">PORTHARCOURT ELECTRIC<span style="color:red">*</span></label>
                                    <select id="portharcourt" class="form-control" name="portharcourt" required="required">
                                        <option selected="" value="">---Select---</option>

                                      <option value="ON"> ENABLE</option>
                                      <option value="OFF">DISABLE</option>
   
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
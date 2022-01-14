
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


    <div class="row">
        <div class="col-sm-7">
            <div class="card">
             
             
                <div class="card-body">
                    <h6 class="font-weight-bold">Bank Information</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="sendrequest" id ="sendrequest" method="POST"> 
            
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Bank Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="webmail" id="webmail" required>
                                </div>
                                
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Account Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control"  name="amounttofund" id="amounttofund" required min="0">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Account Number <span style="color:red">*</span></label>
                                 <input type="text" class="form-control"  name="amounttofund" id="amounttofund" required min="0">
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-block">ADD BANK</button>
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
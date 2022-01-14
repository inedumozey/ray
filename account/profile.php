

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


		<div class="main-panel ">
				
<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>
<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<div style="padding:90px 15px 20px 15px" >

 <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">USERS PROFILE <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    <br>
    <p>

    Dear <?php echo $first_name; ?>! Your Account privacy is important to us, as this might be need by our technical team for assistant when needed. Keep Safe.
    	
    </p>
   
   <form method="POST" id="data-profile">


      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
                Full Name<span class="asteriskField"></span>
            </label>
   
                <div class="">
                    <input type="text" name="fullname" value="<?php echo $first_name.'-'.$last_name; ?>" class="textinput textInput form-control" readonly="readonly" required id="email">
                </div>  
    </div>

    <br>


      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
                Email Address<span class="asteriskField"></span>
            </label>
   
                <div class="">
                    <input type="text" name="email" value="<?php echo $email; ?>" class="textinput textInput form-control" readonly="readonly" required id="email">
                </div>  
    </div>

    <br>


    <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
                Username<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="username" value="<?php echo $username; ?>" class="textinput textInput form-control" readonly="readonly" required id="username">
                </div>  
    </div>

    <br>



  <div id="amountID" class="form-group">
        
            <label for="amountID" class=" requiredField">
                Mobile Number<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="mobile" value="<?php echo $mobile; ?>" readonly="readonly" class="textinput textInput form-control" required id="mobile">
                </div>  
    </div>

    <br>


  <div id="amountID" class="form-group">
        
            <label for="amountID" class=" requiredField">
                Wallet Balance<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="mallu" value="₦<?php echo number_format($mallu,2); ?>" readonly="readonly" class="textinput textInput form-control" required id="mallu">
                </div>  
    </div>

    <br>


    <button class="btn" disabled="disabled" style="background-color: <?php echo $theme_color; ?>"> UPDATE PROFILE </button>


</form>
<br>
<br>

<br>
<br>
<br>


    </div>
                

                <div class="col-sm-4 ">
 

            </div>



    </div>
</div>


                  <br>
                <br>
                <br>
                <br> 

                  <br>
                <br>
                <br>
                <br> 
</div>
</div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>






<?php require("footer.php"); ?>
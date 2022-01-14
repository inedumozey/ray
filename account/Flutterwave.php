

 <?php require("header.php"); ?>


<?php
    require("locker.php");

    if ($PAYSTACK=="OFF"){

      $pay= '';
      
    }

    else {

      $pay='<button type="submit" onClick="makePayment()"  class="btn" id="paybtn" style="background-image: linear-gradient(-20deg, orange 0%, orange 100%);margin-bottom:15px;"">  Make Payment Now </span> </button>';
    }
    

    ?>


		<?php require("menu.php"); ?>



		<div class="main-panel ">
				
<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .process{
        display: none;
      }

      #name{
        display: none;
      }

      #process, #process2{
        display: none;
    }

     /*--thank you pop starts here--*/
     .thank-you-pop{
      width:100%;
       padding:20px;
      text-align:center;
    }
    .thank-you-pop img{
      width:76px;
      height:auto;
      margin:0 auto;
      display:block;
      margin-bottom:25px;
    }
    
    .thank-you-pop h1{
      font-size: 42px;
        margin-bottom: 25px;
      color:#5C5C5C;
    }
    .thank-you-pop p{
      font-size: 20px;
        margin-bottom: 27px;
       color:#5C5C5C;
    }
    .thank-you-pop h3.cupon-pop{
      font-size: 25px;
        margin-bottom: 40px;
      color:#222;
      display:inline-block;
      text-align:center;
      padding:10px 20px;
      border:2px dashed #222;
      clear:both;
      font-weight:normal;
    }
    .thank-you-pop h3.cupon-pop span{
      color:#03A9F4;
    }
    .thank-you-pop a{
      display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }
    .thank-you-pop a i{
      margin-right:5px;
      color:#fff;
    }
    #ignismyModal .modal-header{
        border:0px;
    }
    /*--thank you pop ends here--*/
    #div_id_customer_name{
      display: none;
    }
</style>


<div style="padding:90px 15px 20px 15px" >


   
   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">ATM CARD FUNDING <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>


    <div class="box w3-card-4">

    <br>
    <p>

      If you prefer funding wallet through ATM Cards, here the way for you. Your wallet will be funded after you completed the payment process. 
    	
    </p>
  

      <input type="hidden" name="csrftoken" class="input form-control" required id="csrftoken" value="<?php echo $_SESSION['csrftoken']; ?>" autocomplete="off">


      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
                Email Address<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="textinput textInput form-control" readonly="readonly" required id="email">
                </div>  
    </div>

    <br>



  <div id="amountID" class="form-group">
        
            <label for="amountID" class=" requiredField">
                Amount To Fund<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="number" name="amount" id="amount" maxlength="15" minlength="2" class="textinput textInput form-control" required id="amount" min="100" autocomplete="off">
                </div>  
    </div>

    <br>

 <script src="https://checkout.flutterwave.com/v3.js"></script>
    <?php echo $pay; ?>


<br>
<center>
  <img src="static/dashboard/assets/img/flutterwave.png" width="auto" height="60">
</center>
<br>
<br>
<br>


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

<script>
  function makePayment() {
    var amount=$("#amount").val();
    
   if (amount < 100){
      Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Minimum funding is ₦100', showConfirmButton:!1,timer:2500 });
          return false;
        }
    else {
 
    var charge=amount*2/100;
    var final=parseFloat(charge)+parseFloat(amount);
    FlutterwaveCheckout({
      public_key: "<?php echo $paystack_pk; ?>",
      tx_ref: "<?php echo $_SESSION['csrftoken']; ?>",
      amount: final,
      currency: "NGN",
      country: "NG",
      payment_options: "card, ussd",
      redirect_url: // specified redirect URL
        "<?php echo $baseurl; ?>/verify_payment.php",
      meta: {
        consumer_id: <?php echo $myid; ?>,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "<?php echo $email; ?>",
        phone_number: "<?php echo $mobile; ?>",
        name: "<?php echo $username; ?>"
      },
      callback: function (data) {
 
      },
      onclose: function() {
        Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Transaction Cancelled', showConfirmButton:!1,timer:2500 });
          return false;
      },
      customizations: {
        title: "<?php echo $sitetitle; ?>",
        description: "Wallet Funding",
        logo: "<?php echo $mainpage; ?>/static/img/favicon.png",
      },
    });
           
    }
  }
              
            </script>

<?php require("footer.php"); ?>
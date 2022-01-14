

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


		<div class="main-panel ">
				

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


       <button class="btn btn-danger btn-block"><h2 class="w3-center" style="text-transform: uppercase;">Withdraw Money From Wallet</h2></button>

    <div class="box w3-card-4">


            <div class="row">

                <div class="col-sm-8">

    
    <br>
    <br>
    <div class="alert alert-danger" id="PayNote" style="font-weight: bold;font-size: 13px;">

      Now on <?php echo $sitetitle; ?>, you can now withdraw money from your wallet to your direct bank account with ease and only flat charges apply.
      <br>
      ₦50 charges apply
    	
    </div>

<br>

<div>

    <div>
      <input type="hidden" name="senderemail" id="senderemail" class="form-control" required="required" autocomplete="off" value="<?php echo $email; ?>">
    </div>

    <div>
      <select name="bank_name" id="bank_name" class="form-control" required="required">
        <option value=""> Please select... </option>
                <option value='ACCESS'>ACCESS BANK NIGERIA</option>
                <option value='ECOBANK'>ECOBANK NIGERIA LIMITED</option>
                <option value='FBN MOBILE'>FBN MOBILE</option>
                <option value='FIDELITY'>FIDELITY BANK PLC</option>
                <option value='FBN'>FIRST BANK PLC</option>
                <option value='FIRSTCITY'>FIRST CITY MONUMENT BANK PLC</option>
                <option value='GTB'>GTBANK PLC</option>
                <option value='HERITAGE'>HERITAGE BANK</option>
                <option value='KEYSTONE'>KEYSTONE BANK PLC</option>
                <option value='PAYCOM'>PAYCOM</option>
                <option value='POLARIS'>POLARIS BANK PLC</option>
                <option value='KUDA'>KUDA MICRO-FINANCE BANK</option>
                <option value='STANBIC'>STANBIC IBTC BANK PLC</option>
                <option value='STERLING'>STERLING BANK PLC</option>
                <option value='UNION'>UNION BANK OF NIGERIA PLC</option>
                <option value='UBA'>UNITED BANK FOR AFRICA PLC</option>
                <option value='UNITY'>UNITY BANK PLC</option>
                <option value='WEMA'>WEMA BANK PLC</option>
                <option value='ZENITH'>ZENITH BANK PLC</option>
                <option value='PROVIDUS'>PROVIDUS BANK</option>
                <option value='JAIZ'>JAIZ BANK</option>   
                </select> 

    </div>

    <br>


    <div>
      <input type="number" name="amount" id="amount" class="form-control" min="100" required="required" autocomplete="off" placeholder="Amount Transfer">
    </div>

    <br>

    <?php

    $tokenFW=uniqid().time();
    $tokenFWZ=hash('sha512', $tokenFW);
    $_SESSION['tokenFWX']=$tokenFWZ;

    ?>

      <div>

      <input type="hidden" name="csrfToken" id="csrfToken" required="required" class="form-control" value="<?php echo $_SESSION['tokenFWX']; ?>">
      <input type="tel" name="account_no" id="account_no" class="form-control" maxlength="10" required="required" autocomplete="off" placeholder="Account Number">
    </div>

    <br>


    
                <div style="display: none;" id="dinfo">
                    <input type="text" name="account_name" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="account_name">
                </div>


        <div style="display: none;" id="pay">
      <button class="btn btn-danger btn-block" id="paybtn">Withdraw Now</button>
    </div>


    <div>
      <button class="btn btn-primary btn-block" id="verify">Verify Account</button>
    </div>
  
</div>

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


  <script>
      
     $("#verify").click(function(){
      var bank_name=$("#bank_name").val();
      var account_no=$("#account_no").val();
      var amount=$("#amount").val();

    if (bank_name=="" || account_no=="" || amount==""){
        
      Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
        return false;
    }

    else  if (amount<200){

  Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'Minimum amount to withdraw is ₦200', showConfirmButton:!1,timer:2500 });
        return false;
    }
    
    else {
      $.LoadingOverlay("show");
      $("#verify").attr("disabled, true");
      $("#verify").html("Wait while verifying...");
      
      $.ajax({
          
           url:"<?php echo $baseurl; ?>/verify_bank.php",
            method:"GET",
            
            data:{

                bank_name:bank_name, account_no:account_no, amount:amount
            },
         
            success:function(data){
                
             $.LoadingOverlay("hide");
                
               if (data==100){
               $("#verify").attr("disabled, false");
               $("#verify").html("Verify Account");
                
                 Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'Invalid Account Number', showConfirmButton:!1,timer:2500 });
        return false;

               }
               else {
              $("#bank_name").prop('disabled',true);
              $("#account_no").prop('disabled',true);
              $("#amount").prop('disabled',true);
              $("#dinfo").show();
              $("#account_name").val(data);
              $("#verify").hide();
              $("#pay").show();
                
               }
            }
      })
    }
     })


    

</script>

<script type="text/javascript">
  
   $("#paybtn").click(function(){

      var bank_name=$("#bank_name").val();
      var account_no=$("#account_no").val();
      var amount=$("#amount").val();
      var account_name=$("#account_name").val();
      var csrfToken=$("#csrfToken").val();

      $.LoadingOverlay("show");
      $.ajax({
          
         url:"<?php echo $baseurl; ?>/WithdrawRequest.php",
         method:"POST",
         data:{
              amount:amount, account_no:account_no, account_name:account_name, bank_name:bank_name, csrfToken:csrfToken
         },
         success:function(response){

          $.LoadingOverlay("hide");

          if (response==200){

             swal({

            title:"Transaction Successful",
            text:"Withdraw Request Successful",
            icon:"success",
          })
         window.location.href="history";
          }
          else{

             swal({

            title:"Withdraw Request",
            text:response+".",
            icon:"error",
          })
             
          }

         }

       })

     })
  
</script>



<?php require("footer.php"); ?>
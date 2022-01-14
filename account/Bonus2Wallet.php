

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>



		<div class="main-panel ">
				
<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>
<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div style="padding:90px 15px 20px 15px" >


 <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">WITHDRAW BONUS <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    <br>
    <p>

      Enjoy what you have worked for, withdraw your Bonus on <?php echo $sitetitle; ?> with N0 charges.
    	
    </p>
  

<br>

 <div class="alert alert-default" id="PayNote" style="font-weight: bold;font-size: 19px;color: red;">

     Earning : <span id="bal3"></span>
      
    </div>

      <script>

                              $(document).ready(function sendRequest(){

                                $.ajax({

                                  url:"loadearning.php",
                                  success:
                                  function(cc){
                                  
                                    $("#bal3").html("&#8358;"+cc);
                                 
                                  setTimeout(function(){

                                    sendRequest();
                                  }, 1000);

                                  }
                                })
                              })

                           
                            </script>

 

      <div id="emailID" class="form-group">
        
            <label for="amountID" class=" requiredField">
               Enter Amount To Withdraw<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="number" name="amount_withdraw" id="amount_withdraw" min="100"  class="textinput textInput form-control" required id="amount_withdraw">
                </div>  
    </div>

    <br>

       <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
              Withdrawal Email Address<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" value="<?php echo $email; ?>" name="email_withdraw" class="textinput textInput form-control" required id="email_withdraw" readonly="readonly">
                </div>  
    </div>

    <br>


    <button class="btn" id="withdraw" style='background-color: <?php echo $theme_color; ?>;margin-bottom:15px;'>  WITHDRAW NOW </span> </button>


<br>


                
</div>
</div>





  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>



<script>
  $("#withdraw").click(function(){

    var email_withdraw=$("#email_withdraw").val();
    var amount_withdraw=$("#amount_withdraw").val();

    if (email_withdraw=="" || amount_withdraw==""){
       Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
        return false;
    }

  else {


   swal({
        title: "Withdraw Request",
        text: "You are about to withdraw ₦" + amount_withdraw + " into your wallet ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
          })
    .then((shallWe) => {
    if (shallWe){
    $.LoadingOverlay("show");

      $.ajax({
        type:"POST",
        url:"<?php echo $baseurl; ?>/payload/verify_withdraw",
        data:{
        email_withdraw:email_withdraw, amount_withdraw:amount_withdraw
      },

     success:function(dataResult){

      $.LoadingOverlay("hide");
         
        if (dataResult==200){

          Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Withdraw Successful', showConfirmButton:!1,timer:1500 });
         }

        else {
         
         Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: ''+dataResult, showConfirmButton:!1,timer:3500 });
       
        }
}
      })


      }
  })

  }
  })
</script>


<?php require("footer.php"); ?>
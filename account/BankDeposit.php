

 <?php require("header.php"); ?>

    <?php require("menu.php"); ?>


    <div class="main-panel ">
        

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<div style="padding:90px 15px 20px 15px" >


   
   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">BANK DEPOSIT (Manual Funding) <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">
    <br/>
      
    <p>

      Make Deposit or Transfer into one of the below BANK ACCOUNT and forward the proof payment on whatsapp, so that our Moderator can confirm your transaction and fund your wallet in no delay.
      
    </p>
  



    <div style="background-color: black; border-radius: 5px 5px; font-weight: bold;color: white;text-transform: uppercase;text-align: center;font-size: 20px;">
    
    <hr>
     Enefola Emmanuel Ojochide
  <hr>

    </div>

    <br>


    <button class="btn btn-info" > FIRST BANK  -  3163536854  </button><br/>
    <button class="btn btn-info" > GT BANK  -  0140585486  </button><br/>

<br>
<br>
<p style="font-weight: bold;color: red;">Please send us a notification through the below form after payment is made. if we verify that no payment is made before using this form below, it might leads to suspension of the owner account. Thanks.</p>
<br>

<div>

    <div>
      <input type="hidden" name="senderemail" id="senderemail" class="form-control" required="required" autocomplete="off" value="<?php echo $email; ?>">
    </div>

    <div>
      <select name="bank" id="bank" class="form-control" required="required">
        <option value="">--Select Bank---</option>
        <option value="firstBank">(First Bank - 3163536854)</option>
         <option value="gtBank">(GT Bank - 0140585486)</option>
      </select>
    </div>

    <br>

    <div>
      <input type="number" name="amount" id="amount" class="form-control" min="100" required="required" autocomplete="off" placeholder="Amount Transfer">
    </div>

    <br>

      <div>
      <input type="text" name="narration" id="narration" class="form-control" maxlength="10" required="required" autocomplete="off" placeholder="Narration">
    </div>

    <br>

    <div>
      <button class="btn" id="sendNotify" style="background-color: <?php echo $theme_color; ?>;">Send Notification</button>
    </div>
    
</div>

<br>
    </div>
                

    </div>
      <br>
                <br>
                <br>
                <br> 
              
</div>


                
</div>
</div>



<script>
  $("#sendNotify").click(function(){

    var senderemail=$("#senderemail").val();
    var bank=$("#bank").val();
    var amount=$("#amount").val();
    var narration=$("#narration").val();

    if (senderemail=="" || bank=="" || amount=="" || narration==""){
       Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
        return false;
    }

  else {


   swal({
        title: "Notification",
        text: "I just sent ₦" + amount + " into "+bank,
        icon: "warning",
        buttons: true,
        dangerMode: true,
          })
    .then((shallWe) => {
    if (shallWe){
    $.LoadingOverlay("show");

      $.ajax({
        type:"POST",
        url:"<?php echo $baseurl; ?>/payload/verify_deposit",
        data:{
        senderemail:senderemail, amount:amount, bank:bank, narration:narration
      },

     success:function(dataResult){

      $.LoadingOverlay("hide");
         
        if (dataResult==200){

          Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Notification Sent Successful', showConfirmButton:!1,timer:1500 });
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
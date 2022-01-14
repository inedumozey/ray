

 <?php require("header.php"); ?>

<?php require("menu.php"); ?>
   
   

    <?php
    require("locker.php");

    if ($AEDC=="OFF" || $ceov=="topuser" && $activate==0){
      $AEDC='';
    }

    else {
      $AEDC='<option value="abuja-electric">ABUJA ELECTRIC</option>';
    }

     if ($IBEDC=="OFF" || $ceov=="topuser" && $activate==0){
      $IBEDC='';
    }

    else {
      $IBEDC='<option value="ibadan-electric">IBADAN ELECTRIC</option>';
    }


     if ($EKEDC=="OFF" || $ceov=="topuser" && $activate==0){
      $EKEDC='';
    }

    else {
      $EKEDC='<option value="eko-electric">EKO ELECTRIC</option>';
    }


     if ($IKEDC=="OFF" || $ceov=="topuser" && $activate==0){
      $IKEDC='';
    }

    else {
      $IKEDC='<option value="ikeja-electric">IKEJA ELECTRIC</option>';
    }

      if ($PHED=="OFF" || $ceov=="topuser" && $activate==0){
      $PHED='';
    }

    else {
      $PHED=' <option value="portharcourt-electric">PORTHARCOURT ELECTRIC</option>';
    }

     if ($JED=="OFF" || $ceov=="topuser" && $activate==0){
      $JED='';
    }

    else {
      $JED=' <option value="jos-electric">JOS ELECTRIC</option>';
    }

    if ($KAEDCO=="OFF" || $ceov=="topuser" && $activate==0){
      $KAEDCO='';
    }

    else {
      $KAEDCO=' <option value="kaduna-electric">KADUNA ELECTRIC</option>';
    }

    if ($KEDCO=="OFF" || $ceov=="topuser" && $activate==0){
      $KEDCO='';
    }

    else {
      $KEDCO='<option value="kano-electric">KANO ELECTRIC</option>';
    }

    ?>


		<div class="main-panel ">

<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div style="padding:90px 15px 20px 15px" >

  
   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">BILLS PAYMENT <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">


    <br>
    <button class="btn  btn-danger btn-block" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
    	
    </button>

    <div id="electPanel">
   
   <button class="btn  btn-danger btn-block">₦<?php echo $elect_charge; ?> charges apply.</button>
    <div id="discotypeID" class="form-group">
        
            <label for="discotypeID" class=" requiredField">
                Disco Type<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <select name="discotype" class="select form-control" required id="discotype">
  <option selected>---------</option>
    <?php echo $AEDC; ?>
    <?php echo $EKEDC; ?>
    <?php echo $IBEDC; ?>
    <?php echo $IKEDC; ?>
    <?php echo $JED; ?>
    <?php echo $KAEDCO; ?>
    <?php echo $KEDCO; ?>
    <?php echo $PHED; ?>

</select>
                    
     </div>
         </div>
    







    
    <div id="metertypeID" class="form-group">
        
            <label for="metertypeID" class=" requiredField">
                Meter Type<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="metertype" class="select form-control" required id="metertype">

  <option selected>---------</option>
  <option value="prepaid">PrePaid Meter</option>
    <option value="postpaid">PostPaid Meter</option>

</select>
     </div>    
    </div>



 <div id="phoneID" class="form-group">
        
            <label for="phoneID" class=" requiredField">
                Mobile No.<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" value="<?php echo $mobile; ?>" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control" required id="phone" autocomplete="off">
                </div>  
    </div>






    
    <div id="meternumID" class="form-group">
        
            <label for="meternumID" class=" requiredField">
                Meter Number<span class="asteriskField">*</span>
            </label>
   
                <div class="">
          <input type="text" name="meternum" maxlength="15" minlength="5" class="textinput textInput form-control" required id="meternum" autocomplete="off">
           <input type="hidden" name="csrftoken" class="numberinput form-control" required id="csrftoken" value="<?php echo $_SESSION['csrftoken']; ?>" autocomplete="off">
                </div>  
    </div>
    




  <div id="amountID" class="form-group">
        
            <label for="amountID" class=" requiredField">
                Amount To Buy<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="number" name="amount" maxlength="15" minlength="2" class="textinput textInput form-control" required id="amount">
                </div>  
    </div>


    


    <div id="meterinfo" class="form-group" style="display: none;">
        
            <label for="dname" class="">
                Meter Information<span class="asteriskField">*</span>
            </label>
    
                <div class="">
                    <input type="text" name="metername" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="metername">
                </div>
           
    </div>
                    
                

                  
                 
        <button type="button"  class="btn process" id="paybtn"  style='color: white;background-color: <?php echo $theme_color; ?>;margin-bottom:15px;display: none;'>  PURCHASE </span> </button>


         <button type="button"  id="verify" class="btn btn-warning" style='margin-bottom:15px;'> VERIFY</button>

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
</div>




<script src="static/js/bills_image_loader.js"></script>
<script>
      
     $("#verify").click(function(){
      var discotype=$("#discotype").val();
      var metertype=$("#metertype").val();
      var meternum=$("#meternum").val();
      var phone=$("#phone").val();
      var amount=$("#amount").val();

      var fnumber=phone.replace(/\s/g, '');

     if (metertype=="" || meternum=="" || discotype=="" || phone=="" || amount==""){

      Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });

        return false;
    }

   else if (fnumber.length<11 || fnumber.length>11){

     Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'Provide a vaild mobile', showConfirmButton:!1,timer:2500 });
        return false;
   }

   else if (amount < 500){

   Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'Minimum you can buy ₦500', showConfirmButton:!1,timer:2500 });
        return false;
   }
   
   
    else {
     $.LoadingOverlay("show");

      $("#verify").attr("disabled, true");
      $("#verify").html("Wait while verifying...");
      
      $.ajax({
          
           url:"<?php echo $baseurl; ?>/payload/verifymeter",
            method:"POST",
            
            data:{

                metertype:metertype, meternum:meternum, discotype:discotype
            },
            success:function(data){
                
             $.LoadingOverlay("hide");
                
               if (data==100){

              $("#verify").attr("disabled, false");
             $("#verify").html("VERIFY");
                
          Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Invalid Meter Number', showConfirmButton:!1,timer:2500 });

               }

               else {

              $("#metertype").prop('disabled',true);
              $("#meternum").prop('disabled',true);
              $("#discotype").prop('disabled',true);
              $("#phone").prop('disabled',true);
              $("#amount").prop('disabled',true);
              $("#meterinfo").show();
                $("#metername").val(data);
                $("#verify").hide();
                $("#paybtn").show();
                
               }
            }
      })
    }
     })
	

</script>


<script>
	
	 $("#paybtn").click(function(){
	       
	      var discotype=$("#discotype").val();
         var metertype=$("#metertype").val();
         var meternum=$("#meternum").val();
         var amount=$("#amount").val();
         var metername=$("#metername").val();
         var phone=$("#phone").val();
         var csrftoken=$("#csrftoken").val();

	        swal({
          title: "Are you sure?",
          text: "You are about to buy ₦" +amount+" "+discotype+"("+metertype+") on "+meternum,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

        	if (willProccess){


     $.LoadingOverlay("show");
	    $.ajax({
	        
	       url:"<?php echo $baseurl; ?>/payload/meterpayment",
	       method:"POST",
	       data:{
	            discotype:discotype, metertype:metertype, meternum:meternum, amount:amount, metername:metername, phone:phone,csrftoken:csrftoken
	       },
	     success:function(respo){
	     $.LoadingOverlay("hide");

	     if (respo==200){

	     	$("#electPanel").hide();

	        Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'Electricity Purchase Successful', showConfirmButton:!1,timer:1500 });

        window.location.href="history";
	     }

	     else {
	     	Swal.fire
         ({ position:'top-end',type:'',title:'Oops', text: ''+respo, showConfirmButton:!1,timer:7500 });
	     }

	 }

	 })
        	}

        })
	 })
</script>

<?php require("footer.php"); ?>
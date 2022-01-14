 <?php require("header.php"); ?>

 <?php require("menu.php"); ?>

    <?php
    include("locker.php");

    if ($MTN_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN</option>';
    }


    if ($GLO_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO</option>';
    }


    if ($AIRTEL_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL</option>';
    }


    if ($MOBILE_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="ETISALAT">9MOBILE</option>';
    }


    ?>

		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div style="padding:90px 15px 20px 15px" >


   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">AIRTIME 2 CASH<span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    	<div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
    	<div id="AirtimePanel">
    
    
    <div id="div_id_network" class="form-group">
            <label for="network" class=" requiredField">
                Network<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="network" class="select form-control" required id="network">
  <option value="" selected>---------</option>

  <?php echo $mtn_opt; ?>
  <?php echo $glo_opt; ?>
  <?php echo $airtel_opt; ?>
  <?php echo $mobile_opt; ?>
</select>
                </div>
    			</div>
 


    
    <div id="div_id_mobile_number" class="form-group">
        
            <label for="id_mobile_number" class=" requiredField">
                Mobile number<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <input type="text" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control" required id="phone">
                    
                </div>
    			</div>



    
    		<div id="div_amount" class="form-group">
            <label for="id_amount" class=" requiredField">
                Amount To Sell<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <input type="number" name="amount" min="100" class="numberinput form-control" required id="amount" autocomplete="off">
                </div>
   				 </div>
   
    

                  	<div id="div_id_amount" class="form-group" style="display: none;">
            <label for="id_amount" class=" requiredField">
                Amount To Be Paid<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <input type="number" name="amount2" min="100" class="numberinput form-control" required readonly="readonly" id="amount2" style="color: red;font-weight: bold;">
                </div>
   				 </div>
   

                    <button type="button" class=" btn"  style='color: white;background-color: <?php echo $theme_color; ?>' id ="btnsubmit"> PROCCED</button>

                

            </div>


<br>
<br>
<br>
<br>
<br>
<script src="static/js/util_image_loader.js"></script>

  <script>
                                  $("#amount").keyup(function(){
                                    var amount=$("#amount").val();
                                    var network=$("#network").val();

                                    if (amount=="" || amount==null){

                                      $("#div_id_amount").hide()
                                     
                                    }
                                    else if (network=="MTN"){

                                      var mc=amount*(<?php echo $m_discount3; ?>)/100;
                                      var fc=amount-mc;
                                     
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="GLO"){

                                      var mc=amount*(<?php echo $g_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="AIRTEL"){

                                      var mc=amount*(<?php echo $a_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }

                                    else if (network=="ETISALAT"){

                                      var mc=amount*(<?php echo $mo_discount3; ?>)/100;
                                      var fc=amount-mc;
                                      
                                      $("#div_id_amount").show()
                                      $("#amount2").val(fc);

                                    }
                                  })
                                </script>

<script>
    $("#btnsubmit").click(function() {
        var network = $("#network").val();
        var amount = $("#amount").val();
        var amount2=$("#amount2").val();
        var phone = $("#phone").val();


        if (network=="" || phone=="" || amount=="" || amount2==""){

        Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });

        	return false;
        }

        if (phone.length < 11 || phone.length > 11){

         Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'phone no. should be at least 11digits', showConfirmButton:!1,timer:2500 });

        	return false;
        }


        if (amount < 1000){

         Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Minimum you can convert ₦1,000', showConfirmButton:!1,timer:2500 });

          return false;
        }

      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to Convert Airtime " + network + " ₦" + amount + " to ₦" + amount2,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

          	if (shallWe){

                window.location.href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>&text=Hello%20Admin!%20i%20want%20to%20convert%20"+network+"%20₦"+amount+"%20to%20cash.";
          	}
          	  
          })
          	

          

    });
</script>


</div>










</div>



		</div>
	</div>


<?php require("footer.php"); ?>
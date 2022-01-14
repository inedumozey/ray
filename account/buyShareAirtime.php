 <?php require("header.php"); ?>

	<?php require("menu.php"); ?>

    <?php
    include("locker.php");

    if ($MTN_SHARE=="OFF" || $ceov=="topuser" && $activate==0){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN - '.$m_discount2.'%</option>';
    }


    if ($GLO_SHARE=="OFF" || $ceov=="topuser" && $activate==0){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO - '.$g_discount2.'%</option>';
    }


    if ($AIRTEL_SHARE=="OFF" || $ceov=="topuser" && $activate==0){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL - '.$a_discount2.'%</option>';
    }


    if ($MOBILE_SHARE=="OFF" || $ceov=="topuser" && $activate==0){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="ETISALAT">ETISALAT - '.$mo_discount2.'%</option>';
    }

    ?>

		<div class="main-panel ">
				
<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>
<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div style="padding:90px 15px 20px 15px" >


      <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">SHARE AIRTIME <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    	<br>
    	<br>

    	 <div class="alert alert-success" id="showAfterPayment" style="background-color: white;border: none;display: none;">
          <br>
          <br>
            <center>
           <a href="<?php echo $baseurl; ?>/buyShareAirtime"> <button class="btn btn-danger">Share Airtime</button></a> 
            <br>
            <br>
            <a href="<?php echo $baseurl; ?>/Home"><button class="btn btn-danger btn-block">Return To Dashboard</button></a>
            <br>
            <br>
            <br>
            <br>
            <br>
            </center>
            </div>



    	<div id="PanelBoard">
   
    <div id="div_id_airtimetype" class="form-group">
            <label for="airtimetype_a" class=" requiredField">
                Airtime Type<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="airtimetype" class="select form-control" required id="airtimetype">
  <option value="" selected>---------</option>

<option value="SHARE">AIRTIME SHARE AND SELL</option>

</select>
                </div>
          </div>
    
    
    <div id="div_id_network" class="form-group">
            <label for="network" class=" requiredField">
               Select Network<span class="asteriskField">*</span>
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
                Amount To Buy<span class="asteriskField">*</span>
            </label>
                <div class="">
         <input type="number" name="amount" min="100" class="numberinput form-control" required id="amount" autocomplete="off">
         <input type="hidden" name="csrftoken" class="numberinput form-control" required id="csrftoken" value="<?php echo $_SESSION['csrftoken']; ?>" autocomplete="off">
                </div>
   				 </div>
   

        <button type="button" class=" btn"  style='color: white;background-color: <?php echo $theme_color; ?>' id ="btnsubmit"> PURCHASE </button>

                
            </div>


<br>
<br>

<script src="static/js/util_image_loader.js"></script>
<script>
    $("#btnsubmit").click(function() {
        var airtimetype= $("#airtimetype").val();
        var network = $("#network").val();
        var amount = $("#amount").val();
        var phone = $("#phone").val();
        var csrftoken=$("#csrftoken").val();

  if (airtimetype=="" || network=="" || phone=="" || amount==""){
        Swal.fire
    ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
          return false;
       }
  if (phone.length < 11 || phone.length > 11){
        Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: 'phone no. should be at least 11digits', showConfirmButton:!1,timer:2500 });
       return false;
      }
 if (amount < 100){
        Swal.fire
     ({ position:'top-end',type:'',title:'Oops', text: 'Minimum recharge is ₦100', showConfirmButton:!1,timer:2500 });
          return false;
    }
      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to buy " + network + " ₦" + amount + " to " + phone,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

          	if (shallWe){

          	$.LoadingOverlay("show");

          	$.ajax({

          	  url:"<?php echo $baseurl; ?>/payload/share",
              method:"POST",
              data:{
                amount:amount, phone:phone, network:network,airtimetype:airtimetype,csrftoken:csrftoken
                 },
                success:function(Rexdata){
                $.LoadingOverlay("hide");

              if (Rexdata != 200){
                Swal.fire
                ({ position:'top-end',type:'',title:'Oops', text: ''+Rexdata, showConfirmButton:!1,timer:3500 });
                }

                else{
                Swal.fire
                ({ position:'top-end',type:'success',title:'Done', text: 'Airtime Purchase Successful', showConfirmButton:!1,timer:2500 });
                $("#PanelBoard").hide();
                $("#showAfterPayment").show();

                }
                }
          	})
          	}
          	  
          })    

    });
</script>


<?php require("footer.php"); ?>
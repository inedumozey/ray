
 <?php require("header.php"); ?>

  <?php require("menu.php"); ?>


     <?php
    include("locker.php");

    if ($MTNDATA_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $mtn_opt='';
    }
    else {
      $mtn_opt='<option value="MTN">MTN SME DATA</option>';
    }

     if ($gifting_lock=="OFF" || $ceov=="topuser" && $activate==0){
      $gift_opt='';
    }
    else {
      $gift_opt='<option value="GIFTING">MTN GIFTING</option>';
    }


    if ($GLODATA_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $glo_opt='';
    }
    else {
      $glo_opt='<option value="GLO">GLO DATA BUNDLE</option>';
    }


    if ($AIRTELDATA_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $airtel_opt='';
    }
    else {
      $airtel_opt='<option value="AIRTEL">AIRTEL DATA BUNDLE</option>';
    }


    if ($MOBILEDATA_LOCK=="OFF" || $ceov=="topuser" && $activate==0){
      $mobile_opt='';
    }
    else {
      $mobile_opt='<option value="9MOBILE">9MOBILE DATA BUNDLE</option>';
    }

    ?>


<div class="main-panel ">

<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script type="text/javascript">

 var countryLists = new Array(4) 
  countryLists["empty"] = ["Select a Country"]; 

 <?php

if ($ceov=="affliate"){

  echo $affliate_price;
}

else if ($ceov=="topuser"){

  echo $topuser_price;
}

else {

  echo $earner_price;
}

?>

 countryLists

 function countryChange(selectObj) { 
 // get the index of the selected option 
 var idx = selectObj.selectedIndex; 
 // get the value of the selected option 
 var which = selectObj.options[idx].value; 
 // use the selected option value to retrieve the list of items from the countryLists array 
 cList = countryLists[which]; 
 // get the country select element via its known id 
 var cSelect = document.getElementById("country"); 
 // remove the current options from the country select 
 var len=cSelect.options.length; 
 while (cSelect.options.length > 0) { 
 cSelect.remove(0); 
 } 
 var newOption; 
 // create new options 
 for (var i=0; i<cList.length; i++) { 
 newOption = document.createElement("option"); 
 newOption.value = cList[i];  // assumes option string and value are the same 
 newOption.text=cList[i]; 
 // add the new option 
 try { 
 cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
 } 
 catch (e) { 
 cSelect.appendChild(newOption); 
 } 
 } 
 } 
//]]>
</script>

<div style="padding:90px 15px 20px 15px" >


   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">DATA BUNDLE <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    	<div class="alert" id="showAfterPayment" style="background-color: white;border: none;display: none;">
              <br>
              <center><h4>Transaction Successful</h4></center>
              <br>
            <center>
           <a href="<?php echo $baseurl; ?>/buyData"> <button class="btn btn-danger">Buy More Data</button></a> 

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
  
    <div id="div_id_network" class="form-group">
            <label for="network" class=" requiredField">
                Select Network<span class="asteriskField">*</span>
            </label>
                <div class="">
      <select name="network" class="select form-control" required id="network" onchange="countryChange(this);">

  <option value="">---------</option>

   <?php echo $mtn_opt; ?>
   <?php echo $gift_opt; ?>
  <?php echo $glo_opt; ?>
  <?php echo $airtel_opt; ?>
  <?php echo $mobile_opt; ?>

</select>
                </div>
    			</div>
 


  <div id="div_id_plan_number" class="form-group">
        
            <label for="id_plan_number" class=" requiredField">
                Select Plan<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select class="select form-control" name="plan" id="country" required>
                
                </select>
                    
                </div>
          </div>




    
    <div id="div_id_phone_number" class="form-group">
        
            <label for="id_phone_number" class=" requiredField">
                Mobile Number<span class="asteriskField">*</span>
            </label>
                <div class="">
         <input type="text" name="phone" maxlength="11" minlength="11" class="form-control" required id="phone">
         <input type="hidden" name="csrftoken" class="numberinput form-control" required id="csrftoken" value="<?php echo $_SESSION['csrftoken']; ?>" autocomplete="off">
                    
                </div>
    			</div>

   

     <button type="button" class="btn btn-dark" style='color: white;background-color: <?php echo $theme_color; ?>' id ="btnsubmit"> PURCHASE </button>
                

            </div>


<br>
<br>
<br>
<br>
<br>
<br>
<script src="static/js/util_image_loader.js"></script>
<script>
    $("#btnsubmit").click(function() {
        var network = $("#network").val();
        var plan = $("#country").val();
        var phone = $("#phone").val();
        var csrftoken=$("#csrftoken").val();

 if (network=="" || phone=="" || plan==""){
      Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
          return false;
        }

 else if (phone.length < 11 || phone.length > 11){
    Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'phone no. should be at least 11digits', showConfirmButton:!1,timer:2500 });
          return false;
        }
    else{
      swal({
            title: "Dear <?php echo $username; ?>",
            text: "You're about to buy " + network + " " + plan + " to " + phone,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((shallWe) => {

            if (shallWe){

            $.LoadingOverlay("show");

            $.ajax({

              url:"<?php echo $baseurl; ?>/payload/datapayment",
              method:"POST",
              data:{
                phone:phone, network:network, plan:plan,csrftoken:csrftoken
                 },
                success:function(Rexdata){
                $.LoadingOverlay("hide");

                if (Rexdata != 200){
                Swal.fire
                ({ position:'top-end',type:'',title:'Oops', text: ''+Rexdata, showConfirmButton:!1,timer:3500 });
                }

                else{
                Swal.fire
                ({ position:'top-end',type:'success',title:'Done', text: 'Data Purchase Successful', showConfirmButton:!1,timer:2500 });
                $("#PanelBoard").hide();
                $("#showAfterPayment").show();

                }

                }

              })

            }
              
          })
            
        }
          

    });
</script>

<?php require("footer.php"); ?>
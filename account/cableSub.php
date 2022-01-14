
 <?php require("header.php"); ?>

<?php require("menu.php"); ?>

   
   <?php
    include("locker.php");

    if ($DSTV=="OFF" || $ceov=="topuser" && $activate==0){

      $dstv_opt='';

    }

    else {

      $dstv_opt='<option value="DSTV">DSTV</option>';
    }

      if ($GOTV=="OFF" || $ceov=="topuser" && $activate==0){

      $gotv_opt='';

    }

    else {

      $gotv_opt='<option value="GOTV">GOTV</option>';
    }

  if ($STARTIMES=="OFF" || $ceov=="topuser" && $activate==0){

      $startimes_opt='';

    }

    else {

      $startimes_opt='<option value="STARTIMES">STARTIMES</option>';
    }



    ?>



		<div class="main-panel ">
				
<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script type="text/javascript">

 var countryLists = new Array(4) 
 countryLists["empty"] = ["Select a Country"]; 
  
 <?php echo $cable_prices; ?>

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
      <span id="" style="font-weight: bold;font-size: 30px;">CABLETV SUB(s) <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    <br>
    <button class="btn  btn-danger btn-block" id="CableNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
    	
    </button>
    <div id="cablePanel">

      <button class="btn  btn-danger btn-block">₦<?php echo $cable_charge; ?> charges apply.</button>
   
    <div id="div_id_cablename" class="form-group">
        
            <label for="id_cablename" class=" requiredField">
                Select Decoder<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <select name="dtype" class="select form-control" required id="dtype"   onchange="countryChange(this)">
  <option value="" selected>---------</option>

                    <?php echo $dstv_opt; ?>
                    <?php echo $gotv_opt; ?>
                    <?php echo $startimes_opt; ?>

</select>
                    
     </div>
         </div>
    







    
    <div id="div_id_cableplan" class="form-group">
        
            <label for="id_cableplan" class=" requiredField">
                Select Package<span class="asteriskField">*</span>
            </label>
                <div class="">
                    <select name="country" class="select form-control" required id="country">

  <option value="" selected>---------</option>

</select>
     </div>    
    </div>





    
    <div id="div_id_smart_card_number" class="form-group">
        
            <label for="dnumber" class=" requiredField">
                Smart Card number / IUC number<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="text" name="dnumber" maxlength="15" minlength="5" class="textinput textInput form-control" required id="dnumber">
                </div>  
    </div>
    


    


    <div id="dinfo" class="form-group" style="display: none;">
        
            <label for="dname" class="">
                Decoder Infomation<span class="asteriskField">*</span>
            </label>
    
                <div class="">
      <input type="text" name="dname" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="dname">
       <input type="hidden" name="csrftoken" class="input form-control" required id="csrftoken" value="<?php echo $_SESSION['csrftoken']; ?>" autocomplete="off">
                </div>
           
    </div>
                  
                 
          <button type="button"  class="btn process" id="paybtn" style='color: white;background-color: <?php echo $theme_color; ?>;margin-bottom:15px;display: none;'>  PURCHASE </span> </button>


     <button type="button"  id="verify" class="btn btn-warning" style='margin-bottom:15px;'><span id ="displaytext">VERIFY </span></button>

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
<br>
                
<br>
<br>
<br>

</div>


                 
</div>
</div>



<script src="static/js/cable_image_loader.js"></script>
<script>
	    
	      $("#verify").click(function(){
	      var dtype=$("#dtype").val();
	      var dnumber=$("#dnumber").val();
	      var country=$("#country").val();

	  if (dtype=="" || dnumber=="" || country==""){  
	 Swal.fire
        ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
        return false;
	  }
	  else {
	    $.LoadingOverlay("show");
	    $("#verify").attr("disabled, true");
	    $("#verify").html("Wait while verifying...");
	    
	    $.ajax({
	        
	          url:"<?php echo $baseurl; ?>/payload/verifyiuc",
            method:"POST",
            data:{

                dtype:dtype, dnumber:dnumber
            },
            success:function(data){
            $.LoadingOverlay("hide");
                
          if (data==100){
          $("#verify").attr("disabled, false");
	    	  $("#verify").html("VERIFY");
                
            Swal.fire
          ({ position:'top-end',type:'',title:'Oops', text: 'Invalid Iuc Number', showConfirmButton:!1,timer:2500 });

               }
               else {
                $("#dtype").prop('disabled',true);
	              $("#dnumber").prop('disabled',true);
	              $("#country").prop('disabled',true);
                $("#dinfo").show();
                $("#dname").val(data);
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
	       
	       var country=$("#country").val();
	       var dtype=$("#dtype").val();
	       var dnumber=$("#dnumber").val();
	       var dname=$("#dname").val();
         var csrftoken=$("#csrftoken").val();

	        swal({
          title: "Are you sure?",
          text: "You are about to subscribe " + dtype + " for "+ dname + " - " + dnumber,
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((willProccess) => {

        	if (willProccess){
          $.LoadingOverlay("show");
	        $.ajax({
	        
	       url:"<?php echo $baseurl; ?>/payload/cablepayment",
	       method:"POST",
	       data:{
	         country:country, dtype:dtype, dnumber:dnumber, dname:dname,csrftoken:csrftoken
	       },
	       success:function(respo){
	     $.LoadingOverlay("hide");

	     if (respo==200){

	     	$("#cablePanel").hide();
	     	$("#CableNote").show();
	     	$("#CableNote").text("Decoder Payment Successful");

	     	 Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'CableTV Purchase Successful', showConfirmButton:!1,timer:1500 });
        
	     }

	     else {

	     	 Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: ''+respo, showConfirmButton:!1,timer:3500 });
	     }

	 }

	 })
        	}

        	 else {
                swal("Payment Cancel");
              }

        })

	   
	   

	 })
</script>




<?php require("footer.php"); ?>
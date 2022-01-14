<?php require("header.php"); ?>

<?php require("menu.php"); ?>

    <?php
    require("locker.php");

    if ($WAEC=="OFF" || $ceov=="topuser" && $activate==0){

      $WAEC_OPT='';
    }

    else {

      $WAEC_OPT='<option value="WAEC">WAEC - ₦'.$waec_price.'</option>';
    }

    if ($NECO=="OFF" || $ceov=="topuser" && $activate==0){

      $NECO_OPT='';
    }

    else {

      $NECO_OPT='<option value="NECO">NECO - ₦'.$neco_price.'</option>';
    }


     if ($NABTEB=="OFF" || $ceov=="topuser" && $activate==0){

      $NABTEB_OPT='';
    }

    else {

      $NABTEB_OPT='<option value="NABTEB">NABTEB - ₦'.$nabteb_price.'</option>';
    }


    ?>



		<div class="main-panel ">
				
<?php $_SESSION['csrftoken']=md5(mt_rand().uniqid()); ?>
<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div style="padding:90px 15px 20px 15px" >


   
   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">SCRATCH CARD <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

    
    <br>
    <br>
    <p>

      Dear <?php echo $first_name; ?>! You can now buy your educational pin on <?php echo $sitetitle; ?>.
    	
    </p>
  

<div class="alert alert-danger" id="ExamNote" style="display: none;text-transform: uppercase;font-weight: bold;"></div>

<div id="ExamLabel">


     <div id="div_id_examname" class="form-group">
        
            <label for="id_examname" class=" requiredField">
                Exam Type<span class="asteriskField">*</span>
            </label>
        
                <div class="">
       <select name="pintype" class="select form-control" required id="pintype">
 
 <option value=""> Please select... </option>
                                                                            
    <?php echo $WAEC_OPT; ?>
    <?php echo $NECO_OPT; ?>
    <?php echo $NABTEB_OPT; ?>


</select>
                    
     </div>
         </div>
    
    <br>

          <div id="div_id_examq" class="form-group">
        
            <label for="id_examq" class=" requiredField">
                Quantity<span class="asteriskField">*</span>
            </label>
        
     <div class="">
     <select name="variation_code" class="select form-control" required id="variation_code">
 
  <option value="">Please select...</option> 
 <option value="">1 piece of result checker</option>


</select>
                    
     </div>
    </div>
    <br>

     <div id="div_id_examN" class="form-group">
        
            <label for="id_examN" class=" requiredField">
                Mobile No.<span class="asteriskField">*</span>
            </label>
        
      <div class="">
     
           <input type="text" name="buyer_number" id="buyer_number" class="form-control" required="required" autocomplete="off" value="<?php echo $mobile; ?>">         
     </div>
         </div>

         <br/>


    <button type="submit" id="proceed"  class="btn" name="proceed" style="background-color: <?php echo $theme_color; ?>">  PURCHASE </span> </button>


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

<script src="static/js/exam_image_loader.js"></script>
<script>
  $("#proceed").click(function(){

    var pintype=$("#pintype").val();
    var buyer_number=$("#buyer_number").val();
    var csrftoken=$("#csrftoken").val();
    if (pintype=="" || buyer_number==""){
     Swal.fire
       ({ position:'top-end',type:'',title:'Oops', text: 'kindly fill all form', showConfirmButton:!1,timer:2500 });
        return false;
    }
  else if (buyer_number.length<11 || buyer_number.length>11){
   Swal.fire
      ({ position:'top-end',type:'',title:'Oops', text: 'Provide a vaild mobile', showConfirmButton:!1,timer:2500 });
        return false;
   }
    else{
   swal({
        title: "Dear <?php echo $username; ?>",
        text: "You're about to buy " + pintype + " exam pin ? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
          })
    .then((shallWe) => {
    if (shallWe){

      $.LoadingOverlay("show");

      $.ajax({
        type:"POST",
        url:"<?php echo $baseurl; ?>/payload/education",
        data:{
        pintype:pintype, buyer_number:buyer_number
      },
     success:function(dataResult){

      $.LoadingOverlay("hide");
         
         if (dataResult==200){

          Swal.fire
        ({ position:'top-end',type:'success',title:'Done', text: 'ExamPin Purchase Successful', showConfirmButton:!1,timer:1500 });
        window.location.href="History";
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
 $("#discotype").change(function () {
    var discotype=$("#discotype").val();
    if (discotype==""){
    $("#img_loader").html("");
    }
    else  if (discotype=="abuja-electric"){
     $("#img_loader").html("<img src='static/historyimages/abuja.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (discotype=="ibadan-electric"){
     $("#img_loader").html("<img src='static/historyimages/ibadan.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
   else  if (discotype=="eko-electric"){
     $("#img_loader").html("<img src='static/historyimages/eko.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
   else  if (discotype=="ikeja-electric"){
     $("#img_loader").html("<img src='static/historyimages/ikeja.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (discotype=="jos-electric"){
     $("#img_loader").html("<img src='static/historyimages/jos.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (discotype=="kaduna-electric"){
     $("#img_loader").html("<img src='static/historyimages/kaduna.png' height='50' width='50' style='border-radius:50px;'>"); 
    }

  else  if (discotype=="kano-electric"){
     $("#img_loader").html("<img src='static/historyimages/kano.png' height='50' width='50' style='border-radius:50px;'>"); 
    }

    else  if (discotype=="portharcourt-electric"){
     $("#img_loader").html("<img src='static/historyimages/portharcourt.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else{

    $("#img_loader").html("");
  }
  })
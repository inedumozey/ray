 $("#network").change(function () {
    var network=$("#network").val();
    if (network==""){
    $("#img_loader").html("");
    }
    else  if (network=="MTN"){
     $("#img_loader").html("<img src='static/historyimages/mtn.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (network=="GIFTING"){
     $("#img_loader").html("<img src='static/historyimages/mtn.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (network=="GLO"){
     $("#img_loader").html("<img src='static/historyimages/glo.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
   else  if (network=="AIRTEL"){
     $("#img_loader").html("<img src='static/historyimages/airtel.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
   else  if (network=="ETISALAT" || network=="9MOBILE"){
     $("#img_loader").html("<img src='static/historyimages/mobile.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else{

    $("#img_loader").html("");
  }
  })
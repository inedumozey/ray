 $("#pintype").change(function () {
    var pintype=$("#pintype").val();
    if (pintype==""){
    $("#img_loader").html("");
    }
    else  if (pintype=="WAEC"){
     $("#img_loader").html("<img src='static/historyimages/waec.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (pintype=="NECO"){
     $("#img_loader").html("<img src='static/historyimages/neco.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
   else  if (pintype=="NABTEB"){
     $("#img_loader").html("<img src='static/historyimages/nabteb.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else{

    $("#img_loader").html("");
  }
  })
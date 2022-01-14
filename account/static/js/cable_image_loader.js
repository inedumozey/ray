 $("#dtype").change(function () {
    var dtype=$("#dtype").val();
    if (dtype==""){
    $("#img_loader").html("");
    }
    else  if (dtype=="DSTV"){
     $("#img_loader").html("<img src='static/historyimages/dstv.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else  if (dtype=="GOTV"){
     $("#img_loader").html("<img src='static/historyimages/gotv.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
   else  if (dtype=="STARTIMES"){
     $("#img_loader").html("<img src='static/historyimages/startimes.png' height='50' width='50' style='border-radius:50px;'>"); 
    }
  else{

    $("#img_loader").html("");
  }
  })
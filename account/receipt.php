<!DOCTYPE html>
<html>
<head>
  <title>Receipt</title>

  <style type="text/css">
    
    .copyL{

      font-family: 'Anonymous Pro', monospace;
      margin-bottom: 30px;
      margin-right: 30px;
    }

    h1{

      font-family: 'Anonymous Pro', monospace;
  
    }
    .hax{

      border: dotted;
    }
  </style>
</head>

<?php 
require("session.php");

$max="";

if (!isset($_GET['refrence']) || $_GET['refrence']==""){

?>

 <script type="text/javascript">window.location.href="Transactions";</script>

<?php
}

else{

  $refrence=$_GET['refrence'];

$ddaa = mysqli_query($db,"SELECT * FROM mytransaction WHERE trx='".$refrence."'");
$count=mysqli_num_rows($ddaa);

if ($count < 1){
  $max="No Transaction History";
}
while ($data = mysqli_fetch_array($ddaa, MYSQLI_ASSOC))
    { 
      
      $status=$data['status'];
      $amount=$data['amount'];
      $trx=$data['trx'];
      $active=$data['active'];
      $descr=$data['descr'];
      $date=$data['date'];
      $newbal=$data['newbal'];
      $oldbal=$data['oldbal'];

      $max='<table class="table table-all">


                     <tr>

                        <td><b>A/Name:</b></td>
                        <td class="copyL"><span style="float:right">'.$first_name.' '.$last_name.'</td>
                    </tr>

                     <tr>

                        <td><b>Bills For:</b></td>
                        <td class="copyL"><span style="float:right">'.$descr.'</span></td>
                    </tr>

                     <tr>

                        <td><b>Status:</b></td>
                        <td class="copyL"><span style="float:right"> '.$status.'</span></td>
                    </tr>

                    <tr>

                        <td><b>Date:</b></td>
                        <td class="copyL"><span style="float:right">'.$date.'</span></td>
                    </tr>


                    <tr>

                        <td><b>Ref No:</b></td>
                        <td class="copyL"><span style="float:right">'.$trx.'</span></td>
                    </tr>

                     <tr>

                        <td><b>Previous Bal:</b></td>
                        <td class="copyL"><span style="float:right">₦'.$oldbal.'</span></td>
                    </tr>

                     <tr>

                        <td><b>Available Bal:</b></td>
                        <td class="copyL"><span style="float:right">₦'.$newbal.'</span></td>
                    </tr>

                     <tr>

                        <td><b>AMOUNT:</b></td>
                        <td class="copyL"> <span style="float:right; font-size:30px;">NGN'.number_format($amount).'</span></td>
                    </tr>


                    </table>

';



}

  
}


?>

<body>
<center>
        
<div style="padding-top:120px;margin-bottom:40px;" id="genRec">

     <div class="alert alert-default">
    
          <h1>CUSTOMER COPY</h1>
          <h1 style="color: steelblue;">Thank you for choosing <?php echo $sitetitle; ?> over others</h1>
          <hr/>
          <h3>REVIEW ORDER OF <?php echo strtoupper($_GET['refrence']); ?></h3>

          <?php echo $max; ?>

<hr class="hax">
<p>From all of us at <?php echo $sitetitle; ?>, we appreciate your everyday patronage. Cheers and enjoy more awesome services.</p>
</div>

        </div>


      <button id="btnPrint" style="height: 30px;">Generate PDF</button>

      <button id="" onclick="window.print()" style="height: 30px;">Print Receipt</button>

      <a href="<?php echo $baseurl; ?>/History"><button  style="height: 30px;">Goto History</button></a>
    <br>
    <br>
    <br>
    <br>
    <br>

</center>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  
  <script type="text/javascript">
       document.getElementById('btnPrint').addEventListener('click',
       Export);

  function Export() {
            html2canvas(document.getElementById('genRec'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("TransactionReceipt.pdf");
                }
            });
        }  </script>



    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

   <?php require("footer.php"); ?>
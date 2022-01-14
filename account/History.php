

 <?php require("header.php"); ?>

	<?php require("menu.php"); ?>


     <?php

        $error=$history="";

        $xxx= mysqli_query($db,"SELECT * FROM mytransaction WHERE email='".$email."' OR username='".$username."' ORDER BY id DESC LIMIT 3000");

        $count=mysqli_num_rows($xxx);

        if ($count<1){

          $history='<button class="btn btn-danger btn-block" style="height:80px;">
              
                         No Transaction Record Yet

                </button>';
        }


  while ($data = mysqli_fetch_array($xxx, MYSQLI_ASSOC)){ 

      $status=$data['status'];
      $amount=$data['amount'];
      $trx=$data['trx'];
      $active=$data['active'];
      $descr=$data['descr'];
      $date=$data['date'];
      $oldbal=$data['oldbal'];
      $newbal=$data['newbal'];

      $faxST=strtolower($status);
      $shortDesrc=substr($descr, 0,25);
      $descr2=strtolower($data['descr']);
      require("imageHistory.php");

      if ($faxST=="successful"){

        $actmode="alert-success";
      }

      else {

        $actmode="alert-danger";

      }

      $history.='<a href="'.$baseurl.'/receipt.php?refrence='.$trx.'" style="color:black;text-decoration:none;"><div class="alert '.$actmode.'" id="Transaction">
                        <div class="table-responsive">
                                        <td><img src="static/historyimages/'.$imageMode.'" alt="Img" style="border-radius:50%; height:50px;"></td>
                                        <td>'.$shortDesrc.'...</td>
                                        <td>'.$date.'</td>
                                        <td><span style="float:right"><i class="fa fa-eye"></i></span></td>
                                        
                                    </div>
                                  </div></a>';
                                }


        ?>


		<div class="main-panel ">
      
<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

    

    <div style="padding:90px 15px 20px 15px" >


   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">TRANSACTIONS</span>
   </div>
   <br>
   


   <?php echo $history; ?>
   

   </div>
   
<br>
<br>

<br>
<br>
<br>


<?php require("footer.php"); ?>
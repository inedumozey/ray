

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


      <?php

        $history="";

        
$ddaa = mysqli_query($db,"SELECT * FROM users WHERE referredby='".$refcode."' ORDER BY ID DESC");

$count=mysqli_num_rows($ddaa);

if ($count <=0){
  $history=' <div class="alert alert-danger" id="error">
              
                         You have not refer anyone here.
                         <br/>
                         Refer people to '.$sitetitle.' and earn ₦500 immediately the person upgrade his/her account to affiliate or topuser 

                      </div>';
}

else{


while ($data = mysqli_fetch_array($ddaa, MYSQLI_ASSOC)){


      $rfirstname=$data['firstname'];
      $rlastname=$data['lastname'];
      $emailR=$data['emailR'];
      $rusername=$data['email'];
      $rceov=$data['ceov'];
      $ractivate=$data['activate'];
      $rmobile=$data['mobile'];


      if ($ractivate==1){

        $actmode="Active User";
        $actmode2="alert-success";
      }

      else{

        $actmode="Yet To Active";
        $actmode2="alert-danger";
      }

      if ($ceov=="reseller"){

        $rrceov="TOPUSER";
      }

      else if ($ceov=="agent"){

        $rrceov="AGENT";
      }

      else{

        $rrceov="ENDUSER";
      }


      $history.=' 
      <div class="alert '.$actmode2.'">
      <div class="table-responsive">
      <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b> Name </b></th>
                                               
                                                 <th><b> Username </b></th>

                                                  <th><b> Phone No. </b></th>
                                               
                                                <th><b> Account </b></th>
                                               
                                                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>'.$rfirstname." ".$rlastname.'</td>
                                        <td>'.$rusername.'</td>
                                        <td>'.$rmobile.'</td>
                                        <td>'.strtoupper($rrceov).'<br/>'.$actmode.'</td\>
                              
                                            </tr>
                                
                                        </tbody>
                                      

                                    </table>
                                    </div>
                                      </div>';


    
}
              
}
  




?>



		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    

    <div style="margin: 15px 15px;">
    <br>
    <br>
    <br>

     <button class="btn btn-danger btn-block"><h2 class="w3-center" style="text-transform: uppercase;">Referral Downline</h2></button>
   


   <?php echo $history; ?>
   

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
              
</div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>






<?php require("footer.php"); ?>
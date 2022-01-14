

 <?php require("header.php"); ?>

		<?php require("menu.php"); ?>


    <?php

$error=$success="";

if (isset($_POST['change'])){

    $password=mysqli_real_escape_string($db, $_POST['password']);
    $cpassword=mysqli_real_escape_string($db, $_POST['cpassword']);
    $oldpassword=mysqli_real_escape_string($db, md5($_POST['oldpassword']));


    if (strlen($password)<5){

        $error='<button class="btn  btn-danger btn-block">
              
                         <strong> Oops!</b></strong> Please use a strong password

                         </button>';
    }

    else {

        if ($password != $cpassword){

            $error='<button class="btn  btn-danger btn-block">
              
                         <strong> Oops!</b></strong> Password not match

                         </button>';
        }
   

    else {

        $ch_oldpass=mysqli_query($db, "SELECT password FROM users WHERE password='".$oldpassword."' AND emailR='".$email."'");

        if (mysqli_num_rows($ch_oldpass)<1){

            $error='<button class="btn  btn-danger btn-block">
              
                         <strong> Oops!</b></strong> Old password incorrect

                         </button>';
        }

        else {

            $mdpass=md5($password);
            $save=mysqli_query($db, "UPDATE users SET password='".$mdpass."' WHERE emailR='".$email."'");

            if ($save){

               $success='<button class="btn  btn-success btn-block">
              
                         <strong> Password Change Successfully !!!</strong>

                         </button>';
            }

            else {

                $error='<button class="btn  btn-danger btn-block">
              
                         <strong> Oops!</b></strong> Unable to change password.

                         </button>';
            }
        }
    }

}
 }

?>


		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div style="padding:90px 15px 20px 15px" >



   <div class="box w3-card-4" style="border-radius: 5px 5px 0px 0px;">
      <span id="" style="font-weight: bold;font-size: 30px;">PASSWORD RESET <span style="float: right;" id="img_loader"></span></span>
   </div>
   <br>

    <div class="box w3-card-4">

<br/>

    <p>

      Dear <?php echo $first_name; ?>! For security purpose, we advice to change password regularly and keep away from friends and families. Your Data's means alot to us at <?php echo $sitetitle; ?>.
  

<br>

<?php echo $error; ?>
<?php echo $success; ?>

   
   <form action="" method="POST" id="data-password">


      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
               Old Password<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="password" name="oldpassword" class="textinput textInput form-control"  required id="oldpassword">
                </div>  
    </div>

    <br>

      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
               New Password<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="password" name="password"  class="textinput textInput form-control" required id="password">
                </div>  
    </div>

    <br>

      <div id="emailID" class="form-group">
        
            <label for="emailID" class=" requiredField">
                Confirm Password<span class="asteriskField">*</span>
            </label>
   
                <div class="">
                    <input type="password" name="cpassword" class="textinput textInput form-control" required id="cpassword">
                </div>  
    </div>

    <br>





    <button type="submit"  class="btn" name="change" style="background-color: <?php echo $theme_color; ?>">  CHANGE PASSWORD </span> </button>


</form>
<br>
<br>


    </div>
                



<?php require("footer.php"); ?>
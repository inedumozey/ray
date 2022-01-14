<?php
if (isset($_GET['email']) &&  $_GET['email'] !=""){
    
    require("session.php");
    
    $email=$_GET['email'];
    
    $check=mysqli_query($db, "SELECT emailR FROM users WHERE emailR='".$email."'");
    
    if (mysqli_num_rows($check)<1){
        
        ?>
        
        
    <script>
        alert("NO EMAIL FOUND IN DATABASE");
        window.location.href="view_users.php";
    </script>
        
        <?php
    }
    
    else{
        
    $activate=mysqli_query($db, "UPDATE users SET reg_active='1' WHERE emailR='".$email."'");
    
    if ($activate===TRUE){
        
          ?>
        
        
    <script>
        alert("ACCOUNT ACITVATED SUCCESSFULLY");
        window.location.href="view_users.php";
    </script>
        
        <?php
    }
    
    else{
      ?>
        
        
    <script>
        alert("UNABLE TO ACTIVATE USERS");
        window.location.href="view_users.php";
    </script>
        
        <?php
    }
    }
}

else{
    
     ?>
        
        
    <script>
        alert("NO PARAMETERS GIVEN");
        window.location.href="view_users.php";
    </script>
        
        <?php
    }

?>
<?php

require('../private/autoload.php');

  session_start();

  if (!isset($_SESSION['userid']) && !isset($_SESSION['sid']) && $_SESSION['fingerprint'] != $_SERVER['SERVER_NAME']){

    session_destroy();
    header('location:index.php');
    exit();

  }

else{
    
    
    $username=$_SESSION['userid'];
    $sid=$_SESSION['sid'];
    
    $sel93=mysqli_query($db, "SELECT * FROM admin WHERE username='$username' AND sid='$sid'");
    
    if (mysqli_num_rows($sel93)<1){
    
    session_destroy();
    header('location:index.php');
    exit();
        
    }
    
    else{
        
        
    }
}
 

?>
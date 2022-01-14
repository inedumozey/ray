
<?php

require("session.php");

$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$lastlogin=$dateTime->format("d-M-y  h:i A"); 
mysqli_query($db, "UPDATE users SET LastLogin='$lastlogin' WHERE emailR='$email'");

session_destroy();
header("location:LoginUser");



?>

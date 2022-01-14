<?php

require("session.php");

$x2=mysqli_query($db, "SELECT us_bonus FROM users WHERE emailR='".$email."'");
$r2=mysqli_fetch_array($x2);

$refbonus=$r2['us_bonus'];

echo number_format($refbonus,2);

?>
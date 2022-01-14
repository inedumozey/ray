<?php

require("session.php");

$x2=mysqli_query($db, "SELECT us_wallets FROM users WHERE emailR='".$email."'");
$r2=mysqli_fetch_array($x2);

$mallu=$r2['us_wallets'];

echo number_format($mallu,2);

?>
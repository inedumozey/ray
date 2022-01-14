<?php

  mysqli_query($db, "UPDATE users SET block='1' WHERE emailR='".$email."'");

  mysqli_query($db, "INSERT INTO `system_suspend` (`id`, `email`, `reason`, `date`) VALUES (NULL, '".$email."', '".$reason."', '".$time."')");
?>
<?php
// set the expiration date to one hour ago
setcookie("userid", "", time() - 3600);
header("Location: index.php"); 
?>
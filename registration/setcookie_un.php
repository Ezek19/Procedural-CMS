<?php
$username = "bp5am";
setcookie('username', $username, time() + 60 * 60 * 24 * 30);
// * sets cookie for 30 days *
header("Location: setcookie_pw.php");
?>

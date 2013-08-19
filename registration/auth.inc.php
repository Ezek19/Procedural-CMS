<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
  //Do Nothing
} else {
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 5; URL=login.php?redirect=$redirect");
  echo "You are being redirected to the login page!<br>";
  echo "(If your browser doesn't support this, " .
       "<a href=\"login.php?redirect=$redirect\">click here</a>)";
  die();
}
?>

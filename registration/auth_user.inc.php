<?php
session_start();
if ((isset($_SESSION['user_logged']) && 
      $_SESSION['user_logged'] != "") || 
    (isset($_SESSION['user_password']) && 
      $_SESSION['user_password'] != "")) {
  //Do Nothing!
} else {
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 5; URL=user_login.php?redirect=$redirect");
  echo "You are currently not logged in, we are redirecting you, " .
       "be patient!<br>";
  echo "(If your browser doesn't support this, " .
       "<a href=\"user_login.php?redirect=$redirect\">click here</a>)";
  die();
}
?>

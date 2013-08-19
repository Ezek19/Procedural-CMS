<?php
if ((isset($_SESSION['admin_logged']) && 
      $_SESSION['admin_logged']) != "" || 
    (isset($_SESSION['admin_password']) && 
      $_SESSION['admin_password'] != "")) {
  //Do Nothing!
} else {
  $redirect = $_SERVER['PHP_SELF'];
  header("Refresh: 5; URL=admin_login.php?redirect=$redirect");
  echo "You are currently not logged in, we are redirecting you, " .
       "be patient!<br>";
  echo "(If your browser doesn't support this, " .
      "<a href=\"admin_login.php?redirect=$redirect\">click here</a>)";
  die();
}
?>

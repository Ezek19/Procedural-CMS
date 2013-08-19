<?php
session_start();
if ((isset($_SESSION['user_logged']) && 
      $_SESSION['user_logged'] != "") || 
    (isset($_SESSION['user_password']) && 
      $_SESSION['user_password'] != "")) {
  include "logged_user.php";
} else {
  include "unlogged_user.php";
}
?>

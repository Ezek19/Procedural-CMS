<?php
session_start();
if ((isset($_SESSION['admin_logged']) && 
      $_SESSION['admin_logged'] != "") || 
    (isset($_SESSION['admin_password']) && 
      $_SESSION['admin_password'] != "")) {
  include "logged_admin.php";
} else {
  include "unlogged_admin.php";
}
?>

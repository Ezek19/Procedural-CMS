<?php session_start(); ?>
<html>
<head>
<title>PHP PROCEDURAL CMS</title>
<link href="../public/css/dashboard.css" rel="stylesheet" type="text/css" />
<script src="../public/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
<div id="pageWrapper">    
<div id="logobar">
  <div id="logoblob">
  <center>
  <p>&nbsp;</p>
  <img src="../public/images/logo.png" width="100px" />
  <p>&nbsp;</p>
  <h1>PHP PROCEDURAL CMS</h1>
  </center>
  </div>
<?php
if (isset($_SESSION['name'])) {
  echo ' <div id="logowelcome">';
  //echo '<center>';
  echo '  Currently logged in as: ' . $_SESSION['name'];
  echo ' </div>';
  echo ' <p></p> '; 
}
?>

</div>

<!--<div id="navright">

  <form method="get" action="../controllers/search.php">
  <p class="head">Search</p>
  <p>
    <input id="searchkeywords" type="text" name="keywords"
<?php
//if (isset($_GET['keywords'])) {
//  echo ' value="' . htmlspecialchars($_GET['keywords']) . '" ';
//}
?>    
    <input id="searchbutton" class="submit" type="submit"
      value="Search ">
  </p>
  </form>
  
</div>-->

<div id="maincolumn">

<div id='navigation'>
<?php
//echo '<a href="index.php">Pages</a>';
if (!isset($_SESSION['user_id'])) {
  
  echo '<center>';     
  echo '<div id="login">';
  echo '<a href="login.php" style="text-decoration:none; color:#fff; font-weight:bold;">ENTER</a>';
  echo '</div>';
  echo '</center>';
  
} else {
  echo '<div class="nav_button">';	
  echo ' <a href="compose.php" style="text-decoration:none; color:#fff; font-weight:bold;">Create</a>';
  echo '</div>';

  if ($_SESSION['access_lvl'] > 1) {
    echo '<div class="nav_button">';
    echo '<a href="pending.php" style="text-decoration:none; color:#fff; font-weight:bold;">Review</a>';
	echo '</div>';
  }

  if ($_SESSION['access_lvl'] > 2) {
    echo '<div class="nav_button">';
    echo '<a href="admin.php" style="text-decoration:none; color:#fff; font-weight:bold;">Admin</a>';
	echo '</div>';
  }
  //echo ' | <a href="cpanel.php">Control Panel</a>';
  echo '<div class="nav_button">';
  echo '<a href="transact-user.php?action=Logout" style="text-decoration:none; color:#fff; font-weight:bold;">Logout</a>';
  echo '</div>';
  echo '<br />';
  //echo '</center>';
}
?>

</div>
<div id='pages'>
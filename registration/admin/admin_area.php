<?php
session_start();
include "auth_admin.php";
include "conn.inc.php";
?>
<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<h1>Admin Area</h1>
<p>
  Below is a list of users and your available administrator 
  privileges.<br><br>
<?php
if (isset($_SESSION['admin_level']) && 
    $_SESSION['admin_level'] != "1") {
  $query = "SELECT first_name, last_name, id FROM user_info " .
           "ORDER BY last_name";
  $result = mysql_query($query) 
    or die(mysql_error());

  while ($row = mysql_fetch_array($result)) {
    echo $row['first_name'] . " " . $row['last_name'];
?>
  &nbsp;&nbsp;<a href="update_user.php?id=<?php 
    echo $row['id']; ?>">Update User</a><br>
<?php
  }
} else {
  $query = "SELECT first_name, last_name, id FROM user_info " .
           "ORDER BY last_name";
  $result = mysql_query($query) 
    or die(mysql_error());

  while ($row = mysql_fetch_array($result)) {
    echo $row['first_name'] . " " . $row['last_name'];
?>
  &nbsp;&nbsp;<a href="update_user.php?id=<?php 
    echo $row['id']; ?>">Update User</a> | 
  <a href="delete_user.php?id=<?php echo $row['id'];?>">Delete User</a><br>
<?php
  }
}
?>

<a href="logout.php">Logout</a>

</body>
</html>

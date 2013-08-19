<?php
session_start();
include "auth_admin.inc.php";
include "conn.inc.php";
if ($_SESSION['admin_level'] == "1") {
  if (isset($_POST['submit']) && $_POST['submit'] == "Yes") {
    $query_delete = "DELETE FROM user_info " .
                    "WHERE id = '" . $_POST['id'] . "'";
    $result_delete = mysql_query($query_delete) 
      or die(mysql_error());

    $_SESSION['user_logged'] = "";
    $_SESSION['user_password'] = "";

    header("Refresh: 5; URL=admin_area.php");
    echo "Account has been deleted! " .
         "You are being sent to the admin area!<br>";
    echo "(If you're browser doesn't support this, " .
         "<a href=\"admin_area.php\">click here</a>)";
    die();
  } else {
?>
<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<h1>Admin Area</h1>
<p>
  Are you sure you want to delete this user's account?<br>
  There is no way to retrieve your account once you confirm!<br>
  <form action="delete_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" name="submit" value="Yes"> &nbsp; 
    <input type="button" value=" No " onclick="history.go(-1);">
  </form>
</p>
</body>
</html>
<?php
  }
} else {
?>
  You don't have a high enough privilege to delete a user.<br>
  <a href="admin_area.php">Click here</a> to go back.
<?php
}
?>

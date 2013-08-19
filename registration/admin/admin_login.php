<?php
session_start();
include "conn.inc.php";

if (isset($_POST['submit'])) {
  $query = "SELECT username, password, admin_level FROM admin " .
           "WHERE username = '" . $_POST['username'] . "' " .
           "AND password = (password('" . $_POST['password'] . "'))";
  $result = mysql_query($query) 
    or die(mysql_error());

  $row = mysql_fetch_array($result);

  if (mysql_num_rows($result) == 1) {
    $_SESSION['admin_logged'] = $_POST['username'];
    $_SESSION['admin_password'] = $_POST['password'];
    $_SESSION['admin_level'] = $row['admin_level'];
    header ("Refresh: 5; URL=" . $_POST['redirect'] . "");
    echo "You are being redirected to your original page request!<br>";
    echo "(If your browser doesn't support this, " .
         "<a href=\"" . $_POST['redirect']. "\">click here</a>)";
  } else {
?>
<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<p>
  Invalid Username and/or Password<br>
  <form action="admin_login.php" method="post">
    <input type="hidden" name="redirect" 
      value="<?php echo $_POST['redirect']; ?>">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="submit" value="Login">
  </form>
</p>
</body>
</html>
<?php
  }
} else {
  if (isset($_GET['redirect'])) {
    $redirect = $_GET['redirect'];
  } else {
    $redirect = "index.php";
  }
?>
<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<p>
  Login below by supplying your username/password...<br>
  <form action="admin_login.php" method="post">
    <input type="hidden" name="redirect" 
      value="<?php echo $redirect; ?>">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="submit" value="Login">
  </form>
</p>
</body>
</html>
<?php
}
?>

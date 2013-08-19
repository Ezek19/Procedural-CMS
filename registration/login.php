<?php
session_start();
$_SESSION['logged'] = 0;

if (isset($_POST['submit'])) {
  if ($_POST['username'] == "wroxbooks" && 
      $_POST['password'] == "aregreat") {
    $_SESSION['logged'] = 1;
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
  Invalid Username and/or Password<br><br>
  <form action="login.php" method="post">
    <input type="hidden" name="redirect"
      value="<?php echo $_POST['redirect']; ?>">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="submit" value="Login">
  </form>
</p>
<?php
  }
} else {
?>
<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<p>
  You must be logged in to view this page<br><br>
<?
if (isset($_GET['redirect'])) {
  $redirect = $_GET['redirect'];
} else {
  $redirect = "index.php";
}
?>
  <form action="login.php" method="post">
    <input type="hidden" name="redirect" 
      value="<?php echo $_GET['redirect']; ?>">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="submit" value="Login">
  </form>
</p>
<?php
}
?>
</body>
</html>

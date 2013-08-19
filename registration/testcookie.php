<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<h1>This is the Test Cookie Page</h1>
<p>
<?php
if ($_COOKIE['username'] == "" || $_COOKIE['password'] == "") {
?>
  No cookie was set.<br>
  <a href="setcookie.php">Click here</a> to set your cookie.
<?php
} else {
?>
  Your cookies were set:<br>
  Username cookie value: <b><?php echo $_COOKIE['username']; ?></b><br>
  Password cookie value: <b><?php echo $_COOKIE['password']; ?></b><br>
<?php
}
?>
</p>
</body>
</html>

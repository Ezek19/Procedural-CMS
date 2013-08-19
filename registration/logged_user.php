<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<h1>Welcome to the home page!</h1>
<p>
  Thank you for logging into our system 
  <b><?php echo $_SESSION['user_logged']; ?></b>.<br>
  You may now <a href="user_personal.php">click here</a>
  to go into your own personal information area, and
  update or remove your information should you wish to do so.
</p>
</body>
</html>

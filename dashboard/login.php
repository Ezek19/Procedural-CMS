<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8" />
<title>PHP PROCEDURAL CMS</title>
<link href="../public/css/screen.css" rel="stylesheet" media="screen,projection" />
<style>
.forms li {
  position: relative;
}
.show-password-link {
  display: block;
  position: absolute;
  z-index: 11;
}
.password-showing {
  position: absolute;
  z-index: 10;
}
</style>
</head>

<body>
  
  <center>
  <p>&nbsp;</p>
  <img src="../public/images/logo.png" width="100px" />
  <p>&nbsp;</p>
  <h2>PHP PROCEDURAL CMS</h2>
  </center>
  
  <form method="post" action="transact-user.php">
    <ol class="forms">
      <li>
        <label for="username">Username</label>
        <input type="text" name="email" id="username" />
      </li>
      <li>
        <label for="password">Password</label>
        <input type="password" name="passwd" id="password" class="password" />
      </li>
      <li class="buttons">
        <button type="submit" class="submit" name="action" Value="Login">Login</button>
      </li>
    </ol>
  </form>
  
  
<script src="../public/js/jquery.js"></script>
<script src="../public/js/jquery.showPassword.js"></script>
<script>
$(document).ready(function() {
  $(':password').showPassword({
    linkRightOffset: 5,
    linkTopOffset: 11
  });
});
</script>
</body>
</html>
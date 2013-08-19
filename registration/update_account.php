<?php
include "auth_user.inc.php";
include "conn.inc.php";
?>
<html>
<head>
<title>Beginning PHP5, Apache and MySQL</title>
</head>
<body>
<h1>Update Account Information</h1>
<p>
  Here you can update your account information for viewing in your
  profile.<br><br>
<?php
if (isset($_POST['submit']) && $_POST['submit'] == "Update") {
  $query_update = "UPDATE user_info SET " .
                  "email = '" . $_POST['email'] . "', " .
                  "city = '" . $_POST['city'] . "', " .
                  "state = '" . $_POST['state'] . "', " .
                  "hobbies = '" . implode(", ",$_POST['hobbies']) . 
                  "' WHERE username = '" . $_SESSION['user_logged'] . 
                  "' AND password = (PASSWORD('" . 
                  $_SESSION['user_password'] . "'))";
  $result_update = mysql_query($query_update) 
    or die(mysql_error());

  $query = "SELECT * FROM user_info " .
           "WHERE username = '" . $_SESSION['user_logged'] . "' " .
           "AND password = (PASSWORD('" . 
           $_SESSION['user_password'] . "'))";
  $result = mysql_query($query) 
    or die(mysql_error());

  $row = mysql_fetch_array($result);
  $hobbies = explode(", ", $row['hobbies'])
?>
  <b>Your account information has been updated.</b><br>
  <a href="user_personal.php">Click here</a> to return to your account.
  <form action="update_account.php" method="post">
    Email: <input type="text" name="email" 
             value="<?php echo $row['email']; ?>"><br>
    City: <input type="text" name="city" 
            value="<?php echo $row['city']; ?>"><br>
    State: <input type="text" name="state" 
            value="<?php echo $row['state']; ?>"><br>
    Hobbies/Interests: (choose at least one)<br>
    <select name="hobbies[]" size="10" multiple>
      <option value="Golfing"<?php 
        if (in_array("Golfing", $hobbies)) {
          echo " selected"; 
        } ?>>Golfing</option>
      <option value="Hunting"<?php 
        if (in_array("Hunting", $hobbies)) {
          echo " selected"; 
        } ?>>Hunting</option>
      <option value="Reading"<?php 
        if (in_array("Reading", $hobbies)) {
          echo " selected"; 
        } ?>>Reading</option>
      <option value="Dancing"<?php 
        if (in_array("Dancing", $hobbies)) {
          echo " selected"; 
        } ?>>Dancing</option>
      <option value="Internet"<?php 
        if (in_array("Internet", $hobbies)) {
          echo " selected"; 
        } ?>>Internet</option>
      <option value="Flying"<?php 
        if (in_array("Flying", $hobbies)) {
          echo " selected"; 
        } ?>>Flying</option>
      <option value="Traveling"<?php 
        if (in_array("Traveling", $hobbies)) {
          echo " selected"; 
        } ?>>Traveling</option>
      <option value="Exercising"<?php 
        if (in_array("Exercising", $hobbies)) {
          echo " selected"; 
        } ?>>Exercising</option>
      <option value="Computers"<?php 
        if (in_array("Computers", $hobbies)) {
          echo " selected"; 
        } ?>>Computers</option>
      <option value="Other Than Listed"<?php 
        if (in_array("Other Than Listed", $hobbies)) {
          echo " selected"; 
        } ?>>Other Than Listed</option>
    </select><br><br>
    <input type="submit" name="submit" value="Update"> &nbsp; 
    <input type="button" value="Cancel" onclick="history.go(-1);">
  </form>
</p>
<?php
} else {
  $query = "SELECT * FROM user_info " .
           "WHERE username = '" . $_SESSION['user_logged']. "' " .
           "AND password = (PASSWORD('" . 
           $_SESSION['user_password'] . "'));";
  $result = mysql_query($query) 
    or die(mysql_error());

  $row = mysql_fetch_array($result);
  $hobbies = explode(", ", $row['hobbies'])
?>
<p>
  <form action="update_account.php" method="post">
    Email: <input type="text" name="email" 
             value="<?php echo $row['email']; ?>"><br>
    City: <input type="text" name="city" 
            value="<?php echo $row['city']; ?>"><br>
    State: <input type="text" name="state" 
            value="<?php echo $row['state']; ?>"><br>
    Hobbies/Interests: (choose at least one)<br>
    <select name="hobbies[]" size="10" multiple>
      <option value="Golfing"<?php 
        if (in_array("Golfing", $hobbies)) {
          echo " selected"; 
        } ?>>Golfing</option>
      <option value="Hunting"<?php 
        if (in_array("Hunting", $hobbies)) {
          echo " selected"; 
        } ?>>Hunting</option>
      <option value="Reading"<?php 
        if (in_array("Reading", $hobbies)) {
          echo " selected"; 
        } ?>>Reading</option>
      <option value="Dancing"<?php 
        if (in_array("Dancing", $hobbies)) {
          echo " selected"; 
        } ?>>Dancing</option>
      <option value="Internet"<?php 
        if (in_array("Internet", $hobbies)) {
          echo " selected"; 
        } ?>>Internet</option>
      <option value="Flying"<?php 
        if (in_array("Flying", $hobbies)) {
          echo " selected"; 
        } ?>>Flying</option>
      <option value="Traveling"<?php 
        if (in_array("Traveling", $hobbies)) {
          echo " selected"; 
        } ?>>Traveling</option>
      <option value="Exercising"<?php 
        if (in_array("Exercising", $hobbies)) {
          echo " selected"; 
        } ?>>Exercising</option>
      <option value="Computers"<?php 
        if (in_array("Computers", $hobbies)) {
          echo " selected"; 
        } ?>>Computers</option>
      <option value="Other Than Listed"<?php 
        if (in_array("Other Than Listed", $hobbies)) {
          echo " selected"; 
        } ?>>Other Than Listed</option>
    </select><br><br>
    <input type="submit" name="submit" value="Update"> &nbsp; 
    <input type="button" value="Cancel" onclick="history.go(-1);">
  </form>
</p>
<?php
}
?>
</body>
</html>

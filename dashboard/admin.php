<?php

require_once '../config/database.php';
require_once 'header.php';

$a_users = array(1 => "Users","Moderators","Admins");

function echoUserList($lvl) {
  global $a_users;
  $sql = "SELECT user_id, name, email FROM cms_users " .
         "WHERE access_lvl = $lvl ORDER BY name";

  $result = mysql_query($sql) 
    or die(mysql_error());

  if (mysql_num_rows($result) == 0) {
    echo "<em>No " . $a_users[$lvl] . " created.</em>";
  } else {
    while ($row = mysql_fetch_array($result)) {
      if ($row['user_id'] == $_SESSION['user_id']) {
        echo htmlspecialchars($row['name']) . "<br>\n";
      } else {
        echo '<a href="useraccount.php?userid=' . $row['user_id'] .
             '" title="' . htmlspecialchars($row['email']) . '">' .
             htmlspecialchars($row['name']) . "</a><br>\n";
      }
    }
  }
}
?>
<h2>User Administration</h2>
<?php
for($i=1; $i<=3; $i++) {
  echo "<h3>". $a_users[$i] . "</h3>\n" .
       "<div class=\"scroller\">\n";
  echoUserList($i);
  echo "\n</div>\n";
}
?>
<br>
<?php require_once 'footer.php'; ?>

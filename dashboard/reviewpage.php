<?php
require_once '../config/database.php';
require_once '../config/outputfunctions2.php';
require_once '../views/layout.phtml';
?>

<form method="post" action="transact-page.php">
<center>
<h2>Page Review</h2>
<?php

$sql = "SELECT ar.*, usr.name, usr.access_lvl " .
       "FROM cms_pages ar INNER JOIN cms_users usr " .
       "ON ar.author_id = usr.user_id " .
       "WHERE page_id=" . $_GET['page'];

$result = mysql_query($sql, $conn)
  or die('Could not retrieve page info; ' . mysql_error());

$row = mysql_fetch_array($result);

if ($row['date_published'] and $row['is_published']) {
  echo '<h4>Published: ' .
       date("l F j, Y H:i", strtotime($row['date_published'])) .
       "</h4>\n";
  echo '<p></p>';	   
}
echo "<p><br>\n";
if ($row['is_published']) {
  $buttonType = "Retract";
} else {
  $buttonType = "Publish";
}

echo "<input type=\"submit\" class=\"submit\" " .
     "name=\"action\" value=\"Edit\"> ";
if (($row['access_lvl'] > 1) or ($_SESSION['access_lvl'] > 1)) {
  echo "<input type=\"submit\" class=\"submit\" " .
       "name=\"action\" value=\"$buttonType\"> ";
}
echo "<input type=\"submit\" class=\"submit\" " .
     "name=\"action\" value=\"Delete\"> ";
	 
?>
</center>

<?php

outputStory($_GET['page']);
	 
?>

<input type="hidden" name="page"
  value="<?php echo $_GET['page'] ?> ">
</p>

</form>


<?php require_once 'footer.php'; ?>

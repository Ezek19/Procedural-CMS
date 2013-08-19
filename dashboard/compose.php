<?php

require_once '../config/database.php';

$title = '';
$body = '';
$page = '';
$authorid = '';
if (isset($_GET['a'])
    and $_GET['a'] == 'edit'
    and isset($_GET['page'])
    and $_GET['page']) {
  $sql = "SELECT title,body,author_id FROM cms_pages " .
         "WHERE page_id=" . $_GET['page'];
  $result = mysql_query($sql, $conn)
    or die('Could not retrieve page data; ' . mysql_error());

  $row = mysql_fetch_array($result);

  $title = $row['title'];
  $body = $row['body'];
  $page = $_GET['page'];
  $authorid = $row['author_id'];
}
require_once 'header.php';
?>

<form method="post" action="transact-page.php">
<script src="../public/scripts/ckeditor/ckeditor.js"></script>
<p>&nbsp;</p>
<h2>Create Page</h2>

<p>
  Title:<br>
  <input type="text" class="title" name="title" maxlength="255"
    value="<?php echo htmlspecialchars($title); ?>">
</p>
<p>
  Body:<br>
  <textarea class="ckeditor" id="editor1" name="body" rows="10" cols="60"><?php
    echo htmlspecialchars($body); ?></textarea>
</p>
<p>
<?php
echo '<input type="hidden" name="page" value="' .
     $page . "\">\n";

if ($_SESSION['access_lvl'] < 2) {
  echo '<input type="hidden" name="authorid" value="' .
       $authorid . "\">\n";
}

if ($page) {
  echo '<input type="submit" class="submit" name="action" ' .
       "value=\"Save Changes\">\n";
} else {
  echo '<input type="submit" class="submit" name="action" ' .
       "value=\"Submit New Page\">\n";
}
?>
</p>
</form>

<?php require_once 'footer.php'; ?>

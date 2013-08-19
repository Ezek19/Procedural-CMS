<?php
require_once '../config/database.php';
//require_once '../controllers/outputfunctions.php';
require_once 'header.php';


$sql = "SELECT page_id FROM cms_pages WHERE is_published=1 " .
       "ORDER BY date_published DESC";

$result = mysql_query($sql, $conn);

if (mysql_num_rows($result) == 0) {
  echo "  <br>\n";
  echo "  There are currently no pages to view.\n";
} else {
  while ($row = mysql_fetch_array($result)) {
    //outputStory($row['page_id'], TRUE);
  }
}

require_once 'footer.php';
?>

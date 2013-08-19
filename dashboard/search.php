<?php
require_once 'database.php';
require_once 'outputfunctions.php';
require_once '../dashboard/header.php';

$result = NULL;
if (isset($_GET['keywords'])) {
  $sql = "SELECT page_id FROM cms_pages " .
         "WHERE MATCH (title,body) " .
         "AGAINST ('" . $_GET['keywords'] . "' IN BOOLEAN MODE) " .
         "ORDER BY MATCH (title,body) " .
         "AGAINST ('" . $_GET['keywords'] . "' IN BOOLEAN MODE) DESC";

  $result = mysql_query($sql, $conn)
    or die('Could not perform search; ' . mysql_error());
}

echo "<h1>Search Results</h1>\n";

if ($result and !mysql_num_rows($result)) {
  echo "<p>No pages found that match the search terms.</p>\n";
} else {
  while ($row = mysql_fetch_array($result)) {
    outputStory($row['page_id'], TRUE);
  }
}

require_once 'footer.php';
?>

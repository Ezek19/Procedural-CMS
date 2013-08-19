<?php
require_once '../config/database.php';
require_once 'header.php';

$a_artTypes = array(
  "Pending" => "submitted",
  "Published" => "published"
);
echo '<br />';
echo '<p></p>';
echo "<h2>Page Availability</h2>\n";
$i = -1;
foreach ($a_artTypes as $k => $v) {
  $i++;
  echo "<h3>" . $k . " Pages</h3>\n";
  echo "<p>\n";
  echo " <div class=\"scroller\">\n";
  

  $sql = "SELECT page_id, title, date_". $v .
         " FROM cms_pages " .
         "WHERE is_published=" . $i .
         " ORDER BY title";

  $result = mysql_query($sql, $conn)
    or die('Could not get list of pending pages; ' . mysql_error());

  if (mysql_num_rows($result) == 0) {
    echo "  <em>No " . $k . " pages available</em>";
  } else {
    while ($row = mysql_fetch_array($result)) {
      echo '  <a href="reviewpage.php?page=' .
           $row['page_id'] . '">' . 
           htmlspecialchars($row['title']) .
           "</a> ($v " . date("F j, Y", strtotime($row['date_'.$v])) .
           ")<br>\n";
		   echo '<p></p>';
    }
  }
   
  echo " </div>\n";
  echo "</p>\n";  
}

require_once 'footer.php';
?>

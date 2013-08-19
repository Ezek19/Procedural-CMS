<?php

function trimBody($theText, $lmt=500, $s_chr="\n", $s_cnt=2) {
  $pos = 0;
  $trimmed = FALSE;
  for ($i = 1; $i <= $s_cnt; $i++) {
    if ($tmp = strpos($theText, $s_chr, $pos+1)) {
      $pos = $tmp;
      $trimmed = TRUE;
    } else {
      $pos = strlen($theText) - 1;
      $trimmed = FALSE;
      break;
    }
  }
  $theText = substr($theText, 0, $pos);

  if (strlen($theText) > $lmt) {
    $theText = substr($theText, 0, $lmt);
    $theText = substr($theText, 0, strrpos($theText,' '));
    $trimmed = TRUE;
  }
  if ($trimmed) $theText .= '...';
  return $theText;
}

function outputStory($page, $only_snippet=FALSE) {
  global $conn;

  if ($page) {
    $sql = "SELECT ar.*, usr.name " .
           "FROM cms_pages ar " .
           "LEFT OUTER JOIN cms_users usr " .
           "ON ar.author_id = usr.user_id " .
           "WHERE ar.page_id = " . $page;
    $result = mysql_query($sql,$conn);

    if ($row = mysql_fetch_array($result)) {
      echo "<h3>" . htmlspecialchars($row['title']) . "</h3>\n";
      echo "<h5><div class=\"byline\">By: " .
           htmlspecialchars($row['name']) .
           "</div>";
      echo "<div class=\"pubdate\">";
      if ($row['is_published'] == 1) {
        echo date("F j, Y",strtotime($row['date_published']));
      } else {
        echo "not yet published";
      }
      echo "</div></h5>\n";
      if ($only_snippet) {
        echo "<p>\n";
        echo (trimBody($row['body']));
        echo "</p>\n";
        echo "<h4><a href=\"viewpage.php?page=" .
             $row['page_id'] . "\">Full Page...</a></h4><br>\n";
      } else {
        echo "<p>\n";
        echo ($row['body']);
        echo "</p>\n";
      }
    }
  }
}

function showComments($page, $showLink=TRUE) {
  global $conn;
  if ($page) {
    $sql = "SELECT is_published " .
           "FROM cms_pages " .
           "WHERE page_id=" . $page;
    $result = mysql_query($sql,$conn)
      or die('Could not look up comments; ' . mysql_error());

    $row = mysql_fetch_array($result);
    $is_published = $row['is_published'];

    $sql = "SELECT co.*, usr.name, usr.email " .
           "FROM cms_comments co " .
           "LEFT OUTER JOIN cms_users usr " .
           "ON co.comment_user = usr.user_id " .
           "WHERE co.page_id=" . $page .
           " ORDER BY co.comment_date DESC";
    $result = mysql_query($sql, $conn)
      or die('Could not look up comments; ' . mysql_error());

    if ($showLink) {
      echo "<h4>" . mysql_num_rows($result) . " Comments";
      if (isset($_SESSION['user_id']) and $is_published) {
        echo " / <a href=\"comment.php?page=" . $_GET['page'] .
             "\">Add one</a>";
      }
      echo "</h4>\n";
    }

    if (mysql_num_rows($result)) {
      echo "<div class=\"scroller\">\n";
      while ($row = mysql_fetch_array($result)) {
        echo "<span class=\"commentName\">" .
             htmlspecialchars($row['name']) .
             "</span><span class=\"commentDate\"> (" .
             date("l F j, Y H:i", strtotime($row['comment_date'])) .
             ")</span>\n";
        echo "<p class=\"commentText\">\n" .
             nl2br(htmlspecialchars($row['comment'])) .
             "\n</p>\n";
      }
      echo "</div>\n";
    }
    echo "<br>\n";
  }
}
?>

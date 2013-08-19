<?php
session_start();
require_once '../config/database.php';
require_once '../controllers/http.php';

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
    case 'Submit New Page':
      if (isset($_POST['title'])
          and isset($_POST['body'])
          and isset($_SESSION['user_id']))
      {
        $sql = "INSERT INTO cms_pages " .
               "(title,body, author_id, date_submitted) " .
               "VALUES ('" . $_POST['title'] . 
               "','" . $_POST['body'] .
               "'," . $_SESSION['user_id'] . ",'" .
               date("Y-m-d H:i:s", time()) . "')";

        mysql_query($sql, $conn)
          or die('Could not submit page; ' . mysql_error());
      }
      redirect('index.php');
      break;

    case 'Edit':
      redirect('compose.php?a=edit&page=' . $_POST['page']);
      break;

    case 'Save Changes':
      if (isset($_POST['title'])
          and isset($_POST['body'])
          and isset($_POST['page']))
      {
        $sql = "UPDATE cms_pages " .
               "SET title='" . $_POST['title'] .
               "', body='" . $_POST['body'] . "', date_submitted='" .
               date("Y-m-d H:i:s", time()) . "' " .
               "WHERE page_id=" . $_POST['page'];
               if (isset($_POST['authorid'])) {
                 $sql .= " AND author_id=" . $_POST['authorid'];
               }

        mysql_query($sql, $conn)
          or die('Could not update page; ' . mysql_error());
      }

      if (isset($_POST['authorid'])) {
        redirect('cpanel.php');
      } else {
        redirect('pending.php');
      }
      break;

    case 'Publish':
      if ($_POST['page']) {
        $sql = "UPDATE cms_pages " .
               "SET is_published=1, date_published='" .
               date("Y-m-d H:i:s",time()) . "' " . 
               "WHERE page_id=" . $_POST['page'];
        mysql_query($sql, $conn)
          or die('Could not publish page; ' . mysql_error());
      }
      redirect('pending.php');
      break;

    case 'Retract':
      if ($_POST['page']) {
        $sql = "UPDATE cms_pages " .
               "SET is_published=0, date_published='' " .
               "WHERE page_id=" . $_POST['page'];
        mysql_query($sql, $conn)
          or die('Could not retract page; ' . mysql_error());
      }
      redirect('pending.php');
      break;

    case 'Delete':
      if ($_POST['page']) {
        $sql = "DELETE FROM cms_pages " .
               "WHERE is_published=0 " . 
               "AND page_id=" . $_POST['page'];
        mysql_query($sql, $conn)
          or die('Could not delete page; ' . mysql_error());
      }
      redirect('pending.php');
      break;

    case 'Submit Comment':
      if (isset($_POST['page'])
          and $_POST['page']
          and isset($_POST['comment'])
          and $_POST['comment'])
      {
        $sql = "INSERT INTO cms_comments " .
               "(article_id,comment_date,comment_user,comment) " .
               "VALUES (" . $_POST['page'] . ",'" .
               date("Y-m-d H:i:s", time()) . 
               "'," . $_SESSION['user_id'] .
               ",'" . $_POST['comment'] . "')";
        mysql_query($sql, $conn)
          or die('Could add comment; ' . mysql_error());
      }
      redirect('viewpage.php?page=' . $_POST['page']);
      break;

    case 'remove':
      if (isset($_GET['page'])
          and isset($_SESSION['user_id']))
      {
        $sql = "DELETE FROM cms_pages " .
               "WHERE page_id=" . $_GET['page'] . 
               " AND author_id=" . $_SESSION['user_id'];
        mysql_query($sql, $conn)
          or die('Could not remove article; ' . mysql_error());
      }
      redirect('cpanel.php');
      break;
  }
} else {
  redirect('index.php');
}
?>

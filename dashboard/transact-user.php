<?php
require_once '../config/database.php';
require_once '../controllers/http.php';

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {
    case 'Login':
      if (isset($_POST['email'])
          and isset($_POST['passwd']))
      {
        $sql = "SELECT user_id, access_lvl,name " .
               "FROM cms_users " .
               "WHERE email='" . $_POST['email'] . "' " .
               "AND passwd='" . $_POST['passwd'] . "'";
        $result = mysql_query($sql, $conn)
          or die('Could not look up user information; ' . 
                 mysql_error());

        if ($row = mysql_fetch_array($result)) {
          session_start();
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['access_lvl'] = $row['access_lvl'];
          $_SESSION['name'] = $row['name'];
        }
      }
      redirect('index.php');
      break;

    case 'Logout':
      session_start();
      session_unset();
      session_destroy();

      redirect('index.php');
      break;

    case 'Create Account':
      if (isset($_POST['name'])
          and isset($_POST['email'])
          and isset($_POST['passwd'])
          and isset($_POST['passwd2'])
          and $_POST['passwd'] == $_POST['passwd2'])
      {
        $sql = "INSERT INTO cms_users (email, name, passwd) " .
               "VALUES ('" . $_POST['email'] . "','" . 
               $_POST['name'] . "','" . $_POST['passwd'] . "')";

        mysql_query($sql, $conn)
          or die('Could not create user account; ' . mysql_error());

        session_start();
        $_SESSION['user_id'] = mysql_insert_id($conn);
        $_SESSION['access_lvl'] = 1;
        $_SESSION['name'] = $_POST['name'];
      }
      redirect('index.php');
      break;

    case 'Modify Account':
      if (isset($_POST['name'])
          and isset($_POST['email'])
          and isset($_POST['accesslvl'])
          and isset($_POST['userid']))
      {
        $sql = "UPDATE cms_users " .
               "SET email='" . $_POST['email'] . 
               "', name='" . $_POST['name'] . 
               "', access_lvl=" . $_POST['accesslvl'] . " " .
               " WHERE user_id=" . $_POST['userid'];

        mysql_query($sql, $conn)
          or die('Could not update user account; ' . mysql_error());
      }
      redirect('admin.php');
      break;

    case 'Send my reminder!':
      if (isset($_POST['email'])) {
        $sql = "SELECT passwd FROM cms_users " .
               "WHERE email='" . $_POST['email'] . "'";

        $result = mysql_query($sql, $conn)
          or die('Could not look up password; ' . mysql_error());

        if (mysql_num_rows($result)) {
          $row = mysql_fetch_array($result);

          $subject = 'Comic site password reminder';
          $body = "Just a reminder, your password for the " .
                  "Comic Book Appreciation site is: " . 
                  $row['passwd'] .
                  "\n\nYou can use this to log in at http://" .
                  $_SERVER['HTTP_HOST'] .
                  dirname($_SERVER['PHP_SELF']) . '/';

          mail($_POST['email'], $subject, $body)
            or die('Could not send reminder email.');
        }
      }
      redirect('login.php');
      break;

    case 'Change my info':
      session_start();

      if (isset($_POST['name'])
          and isset($_POST['email'])
          and isset($_SESSION['user_id']))
      {
        $sql = "UPDATE cms_users " .
               "SET email='" . $_POST['email'] . 
               "', name='" . $_POST['name'] . "' " . 
               "WHERE user_id=" . $_SESSION['user_id'];

        mysql_query($sql, $conn)
          or die('Could not update user account; ' . mysql_error());
      }
      redirect('cpanel.php');
      break;
  }
}
?>

<?php

require_once 'conn.php';
require_once 'outputfunctions.php';
require_once 'header.php';

outputStory($_GET['page']);

?>

<h1>Add a comment</h1>

<form method="post" action="transact-page.php">

<p>
  Comment:<br>
  <textarea id="comment" name="comment" rows="10" cols="60"></textarea>
</p>

<p>
  <input type="submit" class="submit" name="action"
    value="Submit Comment">
  <input type="hidden" name="page"
    value="<?php echo $_GET['page']; ?>">
</p>

</form>

<?php

showComments($_GET['page'], FALSE);

require_once 'footer.php';

?>

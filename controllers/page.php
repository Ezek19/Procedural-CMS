<?php
require_once '../config/database.php';
require_once '../config/outputfunctions2.php';
require_once '../views/layout.phtml';

outputStory($_GET['page']);

require_once 'footer.php';
?>

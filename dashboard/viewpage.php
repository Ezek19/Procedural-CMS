<?php
require_once '../config/database.php';
require_once '../controllers/outputfunctions.php';
require_once 'header.php';


outputStory($_GET['page']);

//showComments($_GET['page'], TRUE);

require_once '../views/footer.php';
?>
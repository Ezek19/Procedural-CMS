<?php
	
	  unset($_SESSION['user_id']);
		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
			unset($_SESSION['HTTP_USER_AGENT']);
		session_unset();
		session_destroy(); 
	  redirect('panel.php');
	  echo 'hello';
	
	  
?>
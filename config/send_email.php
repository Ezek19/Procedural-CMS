<?php

$contact_name = $_POST['name'];

$contact_email = $_POST['email'];

$contact_address = $_POST['address'];

$contact_tel = $_POST['tel'];

$contact_telhp = $_POST['telhp'];

$contact_pax = $_POST['pax'];

	if( $contact_name == true )
	{	
		$sender = $contact_email;
		$receiver = "ezek79@yahoo.com,zahidah@shahidahtravel.com,snh1610@gmail.com,azhar@shahidahtravel.com.my";
		$client_ip = $_SERVER['REMOTE_ADDR'];
		$email_body = "Name: $contact_name \nEmail: $sender \n\nAddress: $contact_address \n\nTel: \n\n$contact_tel \n\nTelhp: \n\n$contact_telhp \n\nNo of Pax: \n\n$contact_pax \n\nIP: $client_ip \n\nHi Tea for Shahidah Travel 30th anniversary provided by http://www.shahidahtravel.com";		
		$extra = "From: $sender\r\n" . "Reply-To: $sender \r\n" . "X-Mailer: PHP/" . phpversion();

		if( mail( $receiver, "Hi Tea for Shahidah Travel 30th anniversary - $contact_subject", $email_body, $extra ) ) 
		{
		require_once("thanks.htm");	
		}
		else
		{
			echo "There was an error!";
		}
	}	
	else
	{
		echo 'Please complete the form!';
	}
	
?>
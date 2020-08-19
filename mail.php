<?php 
	
	$to = "psanchit218@gmail.com";
	$subject = "Sample Check";
	$message = "This is sample check by sanchit";
	$header = "From: Sanchit@gmail.com";
	
	if(mail($to, $subject, $message, $header))
	{
		echo "Mail Send Successfully..!";
	}
	else
	{
		echo "Sorry.. No Response";
	}
		

?>
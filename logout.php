
<?php 
	session_start();
		if(session_destroy())
		{
			$_SESSION['login'] = false;
			echo "<script> window.location.assign('login.php'); </script>";
		}
		
?>
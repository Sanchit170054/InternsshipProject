<?php
session_start();
$id = $_SESSION['to_userID'];
$currentID = $_SESSION['ID'];
include('databseConnection.php');

	$SELECT = "SELECT Email FROM userdata WHERE userID='".$id."'";
	$result = $connect->query($SELECT);
	$r = $result->fetch_assoc();
	$recipent = $r['Email'];

require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Virtual Community');
			$mail->addAddress($recipent);     // Add a recipient

			// $mail->addReplyTo(EMAIL);
			// // print_r($_FILES['file']); exit;
			// for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
			// 	$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			// }
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'A New Notification';
			$mail->Body    = $currentID.' has commented on your post having title '. $_SESSION['postTittle']. '.';
			$mail->AltBody = 'This is the mail  body';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo 'Message has been sent';
				exit();
            }
?>
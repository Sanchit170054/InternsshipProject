
<?php
require 'PHPMailerAutoload.php';
require 'credential.php';
session_start();
$id = $_SESSION['ID'];
$recordId = $_SESSION['recordID'];
$p_tittle = $_GET['postIs'];

include('databseConnection.php');
    
if (isset($_POST['report'])){
    $adminEmail = "sanchit.sd@mmumullana.org";
    $typeOfReport = $_POST['option'];
    $commentReport = $_POST['Comment'];
    $mail = new PHPMailer;
    $mail->isSMTP();                                   
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = PASS;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom(EMAIL, 'Virtual Community: Report from '. $id);
    $mail->addAddress($adminEmail);
    $mail->isHTML(true);
    $mail->Subject = 'Report on Community Post';
    $mail->Body    = $id.' has reported a post which consists of invalid content. POST ID is : '. $recordId .' and POST TITLE is '.$p_tittle.'. The type of Category is '. $typeOfReport.' and the comment made by user is : '. $commentReport . '.';
    $mail->AltBody = 'This is the mail  body';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
		
        echo "<script type='text/javascript'>alert('Your report has been sent to admin..!');</script>";
		echo "<script> window.location.assign('dashboard.php?link=0'); </script>";
				 
        exit();
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Post</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: rgb(69,70,72);">
    <div>
        <div class="header-dark" style="padding-bottom: 0px;"></div>
    </div>
    <div class="login-clean" style="background-color: rgb(69,70,72);color: rgb(48,49,53);">
        <form action="" method="post" style="min-width: 50%;">
		<a class="btn btn-primary" role="button" href="javascript:history.back()"  style="margin-left: 600px; background-color: rgb(48,49,53);"> X </a>
		
		<h1 class="text-center" style="margin-top: -50px; color: rgb(48,49,53);">Report on Post</h1>
			
            <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
           
			<div class="form-group">
				<br>
				<center><select name="option" id="selection" style="margin-top: -100px; width: 50%; color: red; font-size: 22px" ></center>
            
			<optiongroup>
			    <option   value="">Select Category</option>

                <option value="Abusive">Abusive</option>
                <option value="18+">18+</option>
                <option value="Out of Context">Out of Context</option>
                <option value="Other">Other</option>
            </optiongroup>
       </select> <br><br>
       <textarea name="Comment" id="comment" cols="50" rows="10" placeholder="Any comments"></textarea><br><br>
       <input class="btn btn-primary" style="background-color: rgb(48,49,53)" type="submit" name="report" value="Report" />
       
			  </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>

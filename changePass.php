
<?php

	session_start();
    
	include('databseConnection.php');	
	$changedPersoneID = $_SESSION['temporaryID'];
   $changedPersoneName = $_SESSION['temporaryName'];
  	
if(isset($_POST['update'])){
		
   
    $Userpass = $_POST['password'];
    $conFPass = $_POST['confirm'];
	
   
         $SELECT = "UPDATE userdata set password = '$Userpass', confirmPassword = '$conFPass'
		 Where userID = '$changedPersoneID' and userName = '$changedPersoneName'";
         $result = $connect->query($SELECT) or die("Error in query2".$connect->error);
		 
		 if($result)
		 {
			 echo "<script type='text/javascript'>alert('Save changes sucessfully..!');</script>";
			echo "<script> window.location.assign('login.php'); </script>";		
		 }else
		 {
			 echo "<script type='text/javascript'>alert('Encountered some error..!');</script>";
					echo "<script> window.location.assign('ediProfile.php'); </script>";
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
        <form action="" method="post" style="min-width: 50%;" enctype="multipart/form-data">
		<a class="btn btn-primary" role="button" href="login.php"  style="margin-left: 600px; background-color: rgb(48,49,53);"> X </a>
		
		<h1 class="text-center" style="margin-top: -50px; color: rgb(48,49,53);">Change Password</h1>
			
            <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
           
			<div class="form-group">
				
				
				<label > Password </label>
                <input class="form-control" type="text" name="password" placeholder= "password" style="margin-bottom: 16px;" required="">
                
				<label > confirm Password </label>
                <input class="form-control" type="text" name="confirm" placeholder= "confirm password" style="margin-bottom: 16px;" required="">
               
			    				
               <center> <input type="submit" name="update" class="btn btn-primary" style="width: 240px; background-color: rgb(48,49,53);" value="Update"></center>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>

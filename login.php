
<?php
session_start();

include('databseConnection.php');
	
if(isset($_POST['submit'])){
	$_SESSION['login'] = true;
	
   $uID = $_POST['userID'];
    $Userpass = $_POST['pass'];
	$loginAs = $_POST['role'];
    
		
         $SELECT = "select userID, password, userName, role from userdata where userID='".$uID."' and role='".$loginAs."'";
		 $result = $connect->query($SELECT);
		 
		 
		 if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
				if($loginAs == "Admin")
				{
					if($row['userID']==$uID && $row['password']==$Userpass){
						$_SESSION['admin_name'] = $row['userName'];
						
					 echo "<script type='text/javascript'>alert('Hi $row[userName], Welcome to Admin Panel..!');</script>";
						
						$_SESSION['admin_ID'] = $uID;
						echo "<script> window.location.assign('adminUserWindwo.php'); </script>";
						exit();
			 
					} 								
					else {
						echo "<script type='text/javascript'>alert('invalid Credentias...!');</script>";
						echo "<script> window.location.assign('login.php'); </script>";
					  exit();
					}
				}else 
				{
					if($row['userID']==$uID && $row['password']==$Userpass){
						$_SESSION['personName'] = $row['userName'];
						
					 echo "<script type='text/javascript'>alert('Hi $row[userName], Welcome to Community..!');</script>";
						
						$_SESSION['ID'] = $uID;
						echo "<script> window.location.assign('dashboard.php?link=0'); </script>";
						exit();
			 
					} 								
					else {
						echo "<script type='text/javascript'>alert('invalid Credentias...!');</script>";
						echo "<script> window.location.assign('login.php'); </script>";
					  exit();
					}
				}
				
			}
		 }else{
			 echo "<script type='text/javascript'>alert('Please Register your self first..!');</script>";
					
		 }
	
	}
	if(isset($_POST['check']))
		{
			$tempID = $_POST['tempUserID'];
			$_SESSION['temporaryID'] = $tempID;
			$tempName = $_POST['tempUserName'];
			$_SESSION['temporaryName'] = $tempName;

			
			include('databseConnection.php');
			 
			 $SELECT1 = "select userID, userName from userdata where userID='".$tempID."'";
			 
			 $getData = $connect->query($SELECT1);
		 
		 if ($getData->num_rows > 0) {
			// output data of each row
			while($row = $getData->fetch_assoc()) {
				
				
				if($row['userID'] == $tempID && $row['userName'] == $tempName){
					
				 echo "<script type='text/javascript'>alert('Ok Fine, You are a memeber of our community.');</script>";
					echo "<script> window.location.assign('changePass.php'); </script>";
					exit();
		 
				} else {
					echo "<script type='text/javascript'>alert('Sorry..! It seems you are not registered with us.');</script>";
					echo "<script> window.location.assign('login.php'); </script>";
					exit();
				}
			
			}
			
		 }
		 
		}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
   <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	 <link rel="stylesheet" href="style.css">

</head>

<style>

@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .navbar, .row, .col{
    width: 100%;
  }
  
}
</style>
<body>
        <div class="header-dark" style="height: 50px;background-image: url(&quot;assets/img/mountain_bg.jpg&quot;);">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-uppercase" id="navcol-1"><img class="mr-auto" src="assets/img/logo.png" onClick="location.href='index.php'"style="height: 144px;"><span class="ml-auto navbar-text"></span><a class="academy-btn btn-sm" role="button" href="signup.php">Sign Up</a></div>
                </div>
            </nav>
        </div>
   
    <div class="bounce animated" style="margin-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="height: auto;">
                    <div class="row">
                        <div class="col"><i class="fa fa-lock" style="font-size: 150px;margin-left: 210px;color: rgb(39,113,187);"></i></div>
                    </div>
                    <div class="row">
                        <div class="col"><label style="font-size: 42px;color: rgb(44,125,205); margin-left: 30px">Log in to your network</label>
                            <form name="myForm" action="" method="post">
								<div class="row" style="margin-top: 16px;">
								<label style="font-size: 22px;color: rgb(1,8,16);margin-left: 50px;">Login As:&nbsp;
								<select id="role" name="role"  required="" autofocus="" style="background-color: rgb(255,254,254);">
									  <option selected hidden value="" >Select Role</option>
									  <option value="User">User</option>
									  <option value="Admin">Admin</option>
									  
								</select></label></div>
								<div class="row" style="margin-top: 16px;"><label style="font-size: 22px;color: rgb(1,8,16);margin-left: 50px;">User ID:&nbsp;<input class="border rounded form-control-lg" type="text" name = "userID" style="background-color: rgb(255,254,254);margin-left: 18px;" autocomplete="on" required="" minlength="1" maxlength="10"></label></div>
								<div
                                class="row">
                                <div class="col" style="margin-top: 16px;"><label style="font-size: 22px;margin-left: 32px; ">Password:&nbsp;</label><input class="border rounded form-control-lg" type="password" name = "pass" style="background-color: rgb(255,254,254);margin-left: 1px;" autocomplete="on" required=""
                                        minlength="1" >
																
                                    <div class="row" style="margin-top: 30px;">
									
                                        <div class="col" style="padding-left: 218px;">
										 
										 <input class="btn academy-btn btn-sm" type="submit" name="submit" value="Login" style="font-size: 22px; color: white" /></div>

									</div>
									<div class="col" style="padding-left: 150px; margin-top: 20px"><button class="btn btn-grey" type="button" data-target="#MySecondmodal" data-toggle="modal" style="color: royalblue; font-size: 18px; margin-left: 15px;">Forgot Password ?&nbsp;</button></div>
										
                                </div>
								
								
							</form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <section>
                    <div class="row">
                        <div class="col" style="background-color: #0f58b5;"><img class="shadow" src="assets/img/login.png" style="width: 530px;height: 299px;"><label style="font-size: 26px;color: rgb(201,207,220);">Share your knowledge and gain from the best</label>
                            <p style="font-size: 24px;margin-top: 19px;color: rgb(239,243,247);">Our Community is the easiest way to connect with the best people from around your organization and grow your knowledge!<br></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
	
		<!-- .modal -->
	<div class="modal fade" id="MySecondmodal">
		<div class="modal-dialog" >
		
			<div class="modal-content" >
				<div class="modal-header" style="background-color: red;">
					<h4 class="modal-title" ><center>Enquiry</center></h4> 
					<button type="button" class="close" data-dismiss="modal">&times;</button> 
										
				</div> 
				<div class="modal-body">
				<form name="myForm1" action="" method="post">
						<label> Enter your Employee ID: </label>
						<input class="border rounded form-control-lg" type="text" name = "tempUserID" style="background-color: rgb(255,254,254);" required="" minlength="1" autofocus="">
				<br>
				<br>
				
				<label> Enter your User Name: </label>
						<input class="border rounded form-control-lg" type="text" name = "tempUserName" style="background-color: rgb(255,254,254); margin-left: 10px" required="" minlength="1" autofocus="">

				<form>
				</div>   
			<div class="modal-footer">
				<input class="btn btn-default"  type="submit" name="check" value="Done"/>
			</div>
		</div> 

	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
	<script>

	
</script>
</body>

</html>

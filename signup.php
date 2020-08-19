
<?php
session_start();
	$host = "localhost: 3306";
    $dbUsername = "root";
    $dbPassword = "";
	$dbname = "communityDB";

    $connect = new mysqli($host,$dbUsername,$dbPassword, $dbname);
     
if(isset($_POST['submit'])){
   
    $uName = $_POST['userName'];
    $uID = $_POST['userID'];
    $Umail = $_POST['mail'];
    $Phnumber = $_POST['number'];
    $Userpass = $_POST['pass'];
    $conFPass = $_POST['confirmPass'];
    $Udepartment = $_POST['dept'];
    $add = $_POST['user_Add'];
	
 $filetmpName = $_FILES['uploadImage']['tmp_name'];
		$image = $_FILES['uploadImage']['name'];
    
	 $targetDir = "assets/DatabaseImg/";
	 $finalPath = $targetDir.$image;
	 
   move_uploaded_file($filetmpName, $targetDir.$image);
	
       if($connect->connect_error){
            echo "<script type='text/javascript'>alert('Error: Connection is failed..!');</script>";
           
        }
        
		
		
         $SELECT = "SELECT userID From userdata Where userID = ? Limit 1";
        $INSERT = "INSERT Into userdata (userName, userID, Email, phoneNumber, password, confirmPassword, department, address, profilePic) 
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        //Prepare statement
        $stmt = $connect->prepare($SELECT);
        $stmt->bind_param("s", $uID);
        $stmt->execute();
        $stmt->bind_result($uID);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
         $stmt->close();
         $stmt = $connect->prepare($INSERT);
         $stmt->bind_param("sssisssss", $uName, $uID, $Umail, $Phnumber, $Userpass, $conFPass, $Udepartment, $add, $finalPath);
         $stmt->execute();
         echo "<script type='text/javascript'>alert('Registration successfull..!');</script>";

		 echo "<script> window.location.assign('login.php'); </script>";
         } else {
           echo "<script type='text/javascript'>alert('Error: Someone is already registered with this ID');</script>";
          
        }
		
}

if (isset($_POST['loginBtn']))
{
	if($_SESSION['login'])
		{	
			echo "<script type='text/javascript'>alert('it seems you previously logged in our website!');</script>";
			echo "<script> window.location.assign('dashboard.php?link=0'); </script>";	
		}
	echo "<script> window.location.assign('login.php'); </script>";	
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="height: px">
    <div>
        <div class="header-dark" style="height: 140px; background-image: url(&quot;assets/img/mountain_bg.jpg&quot;);">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-uppercase" id="navcol-1"><img class="mr-auto" src="assets/img/logo.png" onClick="location.href='index.php'"style="height: 144px;">
				<form method="POST" action=''>
						<input  class="btn btn-large" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
								  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);border: none; font-size: 22px; color:white;" type="submit" name="loginBtn" value="Login"></input></div>
				</form>
				</div>
            </nav>
        </div>
    </div>

<form method="post" enctype="multipart/form-data">
    <div style="margin-bottom: -6px;margin-top: -20px;background-color: white;"><label  style="font-size: 32px;margin-left: 40%;margin-bottom: 13px;color: black;"><strong>Create an Account</strong><br><br></label>
       
<div class="container">
            <div class="row">
		
                <div class="col-md-6">
				
<form action=""  method="post" enctype="multipart/form-data"> 
     
<div class="row">

                        <div class="col" style="width: 40%;"><label>User Name</label><input class="border rounded shadow" type="text" name="userName"
title="can only contain numbers, letters and underscores!" style="margin-left: 103px;border: none;" required>
</div>
                    </div><br>
                    <div class="row">
                        <div class="col"><label>Employee ID</label><input class="border rounded shadow" type="text" name = "userID" style="margin-left: 91px;border: none;" required></div>
                    </div><br>
                    <div class="row">
                        <div class="col"><label>E-mail ID</label><input class="border rounded shadow" type="email" name = "mail"
title="Must contain '@' with domain name!"  style="margin-left: 117px;border: none;" required></div>
                    </div><br>
                    <div class="row">
                        <div class="col"><label>Mobile Number</label><input class="border rounded shadow" type="text" name = "number"
title="Must be like provided format!" style="margin-left: 69px;border: none;" ></div>
                    </div><br>
                    <div class="row">
                        <div class="col"><label>Password</label><input class="border rounded shadow" type="password" name = "pass" maxlength="14"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" style="margin-left: 115px;border: none" required></div>
                    </div><br>
                    <div class="row">
                        <div class="col"><label>Confirm Password</label><input class="border rounded shadow" type="password" name = "confirmPass" maxlength="14"style="margin-left: 53px;border: none;" required></div>
                    </div><br>
                    <div class="row">
                        <div class="col"><label>Department</label>
                           
                        <select class="border rounded shadow" name="dept" style="margin-left: 88px;margin-top: -37px;margin-bottom: 11px;background-color: white;color: black;border: none;width: 208px;"required>
                            <option selected hidden value="">Select Department</option>
                            <option value="Hotel Management">Hotel Management</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Nursing">Nursing</option>
                            <option value="Dental Science">Dental Science</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="Physiotherapy">Physiotherapy</option>
                            <option value="Medical section">Medical Science</option>
                            <option value="Management">Management</option>
                            <option value="Computer Applications">Computer Applications</option>
                           </select>
                     
                    </div>
                </div><br>

                <div class="row">
                    <div class="col"><label >Address</label><textarea class="border rounded shadow-lg" name="user_Add" style="margin-left: 120px;width: 214px;border: none;height: 82px; "></textarea></div>
                </div><br>
                       </div>
	
            <div class="col-md-6">
			
			<img src="assets/img/fakeImgae" id= "image-field"  style="margin-left: -145px;margin-top: 08px;min-height: 2px;max-height: -22px;width: 200px;height: 254px;">
			
                <section class="border rounded-0 shadow-lg" style="margin-left: 98px; margin-top: -260px; min-height: 1px;height: 403px;width: 460px;background-color: #0f58b5;">
				
<img class="border rounded-circle shadow-lg" src="assets/img/signup.jpg" style="margin-left: 45px;margin-top: 32px;min-height: 2px;max-height: -22px;width: 311px;height: 264px;">
<label style="color: white;font-size: 12x;margin-left: 16px;margin-top: 10px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <em>&nbsp;Join the Virtual Community ! &nbsp;</em></strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
VC is the easiest way people with common interest where they can interact with each other and express their ideas.</label>

</section>
            
			</div>
			
			<label style="margin-left: 10px;"> Profile Pic </label>
	  	  
		  <input type="file" name="uploadImage" id = "file-field" onChange="previewImage(event)"style="margin-left: 110px;"required>
  	
	
	</div>
            <!--<button class="btn btn-primary" type="submit" value="Submit" style="background-color: rgb(30, 169, 69) ; font-size: 22px; border: none; padding-left: 100px; padding-right: 100px;  margin-left: 450px; margin-bottom: 50px">Sign Up</button> -->
          <br> <input type="submit" name="submit" value="Sign Up" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);background-color: rgb(30, 169, 69); color:white; font-size: 22px; border: none; padding-left: 100px; padding-right: 100px;  margin-left: 400px; margin-bottom: 80px" />


        </div>
    </div>
	
    </div>
 
  </form>
 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>

	<script>
	function previewImage(event)
	{
		var reader = new FileReader();
		var output = document.getElementById("image-field");
		output.src = URL.createObjectURL(event.target.files[0]);
	}
	</script>


</script>
</body>

</html>


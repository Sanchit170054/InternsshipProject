
<?php

	session_start();
    include('databseConnection.php');
	
	$PersonUserID = "";
	$employeeID = "";
	$personName = "";
	$personEmail = "";
	$personNumber = "";
	$password = "";
	$confirmPassword = "";
	$department = "";
	$address = "";
	$profilePic = "";
	
        
		$PersonUserID = $_SESSION['ID'];
         $SELECT = "select * from userdata where userID='".$PersonUserID."'";
		 $result = $connect->query($SELECT);
		 
		 if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$employeeID = $row['userID'];	
				$personName = $row['userName'];
				$personEmail = $row['Email'];
				$personNumber = $row['phoneNumber'];
				$password = $row['password'];
				$confirmPassword = $row['confirmPassword'];
				$department = $row['department'];
				$address = $row['address'];
				$profilePic = $row['profilePic'];
				
			}
		 }
		 $_SESSION['imagePath'] = $profilePic;
		 
		$_SESSION['prevDepartment'] = $department;
		 
		 
		      
if(isset($_POST['submit'])){
   
    $uName = $_POST['nameofUser'];
    $uID = $_POST['ID'];
    $Umail = $_POST['email'];
    $Phnumber = $_POST['mobNumber'];
    $Userpass = $_POST['password'];
    $conFPass = $_POST['confirm'];
	$Udepartment = $_POST['dept_category'];
    $add = $_POST['add'];
	
		if($Udepartment == "")
		{
			$Udepartment = $_SESSION['prevDepartment'];
		}
		
		$filetmpName = $_FILES['postImage']['tmp_name'];
		$image = $_FILES['postImage']['name'];
   		 $targetDir = "assets/DatabaseImg/";
		 $finalPath = $targetDir.$image;
		
		if($filetmpName == "" || $image == "")
		{
			$finalPath = $_SESSION['imagePath'];
		}
		move_uploaded_file($filetmpName, $targetDir.$image);
	
       if($connect->connect_error){
            echo "<script type='text/javascript'>alert('Error: Connection is failed..!');</script>";
           
        }
        
		
         $SELECT = "UPDATE userdata set userName = '$uName', Email = '$Umail', phoneNumber = '$Phnumber',
		 password = '$Userpass', confirmPassword = '$conFPass', department = '$Udepartment', 
		 address = '$add', profilePic = '$finalPath' Where userID = '$PersonUserID' ";
         $result = $connect->query($SELECT) or die("Error in query2".$connect->error);
		 
		 if($result)
		 {
			 echo "<script type='text/javascript'>alert('Save changes sucessfully..!');</script>";
					echo "<script> window.location.assign('dashboard.php?link=0'); </script>";
				
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
		<a class="btn btn-primary" role="button" href="dashboard.php?link=0"  style="margin-left: 600px; background-color: rgb(48,49,53);"> X </a>
		
		<h1 class="text-center" style="margin-top: -50px; color: rgb(48,49,53);">Edit Profile</h1>
			
            <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
            
			<label style="color: rgb(48,49,53);font-size: 18px; margin-left: 50px; margin-top: 40px">Profile Pic:&nbsp;</label>
                
			<input type="file" name="postImage" onChange="previewImage(event)" style="width: 250px;">
			<img src="<?php echo $profilePic;?>" id= "image-field"  style="margin-left:445px;margin-top: -138px;min-height: 2px;max-height: -22px;width: 200px;height: 254px;">
			
			<div class="form-group">
				
				<label > Employee ID </label>
                <input class="form-control" type="text" name="ID"  value= "<?php echo $PersonUserID;?>" readonly="readonly" style="margin-bottom: 16px;">
                
				<label > username </label>
                <input class="form-control" type="text" name="nameofUser" value= "<?php echo $personName;?>" style="margin-bottom: 16px;">

				<label > Email </label>
                <input class="form-control" type="text" name="email" value= "<?php echo $personEmail;?>" style="margin-bottom: 16px;">
                
				<label > Mobile Number </label>
                <input class="form-control" type="text" name="mobNumber" value= "<?php echo $personNumber;?>" style="margin-bottom: 16px;">
                
				<label > Password </label>
                <input class="form-control" type="text" name="password" value= "<?php echo $password;?>" style="margin-bottom: 16px;">
                
				<label > confirm Password </label>
                <input class="form-control" type="text" name="confirm" value= "<?php echo $confirmPassword;?>" style="margin-bottom: 16px;">
               
			   <label > Department </label>
           
                <select class="form-control" name="dept_category" style="margin-bottom: 16px;">
                    
                        <option selected hidden value=""><?php echo $department;?></option>
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
				
				<label > Address </label>
                <input class="form-control" type="text" name="add" value= "<?php echo $address;?>" style="margin-bottom: 16px;">
               
			    				
               <center> <input type="submit" name="submit" class="btn btn-primary" style="width: 240px; background-color: rgb(48,49,53);" value="Update"></center>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script>
	function previewImage(event)
	{
		var reader = new FileReader();
		var output = document.getElementById("image-field");
		output.src = URL.createObjectURL(event.target.files[0]);
	}
	</script>
</body>

</html>

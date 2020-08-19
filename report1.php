
<?php

	session_start();
    include('databseConnection.php');
	
	$PersonUserID = "";
	$employeeID = "";
	$personName = "";
	$personEmail = "";
	$personNumber = "";
	$password = "";
	$department = "";
	
        
		$PersonUserID = $_SESSION['admin_ID'];
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
				$department = $row['department'];
				$_SESSION['prevDepartment'] = $department;
			}
		 }
		 
		 
		      
if(isset($_POST['submit'])){
   
    $uName = $_POST['nameofUser'];
    $uID = $_POST['ID'];
    $Umail = $_POST['email'];
    $Phnumber = $_POST['mobNumber'];
    $Userpass = $_POST['password'];
    $Udepartment = $_POST['dept_category'];
    
		if($Udepartment == "")
		{
			$Udepartment = $_SESSION['prevDepartment'];
		}
		
       if($connect->connect_error){
            echo "<script type='text/javascript'>alert('Error: Connection is failed..!');</script>";
           
        }
        		
         $SELECT = "UPDATE userdata set userName = '$uName', Email = '$Umail', phoneNumber = '$Phnumber',
		 password = '$Userpass', department = '$Udepartment' Where userID = '$PersonUserID' ";
         $result = $connect->query($SELECT) or die("Error in query2".$connect->error);
		 
		 if($result)
		 {
			 echo "<script type='text/javascript'>alert('Changes saved sucessfully..!');</script>";
					echo "<script> window.location.assign('adminUserWindwo.php'); </script>";
				
		 }else
		 {
			 echo "<script type='text/javascript'>alert('Encountered some error..!');</script>";
			 echo "<script> window.location.assign('report1.php'); </script>";
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
		<a class="btn btn-primary" role="button" href="adminUserWindwo.php"  style="margin-left: 600px; background-color: rgb(48,49,53);"> X </a>
		
		<h1 class="text-center" style="margin-top: -50px; color: rgb(48,49,53);">Edit Profile</h1>
			
            <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
                
			<div class="form-group">
				
				<label > Employee ID </label>
                <input class="form-control" type="text" name="ID"  value= "<?php echo $PersonUserID;?>" readonly="readonly" style="margin-bottom: 16px;">
                
				 <label > Role </label>
				<input class="form-control" type="text" name="dept_category" value= "<?php echo $department;?>" readonly="readonly" style="margin-bottom: 16px;">
              
				<label > username </label>
                <input class="form-control" type="text" name="nameofUser" value= "<?php echo $personName;?>" style="margin-bottom: 16px;">

				<label > Email </label>
                <input class="form-control" type="text" name="email" value= "<?php echo $personEmail;?>" style="margin-bottom: 16px;">
                
				<label > Mobile Number </label>
                <input class="form-control" type="text" name="mobNumber" value= "<?php echo $personNumber;?>" style="margin-bottom: 16px;">
                
				<label > Password </label>
                <input class="form-control" type="text" name="password" value= "<?php echo $password;?>" style="margin-bottom: 16px;">
                				
               <center> <input type="submit" name="submit" class="btn btn-primary" style="width: 240px; background-color: rgb(48,49,53);" value="Update"></center>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
</body>

</html>

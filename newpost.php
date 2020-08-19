
<?php
session_start();
$userid = $_SESSION['ID']; 
							
include('databseConnection.php');
		
		
   
if(isset($_POST['submit'])){
    $ID = $_SESSION['ID'];
	$nameOfUser = $_SESSION['personName'];
	$post_tittle = $_POST['postTittle'];
	$post_description = $_POST['postDesc'];
	$post_category = $_POST['p_category'];
	
	date_default_timezone_set("Asia/calcutta");
	
	$post_time = date("h:i:sa");
	$post_date = date("Y-m-d");
	

	$post_image = $_FILES['postImage']['tmp_name'];
	$images = $_FILES['postImage']['name'];
	 
	 if($post_image == "")
	 {
		 $finalPath = "";
	 }
	 else
	 {
		  $targetDir = "assets/DatabaseImg/postImages/";
			$finalPath = $targetDir.$images;
	 
		move_uploaded_file($post_image, $targetDir.$images);
	
	 }
	
		$INSERT = "INSERT Into post (userID, tittle, description, category, posttime, postdate, image, username) 
        values(?, ?, ?, ?, ?, ?, ?,?)";
        //Prepare statement
         
         $stmt = $connect->prepare($INSERT);
         $stmt->bind_param("isssssss", $ID, $post_tittle, $post_description, $post_category, $post_time, $post_date, $finalPath, $nameOfUser);
         $stmt->execute();
		 
		 
			echo "<script type='text/javascript'>alert('Post uploaded..!');</script>";  
			echo "<script> window.location.assign('dashboard.php?link=0'); </script>";
		
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
		             <h1 class="text-center" style="margin-top: -10px; color: rgb(48,49,53);">New Post</h1>
			
            <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="postTittle" placeholder="Title" style="margin-bottom: 16px;" minlength="1" required="">
                <textarea class="form-control" name="postDesc" placeholder="Description"
                    style="height: 100px;margin-bottom: 16px;" required="" minlength="1"></textarea>
                <select class="form-control" name="p_category" style="margin-bottom: 16px;" >
                    <optgroup label="Select Category" required="" >
                        <option value="Academics">Academics</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Events">Events</option>
                        <option value="Travel &amp; Visit">Travel &amp; Visit</option>
                        <option value="Health &amp; Fitness">Health &amp; Fitness</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Lost / Found">Lost / Found</option>
                        <option value="Photography">Photography</option>
                        <option value="Current Affairs">Current Affairs</option>
                    </optgroup>
                </select>
                <label style="color: rgb(48,49,53);font-size: 18px;">Attachment (if any):&nbsp;</label>
                <input type="file" name="postImage" style="width: 250px;" >
                <input type="submit" name="submit" class="btn btn-primary"
                    style="width: 240px;background-color: rgb(48,49,53);" value="POST">
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
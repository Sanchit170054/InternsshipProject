
<?php
session_start();
$userid = $_SESSION['ID']; 
		include('databseConnection.php');
	

					include_once "CRUD.php";
					$common = new CRUD();
					 $records = "";
					 
					$link=$_GET['link'];
					
							if ($link == '1'){
								 $categ = 'Academics';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} else if ($link == '2'){
								 $categ = 'Marketing';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} else if ($link == '3'){
								 $categ = 'Events';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} else if ($link == '4'){
								 $categ = 'Travel & Visit';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							}
							 else if ($link == '5'){
								 $categ = 'Health & Fitness';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} else if ($link == '6'){
								 $categ = 'Fashion';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} else if ($link == '7'){
								 $categ = 'Lost / Found';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} else if ($link == '8'){
								 $categ = 'Photography';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							}
							 else if ($link == '9'){
								 $categ = 'Current Affairs';
								 $records = $common->getRecordAsPerCategory($connect, $categ) ;
														
							} 
							else {
								$records = $common->getAllRecords($connect);
							}
						
				
		if(isset($_POST['search']))
		{
			$searchText = $_POST['search'];
			$records = $common->fetchRecordByEmployeeID($connect,$searchText) ;
		
		}	
		
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
		 
		 echo "<script> window.location.assign('dashboard.php?link=0'); </script>";
		
}

        
        
  ?>	

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
@viewport{
	zoom 1.0;
	width: extend-to-zoom;
}
@-ms-viewport{
	width: extend-to-zoom;
	zoom: 1.0;
}
</style>
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>

	
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
   <title>Dashboard</title>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/NavBar-Notifications-Panel-1.css">
    <link rel="stylesheet" href="assets/css/NavBar-Notifications-Panel.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: #F8F8F8">

<style type="text/css">
.card{
     display: inline-block;
     box-shadow: 2px 2px 00px white;
     border-radius: 5px; 
    }
	
.infinitePostCard{
	display: inline-block;
     box-shadow: 2px 2px 04px grey;
     border-radius: 5px; 
    }
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0&appId=2017700925182242&autoLogAppEvents=1"></script>
    <div>
        <div class="header-dark" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);padding-bottom: 0px;  position: left; height: 100px">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" style="font-size: 71px;margin-right: 0px;" href="dashboard.php?link=0">MMVC</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    
					<div
                        class="collapse navbar-collapse" id="navcol-1" style="padding-left: 100px;">
                        <form class="form-inline mr-auto" method="POST" target="_self" style="font-size: 24px;">
                            <div class="form-group" style="margin-top: 10px;"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" placeholder="Search Employee ID" style="font-size: 20px;width: 230px;"></div>
                        </form>
						
						<ul class="nav navbar-nav" style="padding-top: 30px;width: 650px;padding-left: 50px;">
                            <li class="nav-item" role="presentation">
							<a class="nav-link" href="dashboard.php?link=0" style="font-size: 24px;padding-left: 0px;padding-right: 25px;">
							<i class="fa fa-home" style="padding-right: 6px;"></i>Home</a></li>  
						    
							<li class="nav-item" style="font-size: 24px;"><a class="nav-link" aria-expanded="false" href="members.php" style="opacity: 1;padding-left: 0px;">
							<i class="fa fa-users" style="padding-right: 6px;"></i>Members</a>
							
							<li class="nav-item" role="presentation">
		
							<button class="nav-link btn btn-grey" id="myBtn" style="font-size: 24px;padding-left: 0px;padding-right: 25px;">
							
							
							<i class="fa fa-plus-circle" style=" position: right; padding-right: 6px;"></i>New Post</button></li>
							
						
						
							<?php 
							 $SELECT = "select profilePic from userdata where userID='".$userid."'";
							$result = $connect->query($SELECT);
							$row = $result->fetch_assoc();
							
							
                            echo '<li class="nav-item dropdown border rounded-circle" style="background-image: url(&quot;'.$row["profilePic"].'&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;width: 70px;height: 75px;margin-left: -1px;margin-top: -5px;">';
							?>
					
					
							<a class="dropdown-toggle nav-link border rounded-circle" data-toggle="dropdown" aria-expanded="false" href="#" style="width: 75px;height: 75px;opacity: 0;margin-left: -2px;"></a>
                                
								<div class="dropdown-menu dropdown-menu-right" role="menu" style="width: 125px;margin-top: 8px;max-width: 125px;min-width: 125px;">
								<a class="dropdown-item" role="presentation" href="editProfile.php" style="font-size: 19px;line-height: 17px;padding-left: 12px;width: 125px;padding-bottom: 6px;"><i class="fa fa-user" style="padding-right: 6px; margin-top: 10px"></i>Profile   </a>
                                      
								
								<a class="dropdown-item" role="presentation" href="help.php" style="font-size: 19px;line-height: 17px;padding-left: 12px;width: 125px;padding-bottom: 6px;"><i class="fa fa-exclamation-circle" style="padding-right: 6px;"></i>Help</a><a class="dropdown-item"
								<a class="dropdown-item" role="presentation" href="logout.php" style="font-size: 19px;line-height: 20px;padding-left: 12px;width: 125px;"><i class="fa fa-sign-out"  style="padding-right: 6px;"></i>Sign Out</a></div>
                            </li>
                        </ul>
                </div>
        </div>
        </nav>
    </div>
    </div>
	
    <div>
        <div class="row" style="margin-left: 5%">
           
			   <div class="card" style="width: 18%; height: 60%;margin-top: 6%; position: fixed">
			   <label  style="font-size: 26px; margin-left: 7.5%;color: rgb(0,123,255);margin-bottom: 5%;"><strong>Categories</strong></label>
					<a class="nav-link" href="?link=0" style="font-size: 20px;line-height: 15px;padding-left: 15%;margin-top: 2.5%;"><i class="fa fa-bars" style="margin-right: 5px;"></i>All</a>
					<a class="nav-link" href="?link=1" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-book" style="margin-right: 5px;"></i>Academics</a>
					 <a class="nav-link" href="?link=2" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-building" style="margin-right: 5px;"></i>Marketing</a>
					<a class="nav-link" href="?link=3" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-cubes" style="margin-right: 5px;"></i>Events</a>
					<a class="nav-link" href="?link=4" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-car" style="margin-right: 5px;"></i>Travel &amp; Visit</a>
					<a class="nav-link" href="?link=5" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-medkit" style="margin-right: 5px;"></i>Health &amp; Fitness</a>
					<a class="nav-link" href="?link=6" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-magic" style="margin-right: 5px; "></i>Fashion</a>
					<a class="nav-link" href="?link=7" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-eye" style="margin-right: 5px;"></i>Lost / Found</a>
					<a class="nav-link" href="?link=8" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-camera-retro" style="margin-right: 5px;"></i>Photography</a>
					<a class="nav-link" href="?link=9" style="font-size: 20px;line-height: 15px;padding-left: 15%;"><i class="fa fa-bullhorn" style="margin-right: 5px;"></i>Current Affairs</a>
			</div>
			
		   </div>
		   

				              
			   <div class="col-md-6" align="right" style=" margin-left:70%; max-width: 30%; height: 100%;margin-top: 40%; position: fixed">
					<button class="btn btn-default" id="goUpbt" onclick="topFunction()" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);  outline-style: none; border: none;color: white; font-size: 30px;line-height: 15px;"><i class="fa fa-arrow-circle-up"></i></button>
				</div>
			   
			   <div class="card" style="margin-left: 78%;width: 18%; height: 60%;margin-top: 6%; position: fixed">
				<label style="font-size: 26px; margin-left: 13.5%;color: rgb(0,123,255);margin-bottom:7%;"><strong>Latest Updates</strong></label>
				<?php 
				 $SELECT1 = "select * from post ORDER by posttime DESC, postdate DESC
				  limit 6";
			 	 $getUpdates = $connect->query($SELECT1);
				 $count = 0;
				 
				if ($getUpdates->num_rows > 0) {
					while($row = $getUpdates->fetch_object()) {
						$count++;
						$ID_user = $row->userID;
						$personeName = $row->username;
						$postname = $row->tittle;
						$date_user = $row->postdate;
						$time_user = $row->posttime;
						?>
						<div style='position:left; background-color:white; text-align:left'>
						<a href="#" class="btn pull-center" style="text-align:left; margin-left: 15px; color: black"> 
								<?php echo $count.". " .$personeName." posted an update on ".$postname;?> </a>
										  
						</div>
						<?php 				
					}
				}
				
				?>
				</div>
			   
		<div class="col-md-5 col-md-offset-1"  style="margin-left: 28%;">
           
		   <table class="table" style="margin-top: 20px; font-size: 20px">
                    <thead id="thead" style="color: rgb(0,123,255)">
                    <tr>
                        <th><center> POST </center></th>
                    </tr>
                    </thead>
						<tbody>
						
						<?php
							
							if ($records->num_rows>0){
								$sr = 1;
								while ($record = $records->fetch_object()) {
									
									$recordId = $record->id;
									$user = $record->username;
									$personID = $record->userID;
									$p_tittle = $record->tittle;
									$p_description = $record->description;
									$p_cate = $record->category;
									$p_image = $record->image;
									$p_time = $record->posttime;
									$p_date = $record->postdate;	
										
										
										
									?>
									
									<tr>
									<td >
									
									<div class="infinitePostCard" style="width: 600px;">
										<div style='position:center;background-color:white; text-align:center'>
										   
										   <div class="row">
												<div class="col" style="margin-left: 20px">
													
													<?php 
													$SELECT = "select profilePic from userdata where userID='".$personID."'";
													$result = $connect->query($SELECT);
													$row = $result->fetch_assoc();
													
													echo '<img class="nav-item dropdown border rounded-circle"  style="background-image: url(&quot;'.$row["profilePic"].'&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;width: 65px;height: 70px; margin-top: 10px; margin-left:-200px">';
													?>
													
												</div>
												<div class="col">
													<h5 style="text-align:left; margin-left:-210px; margin-top: 10px"> <?php echo $user." posted an update about ".$p_tittle. " in " .$p_cate." section"  ?></h5>
													<p style="font-size: 14px; text-align:left; margin-left:-210px;"> <?php echo "on ".$p_date . " at " .$p_time;?></p> 
											
												</div>
												
											</div>
																	
											<?php 
											if($p_image != "")
											{?>
											<img src="<?php echo $p_image;?>"style="height: 400px; width: 500px"><br>
											<?php
											}
											?>
											<br>
											<p style="text-align:left; margin-left: 50px"> <?php echo $p_description;?></p><br>
											
											
										   <a href="comment.php?recordId=<?php echo $recordId;?>" class="btn pull-center" style="color: white; border:none;background-color: rgb(0, 123, 255); margin-left: 10px" ><i class="fa fa-comment-o" style="padding-right: 6px; color: white;"></i>Comment</a>
										   <a href="report.php?postIs=<?php echo $p_tittle;?>"class="btn btn-danger">Report</a><?php $_SESSION['recordID'] = $recordId; $_SESSION['titlePost'] = $p_tittle; ?>
									   
									   <div class="btn btn-large pull-right" 
									   style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%); "
											  data-href="https://mmvc.000webhostapp.com/index.php" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
									   </div>
									</td>
									</tr>
									<?php
									$sr++;
								}
							}
							?>
							</tbody>
						</table>
        </div>
		</div>
        </div>
		       
               
		
					
        </div>
    </div>
    </div>
	<!-- The Modal -->
<div id="myModal" class="modal" >

  <!-- Modal content -->
  <div class="modal-content" style="height: 80%; width: 50%;">
    <div class="modal-header" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%)">
      <h2>New Post</h2>
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <br><br>
	  <form action="" method="post" enctype="multipart/form-data">
		     <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="postTittle" placeholder="Title" style="margin-bottom: 16px;" minlength="1" required="">
                <textarea class="form-control" name="postDesc" placeholder="Description"
                    style="height: 150px;margin-bottom: 16px;" required="" minlength="1"></textarea>
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
    <div class="modal-footer">
      <input class="btn btn-default" style="color:white" type="submit" name="check" value="Done"/>
		
    </div>
  </div>

</div>

	
	
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	 <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
	function disableButton(btn){
		document.getElementById(btn.id).disabled = true;
		alert("Button has been disabled.");
	}
</script>

<script>
//Get the button
var mybutton = document.getElementById("goUpbt");

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


  </body>

</html>

  

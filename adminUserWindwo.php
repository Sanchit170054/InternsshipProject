<?php
session_start();
include('databseConnection.php');
include_once "CRUD.php";
$common = new CRUD();

$adminName = $_SESSION['admin_name'];
$adminID = $_SESSION['admin_ID'];

if(isset($_POST['search']))
{
	$searchText = $_POST['search'];
	$records = $common->getAllSpecifedUserRecords($connect,$searchText) ;
}
else
{
	$records = $common->getAllUsersRecords($connect);
}
if(isset($_POST['reset']))
{
	$records = $common->getAllUsersRecords($connect);
}


if(isset($_POST['submit'])){
   
    $uName = $_POST['userName'];
    $uID = $_POST['userID'];
    $Umail = $_POST['email'];
    $Phnumber = $_POST['phoneNO'];
    $Userpass = $_POST['password'];
	$newRole = "Admin";
    $depart = "Admin";
       if($connect->connect_error){
            echo "<script type='text/javascript'>alert('Error: Connection is failed..!');</script>";
           
        }
        	
		
         $SELECT = "SELECT userID From userdata Where userID = ? Limit 1";
        $INSERT = "INSERT Into userdata (userName, userID, Email, phoneNumber, password, role, department) 
        values(?, ?, ?, ?, ?, ?, ?)";
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
         $stmt->bind_param("sssisss", $uName, $uID, $Umail, $Phnumber, $Userpass, $newRole, $depart);
         $stmt->execute();
         echo "<script type='text/javascript'>alert('Registration successfull..!');</script>";

		 } else {
           echo "<script type='text/javascript'>alert('Error: Someone is already registered with this ID');</script>";
          
        }
		
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">

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

body {
  font-family: "Lato", sans-serif;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;
}

td, th {
	font-size: 20px;
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}	
.btn {
  background-color: #111;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
	background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
}

.sidenav { 
  height: 100%;
  width: 20%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  text-align:center;
  font-size: 28px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: lightblue;
}

.main {
  margin-left: 20%; /* Same as the width of the sidenav */
  font-size: 24px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>

<body>
<header>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
			background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);">
        <div class="container"><a class="navbar-brand logo" href="#">MMVC Admin Panel</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
						
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: white"><?php echo $adminName?></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="report1.php">Edit Profile</a><a class="dropdown-item" role="presentation" href="logout.php">LogOut</a></div>
                    </li>
                </ul>
            </div>
        </div>
	</nav>
	</header>
	
	<div class="admin-wrapper">
		
		<div class="sidenav" style="padding-top: 10%">
		  <a href="adminUserWindwo.php">Manage Users</a>
		  <a href="adminPostWindwo.php">Manage Posts</a>
		</div>
	
		<div class="main" style="padding-top: 8%;float: right;">
			<div class="col">
				<form action="pdf_gen.php" method = "POST">
					<button type="submit" name="pdf" class="btn">Generate report</button>
				</form>
				<button class="btn" id="myBtn"style="margin-top: 10px">Add new admin</button>
				
			</div>
			
		</div>
		<div class="main" style="padding-top: 10%;">
			<div class="col">
				<h2> Manage Users </h2>
			</div>
			<form class="form-inline mr-auto" method="POST" target="_self" style="font-size: 24px;">
                <div class="form-group" style="margin-top: 10px;"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" placeholder="Search by name or ID" style="font-size: 20px;width: 240px;"></div>
				<button class="btn" style="margin-left: 1%; margin-top: 1%">Search</button>
				<input type="submit" class="btn" value="Show all Enteries" name="reset" style="margin-left: 1%; margin-top:1%"></input>
			</form>
		</div>
		
		<div class="main" style="padding-top: 3%;">
			<div class="col">
				<table>
					  
					  <tr>
						<th>User Name</th>
						<th>User ID</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Department</th>
						<th>Address</th>
						<th>Action</th>
					  </tr>
					  
					  <?php
							
							if ($records->num_rows>0){
								$sr = 1;
								while ($record = $records->fetch_object()) {
									
									$name = $record->userName;
									$personID = $record->userID;
									$email = $record->Email;
									$phoneNumber = $record->phoneNumber;
									$dept = $record->department;
									$add = $record->address;
									
									if($add == "")
									{
										$add = "No Address Available";
									}
										
									?>
									
					  
									  <tr>

										<td><?php echo $name ?></td>
										<td><?php echo $personID ?></td>
										<td><?php echo $email ?></td>
										<td><?php echo $phoneNumber ?></td>
										<td><?php echo $dept ?></td>
										<td><?php echo $add ?></td>
										<td>
											<a href="delete-script.php?recordId=<?php echo $personID;?>" style="color: red">Delete</a>
										</td>
									  </tr>
									  <?php
									
								}
							}
							?>
				  
				</table>
			</div>
			
			
		</div>


		
	</div>

	
		<!-- The Modal -->
<div id="myModal" class="modal" >

  <!-- Modal content -->
  <div class="modal-content" style="height: 60%; width: 50%;">
    <div class="modal-header" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%)">
      <h2>New Admin</h2>
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <br><br>
	  <form action="" method="post" enctype="multipart/form-data">
		     <div class="illustration" style="padding-bottom: 0px;margin-top: -34px;"><i
                    class="icon ion-ios-compose-outline" style="color: rgb(48,49,53);"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" name="userName" placeholder="User Name"
			title="can only contain numbers, letters and underscores!" style="margin-bottom: 16px;" required>
				
				<input class="form-control" type="text" name = "userID" placeholder="Admin ID" 
				title="Must contain '@' with domain name!" minlength="1" style="margin-bottom: 16px;" required>
				
				<input class="form-control" type="email" name = "email" placeholder="Email"  
				title="Must be like provided format!" minlength="1" style="margin-bottom: 16px;" title="Must contain '@' with domain name!"  required>
				<input class="form-control" type="number" name = "phoneNO" placeholder="Phone Number" minlength="1" style="margin-bottom: 16px;" required>
				
				<input class="form-control" type="password" name = "password" placeholder="Password" maxlength="14"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" minlength="1" style="margin-bottom: 16px;" required>
				<center><input type="submit" name="submit" class="btn btn-primary"
                    style="width: 240px;background-color: rgb(48,49,53);" value="Add"></center>
           
            </div>
        </form>
    </div>
    
  </div>

</div>

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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
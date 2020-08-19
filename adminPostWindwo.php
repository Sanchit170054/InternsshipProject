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
	$records = $common->fetchRecordByEmployeeID($connect,$searchText) ;
}
else
{
	$records = $common->getAllPostsRecords($connect);
}
if(isset($_POST['reset']))
{
	$records = $common->getAllPostsRecords($connect);
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
body {
  font-family: "Lato", sans-serif;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
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
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color:white"><?php echo $adminName?></a>
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
					<button type="submit" name="postPdf" class="btn">Generate report</button>
				</form>
			</div>
			
		</div>
		<div class="main" style="padding-top: 10%;">
			<div class="col">
				<h2> Manage Posts </h2>
			</div>
			<form class="form-inline mr-auto" method="POST" target="_self" style="font-size: 24px;">
                <div class="form-group" style="margin-top: 10px;"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" placeholder="Search by Title or ID" style="font-size: 20px;width: 230px;"></div>
				<button class="btn" style="margin-left: 1%; margin-top: 1%">Search</button>
			<input type="submit" class="btn" value="Show all Enteries" name="reset" style="margin-left: 1%; margin-top: 1%"></input>
			
			</form>
		</div>
		
		<div class="main" style="padding-top: 3%;">
			<div class="col">
				<table>
					  
					  <tr>
						<th>Title</th>
						<th>Description</th>
						<th>Category</th>
						<th>Owner Name</th>
						<th>Owner ID</th>
						<th>Photo</th>
						<th>Action</th>
						
					  </tr>
					  
					  <?php
							
							if ($records->num_rows>0){
								$sr = 1;
								while ($record = $records->fetch_object()) {
									
									$title = $record->tittle;
									$desc = $record->description;
									$category = $record->category;
									$name = $record->username;
									$ID = $record->userID;
									$postID = $record->id;
									$phpyo = $record->image;
										
									?>
						
									  <tr>
										<td><?php echo $title ?></td>
										<td><?php echo $desc ?></td>
										<td><?php echo $category ?></td>
										<td><?php echo $name ?></td>
										<td><?php echo $ID ?> </td>
										<td><img src="<?php echo $phpyo;?>" alt="No Image there" height=100 width=100></img></td>
																			
										<td>
											<a href="delete-script.php?postID=<?php echo $postID;?>" style="color: red">Delete</a>
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
	

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
<?php
$host = 'localhost:3306';
$user = 'root';
$password = '';
$dbname = 'infinite_scroll';   


// Set the DSN - Data Source Name
$dsn = 'mysql:host='. $host . ';dbname='.$dbname;

// Create a PDO Instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// Initialize message variable
$msg = "";
 // If upload button is clicked ...
 if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
  	// Get text
    $image_text = $_POST['image_text'];
    $targetDir = "images/";
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $targetDir.$fileName;

    $sql = 'INSERT INTO `userdata`(`profilePic`) VALUES(?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$targetPath,$image_text]);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
         echo "<script type='text/javascript'>alert('Error: Done..!');</script>";
           
    }else{
         echo "<script type='text/javascript'>alert('Error: Done..!');</script>";
        
    }
 }
    $stmt = $pdo->query($sql);
?>

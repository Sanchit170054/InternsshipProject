<?php
session_start();

$userid = $_SESSION['ID']; 
							
$host = "localhost: 3306";
    $dbUsername = "root";
    $dbPassword = "";
	$dbname = "communityDB";

        $connect = new mysqli($host,$dbUsername,$dbPassword, $dbname);
        if($connect->connect_error){
            echo "<script type='text/javascript'>alert('Error: Connection is failed..!');</script>";
           
        }
		

				
				$N_postID = $_SESSION['uploadPostID'];
				$N_userID = $_SESSION['ID']; 
				$N_touserID = $_SESSION['to_userID'];
				$N_view = 0;
				$N_comment = $_SESSION['comment'];

				echo $N_postID. " " .$N_userID. " " .$N_touserID. " " .$N_view. " ".$N_comment;
				
				
				$sql = "INSERT INTO notification (post_id, user_id, comment, to_user_id, viewed)
								VALUES ($N_postID, $N_userID, '$N_comment', $N_touserID, $N_view)";

								if ($connect->query($sql) === TRUE) {
									echo "New record created successfully";
								} else {
									echo "Error: " . $sql . "<br>" . $connect->error;
}

	
	
?>
<?php

	$host = "localhost: 3306";
    $dbUsername = "root";
    $dbPassword = "";
	$dbname = "communityDB";

        $connect = new mysqli($host,$dbUsername,$dbPassword, $dbname);
        if($connect->connect_error){
            echo "<script type='text/javascript'>alert('Error: Connection is failed..!');</script>";
           
        }
	
?>
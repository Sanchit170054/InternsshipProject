<?php
class CRUD
{
    public function getAllRecords($connection) {
        $query = "SELECT * FROM post ORDER by postdate DESC, posttime DESC";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
	
	public function getAllUsersRecords($connection) {
        $query = "SELECT * FROM userdata";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
	
	public function getAllPostsRecords($connection) {
        $query = "SELECT * FROM post";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
	
	public function getAllSpecifedUserRecords($connection, $name) {
        $query = "SELECT * FROM userdata where userID = '$name' or userName = '$name'";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }
	

    public function deleteRecordById($connection,$recordId) {
        $query = "DELETE FROM post WHERE id='$recordId' " ;
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }
	
	public function deleteUserRecordById($connection,$recordId) {
        $query = "DELETE FROM userdata WHERE userID='$recordId' " ;
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }
	
	public function getRecordAsPerCategory($connection, $cate) {
        $query = "SELECT * FROM post WHERE category='$cate' ORDER by postdate DESC, posttime DESC";
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }
	
	public function fetchRecordById($connection,$recordId) {
        $query = "SELECT * FROM post WHERE id='$recordId' ";
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }
	
	public function fetchRecordByEmployeeID($connection,$recordId) {
        $query = "SELECT * FROM post WHERE userID='$recordId' or tittle = '$recordId'";
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }
	
	
}
?>
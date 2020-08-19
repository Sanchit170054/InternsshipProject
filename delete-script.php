<?php
session_start();
include('databseConnection.php');

include_once "CRUD.php";
if (isset($_GET['recordId'])){
    $recordId = $_GET['recordId'];
	
    $common = new CRUD();
    $delete = $common->deleteUserRecordById($connect,$recordId);
	
    if ($delete){
        echo '<script>window.location.href="adminUserWindwo.php";</script>';
		
    }
}

if (isset($_GET['postID'])){
    $postId = $_GET['postID'];
	
    $common = new CRUD();
    $delete = $common->deleteRecordById($connect,$postId);
	
    if ($delete){
        echo '<script>window.location.href="adminPostWindwo.php";</script>';
		
    }
}
?>
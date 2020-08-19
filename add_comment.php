
<?php

session_start();
//add_comment.php

$connect = new PDO('mysql:host=localhost;dbname=communityDB', 'root', '');


$error = '';
$comment_name = $_SESSION['personName'];
$comment_content = '';
$post_ID = $_SESSION['postTittle'];


if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
$_SESSION['comment'] =  $comment_content;
}

if($error == '')
{
 $query = "
 INSERT INTO tbl_comment 
 (parent_comment_id, comment, comment_sender_name, postID) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name, :postID)
 ";
 
 $statement = $connect->prepare($query);
 
 
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':comment_sender_name' => $comment_name,
   ':postID' => $post_ID
   )
  
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);


?>
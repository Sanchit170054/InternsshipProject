<?php
session_start();
$postID = $_GET['recordId'];
$_SESSION['uploadPostID'] = $postID;
$userid = $_SESSION['ID'];
include('databseConnection.php');
?>


<!DOCTYPE html>
<html>
 <head>
 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
 
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
 
 <body>
 <style type="text/css">

.infinitePostCard{
	display: inline-block;
     box-shadow: 2px 2px 04px grey;
     border-radius: 5px; 
    }
</style>
  <div>
        <div class="header-dark" style="background-image: -webkit-linear-gradient(left, #61ba6d 0%, #83c331 51%, #61ba6d 100%);
											  background-image: linear-gradient(to right, #61ba6d 0%, #83c331 51%, #61ba6d 100%);padding-bottom: 0px;  position: left; height: 100px">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search" >
                <div class="container" style="margin-top: 10px"><a class="navbar-brand" style="font-size: 71px; margin-top: -60px;margin-right: 0px;" href="dashboard.php?link=0">MMVC</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    
					<div
                        class="collapse navbar-collapse" id="navcol-1" style="margin-left: 44%">
                        				
						<ul class="nav navbar-nav" style="padding-top: 30px;width: 650px;padding-left: 50px;">
                            <li class="nav-item" role="presentation">
							<a class="nav-link" href="dashboard.php?link=0" style="font-size: 24px;padding-left: 0px;padding-right: 25px;">
							<i class="fa fa-home" style="padding-right: 6px;"></i>Home</a></li>  
						    
							<li class="nav-item" style="font-size: 24px;"><a class="nav-link" aria-expanded="false" href="members.php" style="opacity: 1;padding-left: 0px;">
							<i class="fa fa-users" style="padding-right: 6px;"></i>Members</a>
							
								
						
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
  <img class="mr-auto" src="assets/img/back.png" onClick="location.href='javascript:history.back()'"style="margin-left: 80%; height: 60px;">
  <center><h2 align="center">Leave your comment</h2></center>
  
  <br />
  <div class="col-md-5 col-md-offset-1 results"  style="margin-left: 30%;">
           
		   <table class="table" style="margin-top: 20px; font-size: 20px">
                    <thead id="thead" style="color: rgb(0,123,255)">
                    <tr>
                        <th><center> POST </center></th>
                    </tr>
                    </thead>
						<tbody>
						
						<?php
			
			include_once "CRUD.php";
                    $common = new CRUD();
					
                    $records = $common->fetchRecordById($connect, $postID);
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
                                <!-- <td>
                                <th><?php echo $sr;?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?php echo $department;?></th>
                                <a href="delete-script.php?recordId=<?php echo $recordId?>" class="btn btn-danger btn-sm">Delete</a>
                                <a href="delete-script.php?recordId=<?php echo $recordId?>" class="btn btn-danger btn-sm">Create</a>
                                </td> -->
                            <td >
                                									
								<div class="infinitePostCard" style="width: 550px;position:center;background-color:lightgrey; text-align:center">
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
													<h5 style="text-align:left; margin-left:-210px; margin-top: 10px; font-size: 22px"> <?php echo $user." posted an update about ".$p_tittle. " in " .$p_cate." section", $_SESSION['postTittle'] = $p_tittle;?>  ?></h5>
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
		
  <div class="container">
	
  
   <form method="POST" id="comment_form">
    <div class="form-group">
     <textarea style="font-size: 18px" name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group" style="font-size: 18px">
     <input style="font-size: 18px"type="hidden" name="comment_id" id="comment_id" value="0" />
     <input style="font-size: 18px" type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span  id="comment_message"></span>
   <br />
   <div style="font-size: 18px" id="display_comment"></div>
  </div>
 </body>

</html>

<script>

$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
	
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
   
  })
 }
 

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
 $('#submit').click(function() {
  $.ajax({
    type: "POST",
    url:"message.php"
  }).done(function( msg ) {
    document.getElementById('display_message').innerHTML = msg; 
  });
});

 function load_message()
{
 $.ajax({
  url:"message.php",
  method:"POST",
  success:function(data)
  {
   $('#display_message').html(data);
  }
 })
}
 
 
});
</script>

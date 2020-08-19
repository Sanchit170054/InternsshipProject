
<?php 
session_start();
if (isset($_POST['startBtn']))
{
	if($_SESSION['login'])
		{			
			echo "<script> window.location.assign('dashboard.php?link=0'); </script>";	
		}
	echo "<script> window.location.assign('login.php'); </script>";	
  
}

if (isset($_POST['firstPostBtn']))
{
	if($_SESSION['login'])
		{			
			echo "<script> window.location.assign('newpost.php'); </script>";	
		}
	echo "<script> window.location.assign('login.php'); </script>";	
}

if (isset($_POST['loginBtn']))
{
	if($_SESSION['login'])
		{	
			echo "<script type='text/javascript'>alert('it seems you previously logged in our website!');</script>";
			echo "<script> window.location.assign('dashboard.php?link=0'); </script>";	
		}
	echo "<script> window.location.assign('login.php'); </script>";	
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Virtual Community</title>
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <div class="header-dark" style="height: 187px;background-image: url(&quot;assets/img/mountain_bg.jpg&quot;);">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-uppercase" id="navcol-1"><img class="mr-auto"src="assets/img/logo.png" onClick="location.href='mainpage.html'" style="height: 144px;"><span class="ml-auto navbar-text">
					<form method="POST" action=''>
						<input class="btn btn-green" type="submit" name="loginBtn" value="LOG IN" style="color:white" ></span><a class="btn btn-light action-button" role="button" href="signUp.php">Sign Up</a></div>
					</form>
					
				</div>
            </nav>
        </div>
    </div>
    <div class="bounce animated">
        <div class="container">
		
            <div class="row">
                <div class="col-md-6" style="height: 138px;"><label style="font-size: 42px;height: 129px;margin-top: 64px;color: rgb(5,62,118);">Welcome to our Community</label>
                    <p style="font-size: 22px; margin-top: -15px">Our Community is easiest way to connect and interact with people from around your organization and here you can express your ideas freely!</p>
					<form method="POST" action=''>
						<input class="btn btn-primary" type="submit" name="startBtn" value="Let's Start.." style="font-size: 24px; margin-top: 24px"></div>
					</form>
				<div class="col-md-6 mr-auto"><img class="mr-auto" src="assets/img/msZgF0ORG.png" style="width: 558px;height: 534px;"></div>
            </div>
        </div>
		
		
    </div>
    <div data-aos="fade" data-aos-delay="100" style="margin-top: 26px;">
        <div class="container" style="background-color: #d0cbcb;">
            <div class="row">
                <div class="col-md-12"><label class="col-form-label" style="font-size: 42px;color: rgb(5,62,118);">Categories</label></div>
            </div>
            <div class="row" style="margin-top: 14px;">
                <div class="col-md-3"><img src="assets/img/acad.png" style="width: 150px;"><label style="margin-left: 34px; font-size: 22px">Academics</label></div>
                <div class="col-md-3"><img src="assets/img/events.png" style="width: 150px; "><label style="margin-left: 34px; margin-top: 40px; font-size: 22px"  >Entertainment & Events</label></div>
                <div class="col"><img src="assets/img/lost.png" style="width: 150px;"><label style="margin-left: 34px; margin-top: 50px; font-size: 22px">Lost & Found</label></div>
                <div class="col-md-3"><img src="assets/img/marketing.png" style="width: 150px;"><label style="margin-left: 34px; font-size: 22px">Marketing</label></div>
                <div class="col-md-3"><img src="assets/img/travel.png" style="width: 150px;"><label style="margin-left: 34px;  margin-top: 25px; font-size: 22px">Travel & Visiting</label></div>
                <div class="col-md-3"><img src="assets/img/trends.png" style="width: 150px; "><label style="margin-left: 34px; font-size: 22px">Latest Trends</label></div>
                <div class="col-md-3"><img src="assets/img/photography.png" style="width: 150px;"><label style="margin-left: 34px;margin-top: 50px; font-size: 22px">Photography</label></div>
                <div class="col-md-3"><img src="assets/img/affairs.png" style="width: 150px;"><label style="margin-left: 0px; font-size: 22px">Current Affairs</label></div>
            </div>
        </div>
    </div>
    <div data-aos="fade-down-right" style="margin-top: 26px;padding-top: 25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><label class="col-form-label" style="font-size: 42px;color: rgb(5,62,118);">Write Your First Post Today</label></div>
            </div>
            <div class="row">
                <div class="col-md-6"><img src="assets/img/post.jpg"></div>
                <div class="col-md-6">
                    <p style="font-size: 22px; margin-top: 50px">Share your knowledge by writing your first post in the community based on your interest.
					<br><br> The first goal of our community is to specify a baseline standard of behavior so that people with different social values and communication styles can talk about effectively, productively, and respectfully.</br></br>&nbsp;<br><br><br></p>
                </div>
            </div>
			<form method="POST" action=''>
				<input class="btn btn-primary" type="submit" name="firstPostBtn" value="Write your first post.." style="font-size: 24px;">&nbsp;</button></div>
			</form>
	</div>
    <div data-aos="fade-up-left" style="background-color: #fffefe;padding-top: 25px;margin-top: 0px;">
        <div class="container" style="margin-top: 26px;background-color: #d0cbcb;">
            <div class="row">
                <div class="col-md-12"><label class="col-form-label" style="font-size: 42px;color: rgb(5,62,118);">Want to grow your business at your organization ?</label></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p style="font-size: 22px;"><br>Grow your business and develop strong connection at your area. Share something useful by using any language and medium you are comfortable with as per the category and attract your customers..&nbsp;<br><br></p>
                </div>
                <div class="col-md-6"><img class="mr-auto" src="assets/img/stuck.jpg" style="width: 300px;margin-left: 46px;"></div>
                <div class="col" style="padding-bottom: 19px;">
				<form method="POST" action=''>
					<input class="btn btn-primary" type="submit" name="startBtn" value="Create your profile" style="font-size: 24px;">&nbsp;</button></div>
				</form>
			</div>
        </div>
    </div>
    <div class="text-center" data-aos="fade-down" style="margin-top: 26px;padding-top: 25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="width: 718px;padding-left: 0px;"><label class="col-form-label text-left" style="padding-left: 0px;font-size: 42px;">Our Community App</label></div>
            </div>
        </div>
    </div>
    <div class="text-center" data-aos="zoom-in-right" style="padding-top: 25px;margin-top: 26px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up">
                    <p class="align-items-center" style="font-size: 24px;">Download our Community application from here</p><img src="assets/img/playstore.png" style="height: 125px;margin: 0px;width: 255px;"><img src="assets/img/appstore.jpg" style="width: 215px;height: 183px;"></div>
            </div>
        </div>
    </div>
    <div class="footer-clean" style="background-color: rgb(40,45,50);">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="color: rgb(240,249,255);">About</h3>
                        <ul>
                            <li><a href="aboutUs.html" style="color: rgb(173,178,181);">Us</a></li>
                            <li><a href="codeOfConduct.html" style="color: rgb(173,178,181);">Code of Conduct</a></li>
                            <li><a href="OurTeam.html" style="color: rgb(173,178,181);">Our Team</a></li>
							<li><a href="FAQ.php" style="color: rgb(173,178,181);">FAQ's</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3 style="color: rgb(240,249,255);">Company</h3>
						<p style="color: rgb(173,178,181); font-size: 14px" >Our community include people from many different backgrounds. Our contributors and users are committed to providing a friendly, safe and welcoming environment for all.</p>
                        <ul></ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#" style="color: rgb(255,255,255);"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-linkedin" style="color: rgb(255,255,255);"></i></a>
                        <a
                            href="#"><i class="icon ion-social-instagram-outline" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-github" style="color: rgb(255,255,255);"></i></a>
                            <p class="copyright" style="color: rgb(255,255,255);">Company Name © 2017</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>
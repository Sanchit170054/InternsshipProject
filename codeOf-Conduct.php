
<?php 
session_start();

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>About Us</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                            <!---    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>--->
                            </div>
                            
							<div class="login-content">
								<form method="POST" action=''>
									<input class="btn" type="submit" name="loginBtn" value="LOG IN"></span>
									<a class="btn academy-btn btn-sm" role="button" href="signUp.php">Register</a>
									
								</form>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Quick Links</a>
                                        <ul class="dropdown">
                                            <li><a href="about-us.php">About Us</a></li>
                                            <li><a href="codeOf-conduct.php">Conduct Codes</a></li>
                                            <li><a href="course.html">Our Team</a></li>
                                            <li><a href="FAQ-s.php">FAQ's</a></li>
                                        </ul>
                                    </li>
									<li><a href="blog.html">Blog</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="course.html">Course</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+65) 456 332 5568 889</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Code of Conduct</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span>The Best in us</span>
                        <h3>We are the Connections</h3>
                    </div>
                </div>
            </div>
        <div class="container shadow-lg">
        <div class="row">
            <div class="col"><label class="col-form-label" style="width: 832px;margin-left: 139px;"><br>Online communities include people from many different department of University. This is online platform, where the student of MMDU, Proffessor/Teacher sand other staff of MMDU can interact together. Theis community is totally built ona 
			&nbsp;common problems, a common intrest where any one share anythings of his intrest. Virtual contributors and users are committed to providing a friendly, safe and 
			welcoming environment for all, regardless of gender identity and expression, sexual orientation, disabilities, neurodiversity, physical appearance, body size, ethnicity, 
			nationality, race, age, religion, or similar personal characteristics.<br><br><STRONG>The first goal</STRONG> of the Code of Conduct is to specify a baseline standard of behavior so that 
			people with different social values and communication styles can talk about and on MMVC effectively, productively, and respectfully.<br><br><STRONG>The second goal</STRONG> is to provide a 
			mechanism for resolving conflicts in the community when they arise.<br><br><STRONG>The third goal</STRONG> of the Code of Conduct is to make our community welcoming to people from different 
			backgrounds. Diversity is critical to the project; for MMVC to be successful, it needs contributors and users from all backgrounds.<br><br><strong>MMVC Values: </strong><br>These 
			are the values to which people in the MMVC community should aspire:<br>1. Be friendly and welcoming<br>2. Be Patient Remember that people have varying communication 
			styles and that not everyone is using their native language. (Meaning and tone can be lost in translation.)<br>3. Be thoughtfulRemember that sometimes it is best to 
			refrain entirely from commenting.<br>Productive communication requires effort. Think about how your words will be interpreted.<br>4.&nbsp;Be charitable<br>Interpret the 
			arguments of others in good faith, do not seek to disagree.<br>When we do disagree, try to understand why.<br>5.&nbsp;Avoid destructive behavior:<br><li>Derailing: stay on topic; 
			if you want to talk about something else, start a new conversation<br><li>Unconstructive criticism: don't merely decry the current state of affairs; offer—or at least 
			solicit—suggestions as to how things may be improved.<br><li>Snarking (pithy, unproductive, sniping comments)<br><li>Discussing potentially offensive or sensitive 
			issues; this all too often leads to unnecessary conflict.<br><li>Microaggressions: brief and commonplace verbal, behavioral and environmental indignities that communicate 
			hostile, derogatory or negative slights and insults to a person or group.<br><br>People are complicated. You should expect to be misunderstood and to misunderstand others; when this inevitably 
			occurs, resist the urge to be defensive or assign blame. Try not to take offense where no offense was intended. Give people the benefit of the doubt. Even if the intent was to provoke, do not rise to it. 
			It is the responsibility of&nbsp;<em>all parties</em>&nbsp;to de-escalate conflict when it arises.<br><br><strong>Code of Conduct</strong><br><STRONG>Our Pledge: </STRONG><br>In the interest of fostering an open and 
			welcoming environment, we as users, contributors and maintainers pledge to making participation in our project and our community a harassment-free experience for everyone, regardless of age, body size, disability, 
			ethnicity, gender identity and expression, level of experience, education, socio-economic status, nationality, personal appearance, race, religion, or sexual identity and orientation.<br><br><Strong>Our 
			Standards</STRONG><br>Examples of behavior that contributes to creating a positive environment include:<li>Using welcoming and inclusive language<li>Being respectful of differing viewpoints and experiences<li>Gracefully 
			accepting constructive criticism<li>Focusing on what is best for the community<li>Showing empathy towards other community members<li>Examples of unacceptable behavior by participants include:<br><li>The use of sexualized language or imagery and unwelcome sexual attention or advances<li>Trolling, insulting/derogatory comments, and personal or political attacksPublic or private harassment<li>Publishing others’ private information, such as a physical or electronic address, without explicit permission<li>Other conduct which could reasonably be considered inappropriate in a professional setting<br><br><STRONG>Our Responsibilities</STRONG><br>MMVC is responsible for clarifying the standards of acceptable behavior and is expected to take appropriate and fair corrective action in response to any instances of unacceptable behavior.<br><br>Community and project moderators have the right and responsibility to remove, edit, or reject comments, questions, blog posts, commits, code, wiki edits, issues, and other contributions that are not aligned to this Code of Conduct, or to ban temporarily or permanently any user for other behaviors that they deem inappropriate, threatening, offensive, or harmful.<br><br><STRONG>Scope</STRONG><br>This Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Examples of representing a project or community include using an official project e-mail address, posting via an official social media account, or acting as an appointed representative at an online or offline event. Representation of a project may be further defined and clarified by project maintainers.<br><br>This Code of Conduct also applies outside the project spaces when the MMVC team has a reasonable belief that an individual’s behavior may have a negative impact on the project or its community.<br><br><STRONG>What happens when someone breaks the COC?</STRONG><br>In cases when someone breaks MMVC code of conduct, they will receive a warning message from the Community Manager or a moderator and will face some consequences.<br><br><strong>The first warning</strong>&nbsp;includes a direct message from the CM or a moderator and the comment/reply/post/ or any other form of contribution present online will be removed immediately. In case of a live event, the moderator reserves the right to deny answer to a given question/comment<br><br><strong>The second warning</strong>&nbsp;includes a direct message from the CM or a moderator and the user will receive a temporary one month ban from MMVC, and the comment/reply/post/ or any other form of contribution present online will be removed immediately. In case of a live event, the moderator reserves the right to deny access to the venue and/or make the person in question leave the premises.<br><br><strong>The third warning</strong>&nbsp;includes a direct message from the CM or a moderator and the user will receive permanent ban from MMVC, and the comment/reply/post/ or any other form of contribution present online will be removed immediately. In case of a live event, the moderator reserves the right to deny access to the venue and/or make the person in question leave the premises and ban them from attending any future MMVC events.In case of severe violations we reserve the right to suspend offender's account immediately without any prior warning and in case of live events make the person leave the premises!<br><br><strong>Summary</strong><br>Treat everyone with respect and kindness.<br>Be thoughtful in how you communicate.<br>Don’t be destructive or inflammatory.<br><br><h6>If you encounter an issue, please mail&nbsp;<a href="mailto:communitymmvc@gmail.com">communitymmvc@gmail.com</a><br><br></h6></label></div>
        </div>
		</div>
            
        </div>
    </section>
    <!-- ##### Code of Conduct Area End ##### -->

    
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                             <!--   <a href="#"><img src="img/core-img/logo2.png" alt=""></a>-->
                            </div>
                            <p>Our community include people from many different backgrounds. Our contributors and users are committed to providing a friendly, safe and welcoming environment for all..</p>
                            <div class="footer-social-info" align="center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Usefull Links</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="codeOf-conduct.php">Code of Conduct</a></li>
                                    <li><a href="FAQ-s.php">FAQ's</a></li>
									<li><a href="#">Our Team</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Gallery</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 1"><img src="img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 2"><img src="img/bg-img/gallery2.jpg" alt=""></a>
                                <a href="img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 3"><img src="img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 4"><img src="img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="img/bg-img/gallery5.jpg" class="gallery-img" title="Gallery Image 5"><img src="img/bg-img/gallery5.jpg" alt=""></a>
                                <a href="img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 6"><img src="img/bg-img/gallery6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contact</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>Our Address</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>Main: phoneNumber <br>Office: phoneNumber</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>office@yourbusiness.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
		
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>
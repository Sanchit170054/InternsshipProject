
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


if (isset($_POST['postWrite']))
{
	if($_SESSION['login'])
		{
		    echo "<script type='text/javascript'>alert('it seems you previously logged in our website!');</script>";
			echo "<script> window.location.assign('newpost.php'); </script>";	
		}
	echo "<script> window.location.assign('login.php'); </script>";	
}

if (isset($_POST['createProfile']))
{
	if($_SESSION['login'])
		{	
		   echo "<script type='text/javascript'>alert('it seems you previously have an account with us!');</script>";
			echo "<script> window.location.assign('dashboard.php?link=0'); </script>";	
		}
	echo "<script> window.location.assign('signup.php'); </script>";	
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
    <title>MMVC </title>

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
									<input class="btn" type="submit" name="loginBtn" value="LOG IN"></input>
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

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg-1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 data-animation="fadeInUp" data-delay="100ms">The Community you really need</h4>
                                <h2 data-animation="fadeInUp" data-delay="400ms">Welcome to your <br>Community</h2>
                                <a href="#" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 data-animation="fadeInUp" data-delay="100ms">The Community you really need</h4>
                                <h2 data-animation="fadeInUp" data-delay="400ms">Welcome to your <br>Community</h2>
                                <a href="#" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-agenda-1"></i>
                                    <h5>Top Categories to discuss</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### -->

    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="course-icon">
                            <i class="icon-id-card"></i>
                        </div>
                        <div class="course-content">
                            <h4>Academics</h4>
                            <p>You can share the posts regarding the various sessions, general knowledge, current affairs, your academic curriculms at an easy manner.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <div class="course-icon">
                            <i class="icon-worldwide"></i>
                        </div>
                        <div class="course-content">
                            <h4>Marketing</h4>
                            <p>You can easily advertise your products here. A way where you can easily expand your market and develop new connections.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="course-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="course-content">
                            <h4>Photography</h4>
                            <p>You can share your clicked photos, show some interesting stuff to others and use it as a photography blog for community.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                        <div class="course-icon">
                            <i class="icon-message"></i>
                        </div>
                        <div class="course-content">
                            <h4>Travel & Visitings</h4>
                            <p>A easiest way to organising a trip around your orgranization. You can share post about the tours and travellers here.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <div class="course-icon">
                            <i class="icon-responsive"></i>
                        </div>
                        <div class="course-content">
                            <h4>Entertainment & Events</h4>
                            <p>Share some events, festival celebration and other source of entertainment just in a single click.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="800ms">
                        <div class="course-icon">
                            <i class="icon-like"></i>
                        </div>
                        <div class="course-content">
                            <h4>Latest Trends</h4>
                            <p>Share you knowledge of the latest fashion trends. Show your fashoin skills and set a mindset of people for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                        <span>MMVC: Community that binds together</span>
                        <h3>See what it all about</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-13">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/c1.jpg" alt="" style="height:50px">
                        </div>
                        <div class="testimonial-content">
                            <h5>Effective Community</h5>
                            <p>Our Community is easiest way to connect and interact with people from around your organization where you can express your ideas freely through any medium!
							 <br>It includes people from many different backgrounds. Our contributors and users are committed to providing a friendly, safe and welcoming environment for all.</p>
                            <!---<h6><span>Maria Smith,</span> Student</h6>-->
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-13">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="500ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/c2.jpg" alt="" style="height:50px">
                        </div>
                        <div class="testimonial-content">
                            <h5>We are excellent in spreading knowledge</h5>
                            <p>Excellence is never an accident. It is always the result of high intention, sincere effort, and intelligent execution; it represents the wise choice of many alternatives - choice, not chance, determines your destiny.
							<br>However, here we are providing a platform to share you knowledge in almost any field and develop your vast network of knowledge.</p
						<!---	<h6><span>Shawn Gaines,</span> Student</h6>-->
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-13">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="600ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/c3.jpg" alt="" style="height:50px">
                        </div>
                        <div class="testimonial-content">
                            <h5>Strive for Excellent</h5>
                            <p>"Whatever your discipline, become a student of excellence in all things. Take every opportunity to observe people who manifest the qualities of mastery. These models of excellence will inspire you and guide you toward the fulfillment of your highest potential.”
							<br>Here you can get a chance to interact with the highly experienced people around your organization.</p>
                        <!---    <h6><span>Ross Cooper,</span> Student</h6>--->
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-13">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="700ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/c4.jpg" alt="" style="height:50px">
                        </div>
                        <div class="testimonial-content">
                            <h5>Connection is Everything</h5>
                            <p>“It is an absolute human certainty that no one can know his own beauty or perceive a sense of his own worth until it has been reflected back to him in the mirror of another loving, caring human being.”
							<br> We all know that we can not live only for ourselves thus this is a medium to develop strong connections in your organization.</p>
                        <!----    <h6><span>James Williams,</span> Student</h6>-->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- ##### Testimonials Area End ##### -->
<!-- ##### CTA Area Start ##### -->
    <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>An Invest in knowledge pays the best interst.</h3>
                        <h6 style="color:white"><br>Education is not about going to school and getting the degree. It's about widening your knowledge and absorbing the truth of life.
						<br>Knowledge is Power.</h6>
						<input class="btn academy-btn" type="submit" name="connect" value="Connect With Us"></input>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area section-padding-100-70">
        <div class="container">
            
                <!-- Single Top Popular Course -->
                <div class="col-12 col-lg-14">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                        <div class="popular-course-thumb bg-img" style="background-image: url(assets/img/post.jpg);"></div>
                    
						<div class="popular-course-content">
                            <h5>Write Your First Post Today</h5>
                        <!--    <span>By Simon Smith   |  March 18, 2018</span>
                            <div class="course-ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>-->
                            <p>Share your knowledge by writing your first post in the community based on your interest.
								The first goal of our community is to specify a baseline standard of behavior so that people with different social values and communication styles can talk about effectively, productively, and respectfully..</p>
                            <form method="POST" action=''>
								<input class="btn academy-btn btn-sm" type="submit" name="postWrite" value="Write Post"></input>
							</form>
						</div>
                        </div>
                </div>
                
                <!-- Single Top Popular Course -->
                <div class="col-12 col-lg-13">
                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms">
                        <div class="popular-course-content">
                            <h5>Want to Grow Your Business</h5>
                        <!--    <span>By Simon Smith   |  March 18, 2018</span>
                            <div class="course-ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>-->
                            <p>Grow your business and develop strong connection at your area. Share something useful by using any language and medium you are comfortable with as per the category and attract your customers.. </p>
							<form method="POST" action=''>
								<input class="btn academy-btn btn-sm" type="submit" name="createProfile" value="Create Profile"></input>
							</form>
					
							</div>
                        <div class="popular-course-thumb bg-img" style="background-image: url(img/bg-img/pc-2.jpg);"></div>
                    </div>
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
    
    <!-- ##### Top Popular Courses Area End ##### -->

    
    
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
                                <a href="img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 1"><img src="img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 2"><img src="img/bg-img/gallery6.jpg" alt=""></a>
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
<?php
    session_start();
    require_once "vendor/Database.php";
    $objDatabase = new Database;
    $iUserId = $_SESSION["userInfo"]["userId"];
    $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
    if (mysqli_num_rows($fetchPortFolio) > 0) {
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
        $aAbout = json_decode($aProfFolioData["about"], true);
        $aContact = json_decode($aProfFolioData["contact"], true);
        $aEducation = json_decode($aProfFolioData["education"], true);
        $aServices = json_decode($aProfFolioData["services"], true);
        $aExperiences = json_decode($aProfFolioData["experiences"], true);
        $aSkills = json_decode($aProfFolioData["skills"], true);
        $aProjects = json_decode($aProfFolioData["projects"], true);

        $sAboutDesc = $aContact["Description"];
        $sContactDesc = $aAbout["aboutDescription"];


		// Education Code Start
		$eduCode = "";
		foreach ($aEducation as $key => $value) {
			$dateFrom = explode("-", $value["educationFrom"]);
			$dateTo = explode("-", $value["educationTo"]);
			$fullDate = $dateFrom[1] . "/" . $dateFrom[0] . " - " . $dateTo[1] . "/" . $dateTo[0];
			$eduCode .= '
			<div class="col-md-6">
				<div class="resume-wrap ftco-animate">
					<span class="date">'. $fullDate .'</span>
					<h2>'. $value["educationDegree"] .'</h2>
					<span class="position">'. $value["educationInstitute"] .'</span>
					<p class="mt-4">'. $value["educationDescription"] .'</p>
				</div>
			</div>';
		}

		$eduFullCode = '
		<section class="ftco-section ftco-no-pb" id="education-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
					<div class="col-md-10 heading-section text-center ftco-animate">
						<h1 class="big big-2">Education</h1>
						<h2 class="mb-4">Education</h2>
						<p>'. $aEducation["education"]["description"] .'</p>
					</div>
				</div>
				<div class="row">
					'. $eduCode .'
				</div>
			</div>
		</section>';
		// Education Code End

		// Services Code Start
		$srvCode = "";
		foreach ($aServices as $key => $value) {
			$srvCode .= '
			<div class="col-md-4 text-center d-flex ftco-animate">
				<span class="services-1">
					<span class="icon">
						<i class="'. $value["iconName"] .'"></i>
					</span>
					<div class="desc">
						<h3 class="mb-5">'. $value["serviceName"] .'</h3>
					</div>
				</span>
			</div>';
		}

		$srvFullCode = '
		<section class="ftco-section" id="services-section">
			<div class="container">
				<div class="row justify-content-center py-5 mt-5">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<h1 class="big big-2">Services</h1>
						<h2 class="mb-4">Services</h2>
						<p>'. $aServices["services"]["description"] .'</p>
					</div>
				</div>
				<div class="row">'. $srvCode .'</div>
			</div>
		</section>';
		// Services Code End

		// Experiences Code Start
		$expCode = "";
		foreach ($aExperiences as $key => $value) {
			$dateFrom = explode("-", $value["jobFrom"]);
			$dateTo = explode("-", $value["jobTo"]);
			$fullDate = $dateFrom[1] . "/" . $dateFrom[0] . " - " . $dateTo[1] . "/" . $dateTo[0];
			$expCode .= '
			<div class="col-md-6">
				<div class="resume-wrap ftco-animate">
					<span class="date">'. $fullDate .'</span>
					<h2>'. $value["position"] .'</h2>
					<span class="position">'. $value["companyName"] .'</span>
					<p class="mt-4">'. $value["jobDescription"] .'</p>
				</div>
			</div>';
		}

		$expFullCode = '
		<section class="ftco-section ftco-no-pb" id="experience-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
					<div class="col-md-10 heading-section text-center ftco-animate">
						<h1 class="big big-2">Experience</h1>
						<h2 class="mb-4">Experience</h2>
						<p>'. $aExperiences["experience"]["description"] .'</p>
					</div>
				</div>
				<div class="row">'. $expCode .'</div>
			</div>
		</section>';
		// Experiences Code End


        // echo "<pre>";
        // print_r($aExperiences);
		// die;
    } else {
        // die("No Data Found");
        $sAboutDesc = "";
        $sContactDesc = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PortFolio - Aazan Khan Pathan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="">PortFolio</a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
				data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
					<li class="nav-item"><a href="#education-section" class="nav-link"><span>Education</span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
					<li class="nav-item"><a href="#experience-section" class="nav-link"><span>Experience</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item ">
				<div class="overlay"></div>
				<div class="container">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third js-fullheight order-md-last img" style="background-image:url(images/Profile.PNG);">
							<div class="overlay"></div>
						</div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Hello!</span>
								<h1 class="mb-4 mt-3">I'm <span>Aazan Khan Pathan</span></h1>
								<h2 class="mb-4">A Website & Software Developer</h2>
								<p>
									<div class="ftco-nav">
										<a href="#contact-input-section" class="btn btn-primary py-3 px-4">Hire me</a>
										<a href="https://github.com/aazankp?tab=repositories" target="_blank" class="btn btn-white btn-outline-white py-3 px-4">My works</a>
									</div>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center"
							style="background-image:url(images/Profile.PNG);">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section ftco-animate">
							<h1 class="big">About</h1>
							<h2 class="mb-4">About Me</h2>
							<p>
								I'm Aazan Khan Pathan, and in 2022, Following that, I served as an MIS Assistant at the Management and Development Foundation. Presently, I am employed as a Software Engineer at Verge Systems. I hold a 4-month certificate in web development and design, along with a 3-year DAE CIT diploma and a Bachelor's degree in Commerce from the University of Sindh, Jamshoro. My background showcases a blend of business acumen and IT proficiency, highlighting my adaptability across domains.
							</p>
							<ul class="about-info mt-4 px-md-0 px-2">
								<li class="d-flex"><span>Name:</span> <span>Aazan Khan Pathan</span></li>
								<li class="d-flex"><span>Date of birth:</span> <span>May 08, 2001</span></li>
								<li class="d-flex"><span>Address:</span> <span>House # 18 Pathan Goth Hussainabad Qasimabad Hyderabad</span></li>
								<li class="d-flex"><span>Zip code:</span> <span>71000</span></li>
								<li class="d-flex"><span>Email:</span> <span>aazank517@gmail.com</span></li>
								<li class="d-flex"><span>Phone: </span> <span>+92-311-8679523</span></li>
							</ul>
						</div>
					</div>
					<div class="counter-wrap ftco-animate d-flex mt-md-3">
						<div class="text">
							<p><a href="#" class="btn btn-primary py-3 px-3">Download CV</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?= $eduFullCode; ?>
	<?= $srvFullCode; ?>
	<?= $expFullCode; ?>

	<section class="ftco-section" id="skills-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big big-2">Skills</h1>
					<h2 class="mb-4">My Skills</h2>
					<p>
						Discover my versatile skills and expertise. From problem-solving to creativity, I bring a diverse set of abilities to the table. Whether it's technical proficiency, effective communication, or strategic thinking, I'm ready to excel in any task.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>Photoshop</h3>
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" aria-valuenow="60" aria-valuemin="0"
								aria-valuemax="60" style="width:60%">
								<span>60%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>jQuery</h3>
						<div class="progress">
							<div class="progress-bar color-2" role="progressbar" aria-valuenow="85" aria-valuemin="0"
								aria-valuemax="100" style="width:85%">
								<span>85%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>HTML</h3>
						<div class="progress">
							<div class="progress-bar color-3" role="progressbar" aria-valuenow="95" aria-valuemin="0"
								aria-valuemax="100" style="width:95%">
								<span>95%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>CSS</h3>
						<div class="progress">
							<div class="progress-bar color-4" role="progressbar" aria-valuenow="80" aria-valuemin="0"
								aria-valuemax="100" style="width:80%">
								<span>80%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>JavaScript</h3>
						<div class="progress">
							<div class="progress-bar color-5" role="progressbar" aria-valuenow="80" aria-valuemin="0"
								aria-valuemax="100" style="width:80%">
								<span>80%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>PHP</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="95" aria-valuemin="0"
								aria-valuemax="100" style="width:95%">
								<span>95%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>MYSQL</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="90" aria-valuemin="0"
								aria-valuemax="100" style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>Bootstrap</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="90" aria-valuemin="0"
								aria-valuemax="100" style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>Tailwind</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="90" aria-valuemin="0"
								aria-valuemax="100" style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>Laravel</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="80" aria-valuemin="0"
								aria-valuemax="100" style="width:80%">
								<span>80%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>AJAX</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="95" aria-valuemin="0"
								aria-valuemax="100" style="width:95%">
								<span>95%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>API</h3>
						<div class="progress">
							<div class="progress-bar color-6" role="progressbar" aria-valuenow="90" aria-valuemin="0"
								aria-valuemax="100" style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
		<div class="container">
			<div class="row d-md-flex align-items-center">
				<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18">
						<div class="text">
							<strong class="number" data-number="12">0</strong>
							<span>Complete Projects</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-project" id="projects-section">
    	<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h1 class="big big-2">Projects</h1>
					<h2 class="mb-4">Our Projects</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
    		<div class="row">
    			<div class="col-md-6">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(images/project-4.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
  				</div>
  				<div class="col-md-6">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(images/project-5.jpg);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#">Branding &amp; Illustration Design</a></h3>
	    					<span>Web Design</span>
	    				</div>
    				</div>
  				</div>
    		</div>
    	</div>
    </section>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h1 class="big big-2">Contact</h1>
					<h2 class="mb-4">Contact Me</h2>
					<p>
						Get in touch with me easily using the provided contact information. Whether you have questions, inquiries, or simply want to connect, I'm here to help and engage with you.
					</p>
				</div>
			</div>

			<div class="row contact-info mb-5 align-items-center justify-content-center">
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Address</h3>
						<p>House # 18, Pathan Goth Hussainabad Hyderabad, Sindh, Pakistan</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-phone2"></span>
						</div>
						<h3 class="mb-4">Contact Number</h3>
						<p><a href="tel://923118679523">+ 92 311 8679523 <br /><br /><br /></a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-paper-plane"></span>
						</div>
						<h3 class="mb-4">Email Address</h3>
						<p><a href="aazank517@gmail.com">aazank517@gmail.com <br /><br /><br /></a></p>
					</div>
				</div>
			</div>

			<div class="row no-gutters block-9 ftco-section ftco-no-pb" id="contact-input-section">
				<div class="col-md-6 order-md-last d-flex">
					<form action="#" class="bg-light p-4 p-md-5 contact-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="7" class="form-control"
								placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>

				</div>

				<div class="col-md-6 d-flex">
					<div class="img" style="background-image: url(images/contactUs.jpg);"></div>
				</div>
			</div>
		</div>
	</section>


	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">About</h2>
						<p>
							I'm Aazan Khan Pathan, a Software Engineer at Verge Systems. With a 3-year DAE CIT diploma, a 4-month certificate in web development, and a Bachelor's degree in Commerce from the University of Sindh Jamshoro, my experience seamlessly combines business acumen with IT proficiency, showcasing adaptability across diverse domains.
						</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4 ftco-nav">
						<h2 class="ftco-heading-2">Links</h2>
							<ul class="list-unstyled">
								<li><a href="#home-section"><span class="icon-long-arrow-right mr-2"> Home</span></a></li>
								<li><a href="#about-section"><span class="icon-long-arrow-right mr-2"> About</span></a></li>
								<li><a href="#education-section"><span class="icon-long-arrow-right mr-2"> Education</span></a></li>
								<li><a href="#services-section"><span class="icon-long-arrow-right mr-2"> Services</span></a></li>
								<li><a href="#experience-section"><span class="icon-long-arrow-right mr-2"> Experience</span></a></li>
								<li><a href="#skills-section"><span class="icon-long-arrow-right mr-2"> Skills</span></a></li>
								<li><a href="#projects-section"><span class="icon-long-arrow-right mr-2">Projects</span></a></li>
								<li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"> Contact</span></a></li>
							</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">House # 18, Pathan Goth Hussainabad Hyderabad, Sindh, Pakistan</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+ 92 311 8679523</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">aazank517@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12 text-center">
					<p>
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved | This template
						is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a
							href="https://colorlib.com" target="_blank">Colorlib</a>
					</p>
				</div>
			</div> -->
		</div>
	</footer>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
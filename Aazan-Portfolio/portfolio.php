<?php
    session_start();
    require_once "vendor/Database.php";
    $objDatabase = new Database;

    $url = explode("/", $_SERVER['REQUEST_URI']);
	if ($url[count($url)-1] == "") die("No Data Found");

	if (isset($_REQUEST["pId"])) $iUserId = $_GET["pId"];
	else {
		echo "<script>alert('Please Give Corrrect Url!');</script>";
		exit;
	}

    $fetchPortFolio = $objDatabase->fetchPortFolio($iUserId);
    $fetchUser = $objDatabase->fetchUser($iUserId);

    if (mysqli_num_rows($fetchPortFolio) > 0) 
	{
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
		if (isset($aEducation["education"])) {
			$eduCode = "";
			foreach ($aEducation as $key => $value) {
				$dateFrom = explode("-", $value["educationFrom"]);
				$dateTo = isset($value['Continue']) ? 'Continue' : explode("-", $value["educationTo"]);
				$fullDate = $dateFrom[1] . "/" . $dateFrom[0] . " - " . (isset($value['Continue']) ? $dateTo : $dateTo[1] . "/" . $dateTo[0]);

				$eduCode .= '
				<div class="col-md-6 mb-5">
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
		} else {
			$eduFullCode = "";
		}
		// Education Code End

		// Services Code Start
		if (isset($aServices["services"])) {
			$srvCode = "";
			foreach ($aServices as $key => $value) {
				$srvCode .= '
				<div class="col-md-4 text-center d-flex ftco-animate">
					<span class="services-1">
						<span class="icon">
							<i class="fas fa-'. $value["iconName"] .'"></i>
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
		} else {
			$srvFullCode = "";
		}
		// Services Code End

		// Experiences Code Start
		if (isset($aExperiences["experience"])) {
			$expCode = "";
			foreach ($aExperiences as $key => $value) {
				$dateFrom = explode("-", $value["jobFrom"]);
				$dateTo = isset($value['CurrentlyWorking']) ? 'Currently Working' : explode("-", $value["jobTo"]);
				$fullDate = $dateFrom[1] . "/" . $dateFrom[0] . " - " . (isset($value['CurrentlyWorking']) ? $dateTo : $dateTo[1] . "/" . $dateTo[0]);
				$expCode .= '
				<div class="col-md-6 mb-5">
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
		} else {
			$expFullCode = "";
		}
		// Experiences Code End

		// Skills Code Start
		if (isset($aSkills["skills"])) {
			$sklCode = "";
			$search = [' ', '-', '_', '\'', '@', '"'];

			foreach ($aSkills as $key => $value) {
				$perc = str_replace("%", "", $value['skillPercentage']);
				$skillName = str_replace($search, '', $value['skillName']);
				$sklCode .= '
				<div class="col-md-6 animate-box">
					<div class="progress-wrap ftco-animate">
						<h3>'. $value['skillName'] .'</h3>
						<div class="progress">
							<div class="progress-bar color-1" id="progress-bar-'. $skillName .'" role="progressbar" aria-valuenow="'.$perc.'" aria-valuemin="0"
								aria-valuemax="'.$perc.'" style="width:'. $perc .'%">
								<span>'. $perc .'%</span>
							</div>
						</div>
					</div>
				</div>';
			}
	
			$sklFullCode = '
			<section class="ftco-section" id="skills-section">
				<div class="container">
					<div class="row justify-content-center pb-5">
						<div class="col-md-12 heading-section text-center ftco-animate">
							<h1 class="big big-2">Skills</h1>
							<h2 class="mb-4">My Skills</h2>
							<p>'. $aSkills["skills"]["description"] .'</p>
						</div>
					</div>
					<div class="row">'. $sklCode .'</div>
				</div>
			</section>';

			// Complete Projects Code Start
			$Complete_Proj_FullCode = '
			<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
				<div class="container">
					<div class="row d-md-flex align-items-center">
						<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18">
								<div class="text">
									<strong class="number" data-number="'. $aSkills["skills"]["completeProjects"] .'">'. $aSkills["skills"]["completeProjects"] .'</strong>
									<span>Complete Projects</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>';
			// Complete Projects Code End
		} else {
			$sklFullCode = "";
			$Complete_Proj_FullCode = "";
		}
		// Skills Code End

		// Projects Code Start
		if (isset($aProjects["projects"])) {
			$projCode = "";
			foreach ($aProjects as $key => $value) {
				$projCode .= '
				<div class="col-md-6">
					<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(images/Projects/User_'.$iUserId. "/" .$value["imageName"].');">
						<div class="overlay"></div>
						<div class="text text-center p-4">
							<h3><a href="#">'.$value["projectsName"].'</a></h3>
							<span>'.$value["projectsType"].'</span>
						</div>
					</div>
				</div>';
			}
	
			$projFullCode = '
			<section class="ftco-section ftco-project" id="projects-section">
				<div class="container">
					<div class="row justify-content-center pb-5">
						<div class="col-md-12 heading-section text-center ftco-animate">
							<h1 class="big big-2">Projects</h1>
							<h2 class="mb-4">Our Projects</h2>
							<p>'. $aProjects["projects"]["description"] .'</p>
						</div>
					</div>
					<div class="row">'. $projCode .'</div>
				</div>
			</section>';
		} else {
			$projFullCode = "";
		}
		// Projects Code End

    } else {
        die("No Data Found");
    }

	// menu code
	$eduMenu = (isset($aEducation["education"]["education_Toggle"])) ? '<li class="nav-item"><a href="#education-section" class="nav-link"><span>Education</span></a></li>' : "";
	$servicesMenu = (isset($aServices["services"]["services_Toggle"])) ? '<li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>' : "";
	$expMenu = (isset($aExperiences["experience"]["experience_Toggle"])) ? '<li class="nav-item"><a href="#experience-section" class="nav-link"><span>Experience</span></a></li>' : "";
	$skillsMenu = (isset($aSkills["skills"]["skills_Toggle"])) ? '<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>' : "";
	$projectMenu = (isset($aProjects["projects"]["projects_Toggle"])) ? '<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>' : "";
	// menu code end
	
	// bottom menu code
	$edu_btm_Menu = (isset($aEducation["education"]["education_Toggle"])) ? '<li><a href="#education-section"><span class="icon-long-arrow-right mr-2"> Education</span></a></li>' : "";
	$services_btm_Menu = (isset($aServices["services"]["services_Toggle"])) ? '<li><a href="#services-section"><span class="icon-long-arrow-right mr-2"> Services</span></a></li>' : "";
	$exp_btm_Menu = (isset($aExperiences["experience"]["experience_Toggle"])) ? '<li><a href="#experience-section"><span class="icon-long-arrow-right mr-2"> Experience</span></a></li>' : "";
	$skills_btm_Menu = (isset($aSkills["skills"]["skills_Toggle"])) ? '<li><a href="#skills-section"><span class="icon-long-arrow-right mr-2"> Skills</span></a></li>' : "";
	$project_btm_Menu = (isset($aProjects["projects"]["projects_Toggle"])) ? '<li><a href="#projects-section"><span class="icon-long-arrow-right mr-2"> Projects</span></a></li>' : "";
	// bottom menu code end

	$profile = "no-image.jpg";
	if (mysqli_num_rows($fetchPortFolio) > 0)
	{
		$aUserData = mysqli_fetch_assoc($fetchUser);
		if ($aUserData["profile"] != "") $profile = "/".$aUserData['profile'];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PortFolio - Aazan Khan Pathan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/logo.png"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css" rel="stylesheet">
	<style id="skills-Style"></style>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="">PortFolio</a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse ftco-nav" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
					<?= $eduMenu; ?>
					<?= $servicesMenu; ?>
					<?= $expMenu; ?>
					<?= $skillsMenu; ?>
					<?= $projectMenu; ?>
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
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="container-home">
								<div class="text">
									<span class="subheading">Hello!</span>
									<h1 class="mb-4 mt-3">I'm <span><?= $aUserData["fullName"] ?></span></h1>
									<h2 class="mb-4"><?= $aUserData["occupation"] ?></h2>
									<p>
										<div class="ftco-nav">
											<a href="#contact-input-section" class="btn btn-primary py-3 px-4">Hire me</a>
											<?php if($aUserData["workUrl"] != '') {?>
												<a href="<?= $aUserData["workUrl"] ?>" target="_blank" class="btn btn-white btn-outline-white py-3 px-4">My works</a>
											<?php } ?>
										</div>
									</p>
								</div>
								<div class="home-img">
									<img src="images/Profiles/<?= $profile ?>">
								</div>
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
				<div class="col-md-12 pl-lg-5 pb-5">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section ftco-animate text-center">
							<h1 class="big big-2">About</h1>
							<h2 class="mb-4">About Me</h2>
							<p><?= $aAbout["aboutDescription"]; ?></p>
						</div>
					</div>
					<div class="counter-wrap ftco-animate mt-md-3 text-center">
						<div class="text">
							<?php if($aUserData["resume"] != '') {?>
								<p><a href="vendor/Resumes/<?= $aUserData["resume"] ?>" target="_blank" class="btn btn-primary py-3 px-3">Download CV</a></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?= $eduFullCode; ?>
	<?= $srvFullCode; ?>
	<?= $expFullCode; ?>
	<?= $sklFullCode; ?>
	<?= $Complete_Proj_FullCode; ?>
	<?= $projFullCode; ?>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h1 class="big big-2">Contact</h1>
					<h2 class="mb-4">Contact Me</h2>
					<p><?= $aContact["Description"]; ?></p>
				</div>
			</div>

			<div class="row contact-info mb-5 align-items-center justify-content-center">
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-map-signs"></span>
						</div>
						<h3 class="mb-4">Address</h3>
						<p><?= $aUserData["address"] ?></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-phone2"></span>
						</div>
						<h3 class="mb-4">Contact Number</h3>
						<p><a href="tel://923118679523">+ 92-<?= preg_replace("/(\d{3})(\d{3})(\d{4})/", "$1-$2$3", substr($aUserData["mobile"], 1)) ?> <br /><br /><br /></a></p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex ftco-animate">
					<div class="align-self-stretch box p-4 text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="icon-paper-plane"></span>
						</div>
						<h3 class="mb-4">Email Address</h3>
						<p><a href="#"><?= $aUserData["email"] ?> <br /><br /><br /></a></p>
					</div>
				</div>
			</div>

			<div class="row no-gutters block-9 ftco-section ftco-no-pb" id="contact-input-section">
				<div class="col-md-6 order-md-last d-flex">
					<form id="SendEmail" class="bg-light p-4 p-md-5 contact-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name" name="name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Email" name="email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject" name="subject">
						</div>
						<div class="form-group">
							<textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
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
					<div class="ftco-footer-widget mb-4 ml-md-4 ftco-nav">
						<h2 class="ftco-heading-2">Links</h2>
						<ul class="list-unstyled">
							<div class="row">
								<div class="col-md-6">
									<li><a href="#home-section"><span class="icon-long-arrow-right mr-2"> Home</span></a></li>
									<li><a href="#about-section"><span class="icon-long-arrow-right mr-2"> About</span></a></li>
									<?= $edu_btm_Menu ?>
									<?= $services_btm_Menu ?>
								</div>
								<div class="col-md-6">
									<?= $exp_btm_Menu ?>
									<?= $skills_btm_Menu ?>
									<?= $project_btm_Menu ?>
									<li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"> Contact</span></a></li>
								</div>
							</div>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text"><?= $aUserData["address"] ?></span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+ 92-<?= preg_replace("/(\d{3})(\d{3})(\d{4})/", "$1-$2$3", substr($aUserData["mobile"], 1)) ?></span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $aUserData["email"] ?></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
	<script>
		$(document).ready(function(){

			// SendEmail Form Submittion
			$(document).on("submit", "#SendEmail", function(event) {
				event.preventDefault();
				var formdata = new FormData(this);

				let timerInterval;
				Swal.fire({
				title: "Loading!",
				// html: "I will close in <b></b> milliseconds.",
				timer: 3000,
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading();
					const timer = Swal.getPopup().querySelector("b");
					timerInterval = setInterval(() => {
					timer.textContent = `${Swal.getTimerLeft()}`;
					}, 100);
				},
				willClose: () => {
					clearInterval(timerInterval);
				}
				})
			
				$.ajax({
					url: "vendor/Process.php?action=SendEmail",
					type: "POST",
					data: formdata,
					cache: false,
					processData: false,
					contentType: false,
					success: function(result){
						console.log(result)
						
						if(result == 1){
							const Toast = Swal.mixin({
							toast: true,
							position: "top-end",
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.onmouseenter = Swal.stopTimer;
								toast.onmouseleave = Swal.resumeTimer;
							}
							});
							Toast.fire({
							icon: "success",
							title: "E-mail Sent successfully!"
							});

							$("#SendEmail").trigger("reset");
						}		
						else if (result == 0) {
							const Toast = Swal.mixin({
							toast: true,
							position: "top-end",
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.onmouseenter = Swal.stopTimer;
								toast.onmouseleave = Swal.resumeTimer;
							}
							});
							Toast.fire({
							icon: "error",
							title: "E-mail Sending Fail!"
							});
						}
						else if (result == "fill") {
							const Toast = Swal.mixin({
							toast: true,
							position: "top-end",
							showConfirmButton: false,
							timer: 3000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.onmouseenter = Swal.stopTimer;
								toast.onmouseleave = Swal.resumeTimer;
							}
							});
							Toast.fire({
							icon: "error",
							title: "Please Fill All Fields Carefully!"
							});
						}
					}
				});
			});
		});
	</script>
</body>
</html>
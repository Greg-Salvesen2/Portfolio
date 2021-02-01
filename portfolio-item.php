<?php
	ini_set('display_errors', 1);
	error_reporting(-1);
	$project = htmlspecialchars($_GET["project"]);
	$mysqli = new mysqli('localhost', 'shadowar_portfolio', 'P3r5ona!65', 'shadowar_portfolio');
	if($mysqli -> connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		exit();
	}

	$sql = "SELECT * FROM project WHERE project_id = " . $project; 

	$projName = "";
	$projImage1 = "";
	$projImage2 = "";
	$projSubtitle = "";
	$projDescription = "";
	$projCollab = "";
	$projStatus = "";
	$projLink = "";
	if($result = $mysqli -> query($sql)) {
		if($obj = $result -> fetch_object()) {
			$projName = $obj->name;
			$projImage1 = $obj->main_image;
			$projImage2 = $obj->second_image;
			$projSubtitle = $obj->subtitle;
			$projDescription = $obj->description;
			$projCollab = $obj->collaborators;
			$projStatus = $obj->status;
			$projLink = $obj->link;	
		} else {
			echo "Could not find project <a href=\"index.html\">Click here to go back</a>";
			exit();
		}
	} else {
		echo "Could not Find project";
		exit();
	}
	
	mysqli_close($mysqli);	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Greg Salvesen's Portfolio</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
		
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="img/logo.png">

		<!-- Fonts Used -->
		<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,900|Source+Sans+Pro:300,900&display=swap" rel="stylesheet">



		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
            		<div class="logo">
                		<a href = "index.html#work"><img src="img/logo.png" alt=""></a>
            		</div>
            		<button class="nav-toggle" aria-label="toggle navigation">
                		<span class="hamburger"></span>
            		</button>
            		<nav class="nav">
                		<ul class="nav__list">
                    			<li class="nav__item"><a href="index.html#home" class="nav__link">Home</a></li>
                    			<li class="nav__item"><a href="index.html#services" class="nav__link">My Services</a></li>
                    			<li class="nav__item"><a href="index.html#about" class="nav__link">About me</a></li>
                    			<li class="nav__item"><a href="index.html#work" class="nav__link">My Work</a></li>
                		</ul>
            		</nav>
       	 	</header>
        
        	<!-- Introduction -->
        	<section class="intro" id="home">
            		<h1 class="section__title section__title--intro">
                		Project: <strong><?php echo $projName?></strong>
            		</h1>
            		<p class="section__subtitle section__subtitle--intro"><?php echo $projSubtitle; ?> </p>
            		<img src="img/<?php echo $projImage1; ?>" alt="a picture of Greg Salvesen smiling" class="intro__img">
        	</section> 
        

		<div class="portfolio-item-individual">
			<p>
				<strong>Description: </strong><?php echo $projDescription ?>
			</p>	
			<p>
				<strong>Status: </strong><?php echo $projStatus ?>
			</p>
			<p>
				<strong>How to Find: </strong><?php echo $projLink?>
			</p>
		</div>
		
		<!-- Footer -->
		<footer class="footer">
			<a href="mailto:greg@latenightdesigns.com" class="footer__link">greg@latenightdesigns.com</a>
			<ul class="social-list">
				<li class="social-list__item">
					<a class="social-list__link" href="http://www.github.com/Greg-Salvesen2">
						<i class="fab fa-github"></i>
					</a>
				</li>
				<li class="social-list__item">
					<a class="social-list__link" href="https://www.linkedin.com/in/gregory-salvesen-49082272/">
						<i class="fab fa-linkedin"></i>
					</a>
				</li>
				<li class="social-list__item">
					<a class="social-list__link" href="https://www.codewars.com/users/ramunarok">
						<img class="codewars_logo" src="img/codewars.png">
					</a>
				</li>
			</ul>
		</footer>

		<script src="js/index.js"></script>		
	</body>
</html>

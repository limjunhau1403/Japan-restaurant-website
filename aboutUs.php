<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="public/sushi.png"></link>
	<link rel="stylesheet" href="css/style.css"></link>
	<title> MADOKA JAPANESE RESTAURANT </title>
</head>	

<body>
	<header>
		<?php include ('includes/navheader.php')?>
	</header>
	
	<section class="about-us" id="about-us">
		<div class="about-us__image">
			<div class="about-us__image-sushi3">
				<img src="assets/sushi-3.png" alt="sushi" />
			</div>
			
			<button class="about-us__button"> 
			Learn More 
				<img src="assets/arrow-up-right.svg" alt="learn more"/>
			</button>
			
			<div class="about-us__image-sushi2">
				<img src="assets/sushi-2.png" alt="sushi" />
			</div>
			
		</div>
		
		<div class="about-us__content"> 
		<p class="sushi_subtitle"> About Us / 私たちに関しては </p>
		<h3 class="sushi__title"> Our mission is to bring true Japanese flavours to you.</h3>
		<p class="sushi__description"> We will continue to provide the experience of Omotenashi
			, the Japanese mindset of hospitality, with our shopping and dining for our customer.</p>
		</div>
	</section>
	
	
	<?php include ('includes/footer.php')?>
	<script src="js/script.js" type="module"></script>
</body>
</html>
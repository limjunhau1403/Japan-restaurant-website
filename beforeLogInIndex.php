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
		<?php include ('includes/beforenavheader.php')?>
	</header>

	<section class="hero">
		<div class="hero-image">
			<img src="assets/sushi-1.png" alt="sushi"> </img>
			<h2>
				日 <br>
				式 <br>
				风 <br>
				味
			</h2>
			
			<div class="hero-image__overlay"></div>
		</div>
		
		<div class="hero-content">
			<div class="hero-content-info">
			<h1> Feel the storm of japanese style food</h1>
			<p> Come and taste the most popular japanese food on anytime.</p>
			
				<div class="hero-content__buttons">
				<button class="hero-content__order-button">
				<a href="login.php">Buy Now</a>
				</button>
				</div>
			</div>
			
			
			<div class="hero-content__testimonial">
				<div class="hero-content__customer flex-center">
					 <h4>69k+</h4>
					 <p>Satisfy Customers</p>
				</div>
				
				<div class="hero-content__review">
					<img src="assets/user.png" alt="user" />
					<p> "The best Japanese food buffet and services that ever existed."</p>
				</div>
			</div>
		</div>
	</section>
	

	<?php include('includes/beforefooter.php')?>
	<script src="js/script.js" type="module"></script>
</body>
</html>
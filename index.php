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
				<a href="buffetDetails.php">Buy Now</a>
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
	
	<section class="popular-foods" id="menu">
		<h2 class="popular-foods__title"> Popular Food / 人気 </h2>
	
		<div class="popular-foods__catalog">
			<!-- No.1 sushi-->
			<article class="popular-foods__card"> 
				<img class="popular-foods__card-image" src="assets/Tamagoyaki.png" alt="tamago-sushi"/>
				<h4 class="popular-foods__card-title"> Tamago Sushi </h4>
				
				<div class="popular-foods__card-details flex-between">
					<div class="popular-foods__card-rating">
						<img src="assets/star.svg" alt="star"/>
						<p>4.0</p>
					</div>
				</div>
			</article>
			<!-- No.2 sushi-->
			<article class="popular-foods__card active-card">
				<img class="popular-foods__card-image" src="assets/Unagi.png" alt="unagi-sushi"/>
				<h4 class="popular-foods__card-title"> Unagi Sushi </h4>
				
				<div class="popular-foods__card-details flex-between">
					<div class="popular-foods__card-rating">
						<img src="assets/star.svg" alt="star"/>
						<p>4.9</p>
					</div>
				</div>
			</article>
			<!-- No.1 ramen-->
			<article class="popular-foods__card active-card">
				<img class="popular-foods__card-image" src="assets/KAISEN-SPICY-RAMEN.png" alt="KAISEN-SPICY-RAMEN"/>
				<h4 class="popular-foods__card-title"> Kaisen Spicy Ramen </h4>
				
				<div class="popular-foods__card-details flex-between">
					<div class="popular-foods__card-rating">
						<img src="assets/star.svg" alt="star"/>
						<p>4.9</p>
					</div>
				</div>
			</article>
			<!-- No.2 ramen-->
			<article class="popular-foods__card">
				<img class="popular-foods__card-image" src="assets/KITSUNE-UDON.png" alt="KITSUNE-UDON"/>
				<h4 class="popular-foods__card-title"> Kitsune Udon </h4>
				
				<div class="popular-foods__card-details flex-between">
					<div class="popular-foods__card-rating">
						<img src="assets/star.svg" alt="star"/>
						<p>4.5</p>
					</div>
				</div>
			</article>
			<!-- No.1 dessert-->
			<article class="popular-foods__card"> 
				<img class="popular-foods__card-image" src="assets/Hokkaido-Milk-Parfait.png" alt="Hokkaido-Milk-Parfait"/>
				<h4 class="popular-foods__card-title"> Hokkaido Milk Parfait </h4>
				
				<div class="popular-foods__card-details flex-between">
					<div class="popular-foods__card-rating">
						<img src="assets/star.svg" alt="star"/>
						<p>4.0</p>
					</div>
				</div>
			</article>
			<!-- No.2 dessert-->
			<article class="popular-foods__card">
				<img class="popular-foods__card-image" src="assets/Matcha-Parfait.png" alt="Matcha-Parfait"/>
				<h4 class="popular-foods__card-title"> Matcha Parfait </h4>
				
				<div class="popular-foods__card-details flex-between">
					<div class="popular-foods__card-rating">
						<img src="assets/star.svg" alt="star"/>
						<p>4.5</p>
					</div>
				</div>
			</article>
		</div>
		
		<button class="popular-foods__button">
			<a href="popular.php">Explore food</a>
			<img src="assets/arrow-right.svg" alt="arrow-right"/>
		</button>
</section>
	
	<?php include('includes/footer.php')?>
	<script src="js/script.js" type="module"></script>
</body>
</html>
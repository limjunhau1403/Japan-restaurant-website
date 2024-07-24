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
<header>
	<?php include ('includes/navheader.php')?>
</header>
<body>
<section class="trending" id="food">
		<section class="trending-sushi">
		<div class="trending__content">	
			<h3 class="sushi__title">Adult Ticket</h3>
			<h3 class="sushi__title">(RM 95)</h3>
			<p class="sushi__description">For more information, <a href="buffetDetails.php">
			<span class="text-color"> click here...</a></span></p>
		</div>
		
		<div class="trending__image flex-center">
			<img src="assets/buffet1.png" alt="buffet-1"/>
  
			<div class="trending__arrow trending__arrow-left">
				<img src="assets/arrow-vertical.svg"/>
			</div>
  
			<div class="trending__arrow trending__arrow-bottom">
				<img src="assets/arrow-horizontal.svg"/>
			</div>
        </div>
		</section>
		

		<section class="trending-drinks">
        <div class="trending__image flex-center">
          <img src="assets/buffet2.png" alt="buffet-2"/>
  
          <div class="trending__arrow trending__arrow-top">
            <img src="assets/arrow-horizontal.svg" alt="arrow horizontal" />
          </div>
  
          <div class="trending__arrow trending__arrow-right">
            <img src="assets/arrow-vertical.svg" alt="arrow vertical" />
          </div>
        </div>

        <div class="trending__content">
          <h3 class="sushi__title">Children Ticket</h3>
          <h3 class="sushi__title">(RM 50)</h3>
        <p class="sushi__description">For more information, <a href="buffetDetails.php">
		<span class="text-color"> click here...</a></span></p>  
        </div>
      </section>
</section>
	
<?php include('includes/footer.php')?>
<script src="js/script.js" type="module"></script>
</body>
</html>
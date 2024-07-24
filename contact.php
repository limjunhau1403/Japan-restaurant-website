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

<section class="contact flex-center" id="services">
		<h2> Ask us anything! <br />
			just submit your questions below!
		</h2>
		<p> Submit you info below for more enquiries or to contact us!</p>
	
		<div class="contact__form">
    <form action="processContact.php" method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Subject" required>

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" placeholder="Your Message" required></textarea>

        <button type="submit">Submit</button>
    </form>
</div>


</section>
	
	
<?php include('includes/footer.php')?>
<script src="js/script.js" type="module"></script>
</body>
</html>
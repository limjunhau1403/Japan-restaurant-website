<?php 
	$conn = mysqli_connect('localhost','root','','assignment');
	
	if(isset($_POST['submit'])){
		
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = md5($_POST['password']);
		$cpassword = md5($_POST['cpassword']);
		
		$select = "SELECT * FROM user_form WHERE email = '$email' && password = '$password'";
		
		$result = mysqli_query($conn, $select);
		
		if(mysqli_num_rows($result) > 0){
			
			$error[] = 'Email already exist!';
		}else{
			if($password != $cpassword){
				$error[] = 'password not matched!';
			}else{
				$insert = "INSERT INTO user_form(name,email,password)VALUES('$name','$email','$password')";
			if(mysqli_query($conn, $insert)){
			header('location:login.php');
			exit;
			} else {
				$error[] = 'Error registering user!';
			};
		};
	};
};
?>

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

	<div class="form__container">
		<form action="" method="post">
			<h3> register now</h3>
			<?php
			if(isset($error)){
				foreach($error as $error){
					echo '<span class="error-msg">'.$error.'</span>';
				};
			};
			?>
			
			<input type="text" name="name" required placeholder="Enter your name">
			<input type="email" name="email" required placeholder="Enter your email">
			<input type="password" name="password" required placeholder="Enter your password">
			<input type="password" name="cpassword" required placeholder="Confirm your password">
			<input type="submit" name="submit" value="register now" class="form-btn">
			<p>already have an account? <a href="login.php">login now</a></p>
		</form>
	</div>
	<?php include('includes/beforefooter.php')?>
	<script src="js/script.js" type="module"></script>
</body>
</html>
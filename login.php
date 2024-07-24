<?php 
    $conn = mysqli_connect('localhost','root','','assignment');
    session_start();
    if(isset($_POST['submit'])){
        
        $nameOrEmail = mysqli_real_escape_string($conn,$_POST['name']);
        $password = md5($_POST['password']);
        
        // Check if the input matches either name or email
        $select = "SELECT * FROM user_form WHERE (name = '$nameOrEmail' OR email = '$nameOrEmail') AND password = '$password'";
        
        $result = mysqli_query($conn, $select);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['name'];
            header('location:index.php');
            exit; 
        } else {
            $error[] = 'Incorrect name, email, or password!';
        }
    }
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
            <h3> login now</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            
            <input type="text" name="name" required placeholder="Enter your name or email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Do not have an account? <a href="register.php">register now</a></p>
        </form>
    </div>
    <?php include('includes/beforefooter.php')?>
    <script src="js/script.js" type="module"></script>
</body>
</html>

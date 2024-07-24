<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" href="css/style.css"></link>
    <style>
        body {
            font-family: var(--plus-jakarta-sans);
            background-color: #f4f4f4;
            text-align: center;
        }

        .thankyou {
            margin: 100px auto;
            padding: 20px;
            background-color: var(--primary-color);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 50px
            color: var(--black-200);
        }

        p {
            font-size: 20px;
            color: var(--black-200);
        }
    </style>
</head>
<body>

<div class="thankyou">
    <h2>Thank You!</h2> <br>
    <p>Your form has been submitted successfully.</p>
</div>

<script>
    // Redirect to index after 5 seconds
    setTimeout(function(){
        window.location.href = "index.php";
    }, 5000); // 5000 milliseconds = 5 seconds
</script>

</body>
</html>

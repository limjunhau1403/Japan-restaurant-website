<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="public/sushi.png"></link>
    <link rel="stylesheet" href="css/style.css"></link>
    <title> MADOKA JAPANESE RESTAURANT </title>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 100%;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td:first-child, th:first-child {
            border-left: none;
        }
        td:last-child, th:last-child {
            border-right: none;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>    
<header>
    <?php include ('includes/navheader.php')?>
</header>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data from the database
$sql = "SELECT * FROM contact_messages";
$result = $conn->query($sql);
?>
<body>
    <h2>Contact Form Data</h2>
    <?php if (isset($success_message)) : ?>
        <p><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["subject"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No form submissions found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// Close connection
$conn->close();
?>

<?php include('includes/footer.php')?>

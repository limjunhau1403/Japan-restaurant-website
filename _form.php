<?php

// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = "";
$dbName = 'assignment';

// Connect to MySQL database
$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve contact messages from the database
$sql = "SELECT * FROM contact_messages";
$result = $mysqli->query($sql);

// Check if there are any contact messages
if ($result->num_rows > 0) {
    // Initialize an empty array to store contact messages
    $_SESSION['contact_messages'] = array();

    // Fetch and store each contact message in the session
    while ($row = $result->fetch_assoc()) {
        $_SESSION['contact_messages'][] = $row;
    }
}

// Redirect back to the admin page
header("Location: admin.php");
$conn->close();
?>

<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    if (empty($_POST["name"])) {
        $errors[] = "Name is required";
    }
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($_POST["subject"])) {
        $errors[] = "Subject is required";
    }
    if (empty($_POST["message"])) {
        $errors[] = "Message is required";
    }

    // If there are no validation errors, insert data into MySQL
    if (empty($errors)) {
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

        // Prepare and bind SQL statement to insert form data
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        // Get form data and sanitize
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            $success_message = "Form data submitted successfully";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();

        header("Location: thank-you.php");
    }
}
?>

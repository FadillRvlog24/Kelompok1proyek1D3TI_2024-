<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_kedai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $first_name = sanitizeInput($_POST["first_name"]);
    $last_name = sanitizeInput($_POST["last_name"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);
    $confirm_password = sanitizeInput($_POST["confirm_password"]);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO admin (first_name, last_name, email, password, confirm_password, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $password, $confirm_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        // Redirect to login page
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

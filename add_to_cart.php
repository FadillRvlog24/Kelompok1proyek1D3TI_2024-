<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "database_kedai");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare data
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    

    // Insert into database
    $stmt = $mysqli->prepare("INSERT INTO cart (product_name, price, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $product_name, $price, $quantity);
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Redirect back to the cart page or wherever you want
    header("Location: cart.php");
    exit();
}

// Close MySQL connection
$mysqli->close();
?>

<?php
// Database connection
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

// Check if an order ID is provided
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Update order status to 'accepted'
    $sql = "UPDATE transaksi SET status = 'accepted' WHERE id = '$order_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Status pesanan berhasil diperbarui.";
        // Redirect back to the admin order management page
        header("Location: tables.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No order ID provided.";
}

$conn->close();
?>

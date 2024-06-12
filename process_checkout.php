<?php
// Mulai sesi
session_start();

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

// Handle checkout process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telp'];
    $total_pembayaran = $_POST['total_pembayaran'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Insert order details into transaksi table
    $insert_sql = "INSERT INTO transaksi (nama, alamat, no_telepon, total_pembayaran, metode_pembayaran, status) VALUES ('$nama', '$alamat', '$no_telepon', '$total_pembayaran', '$metode_pembayaran', 'pending')";
    if ($conn->query($insert_sql) === TRUE) {
        // Order details inserted successfully

        // Clear entire cart (no user_id used)
        $clear_cart_sql = "DELETE FROM cart";
        if ($conn->query($clear_cart_sql) === TRUE) {
            // Cart cleared successfully
            // Redirect to thank you page
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Error clearing cart: " . $conn->error;
        }
    } else {
        echo "Error inserting order details: " . $conn->error;
    }
}

$conn->close();
?>

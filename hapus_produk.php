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

// Ambil ID produk dari URL
$id = $_GET['id'];

// Kueri DELETE untuk menghapus produk dari keranjang belanja
$sql = "DELETE FROM cart WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produk berhasil dihapus dari keranjang belanja.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();

// Redirect kembali ke halaman keranjang belanja
header("Location: cart.php");
exit;
?>

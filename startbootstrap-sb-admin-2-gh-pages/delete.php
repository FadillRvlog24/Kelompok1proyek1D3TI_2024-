<?php
// Konfigurasi database
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database_kedai";

// Membuka koneksi database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menghapus data berdasarkan kolom email
$email = isset($_POST['email']) ? $_POST['email'] : '';

if ($email) {
    $stmt = $conn->prepare("DELETE FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute() === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Email tidak disediakan.";
}

$conn->close();
?>

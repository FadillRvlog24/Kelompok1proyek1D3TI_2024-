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

// Menampilkan data berdasarkan kolom email
$email = isset($_GET['email']) ? $_GET['email'] : '';

if ($email) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "ID: " . $row['id'] . "<br>";
        echo "Nama Depan: " . $row['first_name'] . "<br>";
        echo "Nama Belakang: " . $row['last_name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Password: " . $row['password'] . "<br>";
        echo "Konfirmasi Password: " . $row['confirm_password'] . "<br>";
        echo "Created At: " . $row['created_at'] . "<br>";
    } else {
        echo "Data tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "Email tidak disediakan.";
}

$conn->close();
?>
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

// Menampilkan data dari tabel user
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table><tr><th>ID</th><th>Nama Depan</th><th>Nama Belakang</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 hasil";
}

$conn->close();
?>

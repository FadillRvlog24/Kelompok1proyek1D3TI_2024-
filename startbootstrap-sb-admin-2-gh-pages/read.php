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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="read.css">
</head>
<body>
    <div class="container">
        <h2>Data Pengguna</h2>
        <?php
        if ($result->num_rows > 0) {
            // Menampilkan data dalam bentuk tabel
            echo "<table><tr><th>ID</th><th>Nama Depan</th><th>Nama Belakang</th><th>Email</th><th>Password</th><th>confirm_password</th><th>created_at</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["confirm_password"]."</td><td>".$row["created_at"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>0 hasil</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>

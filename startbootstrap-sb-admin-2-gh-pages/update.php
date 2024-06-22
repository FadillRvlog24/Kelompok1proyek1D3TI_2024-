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

// Mengambil nilai dari formulir HTML
$email = isset($_POST['email']) ? $_POST['email'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Memperbarui data berdasarkan kolom email
if ($email && $first_name && $last_name && $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE user SET first_name = ?, last_name = ?, password = ? WHERE email = ?");
    $stmt->bind_param("ssss", $first_name, $last_name, $hashed_password, $email);

    if ($stmt->execute() === TRUE) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Semua kolom harus diisi!";
}

$conn->close();
?>

<?php
// Konfigurasi database
$dbHost = "localhost"; // Host database
$dbUsername = "root"; // Username database
$dbPassword = ""; // Password database
$dbName = "database_kedai"; // Nama database

// Membuka koneksi database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil nilai dari formulir HTML dan memeriksa apakah ada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    // Periksa apakah semua nilai ada
    if ($first_name && $last_name && $email && $password && $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, password, confirm_password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $confirm_password);

        // Memeriksa apakah data berhasil disimpan
        if ($stmt->execute() === TRUE) {
            // Redirect ke login.html
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Menutup koneksi database
        $stmt->close();
    } else {
        echo "Semua kolom harus diisi!";
    }
}

$conn->close();
?>

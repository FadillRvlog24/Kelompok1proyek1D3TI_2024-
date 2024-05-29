<?php
// Memulai sesi
session_start();

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
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($email && $password) {
    // Mempersiapkan statement SQL
    $stmt = $conn->prepare("SELECT id, first_name, last_name, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Memverifikasi password
        if (password_verify($password, $row['password'])) {
            // Memulai sesi dan menyimpan informasi pengguna
            $_SESSION['id'] = $row['id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $email;

            // Kembali respons berhasil
            echo json_encode(["status" => "success", "message" => "Login berhasil"]);
        } else {
            echo json_encode(["Password salah."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Email tidak ditemukan."]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Semua kolom harus diisi!"]);
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "database_kedai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_user = $_POST['nama_user'];
    $password_user = password_hash($_POST['password_user'], PASSWORD_DEFAULT); // Hash the password
    $email_user = $_POST['email_user'];
    $notelp_user = $_POST['notelp_user'];
    $alamat_user = $_POST['alamat_user'];

    $sql = "INSERT INTO user (nama_user, password_user, email_user, notelp_user, alamat_user) 
            VALUES ('$nama_user', '$password_user', '$email_user', '$notelp_user', '$alamat_user')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

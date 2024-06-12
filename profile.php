<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database_kedai";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT first_name, last_name, email, password, confirm_password FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email = $row["email"];
    $password = $row["password"];
    $confirm_password = $row["confirm_password"];
} else {
    echo "Profile not found";
    exit();
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    text-align: left;
    margin-top: 50px;
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #444;
}

p {
    font-size: 16px;
    margin-bottom: 8px;
}

.password {
    font-size: 16px;
    margin-bottom: 8px;
    color: #777; /* Mengubah warna teks password agar lebih tersembunyi */
    font-style: italic; /* Menambahkan gaya miring pada teks password */
}

a, .logout-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #007BFF;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.3s;
}

a:hover, .logout-btn:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <p>First Name: <?php echo htmlspecialchars($first_name); ?></p>
        <p>Last Name: <?php echo htmlspecialchars($last_name); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Password: <?php echo htmlspecialchars($password); ?></p>
        <p>Confirm Password: <?php echo htmlspecialchars($confirm_password); ?></p>
        <a href="update_profile.php">Update Profile</a>
        <form action="logout.php" method="post" style="display: inline;">
            <button type="submit" class="logout-btn">Log Out</button>
        </form>
        <a href="beranda.html" class="back-to-home">Back to Home</a>
    </div>
</body>
</html>

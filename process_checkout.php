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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $total_pembayaran = $_POST['total_pembayaran'];
    $bukti_transfer = '';

    // Handle file upload if Transfer Bank is selected
    if ($metode_pembayaran === 'Transfer Bank' && isset($_FILES['bukti_transfer'])) {
        $target_dir = "uploads/";
        // Ensure the uploads directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["bukti_transfer"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["bukti_transfer"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["bukti_transfer"]["size"] > 5000000) { // 5MB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["bukti_transfer"]["tmp_name"], $target_file)) {
                $bukti_transfer = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Save the order information to the database
    $stmt = $conn->prepare("INSERT INTO transaksi (nama, alamat, no_telepon, metode_pembayaran, total_pembayaran, bukti_transfer) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssds", $nama, $alamat, $no_telp, $metode_pembayaran, $total_pembayaran, $bukti_transfer);

    if ($stmt->execute()) {
        // Delete all items from the cart
        $sql = "DELETE FROM cart";
        if ($conn->query($sql) === TRUE) {
            echo "All items removed from the cart successfully";
        } else {
            echo "Error deleting cart items: " . $conn->error;
        }

        // Redirect to thank you page
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

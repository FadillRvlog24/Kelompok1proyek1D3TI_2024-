<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <img src="WhatsApp_Image_2024-03-20_at_22.20.31_ab55953d-removebg-preview.png" width="120" alt=""><span></span></a>
    <a class="navbar-brand">Kedai kitta<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="beranda.html">Beranda</a>
            </li>
            <li><a class="nav-link" href="menu.html">Menu</a></li>
            <li><a class="nav-link" href="about.html">Tentang kami</a></li>
            <li><a class="nav-link" href="promotion.html">Promosi</a></li>
            <li class="nav-link" href="location.html">Lokasi</a></li>
            <li class="active"><a class="nav-link" href="myorder.php">Pesanan saya</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
<li><a class="nav-link" href="chat.html"><img src="icons8-message-30.png"></a></li>
            <li><a class="nav-link" href="cart.php"><img src="icons8-cart-24 (1).png"></a></li>
            <li><a class="nav-link" href="profile.php"><img src="icons8-user-30.png"></a></li>
            
        </ul>
    </div>
</div>

    
</nav>

    <div class="container mt-5">
        <h2 class="mb-4">Pesanan Saya</h2>
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

        // Retrieve order details
        $sql = "SELECT * FROM transaksi ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Order #" . $row["id"] . "</h5>";
                echo "<p class='card-text'>Nama: " . $row["nama"] . "</p>";
                echo "<p class='card-text'>Alamat: " . $row["alamat"] . "</p>";
                echo "<p class='card-text'>No Telepon: " . $row["no_telepon"] . "</p>";
                echo "<p class='card-text'>Total Pembayaran: Rp. " . $row["total_pembayaran"] . "</p>";
                echo "<p class='card-text'>Metode Pembayaran: " . $row["metode_pembayaran"] . "</p>";
                echo "</div></div>";
            }
        } else {
            echo "Tidak ada pesanan.";
        }
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

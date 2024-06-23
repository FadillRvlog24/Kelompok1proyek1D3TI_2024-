<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="">
  <link rel="shortcut icon" href="WhatsApp_Image_2024-03-20_at_22.20.31_ab55953d-removebg-preview.png">
  
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="menu3.css">
  <title>Kedai kitta</title>
</head>

<body>
  
  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand">
        <img src="WhatsApp_Image_2024-03-20_at_22.20.31_ab55953d-removebg-preview.png" width="120" alt="">Kedai kitta <span></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item ">
            <a class="nav-link" href="beranda.php">Beranda</a>
          </li>
          <li class="active"><a class="nav-link" href="menu.php">Menu</a></li>
          <li><a class="nav-link" href="about.html">Tentang kami</a></li>
          <li><a class="nav-link" href="promotion.html">Promosi</a></li>
          <li><a class="nav-link" href="location.html">Lokasi</a></li>
          <li><a class="nav-link" href="myorder.php">Pesanan saya</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li><a class="nav-link" href="chat.html"><img src="icons8-message-30.png"></a></li>
          <li><a class="nav-link" href="cart.php"><img src="icons8-cart-24 (1).png"></a></li>
          <li><a class="nav-link" href="profile.php"><img src="icons8-user-30.png"></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="div">
    <div class="div-2">
      <div class="div-3">
        <div class="column">
          <img src="alpucok cheese.jpeg" alt="" width="300">
        </div>
        <div class="column-2">
          <div class="div-4">
            <div class="div-5">alpucok cheese</div>
            <div class="div-6">Rp.20.000</div>
            <div class="div-7">
              <?php
                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'database_kedai');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                // Fetch product stock
                $sql = "SELECT quantity FROM products WHERE name='alpucok cheese'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='div-10'>Stok: " . $row["quantity"] . "</div>";
                  }
                } else {
                  echo "<div class='div-10'>Stok: Tidak tersedia</div>";
                }

                $conn->close();
              ?>
            </div>
            <div class="div-8">
              <form action="add_to_cart.php" method="post">
                <input type="hidden" name="product_name" value="alpucokcheese">
                <input type="hidden" name="price" value="13000">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="div-9">Tambahkan ke keranjang</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
  <script src="cart.js"></script>
</body>
</html>

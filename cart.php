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

// Fetch cart items
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="WhatsApp_Image_2024-03-20_at_22.20.31_ab55953d-removebg-preview.png">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="menu3.css">
    <title>Kedai kitta</title>
</head>
<body>
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand">
                <img src="WhatsApp_Image_2024-03-20_at_22.20.31_ab55953d-removebg-preview.png" width="120" alt="">Kedai kitta
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-link" href="cart.php">Beranda</a>
                  </li>
                    <li><a class="nav-link" href="menu.html">Menu</a></li>
                    <li><a class="nav-link" href="about.html">Tentang kami</a></li>
                    <li><a class="nav-link" href="promotion.html">Promosi</a></li>
                    <li><a class="nav-link" href="location.html">Lokasi</a></li>
                    <li><a class="nav-link" href="myorder.php">Pesanan saya</a></li>
                </ul>
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="chat.html"><img src="icons8-message-30.png"></a></li>
                    <li><a class="nav-link" href="cart.php"><img src="icons8-cart-24 (1).png"></a></li>
                    <li><a class="nav-link" href="profile.html"><img src="icons8-user-30.png"></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Keranjang saya</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPrice = 0; 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['product_name']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['quantity']}</td>
                            <td>" . ($row['price'] * $row['quantity']) . "</td>
                            <td><a href='hapus_produk.php?id={$row['id']}' class='btn btn-danger'>Hapus</a></td>
                        </tr>";
                        
                        $totalPrice += $row['price'] * $row['quantity'];

                    }

                } else {
                    echo "<tr><td colspan='4'>Your cart is empty.</td></tr>";
                }

                echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>Rp. " . $totalPrice . "</strong></td></tr>";

                ?>
            </tbody>
        </table>
    </div>
    <br>
    
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                   
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Total</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rp.</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		
<br>
		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="WhatsApp_Image_2024-03-20_at_22.20.31_ab55953d-removebg-preview.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Masukkan nama kamyu">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Masukkan email kamu">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Kedai kitta<span>.</span></a></div>
						<p class="mb-4">Temukan ragam pilihan makanan dan minuman yang menggugah selera di Kedai Kitta, destinasi terbaik untuk menikmati santap bersama keluarga dan teman-teman.</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
						<p class="mb-2">
							<i class="fa fa-map-marker-alt me-3"></i>"Desa Krasak Blok Gorda Depan lapangan volly"
							<p class="mb-2">
								<i class="fa fa-phone-alt me-3"></i>"+62821-1589-7188"
							</p>
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
						</div>
				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;
								<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. <a href="https://untree.co"></a> <!-- License information: https://untree.co/license/ -->
                        </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
    <script src="cart.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Panggil fungsi untuk menghitung dan menampilkan total harga saat halaman dimuat
    calculateTotalPrice();

    // Tambahkan event listener untuk setiap kali terjadi perubahan pada keranjang belanja
    // Jika ada perubahan, hitung dan tampilkan kembali total harga
    window.addEventListener('cartUpdated', calculateTotalPrice);

    function calculateTotalPrice() {
        // Ambil semua baris dalam tabel keranjang belanja
        var rows = document.querySelectorAll(".table tbody tr");
        var totalPrice = 0;

        // Loop melalui setiap baris
        rows.forEach(function(row) {
            // Ambil harga dan kuantitas dari setiap baris
            var price = parseFloat(row.cells[1].innerText);
            var quantity = parseFloat(row.cells[2].innerText);

            // Hitung total harga untuk item tersebut dan tambahkan ke total harga keseluruhan
            totalPrice += price * quantity;
        });

        // Tampilkan total harga pada elemen dengan id 'total-price'
        document.getElementById("total-price").innerText = "Total: Rp. " + totalPrice.toFixed(2);
    }
});
</script>
	</body>

</html>
</body>
</html>

<?php
$conn->close();
?>

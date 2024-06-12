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
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Kedai kitta - Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Checkout</h2>
        <form action="process_checkout.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon:</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="COD">COD</option>
                    <option value="DANA">E-wallet DANA</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>
            <div id="bank_info" style="display:none;">
                <h4>Informasi Rekening Bank</h4>
                <p>Bank: BCA</p>
                <p>Nomor Rekening: 1234567890</p>
                <p>Atas Nama: Kedai Kitta</p>
            </div>
            <br>
            <h3>Detail Pembelian</h3>
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
                            </tr>";
                            $totalPrice += $row['price'] * $row['quantity'];
                        }
                    } else {
                        echo "<tr><td colspan='4'>Your cart is empty.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="form-group">
                <h3>Total Pembayaran: Rp. <?php echo $totalPrice; ?></h3>
                <input type="hidden" name="total_pembayaran" value="<?php echo $totalPrice; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>

    <script>
        document.getElementById('metode_pembayaran').addEventListener('change', function() {
            var bankInfo = document.getElementById('bank_info');
            if (this.value === 'Transfer Bank') {
                bankInfo.style.display = 'block';
            } else {
                bankInfo.style.display = 'none';
            }
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>

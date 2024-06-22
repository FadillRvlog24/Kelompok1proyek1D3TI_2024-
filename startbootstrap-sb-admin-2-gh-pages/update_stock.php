<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_kedai";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'update_stock') {
        $product_id = $_POST['product_id'];
        $new_stock = $_POST['new_stock'];

        // Query untuk memperbarui stok
        $sql = "UPDATE products SET quantity = quantity + ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $new_stock, $product_id);

        if ($stmt->execute()) {
            echo "Stok produk berhasil diperbarui.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'add_product') {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        // Query untuk menambahkan produk baru
        $sql = "INSERT INTO products (name, price, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $product_name, $product_price, $product_quantity);

        if ($stmt->execute()) {
            echo "Produk baru berhasil ditambahkan.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'update_price') {
        $product_id = $_POST['product_id'];
        $new_price = $_POST['new_price'];

        // Query untuk memperbarui harga
        $sql = "UPDATE products SET price = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("di", $new_price, $product_id);

        if ($stmt->execute()) {
            echo "Harga produk berhasil diperbarui.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Aksi tidak dikenali.";
    }
}

$conn->close();
?>

<?php
// Validasi apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['c_fname'];
    $telepon = $_POST['c_phone'];
    $email = $_POST['c_email_address'];
    $alamat_pengiriman = $_POST['c_diff_address'];
    $catatan_order = $_POST['c_order_notes'];
    $metode_pembayaran = $_POST['payment_method'];
    
    // Ambil data barang dari keranjang
    $produk1 = "Hotdog + juice";
    $harga1 = 15000;
    $jumlah1 = 1;
    $produk2 = "Beef Burger + juice";
    $harga2 = 20000;
    $jumlah2 = 1;
    $produk3 = "Hotdog + juice";
    $harga3 = 15000;
    $jumlah3 = 1;
    $produk4 = "Paket menu burger chicken + juice";
    $harga4 = 18000;
    $jumlah4 = 1;

    // Hitung total harga
    $total_harga = ($harga1 * $jumlah1) + ($harga2 * $jumlah2) + ($harga3 * $jumlah3) + ($harga4 * $jumlah4);

    // Simpan pesanan ke database atau lakukan proses pembayaran sesuai metode pembayaran yang dipilih
    // ...

    // Kirim konfirmasi pesanan
    $konfirmasi_pesanan = "Terima kasih $nama atas pesanan Anda! Pesanan Anda sedang diproses.";
    
    // Tampilkan konfirmasi pesanan
    echo "<script>alert('$konfirmasi_pesanan');</script>";
    // Redirect ke halaman terima kasih
    echo "<script>window.location='thankyou.html';</script>";
}
?>

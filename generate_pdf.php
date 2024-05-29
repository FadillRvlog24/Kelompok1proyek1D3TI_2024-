<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'database_kedai';

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
require('fpdf.php');
include 'koneksi.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details
    $order_result = mysqli_query($koneksi, "SELECT * FROM orders WHERE id = $order_id");
    $order = mysqli_fetch_assoc($order_result);

    if ($order) {
        // Fetch order items
        $items_result = mysqli_query($koneksi, "SELECT * FROM order_items WHERE order_id = $order_id");

        // Create a new PDF instance
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(200, 10, 'Order Details', 0, 0, 'C');
        $pdf->Ln(15);

        // Order Information
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'Order Number: ', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(100, 10, $order['order_number'], 0, 1);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'Order Date: ', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(100, 10, $order['order_date'], 0, 1);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'Payment Method: ', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(100, 10, $order['payment_method'], 0, 1);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'Customer Name: ', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(100, 10, $order['customer_name'], 0, 1);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'Address: ', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(0, 10, $order['address'], 0, 1);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'Phone: ', 0, 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(100, 10, $order['phone'], 0, 1);

        $pdf->Ln(10);

        // Table Header
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(80, 10, 'Product Name', 1, 0);
        $pdf->Cell(20, 10, 'Qty', 1, 0);
        $pdf->Cell(40, 10, 'Price', 1, 0);
        $pdf->Cell(40, 10, 'Total', 1, 1);

        // Table Rows
        $pdf->SetFont('Times', '', 12);
        while ($item = mysqli_fetch_assoc($items_result)) {
            $pdf->Cell(80, 10, $item['product_name'], 1, 0);
            $pdf->Cell(20, 10, $item['quantity'], 1, 0);
            $pdf->Cell(40, 10, 'Rp.' . number_format($item['price'], 0, ',', '.'), 1, 0);
            $pdf->Cell(40, 10, 'Rp.' . number_format($item['quantity'] * $item['price'], 0, ',', '.'), 1, 1);
        }

        // Total
        $pdf->Cell(140, 10, 'Total', 1, 0, 'R');
        $pdf->Cell(40, 10, 'Rp.' . number_format($order['total'], 0, ',', '.'), 1, 1, 'R');

        $pdf->Output();
    } else {
        echo "Order not found.";
    }
} else {
    echo "Order ID is missing.";
}
?>

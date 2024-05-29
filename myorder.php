<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Order Details - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="myorder.css">
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
                    <li><a class="nav-link" href="location.html">Lokasi</a></li>
                    <li class="active"><a class="nav-link" href="myorder.html">Pesanan saya</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="chat.html"><img src="icons8-message-30.png"></a></li>
                    <li><a class="nav-link" href="cart.html"><img src="icons8-cart-24 (1).png"></a></li>
                    <li><a class="nav-link" href="profile.html"><img src="icons8-user-30.png"></a></li>
                    
                </ul>
            </div>
        </div>
            
    </nav>
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #16123222</h2>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">22-11-2023</span>
                                    <span class="me-3">#16123222</span>
                                    <span class="me-3">COD (Bayar di tempat)</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text" onclick="window.location.href='generate_pdf.php?order_id=1'">
                                        <i class="bi bi-download"></i>
                                        <span class="text">Print Tagihan</span>
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="chicken burger.jpeg" alt width="50" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0"><a href="menu3.html" class="text-reset">Chicken burger</a></h6>
                                                    <span class="small"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td class="text-end">Rp.20.000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="Red Velvet 4 lyfe.jpeg" alt width="50" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0"><a href="menu3.html" class="text-reset">Red velvet</a></h6>
                                                    <span class="small"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td class="text-end">Rp.30.000</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="kebab beef.jpeg" alt width="50" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0"><a href="menu3.html" class="text-reset">Kebab beef</a></h6>
                                                    <span class="small"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>1</td>
                                        <td class="text-end">Rp.10.000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td class="text-end">Rp.60.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Pengiriman</td>
                                        <td class="text-end">Rp.10.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Discount</td>
                                        <td class="text-danger text-end">-</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td colspan="2">TOTAL</td>
                                        <td class="text-end">Rp.65.000</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Methode pembayaran</h3>
                                    <p>Cash on delivery <br> Total: Rp.65.000<span>
                                    </span>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Billing address</h3>
                                    <address>
                                        <strong>Gita</strong><br> 1355 Market St, Suite 900<br>  Lorem ipsum dolor sit amet consectetur, 4511<br>
                                        <a>081xxx</a>

                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Catatan Customer</h3>
                            <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <strong></strong>
                            <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i class="bi bi-box-arrow-up-right"></i> </span>
                            <hr>
                            <h3 class="h6">Alamat pengiriman</h3>
                            <address>
                                <strong>Gita</strong><br> 1355 Market St, 900<br> Lorem ipsum dolor sit amet consectetur, 45111<br>
                                <a>081xxxxx</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

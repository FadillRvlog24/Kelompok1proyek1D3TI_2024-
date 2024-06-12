<?php
// Set cookie if user accepts
if (isset($_POST['accept_cookies'])) {
    setcookie('cookie_consent', 'accepted', time() + (86400 * 30), "/");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// Handle session expiration
if (isset($_COOKIE['last_activity']) && time() - $_COOKIE['last_activity'] > 600) { // 600 detik = 10 menit
    setcookie('cookie_consent', '', time() - 3600, "/"); // Hapus cookie consent
    // Redirect or show a warning
    header("Location: session_expired.php");
    exit();
}

// Update last activity time
setcookie('last_activity', time(), time() + (86400 * 30), "/");
?>

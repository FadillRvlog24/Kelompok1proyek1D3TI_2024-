<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Extend session if user chooses to extend
if (isset($_POST['extend'])) {
    $_SESSION['last_activity'] = time();
}

// Logout user if they choose to cancel
if (isset($_POST['cancel'])) {
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit();
}

// Set session timeout period (e.g., 5 minutes)
$timeout = 30;

// Check for session timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>

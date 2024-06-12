<?php
if (isset($_POST['accept_cookies'])) {
    // Set a cookie that expires in 5 minutes (300 seconds)
    setcookie('cookie_consent', 'accepted', time() + 300, "/");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

if (isset($_POST['decline_cookies'])) {
    // Set a cookie that expires in 5 minutes (300 seconds) to indicate decline
    setcookie('cookie_consent', 'declined', time() + 300, "/");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>

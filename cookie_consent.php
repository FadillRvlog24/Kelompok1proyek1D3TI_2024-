<?php
if (isset($_POST['accept_cookies'])) {
    // Set a cookie that expires in 10 minutes (600 seconds)
    setcookie('cookie_consent', 'accepted', time() + 600, "/");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>

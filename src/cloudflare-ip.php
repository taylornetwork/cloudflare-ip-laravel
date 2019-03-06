<?php

// Include this file in your index.php file before the app is initialized.
// You can run install.php to do this for you.

if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

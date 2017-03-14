<?php
session_start();
$token = $_POST['token'];
if ($token == $_SESSION['token']) {
    unset($_SESSION['loggedIn']);
    unset($_SESSION['apiKey']);
    unset($_SESSION['facebookId']);
    echo "success";
}


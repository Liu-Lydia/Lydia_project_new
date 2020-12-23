<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['lydia_admins'])) {
    header('Location: login.php');
    exit;
}
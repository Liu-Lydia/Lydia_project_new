<?php
session_start();

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$time = isset($_GET['ReservationTime']) ? $_GET['ReservationTime'] : 0;
$qty = isset($_GET['NumMeal']) ? intval($_GET['NumMeal']) : 0;

if(! empty($sid)){

    if(! empty($time)){
        $_SESSION['cart'][$sid] = $time;
    }else{
        unset($_SESSION['cart'][$sid]);
    }
    if(! empty($qty)){
        $_SESSION['cart'][$sid] = $qty;
    }else{
        unset($_SESSION['cart'][$sid]);
    }
}

echo json_encode($_SESSION['cart']);
header('Content-Type: application/json');
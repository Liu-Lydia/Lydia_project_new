<?php
require __DIR__ . '/db_connect.php';

if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);
    $pdo->query("DELETE FROM `surprise_list_detail` WHERE sid=$sid");
}

if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);
    $pdo->query("DELETE FROM `surprise_times` WHERE sid=$sid");
}

if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);
    $pdo->query("DELETE FROM `kitchen_list_detail` WHERE sid=$sid");
}

if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);
    $pdo->query("DELETE FROM `kitchen_times` WHERE sid=$sid");
}

$backTo = "surprise_list_detail.php";
if (isset($_SERVER["HTTP_REFERER"])) {
    $backTo = $_SERVER["HTTP_REFERER"];
}

$backTo = "surprise_times.php";
if (isset($_SERVER["HTTP_REFERER"])) {
    $backTo = $_SERVER["HTTP_REFERER"];
}

$backTo = "kitchen_list_detail.php";
if (isset($_SERVER["HTTP_REFERER"])) {
    $backTo = $_SERVER["HTTP_REFERER"];
}

$backTo = "kitchen_times.php";
if (isset($_SERVER["HTTP_REFERER"])) {
    $backTo = $_SERVER["HTTP_REFERER"];
}

header('Location: '. $backTo);

<?php
require __DIR__ . '/db_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
];

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
// exit;

$o_sql = "INSERT INTO `reservation`(`sid`, `ReservationDate`, `ReservationTime`, `NumMeal`, `NumPeople`, `OrderPrice`, `OrderDate`) VALUE (null, ?, ?, ?, null, null, NOW())";
$o_stmt = $pdo->prepare($o_sql);


$o_stmt->execute([
    date($_POST['ReservationDate']),
    $_POST['ReservationTime'],
    $_POST['NumMeal'],
]);

$output['success']  = true;

echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;



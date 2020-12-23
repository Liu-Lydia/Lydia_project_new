<?php
require __DIR__ . '/db_connect.php';


// if(empty($_SESSION['cart'])){
//     echo json_encode([
//         'code' => 300,
//         'error' => '購物車沒有任何項目'
//     ],JSON_UNESCAPED_UNICODE);
//     exit;
// }

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


// <?php
// require __DIR__ . '/is_admins.php';
// require __DIR__ . '/db_connect.php';

// $output = [
//     'success' => false,
//     'code' => 0,
//     'error' => '參數不足',
// ];

// if(! isset($_POST['sid'])){
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// $sql = "INSERT INTO `reservation`(`sid`, `ReservationDate`, `ReservationTime`, `NumMeal`, `NumPeople`, `OrderPrice`, `OrderDate`) VALUES (null, ?, ?, ?, ?, ?, NOW())";
// //新增整個表單連同sid null也要放入

// $stmt = $pdo ->prepare($sql);

// $stmt -> execute([
//     intval($_POST['ReservationDate']),
//     intval($_POST['ReservationTime']),
//     intval($_POST['NumMeal']),
// ]);
// //將表單放入執行,對應的是name

// $output['rowCount'] = $stmt -> rowCount();
// if($stmt -> rowCount()){
//     $output['success'] = true;
//     unset($output['error']);
// }

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
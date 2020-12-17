<?php
require __DIR__ . '/db_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
];

if(! isset($_POST['Price'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO `surprise_list_detail`(`NumPeople`, `NumMeal`, `OrderPrice`) VALUES ?,?,?)";

$stmt = $pdo ->prepare($sql);

$stmt -> execute([
    $_POST['NumPeople'],
    $_POST['NumMeal'],
    $_POST['OrderPrice'],
]);

$output['rowCount'] = $stmt -> rowCount();
if($stmt -> rowCount()){
    $output['success'] = true;
    unset($output['error']);
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

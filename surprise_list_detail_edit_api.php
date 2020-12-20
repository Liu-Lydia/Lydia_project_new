<?php
require __DIR__ . '/is_admins.php';
require __DIR__ . '/db_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
];

if(! isset($_POST['sid']) or ! isset($_POST['OrderPrice'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "UPDATE `surprise_list_detail` SET 
`NumPeople`=?,
`NumMeal`=?,
`OrderPrice`=? 
WHERE `sid`=?";

$stmt = $pdo ->prepare($sql);

$stmt -> execute([
    intval($_POST['NumPeople']),
    intval($_POST['NumMeal']),
    intval($_POST['OrderPrice']),
    intval($_POST['sid'])

]);
//將表單放入執行,對應的是name

$output['rowCount'] = $stmt -> rowCount();
if($stmt -> rowCount()){
    $output['success'] = true;
    unset($output['error']);
}else{
    $output['error'] = '資料沒有修改';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

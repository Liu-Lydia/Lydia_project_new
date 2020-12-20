<?php
require __DIR__ . '/is_admins.php';
require __DIR__ . '/db_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
];

if(! isset($_POST['sid']) or ! isset($_POST['Price'])){
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "UPDATE `kitchen_list_detail` SET 
`NumPeople`=?,
`SetMeal`=?,
`Price`=? 
WHERE `sid`=?";

$stmt = $pdo ->prepare($sql);

$stmt -> execute([
    $_POST['NumPeople'],
    $_POST['SetMeal'],
    intval($_POST['Price']),
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

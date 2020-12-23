<?php
require __DIR__ . '/is_admins.php';
require __DIR__ . '/db_connect.php';

$upload_folder = __DIR__. '/uploads';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
];

$ext_map = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

$fields = [];

if($_POST['new_password']==null){
    $output['error']='密碼沒有更改';

}

$fields[] = "`nickname`=". $pdo->quote($_POST['nickname']);

if(! empty($_POST['new_password'])){
    $fields[] = sprintf("`password`=SHA1(%s)", $pdo->quote($_POST['new_password']));
}

if(! empty($_FILES) and ! empty($_FILES['avatar']['type']) and $ext_map[$_FILES['avatar']['type']]){
    $output['file'] = $_FILES;

    $filename = uniqid(). $ext_map[$_FILES['avatar']['type']];
    $output['filename'] = $filename;
    if(move_uploaded_file( $_FILES['avatar']['tmp_name'], $upload_folder. '/' . $filename)){
        $fields[] = "`avatar`= '$filename' ";
    }
}

$sql = sprintf("UPDATE `lydia_admins` SET %s WHERE sid=? AND password=SHA(?) ", implode(',' ,$fields));

$output['sql'] = $sql;

$stmt = $pdo ->prepare($sql);

$stmt -> execute([
    $_SESSION['lydia_admins']['sid'],
    $_POST['password'],
]);

if($stmt -> rowCount()==1){
    $output['success'] = true;

    $_SESSION['lydia_admins'] = $pdo->query("SELECT * FROM lydia_admins WHERE sid=". intval($_SESSION['lydia_admins']['sid']))
    ->fetch();
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;

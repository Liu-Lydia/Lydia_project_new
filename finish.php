<?php
require __DIR__ . '/db_connect.php';

$title = '預約驚喜廚房';
$pageName = 'surprise_list';
?>

<?php include __DIR__ . "/parts/head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<div class="container">

    <div class="row mt-2">
        <div class="col d-flex justify-content-center">
            <div style="color: #627e2a;">
                感謝預約,歡迎再次預約
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/foot.php" ?>
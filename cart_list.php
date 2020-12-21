<?php
require __DIR__ . '/db_connect.php';

$title = '購物車';
$pageName = 'cart_list';

$orders = array_keys($_SESSION['cart']);

$rows = [];
$data_ar = [];

if (!empty($orders)) {
    $sql = sprintf("SELECT * FROM surprise_list WHERE sid IN(%s)", implode(',', $orders));
    $rows = $pdo->query($sql)->fetchAll();

    foreach ($rows as $r) {
        $r['NumPeople'] = $_SESSION['cart'][$r['sid']];
        $data_ar[$r['sid']] = $r;
    }
}
?>

<?php include __DIR__ . "/parts/head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col mt-4">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">項次</th>
                        <th scope="col">日期</th>
                        <th scope="col">場次</th>
                        <th scope="col">餐數</th>
                        <th scope="col">人數</th>
                        <th scope="col">預約金額總計</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $sid => $qty) : $item = $data_ar[$sid]; ?>
                        <tr class="p-item" data-sid="<?= $sid ?>">

                            <td><?= $item['ReservationDate'] ?></td>
                            <td><?= $item['ReservationTime'] ?></td>
                            <td>@mdo</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include __DIR__ . "/parts/script.php"; ?>
<script>

</script>

<?php include __DIR__ . "/parts/foot.php"; ?>
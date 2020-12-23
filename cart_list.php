<?php
require __DIR__ . '/db_connect.php';

$title = '購物車';
$pageName = 'cart_list';

$p_sql = "SELECT * FROM reservation WHERE 1";
$stmt = $pdo->query($p_sql);
?>

<?php include __DIR__ . "/parts/head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">



    <div class="row d-flex justify-content-between">
        <div class="col mt-4">

            <table class="separate table_style text-center">
                <thead class="head_style">
                    <tr>
                        <th class="trleft_style" scope="col">日期</th>
                        <th scope="col">場次</th>
                        <th scope="col">餐數</th>
                        <th scope="col">人數</th>
                        <th class="trright_style" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="content_style">

                    <?php while ($r = $stmt->fetch()) : ?>

                        <tr class="p-item">

                            <td>
                                <?= $r['ReservationDate'] ?>
                            </td>

                            <td>
                                <?= $r['ReservationTime'] ?>
                            </td>

                            <td>
                                <?= $r['NumMeal'] ?>
                            </td>

                            <td>
                                <select class="form-control select_width">
                                <?php for ($i = 1; $i < 7; $i++) : ?>
                                <option><?= $i ?></option>
                            <?php endfor; ?>
                                </select>
                            </td>

                            <td class="remove-icon"><a href="javascript:del_it(<?= $r['sid'] ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </a></td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>

            <div class="btn-style">
                <?php if (isset($_SESSION['lydia_admins'])) : ?>
                    <a href="finish.php"><input class="btn btn-primary" type="submit" value="預約"></input></a>
                <?php else : ?>
                    <div class="alert alert-danger" role="alert">
                        請先登入才能預約!
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </div>

</div>

<?php include __DIR__ . "/parts/script.php"; ?>
<script>
    function del_it(sid) {
        if (confirm(`是否刪除這筆項目`)) {
            location.href = 'ad_delete.php?sid=' + sid;
        }
    }
</script>

<?php include __DIR__ . "/parts/foot.php"; ?>
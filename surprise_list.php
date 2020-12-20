<?php
require __DIR__ . '/db_connect.php';

$title = '預約驚喜廚房';
$pageName = 'surprise_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$search = isset($_GET['search']) ? ($_GET['search']) : '';
$params = [];

$where = 'WHERE 1';
if (!empty($search)) {
    $where .= sprintf(" AND `Numpeople` LIKE %s", $pdo->quote('%' . $search . '%'));
    $params['search'] = $search;
}

$perPage = 3;
$t_sql = "SELECT COUNT(1) FROM surprise_list $where";
$totalRows = $pdo->query($t_sql)->fetch()['COUNT(1)'];
$totalPages = ceil($totalRows / $perPage);

if ($page > $totalPages) $page = $totalPages;
if ($page < 1) $page = 1;

$p_sql = sprintf("SELECT * FROM surprise_list %s ORDER BY sid ASC LIMIT %s ,%s", $where, ($page - 1) * $perPage, $perPage);

$stmt = $pdo->query($p_sql);

$t_sql = "SELECT * FROM surprise_times WHERE 1";
$times = $pdo->query($t_sql)->fetchAll();

$n_sql = "SELECT * FROM surprise_list_detail WHERE 1";
$num = $pdo->query($n_sql)->fetchAll();
?>

<?php include __DIR__ . "/parts/head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<style>
    .remove-icon a i {
        color: #B9433B;
    }

    .edit-icon a i {
        color: #a2a3a5;
    }
</style>

<div class="container">

    <div class="row mt-2">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination m-0">
                    <li class="page-item<?= $page == 1 ? 'disable' : '' ?>">
                        <a class="page-link" href="?<?php $params['page'] = 1;
                                                    echo http_build_query($params); ?>">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $params['page'] = $page - 1;
                                                    echo http_build_query($params); ?>">
                            <i class="far fa-arrow-alt-circle-left"></i>
                        </a>
                    </li>

                    <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        if ($i >= 1 and $i <= $totalPages) : ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?<?php $params['page'] = $i;
                                                            echo http_build_query($params); ?>">
                                    <?= $i ?></a>
                            </li>

                    <?php endif;
                    endfor; ?>

                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $params['page'] = $page + 1;
                                                    echo http_build_query($params); ?>">
                            <i class="far fa-arrow-alt-circle-right"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $params['page'] = $totalPages;
                                                    echo http_build_query($params); ?>">
                            <i class="fas fa-arrow-alt-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="col d-flex flex-row-reverse bd-highlight">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="search" value="<?= htmlentities($search) ?>" placeholder="Numpeople" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row">
        <?php foreach ($stmt as $r) : ?>
            <div class="col-lg-3 mt-4" data-sid="<?= $r['sid'] ?>">
                <div class="card">
                    <img src="imgs/<?= $r['img'] ?>.jpg" class="card-img-top"  alt="">
                    <div class="card-body text-center">
                        <h6 class="card-text">驚喜廚房&nbsp;&nbsp;<?= $r['ReservationDate'] ?></h6>
                        <form>
                            <div class="form-group">
                                <select class="form-control qty" style="display: inline-block; width: auto">
                                    <?php foreach ($times as $t): ?>
                                    <option value="<?= $t['sid'] ?>"><?= $t['ReservationTime'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <select class="form-control qty" style="display: inline-block; width: auto">
                                    <?php foreach ($num as $n): ?>
                                    <option value="<?= $n['sid'] ?>"><?= $n['NumPeople'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <select class="form-control qty" style="display: inline-block; width: auto">
                                <?php foreach ($num as $n): ?>
                                    <option value="<?= $n['sid'] ?>"><?= $n['NumMeal'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <button type="button" class="btn btn-primary add-to-cart-btn"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>


<?php include __DIR__ . "/parts/script.php" ?>

<script>
    function del_it(sid) {
        if (confirm(`是否刪除 ${sid} 資料`)) {
            location.href = 'ad_delete.php?sid=' + sid;
        }
    }
</script>

<?php include __DIR__ . "/parts/foot.php" ?>
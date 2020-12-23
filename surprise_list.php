<?php
require __DIR__ . '/db_connect.php';

$title = '預約驚喜廚房';
$pageName = 'surprise_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$search = isset($_GET['search']) ? ($_GET['search']) : '';
$params = [];

$where = 'WHERE 1';
if (!empty($search)) {
    $where .= sprintf(" AND `ReservationDate` LIKE %s", $pdo->quote('%' . $search . '%'));
    $params['search'] = $search;
}

$perPage = 3;
$p_sql = "SELECT COUNT(1) FROM surprise_list $where";
$totalRows = $pdo->query($p_sql)->fetch()['COUNT(1)'];
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

    .card-img-top {
        width: 200px;
    }
</style>

<div class="container">

    <div class="row mt-2">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination m-0">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php
                                                    $params['page'] = 1;
                                                    echo http_build_query($params);
                                                    ?>">
                            <i class="fas fa-arrow-alt-circle-left page-color"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $params['page'] = $page - 1;
                                                    echo http_build_query($params); ?>">
                            <i class="far fa-arrow-alt-circle-left page-color"></i>
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
                            <i class="far fa-arrow-alt-circle-right page-color"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $params['page'] = $totalPages;
                                                    echo http_build_query($params); ?>">
                            <i class="fas fa-arrow-alt-circle-right page-color"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="col d-flex flex-row-reverse bd-highlight">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="search" value="<?= htmlentities($search) ?>" placeholder="ReservationDate" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col d-flex justify-content-between mt-4">

            <?php foreach ($stmt as $r) : ?>

                <div class="card">

                    <form onsubmit="CheckForm(event); return false;">
                    
                        <input type="hidden" name="sid" value="<?= $r['sid'] ?>">
                        <input type="hidden" name="ReservationDate" value="<?= $r['ReservationDate'] ?>">
                        <div class="card-body text-center">
                            <img src="imgs/<?= $r['img'] ?>.jpg" class="card-img-top" alt="">
                            <h6 class="card-text">驚喜廚房&nbsp;&nbsp;<?= $r['ReservationDate'] ?></h6>

                            <p class="m-0 my-2">選擇場次</p>
                            <select class="form-control" id="ReservationTime" name="ReservationTime" style="display: inline-block; width: auto">
                                <?php foreach ($times as $t) : ?>
                                    <option value="<?= $t['ReservationTime'] ?>"><?= $t['ReservationTime'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <p class="m-0 my-2">選擇餐數</p>
                            <select class="form-control" id="NumMeal" name="NumMeal" style="display: inline-block; width: auto">
                                <?php foreach ($num as $n) : ?>
                                    <option value="<?= $n['NumMeal'] ?>"><?= $n['NumMeal'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i></button>
                        </div>

                    </form>

                </div>

            <?php endforeach; ?>

        </div>
    </div>

</div>


<?php include __DIR__ . "/parts/script.php" ?>

<script>
    const sid = document.querySelector('#sid');
    // const ReservationTime = document.querySelector('#ReservationTime');
    // const NumMeal = document.querySelector('#NumMeal');

    function CheckForm(event) {

        const ReservationDate = event.currentTarget;
        console.log(ReservationDate);

        let isPass = true;
        if (isPass) {
            const fd = new FormData(ReservationDate);

            fetch('add_to_cart_api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                })
        }
    };
</script>

<?php include __DIR__ . "/parts/foot.php" ?>
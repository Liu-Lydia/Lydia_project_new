<?php
require __DIR__ . '/is_admins.php';
require __DIR__ . '/db_connect.php';

$title = '驚喜廚房項目修改';
$pageName = 'surprise_list_detail_edit';

if (!isset($_GET['sid'])) {
    header('Location: surprise_list_detail.php');
    exit;
}

$sid = intval($_GET['sid']);

$row = $pdo
    ->query("SELECT * FROM surprise_list_detail WHERE sid=$sid")
    ->fetch();

if (empty($row)) {
    header('Location: surprise_list_detail.php');
    exit;
}
?>

<?php include __DIR__ . "/parts/head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<style>
    form small.error-msg {
        color: red;
    }
</style>

<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="alert alert-danger" role="alert" id="info" style="display: none">
                錯誤
            </div>

            <div class="card mt-4">
                <div class="card-body pt-0 pb-0">
                    <h5 class="card-title text-center pt-4">編輯驚喜廚房項目</h5>

                    <form method="POST" name="form1" novalidate onsubmit="CheckForm(); return false;">
                        <input type="hidden" name="sid" value="<?= $sid ?>">
                        <p class="mt-4">選擇人數</p>
                        <select class="form-control" id="NumPeople" name="NumPeople" value="<?= $row['NumPeople'] ?>">
                            <option><?= $row['NumPeople'] ?></option>
                            <?php for ($i = 1; $i < 7; $i++) : ?>
                                <?php if ($i != $row['NumPeople']) : ?>
                                    <option><?= $i ?></option>
                            <?php endif;
                            endfor; ?>
                        </select>

                        <p class="mt-4">選擇幾道餐數</p>
                        <select class="form-control" id="NumMeal" name="NumMeal" value="<?= $row['NumMeal'] ?>">
                            <option><?= $row['NumMeal'] ?></option>
                            <?php for ($i = 1; $i < 7; $i++) : ?>
                                <?php if ($i != $row['NumMeal']) : ?>
                                    <option><?= $i ?></option>
                            <?php endif;
                            endfor; ?>
                        </select>

                        <div class="form-group mt-4">
                            <label for="OrderPrice">輸入預約金額&nbsp;&nbsp;*500/人*</label>
                            <input type="text" class="form-control mt-2" id="OrderPrice" name="OrderPrice" value="<?= $row['OrderPrice'] ?>" required>
                            <small class="form-text error-msg" style="display:none;"></small>
                        </div>

                        <div class="d-flex justify-content-center mt-4 pt-4 pb-4">
                            <button type="submit" class="btn btn-primary">修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include __DIR__ . "/parts/script.php"; ?>

<script>
    const info = document.querySelector('#info');
    const OrderPrice = document.querySelector('#OrderPrice');

    function CheckForm() {
        info.style.display = 'none';
        let isPass = true;

        OrderPrice.style.borderColor = '#CCCCCC';
        OrderPrice.nextElementSibling.style.display = 'none';

        if (OrderPrice.value.length === 0) {
            isPass = false;
            OrderPrice.style.borderColor = 'red';
            let small = OrderPrice.closest('.form-group').querySelector('small');
            small.innerText = "請輸入金額";
            small.style.display = "block";
        }

        if (isPass) {
            const fd = new FormData(document.form1);

            fetch('surprise_list_detail_edit_api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        info.classList.remove('alert-danger');
                        info.classList.add('alert-success');
                        info.innerHTML = '修改成功';
                    } else {
                        info.classList.remove('alert-success');
                        info.classList.add('alert-danger');
                        info.innerHTML = obj.error || '修改失敗';
                    }
                    info.style.display = 'block';
                })
                .catch((err) => {
                    console.log('錯誤', err);
                });
        }
    }
</script>

<?php include __DIR__ . "/parts/foot.php"; ?>
<?php
require __DIR__ . '/is_admins.php';

$title = '私廚料理新增項目';
$pageName = 'kitcken_list_detail_insert';
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
                    <h5 class="card-title text-center pt-4">新增私廚料理項目</h5>

                    <form method="POST" name="form1" novalidate onsubmit="CheckForm(); return false;">
                        <p class="mt-4">選擇人數</p>
                        <select class="form-control" id="NumPeople" name="NumPeople">
                            <option>1-2人</option>
                            <option>3-4人</option>
                            <option>8-10人</option>
                        </select>

                        <p class="mt-4">選擇套餐</p>
                        <select class="form-control" id="SetMeal" name="SetMeal">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>

                        <div class="form-group mt-4">
                            <label for="Price">輸入套餐金額</label>
                            <input type="text" class="form-control mt-2" id="Price" name="Price" required>
                            <small class="form-text error-msg" style="display:none;"></small>
                        </div>

                        <div class="d-flex justify-content-center mt-4 pt-4 pb-4">
                            <button type="submit" class="btn btn-primary">新增</button>
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
    const Price = document.querySelector('#Price');

    function CheckForm() {
        info.style.display = 'none';
        let isPass = true;

        Price.style.borderColor = '#CCCCCC';
        Price.nextElementSibling.style.display = 'none';

        if (Price.value.length === 0) {
            isPass = false;
            Price.style.borderColor = 'red';
            let small = Price.closest('.form-group').querySelector('small');
            small.innerText = "請輸入套餐金額";
            small.style.display = "block";
        }

        if (isPass) {
            const fd = new FormData(document.form1);

            fetch('kitchen_list_detail_insert_api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        info.classList.remove('alert-danger');
                        info.classList.add('alert-success');
                        info.innerHTML = '新增成功';
                    } else {
                        info.classList.remove('alert-success');
                        info.classList.add('alert-danger');
                        info.innerHTML = obj.error || '新增失敗';
                    }
                    info.style.display = 'block';
                })
        }
    }
</script>

<?php include __DIR__ . "/parts/foot.php"; ?>
<?php
$title = '驚喜廚房新增項目';
$pageName = 'surprise_list_detail_insert';

if (!isset($_SESSION)) {
    session_start();
}
?>

<?php include __DIR__ . "/parts/head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">


            <div class="card mt-4">

                <div class="card-body">
                    <h5 class="card-title text-center">新增驚喜廚房項目</h5>
                    <form>
                        <p class="mt-4">選擇人數</p>
                        <select class="form-control">
                            <option>Default select</option>
                        </select>

                        <p class="mt-4">選擇幾道餐數</p>
                        <select class="form-control">
                            <option>Default select</option>
                        </select>
                        <div class="form-group mt-4">
                            <label for="exampleInputPassword1">輸入預約金額 *500/人*</label>
                            <input type="password" class="form-control mt-2" id="exampleInputPassword1">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </divclass=d-flex>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/foot.php" ?>
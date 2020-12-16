<?php
require __DIR__ . '/db_connect.php';

$title = '登入';


?>





<?php include __DIR__ . "/parts/head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>


<style>
    .card.top-m {
        margin-top: 100px;
    }
</style>


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="card top-m">
                <div class="card-body">
                    <h5 class="card-title">使用者登入</h5>

                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">User</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>

                        <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <!-- 記住帳號密碼 -->

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/foot.php" ?>
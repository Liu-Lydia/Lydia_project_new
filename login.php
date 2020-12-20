<?php
require __DIR__ . '/db_connect.php';

$title = '管理者登入';
$pageName = 'login';

if (isset($_POST['account']) and isset($_POST['password'])) {
    $sql = "SELECT * FROM admins WHERE account=? AND password=SHA1(?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['account'],
        $_POST['password'],
    ]);

    $row = $stmt->fetch();
    if (empty($row)) {
        $errormsg = '帳號或密碼錯誤';
    } else {
        $_SESSION['admins'] = $row;
    }
}
?>

<?php include __DIR__ . "/parts/head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<style>
    .psw {
        color: #a2a3a5;
        font-size: 14px;
        margin-left: 10px;
    }
</style>

<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-4">

            <?php if (isset($errormsg)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errormsg ?>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['admins'])) : ?>
                <div class="text-center">
                    </br>
                    <h3>歡迎回來,<?= $_SESSION['admins']['account'] ?></h3>
                    </br>
                    <p><a href="logout.php">登出</a></p>
                </div>
            <?php else : ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">登入</h5>

                        <form method="POST">
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" class="form-control" id="account" name="account" placeholder="輸入帳號" required value="<?= htmlentities($_POST['account'] ?? '') ?>">
                            </div>
                            <div class="form-group m-0">
                                <label for="password">Password</label>
                                <input type="password" class="form-control mb-2" id="password" name="password" placeholder="輸入密碼" required value="<?= htmlentities($_POST['password'] ?? '') ?>">
                                <div class="mb-3 mt-3">
                                    <i class="fas fa-eye" onclick="showhide()" id="eye"></i><span class="psw">切換顯示密碼</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">登入</button>
                        </form>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include __DIR__ . "/parts/script.php"; ?>

<script>
    const password = document.querySelector('#password');
    const eye = document.querySelector('#eye');

    function showhide() {
        if (password.type == "password") {
            password.type = "text";
            eye.className = 'fa fa-eye-slash';
        } else {
            password.type = "password";
            eye.className = 'fa fa-eye';
        }
    }
</script>

<?php include __DIR__ . "/parts/foot.php"; ?>
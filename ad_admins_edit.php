<?php
require __DIR__ . '/is_admins.php';

$title = '編輯管理者帳戶';
$pageName = 'ad_admins_edit';
?>

<?php include __DIR__ . "/parts/head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<style>
    .psw {
        color: #a2a3a5;
        font-size: 14px;
        margin-left: 10px;
    }

    form small.error-msg {
        color: red;
    }
</style>

<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-4">

            <div class="alert alert-danger" role="alert" id="info" style="display: none">
                錯誤
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">編輯管理者帳戶</h5>
                    <div class="text-center mt-4 mb-4">
                        <img alt="" id="preview" onclick="avatar.click()" src="../uploads/<?= $_SESSION['admins']['avatar'] ?>" style="width: 300px; height:300px; background-color:#a2a3a5; ">
                    </div>
                    <form name="form1" novalidate onsubmit="CheckForm(); return false;">
                        <input type="file" id="avatar" name="avatar" accept="image/*" onchange="fileChange()" style="display:none" ;>

                        <div class="form-group">
                            <label for="account">Account</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['admins']['account'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nickname">Nickname</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" value="<?= $_SESSION['admins']['nickname'] ?>">
                        </div>
                        <div class="form-group m-0">
                            <label for="password">Old Password</label>
                            <input type="text" class="form-control mb-2" id="password" name="password" placeholder="輸入原密碼" required>
                            <small class="form-text error-msg" style="display:none;"></small>
                        </div>
                        <div class="form-group m-0">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control mb-2" id="new_password" name="new_password" placeholder="輸入新密碼">
                            <div class="mb-3 mt-3">
                                <i class="fas fa-eye" onclick="showhide()" id="eye"></i><span class="psw">切換顯示密碼</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
</br>
</br>

<?php include __DIR__ . "/parts/script.php"; ?>

<script>
    const avatar = document.querySelector('#avatar');
    const preview = document.querySelector('#preview');
    const reader = new FileReader();

    reader.addEventListener('load', function(event) {
        preview.src = reader.result;
        preview.style.height = 'auto';
    });

    function fileChange() {
        reader.readAsDataURL(avatar.files[0]);

        console.log(avatar.files.length);
        console.log(avatar.files[0]);
    }

    const info = document.querySelector('#info');

    function CheckForm() {
        info.style.display = 'none';
        let isPass = true;

        password.style.borderColor = '#CCCCCC';
        password.nextElementSibling.style.display = 'none';

        if (!password.value) {
            isPass = false;
            password.style.borderColor = 'red';
            let small = password.closest('.form-group').querySelector('small');
            small.innerText = "請輸入密碼";
            small.style.display = 'block';
        }

        if (isPass) {
            const fd = new FormData(document.form1);

            fetch('ad_admins_edit_api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        // 新增成功
                        info.classList.remove('alert-danger');
                        info.classList.add('alert-success');
                        info.innerHTML = '修改成功';
                    } else {
                        info.classList.remove('alert-success');
                        info.classList.add('alert-danger');
                        info.innerHTML = obj.error || '修改失敗';
                    }
                    info.style.display = 'block';
                });
        }
    }

    const new_password = document.querySelector('#new_password');
    const eye = document.querySelector('#eye');

    function showhide() {
        if (new_password.type == "password") {
            new_password.type = "text";
            eye.className = 'fa fa-eye-slash';
        } else {
            new_password.type = "password";
            eye.className = 'fa fa-eye';
        }
    }
</script>

<?php include __DIR__ . "/parts/foot.php"; ?>
<?php
if (!isset($pageName)) $pageName = '';
?>

<style>
    .navbar-brand.self-bg {
        color: #627E2A;
    }

    .dropdown-item.self-color {
        color: #A2A3A5;
    }

    .navbar .nav-item.active {
        background-color: #F3E575;
        border-radius: 10px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand self-bg" href="index_.php">SimpleMeal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        驚喜廚房
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item self-color" href="surprise_list_detail_insert.php">新增項目</a>
                        <a class="dropdown-item self-color" href="surprise_list_detail.php">項目</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item self-color" href="surprise_times_insert.php">新增場次</a>
                        <a class="dropdown-item self-color" href="surprise_times.php">場次</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        私廚料理
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item self-color" href="kitchen_list_detail_insert.php">新增項目</a>
                        <a class="dropdown-item self-color" href="kitchen_list_detail.php">項目</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item self-color" href="kitchen_times_insert.php">新增場次</a>
                        <a class="dropdown-item self-color" href="kitchen_times.php">場次</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        私廚料理菜色組合
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item self-color" href="#">A組合</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item self-color" href="#">B組合</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item self-color" href="#">C組合</a>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</nav>
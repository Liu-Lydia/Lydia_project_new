<?php
session_start();

unset($_SESSION['lydia_admins']);

//session_destroy();

header('Location: login.php');
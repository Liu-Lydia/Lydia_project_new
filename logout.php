<?php
session_start();

unset($_SESSION['admins']);

//session_destroy();

header('Location: login.php');
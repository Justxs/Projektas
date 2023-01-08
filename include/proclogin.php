<?php

if (isset($_POST["login"])) {
    $username = $_POST["user"];
    $pass = $_POST["pass"];
    require_once 'config.php';
    require_once 'functions.php';

    if (emptyInputsLogin($username, $pass) !== false) {
        header("location: ../login.php?error=empty");
        exit();
    }
    loginUser($conn, $username, $pass);
} else {
    header("location: ../login.php");
    exit();
}

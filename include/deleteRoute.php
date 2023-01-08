<?php
if (isset($_GET["routeId"])) {
    $routeId = $_GET["routeId"];
    $uid = $_GET["uid"];

    require_once 'config.php';
    require_once 'functions.php';
    CancelRegistration($conn, $uid, $routeId);
} else {
    header("location: ../homePage.php");
    exit();
}

<?php
include_once '../header.php';
if(isset($_POST["routeReg"])){
    $start = $_POST["start"];
    $end = $_POST["end"];
    $date =  $_POST["date"];
    $price =  $_POST["price"];
    if($_POST["periodic"]!=="1"){
        $periodic = "0";
    }else{
        $periodic =  $_POST["periodic"];
    }
    require_once 'config.php';
    require_once 'functions.php';

    CreateRoute($conn, $start, $end, $date, $periodic, $price, $_SESSION['userid']);
}
else{
    header("location: ../CreateRoute.php");
}
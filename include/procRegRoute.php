<?php

if(isset($_POST["regRoute"])){
	$weight = $_POST["weight"];
    $routeId = $_POST["id"];
    $regDate = date("Y-m-d");
    
    require_once 'config.php';
    require_once 'functions.php';
	$uid=$_POST["uid"];
	if(emptyInput($weight) !== false){
        header("location: ../regRoute.php?error=empty");
        exit();
    }
    if(!is_numeric($weight)){
		header("location: ../regRoute.php?error=weightformat");
		exit();
	}
    RegisterToRoute($conn, $uid, $routeId, $regDate, $weight );
}
else{
    header("location: ../regRoute.php");
    exit();
}
<?php

if(isset($_POST["regRoute"])){
	$weight = $_POST["weight"];
    $driver = $_POST["VezejasId"];
    $id = $_POST["id"];
    require_once 'config.php';
    require_once 'functions.php';
	
	if(emptyInput($weight) !== false){
        header("location: ../regRoute.php?error=empty");
        exit();
    }
    
}
else{
    header("location: ../regRoute.php");
    exit();
}
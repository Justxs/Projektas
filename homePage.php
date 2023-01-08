<?php 
include_once 'header.php';
require_once("include/config.php");
require_once("include/functions.php");

if (!isset($_SESSION['role'])) {
     header("Location: include/logout.php");
     exit;}
$user=$_SESSION['username'];
$userlevel=$_SESSION['role'];
$role="";
foreach($user_roles as $x=>$x_value)
{
    if ($x_value == $userlevel) $role=$x;
}

if($role =="Pakeleivis"){

    include_once 'passenger.php';
}
else{    
    include_once 'driver.php';
}

mysqli_close($conn);
include_once 'footer.php';

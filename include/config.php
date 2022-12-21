<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'stud');
define('PASSWORD', 'stud');
define('DATABASE', 'Projektas');

$user_roles=array(      
"Pakeleivis"=>"1",
"Vezejas"=>"2");

$conn=mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
mysqli_set_charset($conn, "utf8");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
<?php

if(isset($_POST["register"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passRepeat = $_POST["passRepeat"];
    require_once 'config.php';
    require_once 'functions.php';

    if(emptyInputsRegister($name, $surname, $username, $phoneNumber, $email, $pass, $passRepeat) !== false){
        header("location: ../register.php?error=empty");
        exit();
    }
    if(invalidUser($username) !== false){
        header("location: ../register.php?erro=invaliduser");
        exit();
    }
    if(invalidemail($email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if(passMatch($pass, $passRepeat) !== false){
        header("location: ../register.php?error=passwordsdoesntmatch");
        exit();
    }
    if(UserExists($conn, $username) !== false){
        header("location: ../register.php?error=userexists");
        exit();
    }
    if(invalidPass($pass) !== false){
        header("location: ../register.php?error=invalidpassword");
        exit();
    }
    if(invalidPhone($phoneNumber) !== false){
        header("location: ../register.php?error=invalidphone");
        exit();
    }
    createAccount($conn, $name, $surname, $username, $phoneNumber, $email, $pass);
    exit();
}
else{
    header("location: ../register.php");
}
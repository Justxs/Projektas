<?php
session_start();
?>
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta http-equiv="X-UA-Compatible" charset="UTF-8" content="IE=9; text/html">
    <title>Pakeleivių portalas</title>
    <link rel="icon" type="image/png" href="images/carpool.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="d-flex bg-primary text-light p-3 mb-2">
        <div class="bg-light p-2 rounded">
            <img src="images/carpool.png" width="50">
        </div>
        <div class="m-3">
            <?php
            if (isset($_SESSION['username'])) {
                echo "<a href='/Projektas/homePage.php' class='btn btn-light mx-2'>Maršrutai</a>";
                echo "<a href='include/logout.php' class='btn btn-danger'>Atsijungti</a>";
            }
            ?>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="shadow bg-white p-4 rounded">
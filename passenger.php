<?php
    if (!isset($_SESSION['role'])) { header("Location: include/logout.php");exit;}
    if ($_SESSION['role'] != 1) { header("Location: homePage.php");exit;}
    $sql = "SELECT * FROM Marsrutas";
    $result = mysqli_query($conn, $sql);
    echo "
    <h1 class='text-center text-primary'>Galimi maršrutai</h1>";
    if(isset($_GET["Canceled"])){
        if($_GET["Canceled"]== "true"){
            echo "<b class='text-success'>Registracija atšaukta</b>";
        }
    }
    if(isset($_GET["error"])){
        if($_GET["error"]== "none"){
            echo "<b class='text-success'>Registracija sėkminga</b>";
        }
        if($_GET["error"]== "stmtfailed"){
            echo "<b class='text-danger'>Klaida pabandyk dar kartą</b>";
        }

    }
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
        <tr>
            <th>Išvykimo<br/>data</th>
            <th>Pradinis<br/>taškas</th>
            <th>Galinis<br/>taškas</th>
            <th>Galimas bagažo<br/>svoris(Kg)</th>
            <th>Ar periodinis?</th>
            <th>Vežėjas</th><th></th>
        </tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            $date1 = $row['IsvykimoData'];
            $date2 = date("Y-m-d");
            $timestamp1 = strtotime($date1);
            $timestamp2 = strtotime($date2);
            if($timestamp1 > $timestamp2){

                echo "
                <tr>
                <td>".$row['IsvykimoData']."</td>
                <td>".findCity($row['PradinisTaskasId'], $conn)."</td>
                <td>".findCity($row['GalinisTaskasId'], $conn)."</td>
                <td>".$row['Svoris']."</td>
                <td>".isPeriodic($row['Periodinis'])."</td>
                <td>".findDriver($row['VezejasId'])."</td>
                <td>".RouteRegistered($conn, $row['id'],$_SESSION['userid'])."</td>
                </tr>
                ";
            }
        }
        echo "</table>";
    }
    else{
        echo "<p>Maršrutų šiuo metu nėra</p>";
    }

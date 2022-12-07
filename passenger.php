<?php
    $sql = "SELECT * FROM Marsrutas";
    $result = mysqli_query($conn, $sql);
    echo "<div>
    <h1 class=\"text-primary\">Galimi maršrutai</h1>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
        <tr>
            <th>Išvykimo<br/>data</th>
            <th>Pradinis<br/>taškas</th>
            <th>Galinis<br/>taškas</th>
            <th>Galimas bagažo<br/>svoris(Kg)</th>
            <th>Ar periodinis?</th>
            <th>Vietų<br/>skaičius</th>
            <th>Vežėjas</th><th></th>
        </tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "
            <tr>
                <td>".$row['IsvykimoData']."</td>
                <td>".findCity($row['PradinisTaskasId'])."</td>
                <td>".findCity($row['GalinisTaskasId'])."</td>
                <td>".$row['Svoris']."</td>
                <td>".isPeriodic($row['Periodinis'])."</td>
                <td>".$row['VietuSk']."</td>
                <td>".findDriver($row['VezejasId'])."</td>
                <td><a href='regRoute.php?id=".$row['id']."'class='btn btn-primary'>Registruotis</a></td>
            </tr>
            </div>";
        }
        echo "</table>";
    }
    else{
        echo "<p>Maršrutų šiuo metu nėra</p>";
    }
?>
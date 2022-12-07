<?php
$sql = "SELECT * FROM Marsrutas WHERE VezejasId = ". $_SESSION["userid"];
$result = mysqli_query($conn, $sql);
echo "<h1 class='text-primary'>Mano maršrutai</h1>";
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<tr>
    <th >Maršruto Nr.</th>
    <th >Ar periodinis?</th>
    <th >Išvykimo data</th>
    <th >Pradinis miestas</th>
    <th >Galinis miestas</th></tr>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>
        <td >".$row['id']."</td>
        <td >".isPeriodic($row['Periodinis'])."</td>
        <td >".$row['IsvykimoData']."</td>
        <td >".findCity($row['PradinisTaskasId'])."</td>
        <td >".findCity($row['GalinisTaskasId'])."</td></tr>";
    }
}
else{
    echo "<p>Mano maršrutų nėra</p>";
}
echo "<a href= 'CreateRoute.php' class='btn btn-primary'>Sukurti maršrutą</a>";
?>
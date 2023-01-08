<?php
if (!isset($_SESSION['role'])) {
    header("Location: include/logout.php");
    exit;
}
if ($_SESSION['role'] != 2) {
    header("Location: homePage.php");
    exit;
}

$sql = "SELECT * FROM Marsrutas WHERE VezejasId = " . $_SESSION["userid"];

$result = mysqli_query($conn, $sql);
if (isset($_GET["error"])) {
    if ($_GET["error"] == "none") {
        echo "<b class='text-success'>Registracija sėkminga</b>";
    }
}
echo "<h1 class='text-primary'>Mano maršrutai</h1>";
echo "<a href= 'CreateRoute.php' class='btn btn-primary'>Sukurti maršrutą</a>";
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<tr>
    <th >Maršruto<br/>Nr.</th>
    <th >Ar periodinis?</th>
    <th >Išvykimo data</th>
    <th >Bagažo<br/>svoris</th>
    <th >Pradinis<br/>taškas</th>
    <th >Galinis<br/>taškas</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td >" . $row['id'] . "</td>
        <td >" . isPeriodic($row['Periodinis']) . "</td>
        <td >" . $row['IsvykimoData'] . "</td>
        <td >" . $row['Svoris'] . "</td>
        <td >" . findCity($row['PradinisTaskasId'], $conn) . "</td>
        <td >" . findCity($row['GalinisTaskasId'], $conn) . "</td></tr>";
    }
} else {
    echo "<p>Mano maršrutų nėra</p>";
}

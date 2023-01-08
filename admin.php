<?php
if (!isset($_SESSION['role'])) {
    header("Location: include/logout.php");
    exit;
}
if ($_SESSION['role'] != 3) {
    header("Location: homePage.php");
    exit;
}
$sql = "SELECT * FROM RegistruotasNaudotojas";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
        <tr>
            <th>Registracijos<br/>data</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Prisijungimo<br/>vardas</th>
            <th>El-paštas</th>
            <th>Tel. Nr.</th>
            <th>Role</th><th>Keisti rolę?</th>
        </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
            <td>" . $row['RegistracijosData'] . "</td>
            <td>" . $row['Vardas'] . "</td>
            <td>" . $row['Pavarde'] . "</td>
            <td>" . $row['PrisijungimoVardas'] . "</td>
            <td>" . $row['Epastas'] . "</td>
            <td>" . $row['TelNumeris'] . "</td>
            <td>" . findRole($row['Role'], $user_roles) . "</td>
            <td><button>Keisti</button></td>
            </tr>
            ";
    }
    echo "</table>";
} else {
    echo "<p>Vartotojų nėra</p>";
}

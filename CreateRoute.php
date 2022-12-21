<?php 
include_once 'header.php';
require_once 'include/config.php';
require_once 'include/functions.php';

if (!isset($_SESSION['role'])) { header("Location: include/logout.php");exit;}
if ($_SESSION['role'] != 2) { header("Location: homePage.php");exit;}
?>

<h1 class="text-primary">Maršruto kūrimas</h1>
<form action="include/procCreate.php" method="POST">
    <div class="form-floating mb-2 row g-2">
        <div class="col-md">
            <label class="form-label">Pradinis miestas:</label>
            <select name="start"  class="form-select">
                <option selected>Miestas...</option>
                <?php
                    getCities($conn);
                ?>
            </select>
        </div>
        <div class="col-md">
            <label class="form-label">Galinis miestas:</label>
            <select name="end" class="form-select">
                <option selected>Miestas...</option>
                <?php
                    getCities($conn);
                ?>
            </select>
        </div>
    </div>

    <label class="form-label">Išvykimo data:</label>
    <input name="date" type="date" class="form-control" min="<?=date('Y-m-d')?>" required
        oninvalid="this.setCustomValidity('Įveskite išvykimo datą')"
        oninput="this.setCustomValidity('')"/>

    <label class="mt-2 form-label">Leidžiamas bagažo svoris:</label>
    <input name="price" type="number" class="form-control" min="1" step="any" placeholder="0" required
        oninvalid="this.setCustomValidity('Įveskite išvykimo datą')"
        oninput="this.setCustomValidity('')"/>

    <div class="form-check mt-2">
        <input name="periodic" class="form-check-input" type="checkbox" value="1">
        <label>Maršrutas yra periodinis</label>
    </div>
    <button type="submit" name="routeReg" class="btn btn-primary btn-block mt-2">Registruoti maršrutą</button>
</form>
<?php
echo "<b class='text-danger'>";
if(isset($_GET["error"])){
    if($_GET["error"]== "stmtfailed"){
        echo "Klaida pabandyk dar kartą";
    }
    if($_GET["error"]== "City"){
        echo "Pasirinkite maršruto pradinį ir galinį taškus";
    }
    if($_GET["error"]== "empty"){
        echo "Ne visi laukai užpildyti!";
    }
}
echo "</b>";



include_once 'footer.php';
?>
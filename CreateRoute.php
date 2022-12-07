<?php 
include_once 'header.php';
require_once 'include/config.php';
require_once 'include/functions.php';

if (!isset($_SESSION['username']) || $_SESSION['role']==="2") { header("Location: include/logout.php");exit;}
?>
<h1 class="text-primary">Maršruto kurimas</h1>
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
    <input name="date" type="date" class="form-control">

    <label class="form-label">Kelionės kaina:</label>
    <input name="price" type="number" class="form-control" min="1" step="any" />

    <div class="form-check mt-2">
        <input name="periodic" class="form-check-input" type="checkbox" value="1">
        <label>Maršrutas yra periodinis</label>
    </div>
    <button type="submit" name="routeReg" class="btn btn-primary btn-block">Registruoti maršrutą</button>
</form>
<?php
include_once 'footer.php';
?>
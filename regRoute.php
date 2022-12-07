<?php 
    include_once 'header.php';
    require_once 'include/config.php';
    require_once 'include/functions.php';

    $sql = "SELECT * FROM Marsrutas WHERE id=".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!isset($_GET["id"]) || !$row){
        header("Location: homePage.php");exit;
    }
    $_POST['id'] = $_GET["id"];
    $_POST['VezejasId'] = $row["VezejasId"];

?>
<form action="include/procRegRoute.php" method="POST" class="regRoute">             
<h1 class="mx-auto text-primary"><b>Registracija į maršrutą</b></h1>
<h2 class="text-primary"><?=findCity($row['PradinisTaskasId'])?>-<?=findCity($row['GalinisTaskasId'])?></h2>
<div class="form-group">
    <label>Bagažo svoris:</label>
    <input class="form-control mb-3" name="weight" required placeholder="Svoris" type="number" 
    min="0" max="<?=$row['Svoris']?>"
    oninvalid="this.setCustomValidity('Įveskite bagažo svorį')"
    oninput="this.setCustomValidity('')"/>
    <button type="submit" name="regRoute" class="btn btn-primary btn-block">Registruotis į maršrutą</button>
</div>
</form>
<?php
    include_once 'footer.php';
?>
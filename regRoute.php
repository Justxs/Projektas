<?php 
    include_once 'header.php';
    require_once 'include/config.php';
    require_once 'include/functions.php';
    if (!isset($_SESSION['role'])) { header("Location: include/logout.php");exit;}
    if ($_SESSION['role'] != 1) { header("Location: homePage.php");exit;}
    $sql = "SELECT * FROM Marsrutas WHERE id=".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $uid=$_SESSION['userid'];
    if(!isset($_GET["id"]) || !$row){
        header("Location: homePage.php");exit;
    }
    $_POST['id'] = $_GET["id"];

    mysqli_close($conn);
?>
<form action="include/procRegRoute.php" method="POST" class="regRoute">             
<h1 class="mx-auto text-primary"><b>Registracija į maršrutą</b></h1>
<h2 class="text-primary"><?=findCity($row['PradinisTaskasId'])?>-<?=findCity($row['GalinisTaskasId'])?></h2>
<div class="form-group">
    <label>Bagažo svoris(Kg):</label>
    <input class="form-control mb-3" name="weight" required placeholder="Svoris" type="number" 
    min="0" max="<?=$row['Svoris']?>"
    oninvalid="this.setCustomValidity('Įveskite bagažo svorį')"
    oninput="this.setCustomValidity('')"/>
    <input type="hidden" name="id" value="<?=$_GET["id"]?>"/>
    <input type="hidden" name="uid" value="<?=$uid?>"/>
    <button type="submit" name="regRoute" class="btn btn-primary btn-block">Registruotis į maršrutą</button>
</div>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"]== "weightformat"){
            echo "<b class='text-danger'>Neteisingas svorio formatas</b>";
        }
        if($_GET["error"]== "none"){
            echo "<b class='text-danger'>ĮVeskite svorį</b>";
        }
    }
?>
</form>
<?php
    include_once 'footer.php';
?>
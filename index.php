<?php 
include_once 'header.php';
if (isset($_SESSION['role'])) { header("Location: homePage.php");exit;}
?>
<div>
    <h1 class="text-primary">Pakeleivių portalas</h1>
    <p>Autorius: Justas Pranauskis IFF-0/9</p>
    <p>Sistema sukurta <b>T120B145 Kompiuterių tinklai ir internetinės technologijos</b> modulio IT savarankiško darbo atsiskaitymui</p>
    <div>
        <a class="btn btn-secondary btn-lg" href="register.php">Registruotis</a>
        <a class="btn btn-primary btn-lg" href="login.php">Prisijungti</a>
    </div>
</div>
<?php
include_once 'footer.php';
?>


        
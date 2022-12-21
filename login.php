<?php 
include_once 'header.php';
if (isset($_SESSION['role'])) { header("Location: homePage.php");exit;}
?>

<form action="include/proclogin.php" method="POST" class="login">             
    <h1 class="mx-auto text-primary"><b>Prisijungimas</b></h1>
    <div class="form-group">
        <label>Slapyvardis:</label>
        <input class="form-control mb-3" name="user" required placeholder="Slapyvardis" type="text"
        oninvalid="this.setCustomValidity('Įveskite vartotojo slapyvardį')"
        oninput="this.setCustomValidity('')"/>

        <label>Slaptažodis:</label>
        <input class="form-control mb-3" name="pass" required placeholder="Slaptažodis" type="password"
        oninvalid="this.setCustomValidity('Įveskite slaptažodį')"
        oninput="this.setCustomValidity('')"/>

        <button type="submit" name="login" class="btn btn-primary btn-block">Prisijungti</button>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item rounded text-secondary" href="register.php">Neturi paskyros? Susikurk</a>
    </div>
</form>
<?php
    echo "<b class='text-danger'>";
    if(isset($_GET["error"])){
        if($_GET["error"]== "stmtfailed"){
            echo "Klaida pabandyk dar kartą";
        }
        if($_GET["error"]== "empty"){
            echo "Nevisi laukai yra užpildyti";
        }
        if($_GET["error"]== "wronglogin"){
            echo "Neteisingas slaptažodis arba slapyvardis";
        }
    }
    echo "</b>";
?>

<?php
include_once 'footer.php';
?>




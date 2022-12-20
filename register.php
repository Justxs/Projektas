<?php 
    include_once 'header.php';
?>

<form action="include/procregister.php" method="POST">             
    <h1 class="mx-auto text-primary"><b>Registracija</b></h1>
    <div class="form-group">
        
        <div class="form-row mb-3">
            <div class="col">
                <label>Vardas:</label>
                <input class="form-control" name="name" placeholder="Vardas" type="text" required 
                oninvalid="this.setCustomValidity('Įveskite vardą')"
                oninput="this.setCustomValidity('')"/>
            </div>
            <div class="col">
                <label>Pavardė:</label>
                <input class="form-control" name="surname" placeholder="Pavardė" type="text" required
                oninvalid="this.setCustomValidity('Įveskite Pavardę')"
                oninput="this.setCustomValidity('')"/>
            </div>
        </div>

        <label>Slapyvardis:</label>
        <input class="form-control mb-3" name="username" placeholder="Slapyvardis" type="text" required
        oninvalid="this.setCustomValidity('Įveskite slapyvardį')"
        oninput="this.setCustomValidity('')"/>

        <label>Telefono numeris:</label>
        <input class="form-control mb-3" name="phoneNumber" placeholder="+370600000000" pattern="^[+]370[0-9]{8}" type="tel" required
        oninvalid="this.setCustomValidity('Įveskite teisingo formato telefono numerį')"
        oninput="this.setCustomValidity('')"/>

        <label>El. paštas:</label>
        <input class="form-control mb-3" name="email" placeholder="El. paštas" type="email" required    
        oninvalid="this.setCustomValidity('Įveskite El. paštą')"
        oninput="this.setCustomValidity('')"/>

        <label>Slaptažodis:</label>
        <small id="passHelp" class="form-text text-muted">Slaptažodis turi būti bent 8 simbolių ir turi būti sudarytas iš skaitmenų bei raidžių.
        </small>
        <input class="form-control mb-3" aria-describedby="passHelp" name="pass" placeholder="Slaptažodis" type="password" required   
        oninvalid="this.setCustomValidity('Įveskite slaptažodį')"
        oninput="this.setCustomValidity('')"/>
        <label>Įrašykite dar kartą slaptažodį:</label>
        <input class="form-control mb-3"  name="passRepeat" placeholder="Slaptažodis" type="password" required
        oninvalid="this.setCustomValidity('Įveskite slaptažodį')"
        oninput="this.setCustomValidity('')"/> 

        <button type="submit" name="register" class="btn btn-primary btn-block">Regisruotis</button>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item rounded text-secondary" href="login.php">Jau turi paskyrą? Prisijunk</a>
    </div>
</form>
<?php
    $acc = false;
    echo "<b class=\"text-danger\">";
    if(isset($_GET["error"])){
        if($_GET["error"]== "stmtfailed"){
            echo "Klaida pabandyk dar kartą";
        }
        if($_GET["error"]== "empty"){
            echo "Nevisi laukai yra užpildyti";
        }
        if($_GET["error"]== "invaliduser"){
            echo "Neteisingas vartotojo slapyvardis";
        }
        if($_GET["error"]== "invalidpassword"){
            echo "Slaptažodis turi būti bent 8 simbolių ir turi būti sudarytas iš skaitmenų bei raidžių.";
        }
        if($_GET["error"]== "invalidemail"){
            echo "Neteisingas elektroninis paštas";
        }
        if($_GET["error"]== "invalidphone"){
            echo "Neteisingas telefono numeris";
        }
        if($_GET["error"]== "passwordsdoesntmatch"){
            echo "Slapažodžiai nesutampa";
        }
        if($_GET["error"]== "userexists"){
            echo "Toks slapyvardis jau yra užimtas";
        }
        if($_GET["error"]== "none"){
            $acc = true;
            
        }
    }
    echo "</b>";
    if($acc === true){
        echo "<b class=\"text-success\">Paskyra sėkmingai sukurta</b>";
    }
    
    include_once 'footer.php';
?>
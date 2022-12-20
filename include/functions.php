<?php
require_once("config.php");
function findCity($CityId){
	$dbc=mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	$sql = "SELECT * FROM Miestas WHERE id = '$CityId'";
	$result = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_assoc($result);
	$ans = $row["Pavadinimas"];
	return $ans;
}
function isPeriodic($Bool){
	if ($Bool == 1)
		return "Taip";
	else
		return "Ne";
}
function findDriver($Driver){
	$dbc=mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	$sql = "SELECT * FROM RegistruotasNaudotojas WHERE uid = '$Driver'";
	$result = mysqli_query($dbc, $sql);
	$row = mysqli_fetch_assoc($result);
	$ans = $row["Vardas"]." ".$row["Pavarde"];
	return $ans;
}
function emptyInputsRegister($name, $surname, $username, $phoneNumber, $email, $pass, $passRepeat){
	if(empty($name) || empty($surname) || empty($username) || empty($phoneNumber) || empty($email) || empty($pass) || empty($passRepeat)){
		return true;
	}
	return false;
}
function emptyInputsLogin($username, $pass){
	if(empty($username) || empty($pass)){
		return true;
	}
	return false;
}
function emptyInput($input){
	if(empty($input)){
		return true;
	}
	return false;
}
function invalidUser($username){
	if(!preg_match("/^([0-9a-zA-Z])*$/", $username)){
		return true;
	}
	return false;
}
function invalidPhone($phoneNumber){
	if(!preg_match("/^[+]370[0-9]{8}$/", $phoneNumber)){
		return true;
	}
	return false;
}
function invalidPass($pass){
	if(strlen($pass)>7 && preg_match('/\d/', $pass) && preg_match("/[a-zA-Z]/", $pass) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass)){
		return false;
	}
	return true;
}
function invalidemail($email){
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		return true;
	}
	return false;
}
function passMatch($pass, $passRepeat){
	if($pass !== $passRepeat){
		return true;
	}
	return false;
}
function UserExists($conn, $username){
	$sql = "SELECT * FROM RegistruotasNaudotojas WHERE PrisijungimoVardas = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../register.php?error=stmtfailed");
        exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($resultData)){
		mysqli_stmt_close($stmt);
		return $row;
	}
	else{
		return false;
	}
}
function createAccount($conn, $name, $surname, $username, $phoneNumber, $email, $pass){
	$sql = "INSERT INTO RegistruotasNaudotojas(`RegistracijosData`, `Vardas`, `Pavarde`, `Aktyvus`, `PrisijungimoVardas`, `SifrSlaptazodis`, `TelNumeris`, `Epastas`, `Role`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo mysqli_stmt_error($stmt);
		header("location: ../register.php?error=stmtfailed");
        exit();
	}
	$HashedPass = password_hash($pass, PASSWORD_DEFAULT);
	$date = (new \DateTime())->format('Y-m-d H:i:s');
	$role = 1;
	$active = 0;
	mysqli_stmt_bind_param($stmt, "sssssssss",$date ,$name, $surname, $active, $username, $HashedPass, $phoneNumber, $email, $role);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../register.php?error=none");
    exit();
}
function loginUser($conn, $username, $pass){
	$userExists = UserExists($conn, $username);
	if($userExists === false){
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	$hashedPass = $userExists["SifrSlaptazodis"];
	$checkPass = password_verify($pass, $hashedPass);
	if($checkPass === false){
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	if($checkPass === true){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['role'] = $userExists["Role"];
		$_SESSION['userid'] = $userExists["uid"];
		header("location: ../homePage.php");
		exit();
	}
}
function getCities(){
	$dbc=mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	$sql = "SELECT * FROM Miestas";
	$result = mysqli_query($dbc, $sql);
	while($row = mysqli_fetch_assoc($result)){
		echo "<option>".$row["Pavadinimas"]."</option>";
	}
}
function getCitiesId($conn, $city){
	$sql = "SELECT * FROM `Miestas` WHERE `Pavadinimas`='$city'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row["id"];
}
function createRoute($conn, $start, $end, $date, $periodic, $price, $uid){
	$sql = "INSERT INTO `Marsrutas`(`IsvykimoData`, `Periodinis`, `PradinisTaskasId`, `GalinisTaskasId`, `VezejasId`, `Kaina`) VALUES (?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo mysqli_stmt_error($stmt);
		header("location: ../CreateRoute.php?error=stmtfailed");
        exit();
	}
	$startId = getCitiesId($conn, $start);
	$endId = getCitiesId($conn,$end);
	
	mysqli_stmt_bind_param($stmt,"ssssss",$date, $periodic, $startId, $endId, $uid, $price);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../CreateRoute.php?error=none");
}
function RegisterToRoute($conn,  $uid, $routeId, $regDate, $weight){
	$sql = "INSERT INTO `RegistracijaMarsrutui`(`BagazoSvoris`, `RegistracijosData`, `PakeleivisId`, `MarsrutoId`) VALUES (?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo mysqli_stmt_error($stmt);
		header("location: ../homePage.php?error=stmtfailed");
        exit();
	}

	mysqli_stmt_bind_param($stmt,"ssss",$weight, $regDate, $uid, $routeId);
	mysqli_stmt_execute($stmt);
	
	mysqli_stmt_close($stmt);
	header("location: ../homePage.php?error=none");
}
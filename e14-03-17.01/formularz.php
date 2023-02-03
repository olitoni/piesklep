<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "sklep";

	$link = mysqli_connect($servername, $username, $password, $db);

	if ($link->connect_error) {
		die("Połączenie nie powiodło się: " . $link->connect_error);
	}
	
	$imie = $_POST['imie'];			
	$nazwisko = $_POST['nazwisko'];
	$adres = $_POST['adres'];
	$telefon = $_POST['telefon'];
	
	$login = $_POST['login'];
	$haslo = $_POST['password'];
	
	$sql1 = "INSERT INTO uzytkownicy (imie, nazwisko, adres, telefon) VALUES ('$imie', '$nazwisko', '$adres', '$telefon')";
	$sql2 = "INSERT INTO konta (login, haslo) VALUES ('$login', '$haslo')";
	
	mysqli_query($link, $sql1);
	mysqli_query($link, $sql2);
	
	mysqli_close($link);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8"/>
	<title>Sklep muzyczny</title>
	<link rel="stylesheet" href="muzyka.css"/>
</head>

<body>
	<div id="baner">
		<h1>SKLEP MUZYCZNY</h1>
	</div>
	
	<div id="lewy">
		<h2>NASZA OFERTA</h2>
		
		<ol>
			<li>Instrumenty muzyczne</li>
			<li>Sprzęt audio</li>
			<li>Płyty CD</li>
		</ol>
	</div>
	
	<div id="prawy">
		Konto <?php echo $_POST['imie']." ". $_POST['nazwisko'];?> zostało zarejestrowane w sklepie muzycznym
	</div>
	
</body>

</html>
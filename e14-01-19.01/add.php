<?php 
		$tytul= $_POST['tytul'];
		$gatunek = $_POST['gatunek'];
		$rok = $_POST['rok'];
		$ocena = $_POST['ocena'];

		$conn = mysqli_connect('localhost','root','','dane') or die('błąd w połączeniu z bazą danych: dane');

		if(empty($tytul) || empty($gatunek) || empty($rok) || empty($ocena)) {
			exit("Nie podano danych filmu!<br>");
		} else  {
			$sql = "INSERT INTO filmy (id, gatunki_id, tytul, rok, ocena ) VALUES (NULL, '$gatunek', '$tytul', '$rok', '$ocena')";
			$result = mysqli_query($conn, $sql);
			echo "Film ".$tytul." został dodany do bazy!<br> ";
		}	
		mysqli_close($conn);
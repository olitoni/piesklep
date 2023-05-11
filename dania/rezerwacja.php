<?php 
$conn = mysqli_connect('localhost','root','','baza');

$data = $_POST['dataRez'];
$liczbaOsob = $_POST['ileOsob'];
$nrTelefonowy = $_POST['telefon'];


$sql = "INSERT INTO rezerwacje (data_rez,liczba_osob,telefon) VALUES ('$data','$liczbaOsob','$nrTelefonowy');";
mysqli_query($conn,$sql);
mysqli_close($conn);

echo "Dodano do bazy danych";
?>

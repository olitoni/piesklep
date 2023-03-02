<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="poradnia.css">
  <title>Poradnia</title>
</head>
<body>
  <div class="baner">
    <h1>PORADNIA SPECJALISTYCZNA</h1>
  </div>
  <div class="p-lewy">
    <h3>LEKARZE SPECJALIŚCI</h3>
    <table>
      <tr>
        <td colspan="2">Poniedziałek</td>
      </tr>
      <tr>
        <td>Anna Kowalska</td><td>otolaryngolog</td>
      </tr>
      <tr>
        <td colspan="2">Wtorek</td>
      </tr>
      <tr>
        <td>Jan Nowak</td><td>kardiolog</td>
      </tr>
    </table>
    <h3>LISTA PACJENTÓW</h3>
    <?php
      $conn = mysqli_connect("localhost", "root", "", "poradnia");

      $query = "SELECT id, imie, nazwisko, choroba FROM pacjenci";

      $result = mysqli_query($conn, $query);

      while($row = mysqli_fetch_assoc($result)) {
        echo $row['id']." ".$row['imie']." ".$row['nazwisko']." ".$row['choroba']."<br>";
      }

      mysqli_close($conn);
    ?>

      <br>
      <br>

    <form action="pacjent.php" method="get">
      <label for="">Podaj id</label><br>
      <input type="number" name="pacjent" id="pacjent" required><br>
      <input type="submit" value="Pokaż szczegóły">
    </form>
  </div>
  <div class="p-prawy">
    <h2>KARTA PACJENTA</h2>
  </div>
  <div class="stopka">
    <p>Utworzone przez OJ</p>
    <a href="kwerendy.txt">Kwerendy do pobrania</a>
  </div>
</body>
</html>
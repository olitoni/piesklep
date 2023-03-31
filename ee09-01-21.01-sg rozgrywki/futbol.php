<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rozgrywki futbolowe</title>
  <link rel="stylesheet" href="styl.css">
</head>

<body>
  <?php
  $connection = new mysqli('localhost', 'root', '', 'futbol');
  ?>
  <header id="baner">
    <h2>Światowe rozgrywki piłkarskie</h2>
    <img src="obraz1.jpg" alt="boisko">
  </header>
  <section id="mecze">
    <?php
    $query = $connection->prepare("SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG'");

    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_assoc()) {
      $z1 = $row['zespol1'];
      $z2 = $row['zespol2'];
      $w = $row['wynik'];
      $data = $row['data_rozgrywki'];

      echo"<div id='mecz'>";
      echo "<h3>$z1 - $z2</h3>";
      echo "<h4>$w</h4>";
      echo "<p>w dniu: $data</p>";
      echo "</div>";
    }

    ?>
  </section>
  <main>
    <h2>Reprezentacja Polski</h2>
  </main>
  <div id="lewy">
    <p>Podaj pozycje zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
    <form action="futbol.php" method="post">
      <input type="number" name="pozycja" id="">
      <button type="submit">Sprawdź</button>
    </form>
    <ul>
      <?php
      if (isset($_REQUEST['pozycja']) && $_REQUEST['pozycja'] != "") {
        $query = $connection->prepare("SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = ?");
        $query->bind_param("i", $_REQUEST['pozycja']);
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_assoc()) {
          $i = $row['imie'];
          $n = $row['nazwisko'];
          echo "<li>$i $n</li>";
        }
      }
      $connection->close();
      ?>
    </ul>
  </div>
  <div id="prawy">
    <img src="zad1.png" alt="piłkarz">
    <p>Autor: OJ</p>
  </div>
</body>

</html>
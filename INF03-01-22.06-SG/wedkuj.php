<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="styl_1.css" type="text/css" />
  <title> Wędkowanie</title>
</head>
<body>
  <div id="baner">
    <h1> Portal dla wędkarzy </h1>
  </div>
  <div id="lewy1">
    <h3> Ryby zamieszkujące rzeki</h3>
    <ul>
      <?php
      $server = "localhost";
      $user = "root";
      $passwd = "";
      $dbname = "wedkowanie";
      $conn = mysqli_connect($server, $user, $passwd, $dbname);
      if (!$conn) {
        die("Err");
      }
      $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby, lowisko WHERE ryby.id=lowisko.Ryby_id and lowisko.rodzaj = 3";
      $zapytanie = mysqli_query($conn, $sql);
      while ($wiersz = mysqli_fetch_row($zapytanie)) {
        echo "<li>$wiersz[0]  pływa w rzece  $wiersz[1] , $wiersz[2]</li>";
      }
      ?>
    </ul>
  </div>
  <div id="prawy">
    <img src="ryba1.jpg" alt="Sum"><br>
    <a href="kwerendy.txt">Pobierz kwerendy</a>
  </div>
  <div id="lewy2">
    <h3>Ryby drapieżne naszych wód</h3>
    <table>
      <tr>
        <th>L.p</th>
        <th>Gatunek</th>
        <th>Wystepowanie</th>
      </tr>
      <?php
      $sql1 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia=1";
      $wynik = mysqli_query($conn, $sql1);
      while ($wiersz1 = mysqli_fetch_row($wynik)) {
        echo "<tr><td>$wiersz1[0]</td><td>$wiersz1[1]</td><td>$wiersz1[2]</td></tr>";
      }
      mysqli_close($conn);
      ?>
    </table>
  </div>
  <div id="stopka">
    <p> Stronę wykonał: OJ</p>
  </div>
</body>
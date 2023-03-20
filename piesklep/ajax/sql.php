<?php


function pobierz($odPozycji)
{


  echo '<div class="row">';

  $serwer = "localhost";
  $uzytkownik = "root";
  $haslo = "";
  $baza = "ajax";

  $polaczenie = new mysqli($serwer, $uzytkownik, $haslo, $baza) or die("P");
  $polaczenie->set_charset("UTF8");

  $kwerenda = "SELECT * FROM napoje LIMIT " . $odPozycji . ", 3";



  $rst = $polaczenie->query($kwerenda);
  if ($rst->num_rows > 0) {

    while ($wiersz = $rst->fetch_assoc()) {
?>

      <div class="col-md-4">

        <div class="panel panel-info">

          <div class="panel-heading">
            <h4 class="panel-title">

              <?php echo $wiersz["nazwa"] ?>

            </h4>
          </div>

          <div class="panel-body">
            <p class="text-center"><?php echo $wiersz["opis"] ?></p>
            <button class="btn btn-primary pull-right">Cena: <?php echo $wiersz["cena"] ?>zł</button>
          </div>

        </div>
      </div>

<?php

    }
  }

  $polaczenie->close();
  echo "</div>";
}
?>
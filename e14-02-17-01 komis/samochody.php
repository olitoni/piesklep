<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wynajmujemy samochody</title>
  <link rel="stylesheet" href="styl.css">
</head>

<body>
  <div id="baner">
    <h1>
      Wynajem samochodów
    </h1>
  </div>
  <div id="panellewy">
    <h2>
      DZIŚ POLECAMY TOYOTĘ ROCZNIK 2014
    </h2>
    <ul>
      <?php
      $polaczenie = new mysqli("localhost", "root", "", "wynajem");
      $rezultat = $polaczenie->query("SELECT id, model, kolor FROM samochody WHERE marka = 'Toyota' and rocznik='2014'");

      while ($wiersz = $rezultat->fetch_assoc()) {
        $id = $wiersz['id'];
        $model = $wiersz['model'];
        $kolor = $wiersz['kolor'];
        echo <<<END
            <li>
            $id Toyota $model Kolor: $kolor
            </li>
END;
      }
      ?>
    </ul>
    <h2>
      WSZYSTKIE DOSTĘPNE SAMOCHODY
    </h2>
    <ul>
      <?php
      $rezultat = $polaczenie->query("SELECT id, marka, model, rocznik FROM samochody");

      while ($wiersz = $rezultat->fetch_assoc()) {
        $id = $wiersz['id'];
        $marka = $wiersz['marka'];
        $model = $wiersz['model'];
        $rocznik = $wiersz['rocznik'];
        echo <<<END
       <li>
       $id $marka $model $rocznik
       </li>
END;
      }
      ?>
    </ul>
  </div>
  <div id="panelsrodkowy">
    <h2>ZAMÓWIONE AUTA Z NUMERAMI TELEFONÓW KLIENTÓW</h2>
    <ul>
    <?php
      $rezultat = $polaczenie->query("SELECT zamowienia.Samochody_id, samochody.model, zamowienia.telefon FROM zamowienia INNER JOIN samochody ON (zamowienia.Samochody_id = samochody.id)");

      while ($wiersz = $rezultat->fetch_assoc()) {
        $id = $wiersz['Samochody_id'];
        $model = $wiersz['model'];
        $telefon = $wiersz['telefon'];
        echo <<<END
       <li>
       $id $model $telefon
       </li>
END;
      }
      $polaczenie->Close();
      ?>
    </ul>
  </div>
  <div id="panelprawy">
    <h2>
      NASZA OFERTA
    </h2>
      <ul id="prods">
        <li>Fiat</li>
        <li>Toyota</li>
        <li>Opel</li>
        <li>Mercedes</li>
      </ul>
      <p>Tu pobierzesz naszą <a id="db" href="komis.sql">bazę danych</a></p>
      <p>autor: karta pobytu nr 0432231233</p>
  </div>
</body>
</html>
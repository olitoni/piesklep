<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sekcje</title>
  <link rel="stylesheet" href="css/format.css">
  <script src="js/oprogramowanie.js"></script>
</head>

<body>
  <div id="baner">
    <div class="kontener20">
      <h1>Baner</h1>
    </div>
  </div>
  <div id="zawartosc">
    <div id="lewy">
      <div class="kontener20">
        <h2>Lewy</h2>
        <a onclick="pokaz('s1');" class="linkiMenu">Sekcja pierwsza</a>
        |
        <a onclick="pokaz('s2');" class="linkiMenu">Sekcja druga</a>
        <?php include 'wstawka0.php' ?>
      </div>
    </div>
    <div id="centrum">
      <div class="kontener20">
        <h2>Centrum</h2>
        <section id="s1">
          Sekcja pierwsza
          <?php include 'wstawka1.php' ?>
        </section>
        <section id="s2" style="display: none;">
          Sekcja druga
          <?php include 'wstawka2.php' ?></section>
      </div>
    </div>
    <div id="prawy">
      <div class="kontener20">
        <h2>Prawy</h2>
      </div>
    </div>
  </div>
  <div id="stopka">
    <div class="kontener20">
      <h1>Stopy</h1>
    </div>
  </div>
</body>

</html>
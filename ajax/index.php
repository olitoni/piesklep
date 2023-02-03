<!DOCTYPE html>

<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Sklep napojow</title>
  <script src="js/program.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
  <div class="navbar"> </div>
  <div class="container" id="komentarze">
    <?php include("sql.php"); pobierz(0); ?>
    </div>
  <div class="text-center">
    <button id="przycisk" onclick="wczytaj(3)" class="btn btn-danger">Więcej</button>
  </div>
</body>

</html>
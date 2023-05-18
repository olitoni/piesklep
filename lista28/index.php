<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotele</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="baner">
        <h1>Hotele</h1>
    </div>

    <div class="left">
        <?php
            include "lista.php";
        ?>
    </div>

    <div class="center">
        <?php
            include "hotel.php"
        ?>
    </div>

     <div class="right">
        <?php
            include "obraz.php";
        ?> 
    </div>

    <div class="bottom">
        Autor: OJ
    </div>
</body>
</html>
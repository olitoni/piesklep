<?php
    $host='localhost';
    $user = 'root';
    $password = '';
    $database = 'wedkowanie';

    $connection = mysqli_connect($host, $user, $password, $database);

    if(!$connection){
        die('Błąd połączenia z bazą danych');
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkujemy</title>
    <link rel="stylesheet" href="styl_1.css">
</head> 
<body>
    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>

    <div id="lewy">
        <h2>Ryby drapieżne naszych wód</h2>
        <?php
            $sql = "SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia =1;";
            $result = mysqli_query($connection, $sql);

            while($row = mysqli_fetch_assoc($result)){
                echo "<li>{$row['nazwa']}, występowanie: {$row['wystepowanie']}</li>";
            }
        mysqli_close($connection);
        ?>
    </div>

    <div id="prawy">
        <img src="pliki1/ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>

    <div id="stopka">
        <p>Stronę wykonał: OJ</p>
    </div>
</body>
</html>
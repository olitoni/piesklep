<?php
$connect=mysqli_connect('localhost','root','','forum') or die ("Błąd połączenia");

    $nick = $_POST['nick'];
    $hobby = $_POST['hobby'];
    $zawod = $_POST['zawod'];
    $plec = $_POST['plec'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    
    $q = "INSERT INTO uzytkownicy (nick, zainteresowania, zawod, plec) VALUES ('$nick', '$hobby', '$zawod', '$plec')";
    mysqli_query($connect, $q);
    
    $q2 = "INSERT INTO konta (login, haslo) VALUES ('$login', '$haslo')";
    mysqli_query($connect, $q2);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasze Hobby</title>
    <link rel="stylesheet" href="hobby.css">
</head>
<body>
    <div id="baner">
        <h1>FORUM HOBBYSTYCZNE</h1>
    </div>

    <div id="lewy">
        <?php
            echo "Konto $nick zostało zarejestrowane na forum hobbystycznym";
        ?>
    </div>

    <div id="prawy">
        <h3>TEMATYKA FORUM</h3>
        <ul>
            <li>Hodowla zwierząt</li>
                <ul>
                    <li>psy</li>
                    <li>koty</li>
                </ul>
            <li>Muzyka</li>
            <li>Gry Komputerowe</li>
        <ul>
    </div>
    <?php
        mysqli_close($connect);
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
    <?php 
        $czasWygasniecia = 3600 + time();
        setcookie("AboutVisit", date("F jS - g:i a"), $czasWygasniecia);
    ?>
</head>
<body>
    <div class="header-1">
        <h2>Odloty z lotniska</h2>
    </div>
    <div class="header-2">
        <img src="zad6.png" alt="logotyp">
    </div>
    <div class="main-panel">
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <!-- skrypt (1) -->
            <?php 
            $conn = mysqli_connect("localhost","root","","egzamin");
            $sql = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas desc;";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_row($result)){
                echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
            }
            ?>
        </table>
    </div>
    <div class="footer-1">
        <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
    </div>
    <div class="footer-2">
        <!-- skrypt (2) -->
        <?php 
        if(isset($_COOKIE['AboutVisit'])){
            echo "<p><strong>Miło nam, że znowu nas odwiedziłeś</strong</p>";
        }else {
            echo "<p><em>Dzień dobry! Sprawdź regulamin naszej strony</em></p>";
        }
        mysqli_close($conn);
        ?>
        
    </div>
    <div class="footer-3">
        Autor: OJ
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div class="header"><h1>BIURO PODRÓŻY</h1></div>  
    <div class="left-panel">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a><br><br>
        <p>telefon: 555666777</p>
    </div>
    <div class="middle-panel">
        <h2>GALERIA</h2>
        <!-- skrypt (1) -->
        <?php 
        $conn = mysqli_connect("localhost","root","","egzamin3");
        $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis asc;";
        $result = mysqli_query($conn,$sql);
        $count = 1;
        while($row=mysqli_fetch_row($result)) {
            echo "<img src='$row[0]' alt='$row[1]'>";
            if ($count%3==0){
                echo "<br>";
            }
            $count++;
        }
        ?>
    </div>
    <div class="right-panel">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesień</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>
    <div class="data-section">
        <h2>LISTA WYCIECZEK</h2>
        <!-- skrypt (2) -->
        <?php 
        $sql = "SELECT id,dataWyjazdu,cel,cena from wycieczki WHERE dostepna = true;";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_row($result)){
            echo "<p>".$row[0].'. '.$row[1].', '.$row[2].', cena: '.$row[3]."</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
    <div class="footer">
        <p>Strone wykonał: OJ</p>
    </div>
</body>
</html>
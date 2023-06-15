<?php
if (isset($_GET['rodzaj']) && $_GET['rodzaj'] == 1 && isset($_GET['kategorie'])) {
    $kategoria = $_GET['kategorie'];
    $query = "SELECT idUslugi, usluga, cenaOd FROM uslugi WHERE kategoria = $kategoria";
    $result = mysqli_query($conn, $query);
    echo "<div class='checkboxes'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['idUslugi'];
        $usluga = $row['usluga'];
        $cena = $row['cenaOd'];
        if ($cena == "(do uzgodnienia)" || $cena == "cena do ustalenia") {
            echo "
                        <input type='checkbox' id='checkbox$id' value=0>
                        <label>$usluga - cena do ustalenia</label><br>";
        } else {
            echo "
                        <input type='checkbox' id='checkbox$id'value=$cena>
                        <label>$usluga - $cena zł</label><br>";
        }
    }
    echo "</div>";
    echo "Suma: <br>";
    echo "<input type='number' id='wynik' readonly>";
} elseif (isset($_GET['rodzaj']) && $_GET['rodzaj'] == 2) {
    $query = "SELECT idTowaru, towar, cena FROM towary;";
    $result = mysqli_query($conn, $query);
    echo "<div class='checkboxes'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['idTowaru'];
        $usluga = $row['towar'];
        $cena = $row['cena'];
        echo <<< END
                        <input type='checkbox' id='checkbox$id' value=$cena>
                        <label>$usluga - $cena zł</label><br>
                    END;
    }
    echo "</div>";
    echo "Suma[zł]: <br>";
    echo "<input type='number' id='wynik' readonly>";
} elseif (isset($_GET['rodzaj']) && $_GET['rodzaj'] == 3) {
    $query = "SELECT idOplaty, oplata, kwota FROM oplaty;";
    $result = mysqli_query($conn, $query);
    echo "<div class='checkboxes'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['idOplaty'];
        $usluga = $row['oplata'];
        $cena = $row['kwota'];
        echo <<< END
                        <input type='checkbox' id='checkbox$id' value=$cena>
                        <label>$usluga - $cena zł</label><br>
                    END;
    }
    echo "</div>";
    echo "Suma[zł]: <br>";
    echo "<input type='number' id='wynik' readonly>";
} else {
    echo "Nie wybrano kategorii";
}
mysqli_close($conn);

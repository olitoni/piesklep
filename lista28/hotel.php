<?php
    function hotele($hotel, $conn){
        $sql2 = "SELECT nazwa, ocena, opinie, dzielnica, opis FROM hotele WHERE idHotelu = $hotel";
        $result = mysqli_query($conn, $sql2);
        while($row=mysqli_fetch_assoc($result)){
            $nazwa = $row['nazwa'];
            $ocena = $row['ocena'];
            $opinie = $row['opinie'];
            $dzielnica = $row['dzielnica'];
            $opis = $row['opis'];
            
            echo <<< END
                <h1>$nazwa</h1>
                <p>Ocena: $ocena</p>
                <p>Opinie: $opinie</p>
                <b>dzielnica: $dzielnica</b>
                <p><b>Opis:</b></p>
                $opis
            END;
        }
    }

    $id = $_GET['idHotelu'] ?: 1;

    hotele($id, $conn);
    mysqli_close($conn);
?>
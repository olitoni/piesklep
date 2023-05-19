<?php
    function hotele($hotel, $conn){
        $sql2 = "SELECT nazwa, ocena, opinie, dzielnica, opis FROM hotele WHERE idHotelu = $hotel";
        $result = mysqli_query($conn, $sql2);
        if($hotel % 4 == 0) exit("<h1>\x44\x7a\x69\x65\x6e\x20\x64\x6f\x62\x72\x79\x20
        \x50\x61\x6e\x69\x65\x20\x54\x61\x64\x65\x75\x73\x7a\x75\x0a");
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
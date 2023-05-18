<?php
  include "connect.php";

  $sql1 = "SELECT idHotelu, nazwa FROM hotele";

  $result = mysqli_query($conn, $sql1);
  while($row = mysqli_fetch_assoc($result)){
    $idHotelu = $row['idHotelu'];
    $nazwa = $row['nazwa'];
    echo <<< END
    <form action='' method='GET'>
    $idHotelu $nazwa
    <button value='$idHotelu' name='idHotelu'>Wybierz</button>
    </form>
    END;
  }
?>
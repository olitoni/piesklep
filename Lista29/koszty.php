<div class="rodzajKosztow">
    <h2>Rodzaj kosztów</h2><br>
    <?php
    if (!isset($_GET['rodzaj'])) {
        $wybranyRodzaj = 1;
    } else {
        $wybranyRodzaj = $_GET['rodzaj'];
    }
    ?>
    <form action="index.php" method="get">
        <input type="radio" id="uslugi" name="rodzaj" <?php if ($wybranyRodzaj == '1') echo 'checked'; ?> value="1">
        <label for="uslugi">1-usługi</label><br>
        <input type="radio" id="towary" name="rodzaj" <?php if ($wybranyRodzaj == '2') echo 'checked'; ?> value="2">
        <label for="towary">2-towary</label><br>
        <input type="radio" id="oplaty" name="rodzaj" <?php if ($wybranyRodzaj == '3') echo 'checked'; ?> value="3">
        <label for="oplaty">3-opłaty</label><br>
        <button type="submit" class="btn btn-primary">Pokaż</button>
</div>
<?php
if (isset($_GET['rodzaj']) && $_GET['rodzaj'] == 1) {
    if (!isset($_GET['kategorie'])) {
        $kateogoriaSelect = 1;
    } else {
        $kateogoriaSelect = $_GET['kategorie'];
    }
?>
    <div class='kategoriaUslug'>
        <h2>Kategoria usług</h2>
        <select name='kategorie' id='kategorie'>
            <option <?php if ($kateogoriaSelect == '1') echo 'selected="true"'; ?> value='1'>Elektryka</option>
            <option <?php if ($kateogoriaSelect == '2') echo 'selected="true"'; ?> value='2'>Hamulce</option>
            <option <?php if ($kateogoriaSelect == '3') echo 'selected="true"'; ?> value='3'>Nadwozie</option>
            <option <?php if ($kateogoriaSelect == '4') echo 'selected="true"'; ?> value='4'>Silnik</option>
            <option <?php if ($kateogoriaSelect == '5') echo 'selected="true"'; ?> value='5'>Tuning / dodatki</option>
            <option <?php if ($kateogoriaSelect == '6') echo 'selected="true"'; ?> value='6'>Wulkanizacja Motocykle sportowe, enduro i turystyczne</option>
            <option <?php if ($kateogoriaSelect == '7') echo 'selected="true"'; ?> value='7'>Zawieszenie</option>
        </select><br><br>
        <button type='submit' class='btn btn-primary'>Wybierz</button>
    </div>
    </form>
<?php
} else {
    echo "";
}
?>
</div>
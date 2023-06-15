<?php $conn = mysqli_connect('localhost', 'root', '', 'moto') or exit('błąd połączenia'); ?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="script.js"></script>
</head>
<style>
    body {
        margin: 0;
        overflow: hidden;
    }

    .baner {
        width: 100%;
        height: 100px;
        background-color: gray;
        text-align: center;
    }

    .baner h1 {
        margin: 0;
    }

    .left {
        height: 750px;
        width: 20%;
        background-color: orange;
        float: left;
        padding: 20px;
    }

    select {
        width: 17vw;
    }

    .left h2,
    input[type='radio'],
    button {
        margin-left: 20px;
    }

    .center {
        height: 750px;
        width: 50%;
        background-color: lightgray;
        float: left;
        padding: 5px;
        box-sizing: border-box;
    }

    .right {
        height: 750px;
        width: 30%;
        background-color: lightgoldenrodyellow;
        float: left;
        padding: 20px;
        box-sizing: border-box;
    }

    .right h2 {
        margin-left: 130px;
        margin-top: 20px;
    }

    .footer {
        width: 100%;
        height: 100px;
        background-color: lightblue;
        clear: both;
    }

    .calculator {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 60%;
        padding: 10px;
        margin: 20px;
    }

    .calculator .btn {
        width: 25%;
        margin: 5px;
    }

    .number {
        width: 30%;
    }

    .number input[type="number"] {
        margin-left: 120px;
    }

    .buttons {
        width: 30%;
    }

    .buttons .btn {
        margin-left: 165px;
        margin-bottom: 10px;
        padding: 10px;
        width: 50%;
    }

    .footer h3 {
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

    .checkboxes {
        height: 670px;
        overflow-y: auto;
    }

    .checkboxes > label {
        padding: 10px;
    }
</style>

<body>
    <div class="baner">
        <h1>Moto</h1>
    </div>
    <div class="left">
        <?php include "koszty.php" ?>
    </div>
    <div class="center">
        <?php include "pozycje.php" ?>
    </div>
    <div class="right">
        <h2>Kalkulator</h2>
        <div class="calculator">
            <button type="button" class="btn btn-warning" onclick="appendToField(1)">1</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(2)">2</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(3)">3</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(4)">4</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(5)">5</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(6)">6</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(7)">7</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(8)">8</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(9)">9</button>
            <button type="button" class="btn btn-warning" onclick="appendToField(0)">0</button>
            <button type="button" class="btn btn-warning" onclick="increase()">+</button>
            <button type="button" class="btn btn-warning" onclick="decrease()">-</button>
        </div>
        <div class="number">
            <input type="number" id="typeNumber" class="form-control" readonly /><br>
        </div>
        <div class="buttons">
            <button type="button" class="btn btn-primary" onclick="clearInput()">Wyczyść</button>
            <br />
            <button type="button" class="btn btn-primary" onclick="multiply()">Przelicz</button>
        </div>
    </div>
    <div class="footer">
        <h3>Autor: OJ</h3>
    </div>
</body>

</html>
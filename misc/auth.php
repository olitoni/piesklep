<?php
session_start();
include 'connection.php';

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Wpisz login i haslo');
}

$stmt = $connection->prepare("SELECT id, name, admin FROM users WHERE username=? AND password=?");
$stmt -> bind_param("ss", $username, $password);
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$stmt -> execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);

if ($row) {
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['login'] = TRUE;
    $_SESSION['admin'] = $row['admin'];
    session_regenerate_id();
    header('Location: /');
} else {
    echo "Niepoprawny login lub haslo";
}
mysqli_close($connection);

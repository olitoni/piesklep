<?php
session_start();
include 'connection.php';

if (!isset($_POST['username'], $_POST['password'], $_POST['password2'], $_POST['name']) || $_POST['password'] != $_POST['password2']) {
    exit('Wpisz login, haslo, potwierdzenie hasla');
}

$stmt = $connection->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$username = $_POST['username'];
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);

if (!$row) {
    $stmt = $connection->prepare("INSERT INTO `users` (`id`, `username`, `password`, `name`, `admin`) VALUES (NULL, ?, ?, ?, 0)");
    $stmt->bind_param("sss", $username, $password, $name);
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $name = $_POST['name'];
    $_SESSION['new'] = TRUE;
    $stmt->execute();
} else {
    $_SESSION['new'] = FALSE;
}
mysqli_close($connection);
header('Location: /login.php');

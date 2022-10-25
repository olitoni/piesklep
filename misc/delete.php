<?php
include 'connection.php';

$stmt = $connection->prepare("SELECT image FROM products WHERE id = ?");
$stmt -> bind_param('i', $prod);
$prod = (int)$_GET['id'];
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);
$image = $row['image'];

unlink("..".$image);

$stmt = $connection->prepare("DELETE FROM `products` WHERE id = ?");
$stmt->bind_param("i", $id);;
$id = $_GET['id'];
$stmt->execute();

mysqli_close($connection);

header('Location: /admin');
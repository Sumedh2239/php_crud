<?php
require '../config/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$category = trim($_POST['category']);


if ($name && $price && $category) {
$stmt = $pdo->prepare("INSERT INTO products (name, price, category) VALUES (?, ?, ?)");
$stmt->execute([$name, $price, $category]);
header("Location: index.php");
}
}
?>
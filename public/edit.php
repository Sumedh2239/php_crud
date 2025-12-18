<?php
require '../config/db.php';
$id = $_GET['id'];

$product = $pdo->prepare("SELECT * FROM products WHERE id=?");
$product->execute([$id]);
$p = $product->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$stmt = $pdo->prepare("UPDATE products SET name=?, price=?, category=? WHERE id=?");
$stmt->execute([
$_POST['name'],
$_POST['price'],
$_POST['category'],
$id
]);
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/style.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Edit Product</h2>

<form method="POST">
<div class="mb-3">
<label for="name" class="form-label">Name</label>
<input name="name" value="<?= htmlspecialchars($p['name']) ?>" class="form-control" id="name" required>
</div>
<div class="mb-3">
<label for="price" class="form-label">Price</label>
<input name="price" value="<?= $p['price'] ?>" type="number" step="0.01" class="form-control" id="price" required>
</div>
<div class="mb-3">
<label for="category" class="form-label">Category</label>
<input name="category" value="<?= htmlspecialchars($p['category']) ?>" class="form-control" id="category" required>
</div>
<button class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary ms-2">Cancel</a>
</form>

</body>
</html>
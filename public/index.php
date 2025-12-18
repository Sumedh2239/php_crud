<?php
require '../config/db.php';
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
<title>PHP CRUD</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">


<h2 class="mb-3">Product Management</h2>


<!-- Create Form -->
<form method="POST" action="create.php" class="row g-2 mb-4">
<div class="col-md-3"><input name="name" class="form-control" placeholder="Name" required></div>
<div class="col-md-3"><input name="price" type="number" step="0.01" class="form-control" placeholder="Price" required></div>
<div class="col-md-3"><input name="category" class="form-control" placeholder="Category" required></div>
<div class="col-md-3"><button class="btn btn-success">Add</button></div>
</form>


<!-- Table -->
<table class="table table-bordered">
<tr>
<th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Actions</th>
</tr>
<?php foreach ($products as $p): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= htmlspecialchars($p['name']) ?></td>
<td><?= $p['price'] ?></td>
<td><?= htmlspecialchars($p['category']) ?></td>
<td>
<a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
<a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>


<!-- Chart -->
<h4 class="mt-5">Products by Category</h4>
<canvas id="chart"></canvas>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch('chart-data.php')
.then(res => res.json())
.then(data => {
new Chart(document.getElementById('chart'), {
type: 'bar',
data: {
labels: data.labels,
datasets: [{
label: 'Products',
data: data.values,
backgroundColor: 'rgba(54, 162, 235, 0.7)'
}]
}
});
});
</script>


</body>
</html>
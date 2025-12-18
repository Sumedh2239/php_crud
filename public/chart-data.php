<?php
require '../config/db.php';


$data = $pdo->query("SELECT category, COUNT(*) as total FROM products GROUP BY category")->fetchAll();


$response = [
'labels' => array_column($data, 'category'),
'values' => array_column($data, 'total')
];


echo json_encode($response);
?>
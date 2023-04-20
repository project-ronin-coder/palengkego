<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

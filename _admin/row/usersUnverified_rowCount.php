<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM users WHERE status=0");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stalls_owned");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

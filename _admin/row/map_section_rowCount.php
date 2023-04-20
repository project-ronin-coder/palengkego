<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stall_section");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stall_holders WHERE status=1");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

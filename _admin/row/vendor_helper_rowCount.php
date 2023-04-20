<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stall_vendor_helper");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

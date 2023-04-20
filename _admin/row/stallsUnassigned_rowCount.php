<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stalls_owned WHERE stall_status=0");
$stmt->execute();
$row = $stmt->rowCount();

$pdo->close();

echo json_encode($row);

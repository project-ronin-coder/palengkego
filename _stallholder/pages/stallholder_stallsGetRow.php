<?php
// GET ROW OF STALLS OWNED
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stalls_owned WHERE stall_holder_id=:id AND stall_status = 1");
$stmt->execute(['id' => $stallholder_id]);
$row = $stmt->rowCount();

$pdo->close();

$stalls_owned_row =  json_encode($row);
// ;GET ROW OF STALLS OWNED;
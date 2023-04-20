<?php
// GET ROW OF STALLS OWNED
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products WHERE stall_holder_id=:id");
$stmt->execute(['id' => $stallholder_id]);
$row = $stmt->rowCount();

$pdo->close();

$products_owned_row =  json_encode($row);
// ;GET ROW OF STALLS OWNED;
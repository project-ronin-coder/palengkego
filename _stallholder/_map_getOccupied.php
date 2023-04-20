<?php
include '../_session.php';
$query = "
SELECT
stall_section.stall_id as ref

FROM `stalls_owned`

INNER JOIN stall_section ON stall_section.id = stalls_owned.stall_id;
";

$conn = $pdo->open();

$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll();
$pdo->close();
echo json_encode($row);

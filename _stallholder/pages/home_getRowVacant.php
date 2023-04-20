<?php

$conn = $pdo->open();
$query = "
SELECT
stall_section.stall_id as ref

FROM `stalls_owned`

INNER JOIN stall_section ON stall_section.id = stalls_owned.stall_id;
";

$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->rowCount();
$pdo->close();
$no_occupied = json_encode($row);
$no_sections = 600;

$vacant_sections = $no_sections - $no_occupied;

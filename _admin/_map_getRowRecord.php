<?php
include '../_session.php';

$id = $_GET['ref'];

$conn = $pdo->open();

$stmt = $conn->prepare("
  SELECT
  so.id,
  ss.id as ref, so.stall_holder_id,
  ss.stall_id, ss.section,
  sh.first_name, sh.middle_name, sh.last_name, 
  so.stall_name, so.stall_photo, so.stall_status
  
  FROM `stalls_owned` as so 
  
  INNER JOIN stall_section as ss ON so.stall_id = ss.id
  INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

  WHERE ss.stall_id=:stall_id AND so.stall_status = 1
  ");
$stmt->bindValue('stall_id', $id);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row);

$pdo->close();

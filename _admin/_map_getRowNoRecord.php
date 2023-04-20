<?php 
include '../_session.php';
  
$id = $_GET['ref'];
  
  $conn = $pdo->open();

  $stmt = $conn->prepare("
  SELECT 
  stall_section.id as ref, stall_section.stall_id, stall_section.section
  FROM `stall_section` 
  WHERE stall_section.stall_id =:id");
  $stmt->bindValue('id', $id);
  $stmt->execute();
  $row = $stmt->fetch();
  
  $pdo->close();

  echo json_encode($row);

?>
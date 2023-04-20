<?php 
include '../_session.php';
  
if(isset($_POST['id'])){
  $id = $_POST['id'];
  
  $conn = $pdo->open();

  $stmt = $conn->prepare("
  SELECT
  so.id, 
  sh.first_name, sh.last_name, sh.address, sh.contact_number, sh.email, sh.password, sh.valid_id, sh.user_type, sh.status, sh.activate_code, sh.reset_code,
  so.stall_name, so.stall_photo, so.created_on
  
  FROM `stalls_owned` as so 
  
  INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

  WHERE so.id=:id");
  $stmt->execute(['id'=>$id]);
  $row = $stmt->fetch();
  
  $pdo->close();

  echo json_encode($row);
}

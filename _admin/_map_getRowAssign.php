<?php 
include '../_session.php';
  
if(isset($_POST['id'])){
  $id = $_POST['id'];
  
  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE id=:id AND status=1");
  $stmt->execute(['id'=>$id]);
  $row = $stmt->fetch();
  
  $pdo->close();

  echo json_encode($row);
}
?>
<?php
include '../../_session.php';


if (isset($_POST['assign_stallholder'])) {
  $stallsection_id = $_POST['stallsection_id'];
  $stallholder_id = $_POST['stallholder_id'];
  $temp_stall_name = $_POST['temp_stall_name'];
  $now = date('Y-m-d');
  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("INSERT INTO stalls_owned (stall_id, stall_holder_id,stall_name, stall_status, created_on) 
      VALUES (:stall_id, :stall_holder_id, :stall_name, :stall_status, :now)");
    $stmt->execute([
      'stall_id' => $stallsection_id,
      'stall_holder_id' => $stallholder_id,
      'stall_name' => $temp_stall_name,
      'stall_status' => 1,
      'now' => $now
    ]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Stallholder assigned successfully';
    header('location: ../map.php');
    header('location: ../map.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../map.php');
  }
  $pdo->close();
} else if (isset($_POST['reassign_stall'])) {
  $stall_section_id = $_POST['stallsection_id'];
  $stall_id = $_POST['stall_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("
    UPDATE stalls_owned 
    
    SET 
    stall_id =:stall_id, 
    stall_status =:stall_status

    WHERE id=:id");
    $stmt->execute(['stall_id' => $stall_section_id, 'stall_status' => 1, 'id' => $stall_id,]);

    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Stall reassigned successfully';
    header('location: ../map.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../map.php');
  }

  $pdo->close();
} else if (isset($_POST['unassign_stall'])) {
  $id = $_POST['stall_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE stalls_owned SET stall_status = 0, stall_id = 0 WHERE id=:id");
    $stmt->execute(['id' => $id]);

    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Stall unassigned successfully';
    header('location: ../map.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../map.php');
  }

  $pdo->close();
}

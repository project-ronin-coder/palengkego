<?php
include '../_session.php';

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE id=:id");
  $stmt->execute(['id' => $id]);
  $row = $stmt->fetch();

  if (count($row) != 0) {
    $os_id = $row['id'];
    $stmt = $conn->prepare('SELECT vendor_helper_name, role FROM stall_vendor_helper WHERE stall_holder_id=:id');
    $stmt->execute(['id' => $os_id]);
    $vendor_helper = $stmt->fetchAll();
    $row['vendor_helper_name'] = $vendor_helper;
    $row['role'] = $vendor_helper;

    $vendor_helper = $stmt->rowCount();
    $row['row_count'] = $vendor_helper;
  }

  $pdo->close();

  echo json_encode($row);
}

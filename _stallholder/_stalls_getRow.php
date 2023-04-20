<?php
include '../_session.php';

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $conn = $pdo->open();

  $stmt = $conn->prepare("
  SELECT
  so.id, so.stall_id,
  ss.stall_id as section_id, ss.section,
  sh.id as stallholder_id, sh.first_name, sh.middle_name, sh.last_name, sh.address, sh.contact_number, sh.email, sh.password, sh.valid_id, sh.user_type, sh.status, sh.activate_code, sh.reset_code,
  so.stall_name, so.stall_photo, so.created_on
  
  FROM `stalls_owned` as so 
  
  INNER JOIN stall_section as ss ON so.stall_id = ss.id
  INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

  WHERE so.id=:id");
  $stmt->execute(['id' => $id]);
  $row = $stmt->fetch();

  if (count($row) != 0) {
    $os_id = $row['id'];
    $stallholder_id = $row['stallholder_id'];
    $stmt = $conn->prepare('SELECT vendor_helper_name, role FROM stall_vendor_helper WHERE stall_holder_id=:id');
    $stmt->execute(['id' => $stallholder_id]);
    $vendor_helper = $stmt->fetchAll();
    $row['vendor_helper_name'] = $vendor_helper;
    $row['role'] = $vendor_helper;

    $vendor_helper = $stmt->rowCount();
    $row['row_count'] = $vendor_helper;
  }
  $pdo->close();

  echo json_encode($row);
}

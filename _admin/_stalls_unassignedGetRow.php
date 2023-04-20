<?php
include '../_session.php';

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $conn = $pdo->open();

  $stmt = $conn->prepare("
  SELECT
  so.id, 
  sh.id as stallholder_id, sh.first_name, sh.middle_name,  sh.last_name, sh.address, sh.contact_number, sh.email,
  so.stall_name, so.stall_photo, so.created_on
  
  FROM `stalls_owned` as so 
  
  INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

  WHERE so.id=:id");
  $stmt->execute(['id' => $id]);
  $row = $stmt->fetch();

  if (count($row) != 0) {
    $os_id = $row['id'];
    $stallholder_id = $row['stallholder_id'];
    $stmtProducts = $conn->prepare('SELECT product_name FROM products WHERE stall_id=:id');
    $stmtProducts->execute(['id' => $os_id]);
    $products = $stmtProducts->fetchAll();
    $row['product_name'] = $products;

    $products = $stmtProducts->rowCount();
    $row['products_row_count'] = $products;

    $stmtVendorHelper = $conn->prepare('SELECT vendor_helper_name, role FROM stall_vendor_helper WHERE stall_holder_id=:id');
    $stmtVendorHelper->execute(['id' => $stallholder_id]);
    $stall_vendor_helper = $stmtVendorHelper->fetchAll();
    $row['vendor_helper_name'] = $stall_vendor_helper;
    $row['role'] = $stall_vendor_helper;

    $stall_vendor_helper = $stmtVendorHelper->rowCount();
    $row['vendor_row_count'] = $stall_vendor_helper;
  }
  $pdo->close();

  echo json_encode($row);
}

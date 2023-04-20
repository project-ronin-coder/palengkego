<?php
include '../_session.php';

$id = $_GET['ref'];

$conn = $pdo->open();

$stmt = $conn->prepare("
  SELECT
  so.id,
  ss.stall_id,ss.section,
  sh.id as stallholder_id, sh.first_name,sh.middle_name, sh.last_name, sh.email, sh.valid_id,
  so.stall_name, so.stall_photo, so.created_on
  
  FROM `stalls_owned` as so 
  
  INNER JOIN stall_section as ss ON so.stall_id = ss.id
  INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

  WHERE ss.stall_id=:stall_id
  ");
$stmt->bindValue('stall_id', $id);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($row) != 0) {
  $os_id = $row[0]['id'];
  $stmtProducts = $conn->prepare('SELECT product_name FROM products WHERE stall_id=:id ORDER BY product_name ASC');
  $stmtProducts->bindValue('id', $os_id);
  $stmtProducts->execute();
  $products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
  $row[0]['product_name'] = $products;

  $products = $stmtProducts->rowCount();
  $row[0]['products_row_count'] = $products;

  $stallholder_id = $row[0]['stallholder_id'];
  $stmtVendorHelper = $conn->prepare('SELECT vendor_helper_name, role FROM stall_vendor_helper WHERE stall_holder_id=:id ORDER BY role DESC');
  $stmtVendorHelper->bindValue('id', $stallholder_id);
  $stmtVendorHelper->execute();
  $vendor_helper = $stmtVendorHelper->fetchAll(PDO::FETCH_ASSOC);
  $row[0]['vendor_helper_name'] = $vendor_helper;
  $row[0]['role'] = $vendor_helper;

  $vendor_helper = $stmtVendorHelper->rowCount();
  $row[0]['vendor_row_count'] = $vendor_helper;
}
echo json_encode($row);

$pdo->close();

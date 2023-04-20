<?php
include '../../_session.php';

if (isset($_POST['add_vendor_helper'])) {
  $stallholder_id = $_POST['stallholder_id'];
  $vendor_helper_name = $_POST['vendor_helper_name'];
  $vendor_helper_address = $_POST['vendor_helper_address'];
  $vendor_helper_contact = $_POST['vendor_helper_contact'];
  $role = $_POST['role'];
  $now = date('Y-m-d');

  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("INSERT INTO 
      stall_vendor_helper (
        stall_holder_id, 
        vendor_helper_name, 
        address, 
        contact_number,
        role, 
        created_on) 
      VALUES (
        :stall_holder_id, 
        :vendor_helper_name, 
        :address, 
        :contact_number, 
        :role, 
        :now)");
    $stmt->execute([
      'stall_holder_id' => $stallholder_id,
      'vendor_helper_name' => $vendor_helper_name,
      'address' => $vendor_helper_address,
      'contact_number' => $vendor_helper_contact,
      'role' => $role,
      'now' => $now
    ]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Vendor/Helper added successfully';
    header('location: ../vendor_helper.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../vendor_helper.php');
  }
} elseif (isset($_POST['edit_vendor_helper'])) {
  $id = $_POST['vendor_helper_id'];
  $vendor_helper_name = $_POST['vendor_helper_name'];
  $vendor_helper_address = $_POST['vendor_helper_address'];
  $vendor_helper_contact = $_POST['vendor_helper_contact'];
  $edit_role = $_POST['edit_role'];

  $conn = $pdo->open();
  try {
    $stmtInsert = $conn->prepare("UPDATE stall_vendor_helper 
    SET 
    vendor_helper_name=:vendor_helper_name, 
    address=:vendor_helper_address, 
    contact_number=:vendor_helper_contact, 
    role=:role

    WHERE id=:id");
    $stmtInsert->execute([
      'vendor_helper_name' => $vendor_helper_name,
      'vendor_helper_address' => $vendor_helper_address,
      'vendor_helper_contact' => $vendor_helper_contact,
      'role' => $edit_role,
      'id' => $id
    ]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Vendor/Helper details edited successfully';
    header('location: ../vendor_helper.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../vendor_helper.php');
  }
  $pdo->close();
} elseif (isset($_POST['delete_vendor_helper'])) {
  $stallholder_id = $_POST['stallholder_id'];
  $vendor_helper_id = $_POST['vendor_helper_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("DELETE FROM stall_vendor_helper WHERE id=:id AND stall_holder_id=:stall_holder_id");
    $stmt->execute(['id' => $vendor_helper_id, 'stall_holder_id' => $stallholder_id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Vendor/Helper deleted successfully';
    header('location: ../vendor_helper.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../vendor_helper.php');
  }

  $pdo->close();
}

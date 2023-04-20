<?php
include '_connection.php';
session_start();

// if(){
// 	header('location: admin/dashboard.php');
// }

if (isset($_SESSION['user'])) {
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $_SESSION['user']]);
    $user = $stmt->fetch();
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }

  $pdo->close();
} elseif (isset($_SESSION['admin'])) {
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id' => $_SESSION['admin']]);
    $admin = $stmt->fetch();
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }
  $pdo->close();
} elseif (isset($_SESSION['stallholder'])) {
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("
      SELECT 
      id, first_name, middle_name, last_name, address, 
      DATE_FORMAT(date_of_birth, '%m/%d/%Y') as date_of_birth, 
      place_of_birth, contact_number, 
      religion, marital_status, spouse_name, spouse_occupation, 
      gender, educational_attainment, 
      email, username, password, valid_id, user_type

      FROM stall_holders 
      WHERE id=:id
      ");
    $stmt->execute(['id' => $_SESSION['stallholder']]);
    $stallholder = $stmt->fetch();
    // print_r($stallholder);
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }
  $pdo->close();
}

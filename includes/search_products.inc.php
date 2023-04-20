<?php
include '../_session.php';
if (isset($_POST['keyword'])) {
  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE product_name LIKE :keyword ORDER BY product_name ASC");
  $stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']);
  $row = $stmt->fetch();

  $_SESSION['search_data'] = $row;
  $_SESSION['keyword'] = $_POST['keyword'];
  $_SESSION['search_count'] = $row['numrows'];

  $pdo->close();

  header('location:../index.php');
}

<?php
include '../../_session.php';

if (isset($_POST['add_stall_product'])) {
  $stallholder_id = $_POST['stallholder_id'];
  $stall_id = $_POST['stall_id'];
  $section_id = $_POST['section_id'];
  $product_name = $_POST['product_name'];
  // $product_price = $_POST['product_price'];
  $now = date('Y-m-d');
  $path = 'products_view.php?id=' . $stall_id;
  $conn = $pdo->open();

  foreach ($product_name as $index => $product) {
    $final_product = $product;
    // CHECK PRODUCT NAME IN PRODUCTS DB

    $stmtProductName = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE product_name=:product_name AND stall_id=:stall_id");
    $stmtProductName->execute(['product_name' => $final_product, 'stall_id' => $stall_id]);
    $rowProductName = $stmtProductName->fetch();

    if ($rowProductName['numrows'] > 0) {
      $_SESSION['error'] = 'Username Error!';
      $_SESSION['message'] = 'This product is already present in your stall';
      header('location: ../' . $path);
    } else {
      try {
        $stmtInsert = $conn->prepare("INSERT INTO products (
              product_name, 
              stall_holder_id, 
              stall_id, 
              section_id, 
              created_on) 
            VALUES ('$final_product', '$stallholder_id', '$stall_id', '$section_id', '$now')");
        $stmtInsert->execute();

        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Product/s added successfully';
        header('location: ../' . $path);
        $pdo->close();
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['message'] = $e->getMessage();
        header('location: ../' . $path);
      }
    }
  }
  $pdo->close();
} elseif (isset($_POST['edit_stall_product'])) {
  $stall_id = $_POST['stall_id'];
  $product_id = $_POST['edit_product_id'];
  $product_name = $_POST['edit_product_name'];
  // $product_price = $_POST['edit_product_price'];

  $path = 'products_view.php?id=' . $stall_id;
  $conn = $pdo->open();
  $stmtProductName = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE product_name=:product_name AND stall_id=:stall_id");
  $stmtProductName->execute(['product_name' => $product_name, 'stall_id' => $stall_id]);
  $rowProductName = $stmtProductName->fetch();

  if ($rowProductName['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'This product is already present in your stall';
    header('location: ../' . $path);
  } else {
    try {
      $stmtInsert = $conn->prepare("UPDATE products SET product_name=:product_name WHERE id=:id");
      $stmtInsert->execute([
        'product_name' => $product_name,
        'id' => $product_id
      ]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Product edited successfully';
      header('location: ../' . $path);
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../' . $path);
    }
  }
  $pdo->close();
} elseif (isset($_POST['delete_stall_product'])) {
  $id = $_POST['delete_product_id'];
  $stall_id = $_POST['stall_id'];

  $path = 'products_view.php?id=' . $stall_id;

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Product deleted successfully';
    header('location: ../' . $path);
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../' . $path);
  }

  $pdo->close();
} elseif (isset($_POST['delete_all_products'])) {
  $stall_id = $_POST['stall_id'];
  $path = 'products_view.php?id=' . $stall_id;

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("DELETE FROM products WHERE stall_id=:stall_id");
    $stmt->execute(['stall_id' => $stall_id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'All Products deleted successfully';
    header('location: ../' . $path);
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../' . $path);
  }

  $pdo->close();
}

<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM products WHERE stall_id=:stall_id");
  $stmt->execute(['stall_id' => $stall_id]);
  foreach ($stmt as $row) {
    // INITIALIZATION

    // PRODUCT ID
    $productID = $row['id'];

    // PRODUCT NAME
    $productName = $row['product_name'];
    // PRODUCT PRICE
    $productPrice = 'Php' . ' ' . $row['product_price'] . '.00';
    // DATE ADDED
    $currentDate = date('M d, Y', strtotime($row['created_on']));
    // DATA TABLE DISPLAY FOR USER
    echo "
      <tr>
        <td>" . $productName . "</td>
        <td>" . $currentDate . "</td>
        <td align='center'>
          <div class='action-buttons'>
            <button type='button' class='btn btn-success btn-edit-product btn-sm m-1' data-id='" . $productID . "'><i class='fas fa-pen mr-2'></i><span>Edit</span></button>
            <button type='button' class='btn btn-danger btn-delete-product btn-sm m-1' data-id='" . $productID . "'><i class='fas fa-times mr-2'></i><span>Delete</span></button>
          </div>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

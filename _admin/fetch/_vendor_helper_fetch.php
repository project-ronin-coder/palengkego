<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_vendor_helper WHERE stall_holder_id=:stall_holder_id");
  $stmt->execute(['stall_holder_id' => $stallholder_id]);
  foreach ($stmt as $row) {
    // INITIALIZATION

    // PRODUCT ID
    $vendor_helper_id = $row['id'];

    // PRODUCT NAME
    $vendor_helperName = $row['vendor_helper_name'];
    $vendor_helperAddress = $row['address'];
    $vendor_helperContactNumber = $row['contact_number'];
    // DATE ADDED
    $currentDate = date('M d, Y', strtotime($row['created_on']));
    // DATA TABLE DISPLAY FOR USER
    echo "
      <tr>
        <td>" . $vendor_helperName . "</td>
        <td>" . $vendor_helperAddress . "</td>
        <td>" . $vendor_helperContactNumber . "</td>
        <td>" . $currentDate . "</td>
        <td align='center'>
          <div class='action-buttons'>
            <button type='button' class='btn btn-success btn-edit-vendor btn-sm m-1' data-id='" . $vendor_helper_id . "'><i class='fas fa-pen mr-2'></i><span>Edit</span></button>
            <button type='button' class='btn btn-danger btn-delete-vendor btn-sm m-1' btn-sm data-id='" . $vendor_helper_id . "'><i class='fas fa-times mr-2'></i><span>Delete</span></button>
          </div>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

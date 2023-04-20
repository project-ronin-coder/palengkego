<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_vendor_helper WHERE stall_holder_id=:id");
  $stmt->execute(['id' => $stallholder_id]);
  foreach ($stmt as $row) {
    // INITIALIZATION

    // USER ID
    $vendorHelperID = $row['id'];

    // FULL NAME
    $vendorHelperName = $row['vendor_helper_name'];
    $vendorHelperAddress = $row['address'];
    $vendorHelperContact = $row['contact_number'];
    $vendorHelperRole = $row['role'];
    // DATE ADDED
    $currentDate = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR USER
    echo "
      <tr>
        <td>" . $vendorHelperName . "</td>
        <td>" . $vendorHelperAddress . "</td>
        <td>" . $vendorHelperContact . "</td>
        <td>" . $vendorHelperRole . "</td>
        <td>" . $currentDate . "</td>
        <td>
          <button class='btn-edit btn btn-success btn-sm  m-1' data-id='" . $vendorHelperID . "'><i class='fa fa-edit'></i> Edit</button>
          <button class='btn-delete btn btn-danger btn-sm m-1' data-id='" . $vendorHelperID . "'><i class='fa fa-trash'></i> Delete</button>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

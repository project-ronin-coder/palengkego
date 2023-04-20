<!-- QUERY -->
<?php

$conn = $pdo->open();
try {
  $stmt = $conn->prepare("
    SELECT
    so.id,
    ss.stall_id,ss.section,
    sh.first_name,sh.middle_name, sh.last_name, sh.address, sh.contact_number, sh.email, sh.password, sh.valid_id, sh.user_type, sh.status, sh.activate_code, sh.reset_code,
    so.stall_name, so.stall_photo, so.stall_status, so.created_on
    
    FROM `stalls_owned` as so 
    
    INNER JOIN stall_section as ss ON so.stall_id = ss.id
    INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

    WHERE so.stall_status = 1
    ");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    // STALL ID
    $stallId = $row['id'];
    // STALL PHOTO
    $stallPhoto = (!empty($row['stall_photo'])) ? '../src/stall_photo/' . $row['stall_photo'] : '../src/stall_photo/default_stall.png';
    // STALL OWNER NAME
    $stallOwnerName = $row['first_name'] . " " . $row['last_name'];
    // STALL NAME
    $stallName = ($row['stall_name']) ? '<span>' . $row['stall_name'] . '</span>' : '<span>' . $stallOwnerName . '\'s Stall' . '</span>';
    // STALL CATEGORY
    $stallCategory = $row['section'];
    // STALL SECTION
    $stallSection = $row['stall_id'];
    // PRODUCT LIST

    // DATE ASSIGNED
    $dateAssigned = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR STALLS
    echo "
      <tr>
        <td class='d-flex flex-row justify-content-between align-items-center'>
          <img class='mr-2' src='" . $stallPhoto . "' height='50px' width='50px'>
          <span class='pull-right'><button class='btn-photo btn btn-sm btn-flat' data-toggle='modal' data-id='" . $stallId . "'><i class='fa fa-edit text-primary'></i></button>
        </td> 
        <td>" . $stallName . "</td>
        <td>" . $stallOwnerName . "</td>
        <td>" . $stallCategory . "</td>
        <td>" . $stallSection . "</td>
        <td class='text-center'>
          <button class='btn-view btn btn-info btn-sm m-1' data-id='" . $stallId . "'><i class='fa fa-box-open'></i> View</button>
        </td>
        <td>" . $dateAssigned . "</td>
        <td class='text-center'>
          <button class='btn-edit btn btn-success btn-sm m-1' data-id='" . $stallId . "'><i class='fa fa-edit'></i> Edit</button>
          <button class='btn-unassign btn btn-danger btn-sm m-1' data-id='" . $stallId . "'><i class='fa fa-trash'></i> Unassign</button>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
// <td>
// ".$status2." 
// </td>
?>
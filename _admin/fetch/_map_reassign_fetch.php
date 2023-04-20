<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("
    SELECT
    so.id, so.stall_holder_id,
    sh.first_name, sh.last_name, sh.email, sh.valid_id,
    so.stall_name, so.stall_photo, so.stall_status
    
    FROM `stalls_owned` as so 
    
    INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id
  
    WHERE so.stall_status = 0");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION
    $stallOwnerName = $row['first_name'] . " " . $row['last_name'];
    $image = (!empty($row['valid_id'])) ? '../src/valid_id/' . $row['valid_id'] : '../src/valid_id/default_id.png';
    $stallPhoto = (!empty($row['stall_photo'])) ? '../src/stall_photo/' . $row['stall_photo'] : '../src/stall_photo/default_stall.png';
    $stallName = ($row['stall_name']) ? '<span>' . $row['stall_name'] . '</span>' : '<span>' . $stallOwnerName . '\'s Stall' . '</span>';
    // DATA TABLE DISPLAY FOR STORE OWNER APPLICANTS
    echo "
      <tr>
        <td align='center'>
          <img class='mr-2' src='" . $stallPhoto . "' height='50px' width='50px'>
        </td> 
        <td>" . $stallOwnerName . "</td>
        <td>" . $stallName . "</td>
        <td>" . $row['email'] . "</td>
        <td align='center'>
          <button class='btn-reassign btn btn-success btn-sm mb-1' data-target='#modalReassignStallholder' data-dismiss='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Reassign</button>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

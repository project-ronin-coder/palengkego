<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE status=1");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION
    $stallholderId = $row['id'];

    $stallholderValidId = (!empty($row['valid_id'])) ? '../src/valid_id/' . $row['valid_id'] : '../src/valid_id/default_id.png';

    $middle_name = $row['middle_name'];
    $initial = mb_substr($middle_name, 0, 1);

    if ($row['middle_name'] == "") {
      $middle_initial = "";
    } else {
      $middle_initial = $initial . ".";
    }

    // APPLICANT NAME
    $stallholderName = $row['first_name'] . ' ' . $middle_initial . ' ' . $row['last_name'];

    // APPLICANT EMAIL
    $stallholderEmail = $row['email'];

    // DATA TABLE DISPLAY FOR STORE OWNER APPLICANTS
    echo "
      <tr>
        <td align='center'>
          <img class='mr-2' src='" . $stallholderValidId . "' height='50px' width='50px'>
        </td> 
        <td>" . $stallholderName . "</td>
        <td>" . $stallholderEmail . "</td>
        <td align='center'>
          <button class='btn-assign btn btn-primary btn-sm mb-1' data-toggle='modal' data-target='#modalAssignStallholder' data-dismiss='modal' data-id='" . $stallholderId . "'><i class='fa fa-edit'></i> Assign</button>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

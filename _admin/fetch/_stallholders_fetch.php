<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE status=1");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    // APPLICANT ID
    $stallholderId = $row['id'];

    // APPLICANT VALID ID
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

    // APPLICANT USERNAME
    $stallholderUsername = $row['username'];
    $editUsername = "<span class='pull-right'><button class='btn-edit-username btn btn-sm btn-flat' data-toggle='modal' data-id='" . $stallholderId . "'><i class='fa fa-edit text-primary'></i></button>";


    // APPLICANT EMAIL
    $stallholderEmail = $row['email'];
    $editEmail = "<span class='pull-right'><button class='btn-edit-email btn btn-sm btn-flat' data-toggle='modal' data-id='" . $stallholderId . "'><i class='fa fa-edit text-primary'></i></button>";

    $reactivateAcc = (!$row['act']) ? '<button class="btn btn-danger btn-sm btn-reactivate" data-toggle="modal" data-id="' . $stallholderId . '"><i class="fa fa-edit"></i><span class="p-2">Deactivated</span></button>' : '';
    $deactivateAcc = ($row['act']) ? '<button class="btn btn-success btn-sm btn-deactivate" data-toggle="modal" data-id="' . $stallholderId . '"><i class="fa fa-edit"></i><span class="p-2">Activated</span></button>' : '';

    // DATE APPLIED
    $currentDate = date('M d, Y', strtotime($row['created_on']));
    $yearEnd = date('M d, Y', strtotime('12/31'));
    // DATA TABLE DISPLAY FOR STORE OWNER APPLICANTS
    echo "
      <tr>
        <td class='d-flex flex-row justify-content-between align-items-center'>
          <img class='mr-2' src='" . $stallholderValidId . "' height='50px' width='50px'>
          <span class='pull-right'><button class='btn-valid-id btn btn-sm btn-flat' data-toggle='modal' data-id='" . $stallholderId . "'><i class='fa fa-edit text-primary'></i></button>
        </td> 
        <td>" . $stallholderName . "</td>
        <td>
        " . $stallholderUsername . "
        " . $editUsername .  "
        </td>
        <td>
        " . $stallholderEmail . "
        " . $editEmail . "
        </td>
        <td class='text-center'>
          <button class='btn-view-vendor-helper btn btn-info btn-sm m-1' data-id='" . $stallholderId . "'><i class='fa fa-edit'></i> View</button>
        </td>
        <td>
          " . $reactivateAcc . "
          " . $deactivateAcc .  "
        </td>
        <td>" . $currentDate . "</td>
        <td>" . $yearEnd . "</td>
        <td class='text-center'>
        <button class='btn-edit btn btn-success btn-sm m-1' data-id='" . $stallholderId . "'><i class='fa fa-edit'></i> Edit</button>
        <button class='btn-delete btn btn-danger btn-sm m-1' data-id='" . $stallholderId . "'><i class='fa fa-trash'></i> Delete</button>
        </td>
      </tr>
    ";
  }
  // INCASE
  // <button class="approve btn btn-sm  btn-flat mb-1" data-id="'.$row['id'].'"><i class="fa fa-check-square text-primary"></i></button>
} catch (PDOException $e) {
  echo $e->getMessage();
}
  // <td>
  // ".$status2." 
  // </td>

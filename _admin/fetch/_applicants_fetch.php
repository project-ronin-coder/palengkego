<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE status=0");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    // APPLICANT ID
    $applicantId = $row['id'];

    // APPLICANT VALID ID
    $applicantValidId = (!empty($row['valid_id'])) ? $row['valid_id'] : 'default_id.png';

    $middle_name = $row['middle_name'];
    $initial = mb_substr($middle_name, 0, 1);

    if ($row['middle_name'] == "") {
      $middle_initial = "";
    } else {
      $middle_initial = $initial . ".";
    }

    // APPLICANT NAME
    $applicantName = $row['first_name'] . ' ' . $middle_initial . ' ' . $row['last_name'];

    // APPLICANT EMAIL
    $applicantUsername = $row['username'];
    $editUsername = "<span class='pull-right'><button class='btn-edit-username btn btn-sm btn-flat' data-toggle='modal' data-id='" . $applicantId . "'><i class='fa fa-edit text-primary'></i></button>";

    // APPLICANT EMAIL
    $applicantEmail = $row['email'];
    $editEmail = "<span class='pull-right'><button class='btn-edit-email btn btn-sm btn-flat' data-toggle='modal' data-id='" . $applicantId . "'><i class='fa fa-edit text-primary'></i></button>";

    $applicantApprove = (!$row['status']) ? '<button class="btn btn-danger btn-approve btn-sm" data-toggle="modal" data-id="' . $applicantId . '"><i class="fa fa-edit"></i><span class="p-2">Unapproved</span></button>' : '';

    // ACCOUNT TYPE
    $accType = ($row['user_type']) ? '<span class="label label-success mr-2">Stallholder</span>' : ' ';

    // DATE APPLIED
    $currentDate = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR STORE OWNER APPLICANTS
    echo "
      <tr>
        <td class='d-flex flex-row justify-content-between align-items-center'>
          <img class='mr-2' src='../src/valid_id/" . $applicantValidId . "' height='50px' width='50px'>
          <span class='pull-right'><button class='btn-valid-id btn btn-sm btn-flat' data-toggle='modal' data-id='" . $applicantId . "'><i class='fa fa-edit text-primary'></i></button>
        </td> 
        <td>" . $applicantName . "</td>
        <td>
        " . $applicantUsername . "
        " . $editUsername .  "
        </td>
        <td>
        " . $applicantEmail . "
        " . $editEmail . "
        </td>
        <td class='text-center'>
          <button class='btn-view-vendor-helper btn btn-info btn-sm m-1' data-id='" . $applicantId . "'><i class='fa fa-edit'></i> View</button>
        </td>
        <td class='text-center'>
          " . $applicantApprove . " 
        </td>
        <td>" . $accType . "</td>
        <td>" . $currentDate . "</td>
        <td>
        <button class='btn-edit btn btn-success btn-sm m-1' data-id='" . $applicantId . "'><i class='fa fa-edit'></i> Edit</button>
        <button class='btn-delete btn btn-danger btn-sm m-1' data-id='" . $applicantId . "'><i class='fa fa-trash'></i> Delete</button>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM users");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    // USER ID
    $userId = $row['id'];

    // PROFILE PICTURE
    $userProfile = (!empty($row['profile_picture'])) ? $row['profile_picture'] : 'default_user.png';

    // FULL NAME
    $fullName = $row['first_name'] . ' ' . $row['last_name'];

    // USERNAME
    $Username = $row['username'];
    $editUsername = "<span class='pull-right'><button class='btn-edit-username btn btn-sm btn-flat' data-toggle='modal' data-id='" . $userId . "'><i class='fa fa-edit text-primary'></i></button>";

    // EMAIL
    $userEmail = $row['email'];
    $editEmail = "<span class='pull-right'><button class='btn-edit-email btn btn-sm btn-flat' data-toggle='modal' data-id='" . $userId . "'><i class='fa fa-edit text-primary'></i></button>";

    // STATUS
    $verifyUser = (!$row['status']) ? '<button  class="btn btn-danger btn-sm btn-verify" data-toggle="modal" data-id="' . $userId . '"><i class="fa fa-edit"></i><span class="p-2">Unverified</span></button>' : '';
    $unverifyUser = ($row['status']) ? '<button class="btn btn-success btn-sm btn-unverify" data-toggle="modal" data-id="' . $userId . '"><i class="fa fa-edit"></i><span class="p-2">Verified</span></button>' : '';

    $reactivateAcc = (!$row['act']) ? '<button class="btn btn-danger btn-sm btn-reactivate" data-toggle="modal" data-id="' . $userId . '"><i class="fa fa-edit"></i><span class="p-2">Deactivated</span></button>' : '';
    $deactivateAcc = ($row['act']) ? '<button class="btn btn-success btn-sm btn-deactivate" data-toggle="modal" data-id="' . $userId . '"><i class="fa fa-edit"></i><span class="p-2">Activated</span></button>' : '';

    // ACCOUNT TYPE
    $makeAdmin = (!$row['user_type']) ? '<button class="btn btn-secondary btn-sm btn-make-admin" data-toggle="modal" data-id="' . $userId . '"><i class="fa fa-edit"></i><span class="p-2">User</span></button>' : '';
    $makeUser = ($row['user_type']) ? '<button class="btn btn-primary btn-sm btn-make-user" data-toggle="modal" data-id="' . $userId . '"><i class="fa fa-edit"></i><span class="p-2">Admin</span></button>' : '';

    // DATE ADDED
    $currentDate = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR USER
    echo "
      <tr>
        <td class='d-flex flex-row justify-content-between align-items-center'>
          <img class='mr-2' src='../src/profile/" . $userProfile . "' height='50px' width='50px'>
          <span class='pull-right'><button class='btn-profle btn btn-sm btn-flat' data-toggle='modal' data-id='" . $userId . "'><i class='fa fa-edit text-primary'></i></button>
        </td>
        <td>" . $fullName . "</td>
        <td>
          " . $Username . " 
          " . $editUsername . "
        </td>
        <td>
        " . $userEmail . " 
        " . $editEmail . "
        </td>
        <td class='text-center'>
          " . $verifyUser . "
          " . $unverifyUser . "
        </td>
        <td class='text-center'>
          " . $reactivateAcc . "
          " . $deactivateAcc . "
        </td>
        <td class='text-center'>
          " . $makeAdmin . "
          " . $makeUser . "
        </td>
        <td>" . $currentDate . "</td>
        <td>
          <button class='btn-edit btn btn-success btn-sm m-1' data-id='" . $userId . "'><i class='fa fa-edit'></i> Edit</button>
          <button class='btn-delete btn btn-danger btn-sm m-1' data-id='" . $userId . "'><i class='fa fa-trash'></i> Delete</button>
        </td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

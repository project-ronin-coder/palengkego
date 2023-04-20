<!-- QUERY -->
<?php

$conn = $pdo->open();
try {
  $stmt = $conn->prepare("
    SELECT
    so.id,
    sh.first_name, sh.middle_name, sh.last_name, sh.contact_number, sh.email, sh.address,
    so.stall_name, so.stall_photo, so.stall_status, so.created_on
    
    FROM `stalls_owned` as so 
    
    INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

    WHERE so.stall_status = 0
    ");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    $middle_name = $row['middle_name'];
    $initial = mb_substr($middle_name, 0, 1);

    if ($row['middle_name'] == "") {
      $middle_initial = "";
    } else {
      $middle_initial = $initial . ".";
    }

    // APPLICANT NAME
    $stallOwnerName = $row['first_name'] . ' ' . $middle_initial . ' ' . $row['last_name'];

    // STALL NAME
    $stallName = ($row['stall_name']) ? $row['stall_name'] :  $stallOwnerName . '\'s Stall';

    // APPLICANT NAME
    $stallOwnerContact = $row['contact_number'];

    // APPLICANT NAME
    $stallOwnerEmail = $row['email'];

    // APPLICANT NAME
    $stallOwnerAddress = $row['address'];

    // DATE ASSIGNED
    $dateUnassigned = date('M d, Y', strtotime($row['created_on']));

    // STATUS
    $status = ($row['stall_status']) ? 'Assigned' : 'Unassigned';

    // DATA TABLE DISPLAY FOR STALLS
    echo "
      <tr>
        <td>" . $stallName . "</td>
        <td>" . $stallOwnerName . "</td>
        <td>" . $stallOwnerContact . "</td>
        <td>" . $stallOwnerEmail . "</td>
        <td>" . $stallOwnerAddress . "</td>
        <td>" . $status . "</td>
        <td>" . $dateUnassigned . "</td>
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
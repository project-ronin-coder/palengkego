<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE status=1");
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
    $stallholderName = $row['first_name'] . ' ' . $middle_initial . ' ' . $row['last_name'];

    // APPLICANT ADDRESS
    $stallholderAddress = $row['address'];

    // APPLICANT DATE OF BIRTH
    $stallholderContact = $row['contact_number'];

    // APPLICANT DATE OF BIRTH
    $stallholderUsername = $row['username'];

    // APPLICANT DATE OF BIRTH
    $stallholderEmail = $row['email'];

    // APPLICANT DATE OF BIRTH
    $stallholderDOB = $row['date_of_birth'];

    // STATUS
    $stallholderStatus = ($row['status']) ? 'Approved' : 'Unapproved';

    $stallholderAccount = ($row['act']) ? 'Activated' : 'Deactivated';

    // DATE APPLIED
    $currentDate = date('M d, Y', strtotime($row['created_on']));
    $yearEnd = date('M d, Y', strtotime('12/31'));
    // DATA TABLE DISPLAY FOR STORE OWNER APPLICANTS
    echo "
      <tr>
        <td>" . $stallholderName . "</td>
        <td>" . $stallholderUsername . "</td>
        <td>" . $stallholderEmail . "</td>
        <td>" . $stallholderContact . "</td>
        <td>" . $stallholderAddress . "</td>
        <td>" . $stallholderDOB . "</td>
        <td>" . $stallholderStatus . "</td>
        <td>" . $stallholderAccount . "</td>
        <td>" . $currentDate . "</td>
        <td>" . $yearEnd . "</td>
      </tr>
    ";
  }
  $pdo->close();
} catch (PDOException $e) {
  echo $e->getMessage();
}
  // <td>
  // ".$status2." 
  // </td>

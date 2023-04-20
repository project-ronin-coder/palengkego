<?php
// CONNECTION OPEN
$conn = $pdo->open();
try {
  // QUERY
  $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE status=0");
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
    $applicantName = $row['first_name'] . ' ' . $middle_initial . ' ' . $row['last_name'];

    // APPLICANT ADDRESS
    $applicantAddress = $row['address'];

    // APPLICANT ADDRESS
    $applicantAddress = $row['address'];

    // APPLICANT DATE OF BIRTH
    $applicantDOB = $row['date_of_birth'];

    // APPLICANT DATE OF BIRTH
    $applicantContact = $row['contact_number'];

    // APPLICANT DATE OF BIRTH
    $applicantUsername = $row['username'];

    // APPLICANT DATE OF BIRTH
    $applicantEmail = $row['email'];

    // STATUS
    $applicantStatus = ($row['status']) ? 'Approved' : 'Unapproved';

    $applicantAccount = ($row['act']) ? 'Activated' : 'Deactivated';


    // ACCOUNT TYPE
    $applicantAccType = ($row['user_type']) ? 'Stallholder' : ' ';

    // DATE APPLIED
    $currentDate = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR STORE OWNER APPLICANTS
    echo "
      <tr>
        <td>" . $applicantName . "</td>
        <td>" . $applicantUsername . "</td>
        <td>" . $applicantEmail . "</td>
        <td>" . $applicantContact . "</td>
        <td>" . $applicantAddress . "</td>
        <td>" . $applicantDOB . "</td>
        <td>" . $applicantStatus . "</td>
        <td>" . $applicantAccount . "</td>
        <td>" . $applicantAccType . "</td>
        <td>" . $currentDate . "</td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  $_SESSION['error'] = 'Error!';
  $_SESSION['message'] = $e->getMessage();
  header('location: ../reports.php');
}

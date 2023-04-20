<!-- QUERY -->
<?php

$conn = $pdo->open();
try {
  $stmt = $conn->prepare("
    SELECT
    so.id,
    ss.stall_id,ss.section,
    sh.first_name, sh.middle_name, sh.last_name, sh.status,
    so.stall_name, so.stall_photo, so.stall_status, so.created_on
    
    FROM `stalls_owned` as so 
    
    INNER JOIN stall_section as ss ON so.stall_id = ss.id
    INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

    WHERE so.stall_status = 1
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
    // STALL CATEGORY
    $stallCategory = $row['section'];

    // STALL SECTION
    $stallSection = $row['stall_id'];

    // DATE ASSIGNED
    $dateAssigned = date('M d, Y', strtotime($row['created_on']));

    // STATUS
    $status = ($row['stall_status']) ? 'Assigned' : 'Unassigned';

    // DATA TABLE DISPLAY FOR STALLS
    echo "
      <tr>
        <td>" . $stallName . "</td>
        <td>" . $stallOwnerName . "</td>
        <td>" . $stallCategory . "</td>
        <td>" . $stallSection . "</td>
        <td>" . $status . "</td>
        <td>" . $dateAssigned . "</td>
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
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

    // FULL NAME
    $fullName = $row['first_name'] . ' ' . $row['last_name'];

    // USERNAME
    $Username = $row['username'];

    // EMAIL
    $userEmail = $row['email'];

    // STATUS
    $status = ($row['status']) ? 'Verified' : 'Not verified';
    $account = ($row['act']) ? 'Activated' : 'Deactivated';

    // ACCOUNT TYPE
    $userType = ($row['user_type']) ? 'Admin' : 'User';

    // DATE ADDED
    $currentDate = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR USER
    echo "
      <tr>
        <td>" . $fullName . "</td>
        <td>" . $Username . "</td>
        <td>" . $userEmail . "</td>
        <td>" . $status . "</td>
        <td>" . $account . "</td>
        <td>" . $userType . "</td>
        <td>" . $currentDate . "</td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

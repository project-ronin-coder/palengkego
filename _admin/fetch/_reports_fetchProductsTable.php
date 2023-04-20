<!-- QUERY -->
<?php

$conn = $pdo->open();
try {
  $stmt = $conn->prepare("
    SELECT
    prod.id, prod.product_name, prod.created_on, 
    sh.first_name, sh.middle_name, sh.last_name,
    so.stall_name,
    ss.stall_id as section

    FROM `products` as prod 
    
    INNER JOIN stall_section as ss ON prod.section_id = ss.id
    INNER JOIN stalls_owned as so ON prod.stall_id = so.id
    INNER JOIN stall_holders as sh ON prod.stall_holder_id = sh.id

    ");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    // PRODUCT NAME
    $productName = $row['product_name'];

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

    // STALL SECTION
    $stallSection = $row['section'];


    // DATE ASSIGNED
    $dateAssigned = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR STALLS
    echo "
      <tr>
        <td>" . $productName . "</td>
        <td>" . $stallName . "</td>
        <td>" . $stallOwnerName . "</td>
        <td>" . $stallSection . "</td>
        <td>" . $dateAssigned . "</td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
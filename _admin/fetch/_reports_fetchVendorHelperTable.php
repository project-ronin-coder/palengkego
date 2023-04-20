<!-- QUERY -->
<?php

$conn = $pdo->open();
try {
  $stmt = $conn->prepare("
    SELECT
    svp.vendor_helper_name as name, svp.address, svp.contact_number, svp.role, svp.created_on,
    sh.first_name, sh.middle_name, sh.last_name

    FROM `stall_vendor_helper` as svp 
    
    INNER JOIN stall_holders as sh ON svp.stall_holder_id = sh.id
    ");
  $stmt->execute();
  foreach ($stmt as $row) {
    // INITIALIZATION

    // PRODUCT NAME
    $nameVendorHelper = $row['name'];

    $addressVendorHelper = $row['address'];

    $contactVendorHelper = $row['contact_number'];

    $roleVendorHelper = $row['role'];

    $middle_name = $row['middle_name'];
    $initial = mb_substr($middle_name, 0, 1);

    if ($row['middle_name'] == "") {
      $middle_initial = "";
    } else {
      $middle_initial = $initial . ".";
    }

    // APPLICANT NAME
    $worksFor = $row['first_name'] . ' ' . $middle_initial . ' ' . $row['last_name'];

    // DATE ASSIGNED
    $dateAdded = date('M d, Y', strtotime($row['created_on']));

    // DATA TABLE DISPLAY FOR STALLS
    echo "
      <tr>
        <td>" . $nameVendorHelper . "</td>
        <td>" . $addressVendorHelper . "</td>
        <td>" . $contactVendorHelper . "</td>
        <td>" . $roleVendorHelper . "</td>
        <td>" . $worksFor . "</td>
        <td>" . $dateAdded . "</td>
      </tr>
    ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
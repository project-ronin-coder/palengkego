<?php

if (isset($_SESSION['stallholder'])) {
  $stallholder_id = $stallholder['id'];

  // ACCOUNT DETAILS
  $stallholder_email = $stallholder['email'];
  $stallholder_password = $stallholder['password'];

  // ACCOUNT NAME
  $first_name = $stallholder['first_name'];
  $middle_name = $stallholder['middle_name'];
  $initial = mb_substr($middle_name, 0, 1);
  if ($stallholder['middle_name'] == "") {
    $middle_initial = "";
  } else {
    $middle_initial = $initial . ".";
  }
  $last_name = $stallholder['last_name'];
  $stallholder_fullname =  $stallholder['first_name'] . ' ' . $middle_initial . ' ' . $stallholder['last_name'];

  // ACCOUNT CONTACT, ADDRESS, BIRTH DETAILS
  $date_of_birth = $stallholder['date_of_birth'];
  $place_of_birth = $stallholder['place_of_birth'];
  $address = $stallholder['address'];
  $contact_number = $stallholder['contact_number'];

  // ACCOUNT RELIGION, MARITAL STATUS, SPOUSE DETAILS
  $religion = $stallholder['religion'];
  $marital_status = $stallholder['marital_status'];
  $spouse_name = $stallholder['spouse_name'];
  $spouse_occupation = $stallholder['spouse_occupation'];

  // GENDER AND EDUCATION
  $gender = $stallholder['gender'];
  $educational_attainment = $stallholder['educational_attainment'];

  // VALID ID
  $valid_id = $stallholder['valid_id'];

  // GET ROW OF STALLS OWNED
  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT * FROM stalls_owned WHERE stall_holder_id=:id");
  $stmt->execute(['id' => $stallholder_id]);
  $row = $stmt->rowCount();

  $pdo->close();

  $stalls_owned_row =  json_encode($row);
}

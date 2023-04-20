<?php
include '../../_session.php';


if (isset($_POST['update_stallholder_personal_details'])) {
  $id = $_POST['stallholder_id'];
  $first_name = ucfirst($_POST['first_name']);
  $middle_name = ucfirst($_POST['middle_name']);
  $last_name = ucfirst($_POST['last_name']);
  $address = $_POST['address'];
  $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
  $place_of_birth = $_POST['place_of_birth'];
  $contact_number = $_POST['contact_number'];
  $religion = $_POST['religion'];
  $marital_status = $_POST['marital_status'];
  $spouse_name = $_POST['spouse_name'];
  $spouse_occupation = $_POST['spouse_occupation'];
  $other_gender = $_POST['other_gender'];
  if ($other_gender == "") {
    $gender = $_POST['gender'];
  } else {
    $gender = $_POST['other_gender'];
  }
  $other_education = $_POST['other_education'];
  if ($other_education == "") {
    $education = $_POST['education'];
  } else {
    $education = $_POST['other_education'];
  }
  // OPEN CONNECTION
  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET 
      first_name=:first_name, 
      middle_name=:middle_name, 
      last_name=:last_name, 
      address=:address, 
      date_of_birth=:date_of_birth, 
      place_of_birth=:place_of_birth, 
      contact_number=:contact_number, 
      religion=:religion, 
      marital_status=:marital_status, 
      spouse_name=:spouse_name, 
      spouse_occupation=:spouse_occupation, 
      gender=:gender, 
      educational_attainment=:educational_attainment
      WHERE id=:id");
    $stmt->execute([
      'first_name' => $first_name,
      'middle_name' => $middle_name,
      'last_name' => $last_name,
      'address' => $address,
      'date_of_birth' => $date_of_birth,
      'place_of_birth' => $place_of_birth,
      'contact_number' => $contact_number,
      'religion' => $religion,
      'marital_status' => $marital_status,
      'spouse_name' => $spouse_name,
      'spouse_occupation' => $spouse_occupation,
      'gender' => $gender,
      'educational_attainment' => $education,
      'id' => $id
    ]);
    $_SESSION['success'] = 'Edit Success!';
    $_SESSION['message'] = 'Stallholder information updated successfully';
    header('location: ../account.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../account.php');
  }
  // CLOSE CONNECTION
  $pdo->close();
} elseif (isset($_POST['update_stallholder_email'])) {
  $id = $_POST['stallholder_id'];
  $email = $_POST['email'];

  // OPEN CONNECTION
  $conn = $pdo->open();

  // CHECK EMAIL IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
  $stmtUser->execute(['email' => $email]);
  $rowUser = $stmtUser->fetch();

  // CHECK EMAIL IN STALLHOLDER DB
  $stmtStallholder = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE email=:email");
  $stmtStallholder->execute(['email' => $email]);
  $rowStallholder = $stmtStallholder->fetch();

  if ($rowUser['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered';
    header('location: ../account.php');
  } elseif ($rowStallholder['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered';
    header('location: ../account.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET email=:email WHERE id=:id");
      $stmt->execute(['email' => $email, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Stallholder email updated successfully';
      header('location: ../account.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../account.php');
    }
  }
  $pdo->close();
} elseif (isset($_POST['update_stallholder_username'])) {
  $id = $_POST['stallholder_id'];
  $username = $_POST['username'];

  // OPEN CONNECTION
  $conn = $pdo->open();

  // CHECK USERNAME IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
  $stmtUser->execute(['username' => $username]);
  $rowUserName = $stmtUser->fetch();
  // CHECK USERNAME IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE username=:username");
  $stmtUser->execute(['username' => $username]);
  $rowStallholderUsername = $stmtUser->fetch();

  if ($rowUserName['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../account.php');
  } elseif ($rowStallholderUsername['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../account.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET username=:username WHERE id=:id");
      $stmt->execute(['username' => $username, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Stallholder username updated successfully';
      header('location: ../account.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../account.php');
    }
  }
  $pdo->close();
} elseif (isset($_POST['change_stallholder_password'])) {
  $id = $_POST['stallholder_id'];


  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $retype_password = $_POST['retype_password'];

  $conn = $pdo->open();

  if ($new_password !== $retype_password && $new_password !== $old_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match.';
    header('location: ../account.php');
  } else {
    $password = password_hash($new_password, PASSWORD_DEFAULT);
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET password=:password WHERE id=:id");
      $stmt->execute(['password' => $password, 'id' => $id]);

      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Password changed successfully';
      header('location: ../account.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../account.php');
    }
  }
} elseif (isset($_POST['update_stallholder_valid_id'])) {
  $id = $_POST['stallholder_id'];
  $filename = $_FILES['valid_id']['name'];
  $source_photo  = $_FILES['valid_id']['tmp_name'];
  $namecreate = "valid_id" . time();
  $namecreatenumber = rand(1000, 10000);
  $picname = $namecreate . $namecreatenumber;
  $finalname = $picname . ".jpeg";

  if (!empty($filename)) {
    move_uploaded_file($_FILES['valid_id']['tmp_name'], '../../src/valid_id/' . $finalname);
  }

  compress_image("../../src/valid_id/" . $finalname, "../../src/valid_id/" . $finalname, 10);


  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET valid_id=:valid_id WHERE id=:id");
    $stmt->execute(['valid_id' => $finalname, 'id' => $id]);
    $_SESSION['info'] = 'Update Success!';
    $_SESSION['message'] = 'Stallholder valid ID updated successfully';
    header('location: ../account.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../account.php');
  }

  $pdo->close();
} elseif (isset($_POST['deactivate_user_account'])) {
  $id = $_POST['stallholder_id'];

  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET act=:act WHERE id=:id");
    $stmt->execute(['act' => 0, 'id' => $id]);

    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Stallholder account deactivated successfully';
    header('location: ../../login.php');
  } catch (PDOException $e) {

    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../account.php');
  }

  $pdo->close();
}

function compress_image($source_url, $destination_url, $quality)
{
  $info = getimagesize($source_url);

  if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
  elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
  elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
  elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);

  //save it
  imagejpeg($image, $destination_url, $quality);

  //return destination file url
  return $destination_url;
}

<?php
include '../_session.php';
// OPEN CONNECTION
$conn = $pdo->open();

if (isset($_POST['edit_user_details'])) {

  $id = $_POST['id'];
  $first_name = $_POST['edit_first_name'];
  $last_name = $_POST['edit_last_name'];
  $contact_number = $_POST['edit_contact_number'];
  try {
    $stmt = $conn->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, contact_number=:contact_number WHERE id=:id");
    $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'contact_number' => $contact_number, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User details updated successfully';
    header('location: ../index.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../index.php');
  }

  $pdo->close();
} else if (isset($_POST['edit_user_email'])) {
  $id = $_POST['id'];
  $email = $_POST['user_email'];

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
    $_SESSION['message'] = 'The email you entered is already registered as user';
    header('location: ../index.php');
  } else if ($rowStallholder['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered as stallholder';
    header('location: ../index.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE users SET email=:email WHERE id=:id");
      $stmt->execute(['email' => $email, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'User email updated successfully';
      header('location: ../index.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../index.php');
    }
  }
  $pdo->close();
} else if (isset($_POST['edit_username'])) {
  $id = $_POST['id'];
  $username = $_POST['username'];

  // CHECK EMAIL IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
  $stmtUser->execute(['username' => $username]);
  $rowUser = $stmtUser->fetch();

  // CHECK EMAIL IN STALLHOLDER DB
  $stmtStallholder = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE username=:username");
  $stmtStallholder->execute(['username' => $username]);
  $rowStallholder = $stmtStallholder->fetch();

  if ($rowUser['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The username you entered is already taken ';
    header('location: ../index.php');
  } else if ($rowStallholder['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../index.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE users SET username=:username WHERE id=:id");
      $stmt->execute(['username' => $username, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Username updated successfully';
      header('location: ../index.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../index.php');
    }
  }
  $pdo->close();
} else if (isset($_POST['edit_user_password'])) {
  $id = $_POST['id'];
  $password = $_POST['user_password'];
  $retype_password = $_POST['user_retype_password'];

  $conn = $pdo->open();

  if ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match.';
    header('location: ../index.php');
  } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    try {
      $stmt = $conn->prepare("UPDATE users SET password=:password WHERE id=:id");
      $stmt->execute(['password' => $password, 'id' => $id]);

      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Password changed successfully';
      header('location: ../index.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../index.php');
    }
  }
} else if (isset($_POST['change_user_profile'])) {
  $id = $_POST['id'];
  $filename = $_FILES['profile_picture']['name'];
  $source_photo  = $_FILES['profile_picture']['tmp_name'];
  $namecreate = "profile_picture_" . time() . "_";
  $namecreatenumber = rand(1000, 10000);
  $picname = $namecreate . $namecreatenumber;
  $finalname = $picname . ".jpeg";

  if (!empty($filename)) {
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], '../src/profile/' . $finalname);
  }

  compress_image("../src/profile/" . $finalname, "../src/profile/" . $finalname, 20);

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET profile_picture=:profile_picture WHERE id=:id");
    $stmt->execute(['profile_picture' => $finalname, 'id' => $id]);
    $_SESSION['success'] = 'Update Profile';
    $_SESSION['message'] = 'User profile picture updated successfully';
    header('location: ../index.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../index.php');
  }

  $pdo->close();
} else if (isset($_POST['deactivate_user_account'])) {
  $id = $_POST['id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET act=:act WHERE id=:id");
    $stmt->execute(['act' => 0, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User deactivated successfully';
    header('location: ../login.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../login.php');
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

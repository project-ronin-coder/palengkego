<?php
include '../../_session.php';

if (isset($_POST['add_user'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $contact_number = $_POST['contact_number'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $retype_password = $_POST['retype_password'];


  if ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match';
    header('location: ../users.php');
  } else {
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

    // CHECK USERNAME IN USER DB
    $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
    $stmtUser->execute(['username' => $username]);
    $rowUserName = $stmtUser->fetch();
    // CHECK USERNAME IN USER DB
    $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE username=:username");
    $stmtUser->execute(['username' => $username]);
    $rowStallholderUsername = $stmtUser->fetch();

    if ($rowUser['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered';
      header('location: ../users.php');
    } elseif ($rowStallholder['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered';
      header('location: ../users.php');
    } elseif ($rowUserName['numrows'] > 0) {
      $_SESSION['error'] = 'Username Error!';
      $_SESSION['message'] = 'The username you entered is already taken';
      header('location: ../users.php');
    } elseif ($rowStallholderUsername['numrows'] > 0) {
      $_SESSION['error'] = 'Username Error!';
      $_SESSION['message'] = 'The username you entered is already taken';
      header('location: ../users.php');
    } else {
      $passwordhash = password_hash($password, PASSWORD_DEFAULT);
      $now = date('Y-m-d');

      $filename = $_FILES['profile_picture']['name'];
      $source_photo  = $_FILES['profile_picture']['tmp_name'];
      $namecreate = "profile_picture_" . "_" . time() . "_";
      $namecreatenumber = rand(1000, 10000);
      $picname = $namecreate . $namecreatenumber;
      $finalname = $picname . ".jpeg";

      if (!empty($filename)) {
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], '../../src/profile/' . $finalname);
      }

      compress_image("../../src/profile/" . $finalname, "../../src/profile/" . $finalname, 30);
      try {
        $stmtInsert = $conn->prepare("INSERT INTO 
          users (
            username, 
            email, 
            password, 
            first_name, 
            last_name, 
            contact_number, 
            profile_picture, 
            status, 
            act, 
            created_on) 
          VALUES (
            :username, 
            :email, 
            :password, 
            :first_name, 
            :last_name, 
            :contact_number, 
            :profile_picture, 
            :status, 
            :act, 
            :created_on)");
        $stmtInsert->execute([
          'username' => $username,
          'email' => $email,
          'password' => $passwordhash,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'contact_number' => $contact_number,
          'profile_picture' => $finalname,
          'status' => 1,
          'act' => 1,
          'created_on' => $now
        ]);
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'User added successfully';
        header('location: ../users.php');
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!!';
        $_SESSION['message'] = $e->getMessage();
        header('location: ../users.php');
      }
    }
    // CLOSE CONNECTION
    $pdo->close();
  }
} elseif (isset($_POST['edit_user'])) {
  $id = $_POST['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $contact_number = $_POST['contact_number'];
  $password = $_POST['password'];
  $retype_password = $_POST['retype_password'];


  // OPEN CONNECTION
  $conn = $pdo->open();

  $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
  $stmt->execute(['id' => $id]);
  $row = $stmt->fetch();

  if ($password == $row['password']) {
    $password = $row['password'];
  } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
  }
  try {
    $stmt = $conn->prepare("UPDATE users SET 
        first_name=:first_name, 
        last_name=:last_name, 
        contact_number=:contact_number, 
        password=:password
        WHERE id=:id");
    $stmt->execute([
      'first_name' => $first_name,
      'last_name' => $last_name,
      'contact_number' => $contact_number,
      'password' => $password,
      'id' => $id
    ]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User updated successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }
  $pdo->close();
} elseif (isset($_POST['edit_username'])) {
  $id = $_POST['id'];
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
    header('location: ../users.php');
  } elseif ($rowStallholderUsername['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../users.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE users SET username=:username WHERE id=:id");
      $stmt->execute(['username' => $username, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Username updated successfully';
      header('location: ../users.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../users.php');
    }
  }
  $pdo->close();
} elseif (isset($_POST['edit_user_email'])) {
  $id = $_POST['id'];
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
    header('location: ../users.php');
  } elseif ($rowStallholder['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered';
    header('location: ../users.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE users SET email=:email WHERE id=:id");
      $stmt->execute(['email' => $email, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'User email updated successfully';
      header('location: ../users.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../users.php');
    }
  }
  $pdo->close();
} elseif (isset($_POST['delete_user'])) {
  $id = $_POST['user_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User deleted successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }

  $pdo->close();
} elseif (isset($_POST['upload_profile'])) {
  $id = $_POST['user_id'];
  $filename = $_FILES['profile_picture']['name'];
  $source_photo  = $_FILES['profile_picture']['tmp_name'];
  $namecreate = "profile_picture_" . "_" . time() . "_";
  $namecreatenumber = rand(1000, 10000);
  $picname = $namecreate . $namecreatenumber;
  $finalname = $picname . ".jpeg";

  if (!empty($filename)) {
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], '../../src/profile/' . $finalname);
  }

  compress_image("../../src/profile/" . $finalname, "../../src/profile/" . $finalname, 30);

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET profile_picture=:profile_picture WHERE id=:id");
    $stmt->execute(['profile_picture' => $finalname, 'id' => $id]);
    $_SESSION['success'] = 'Update Profile';
    $_SESSION['message'] = 'User profile picture updated successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }

  $pdo->close();
} elseif (isset($_POST['make_admin'])) {
  $id = $_POST['user_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET user_type=:user_type WHERE id=:id");
    $stmt->execute(['user_type' => 1, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User changed to Admin.';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }

  $pdo->close();
} elseif (isset($_POST['make_user'])) {
  $id = $_POST['user_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET user_type=:user_type WHERE id=:id");
    $stmt->execute(['user_type' => 0, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Admin changed to User';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }

  $pdo->close();
} elseif (isset($_POST['verify_user'])) {
  $id = $_POST['user_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
    $stmt->execute(['status' => 1, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User verified successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }

  $pdo->close();
} elseif (isset($_POST['unverify_user'])) {
  $id = $_POST['user_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
    $stmt->execute(['status' => 0, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User unverified successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }

  $pdo->close();
} elseif (isset($_POST['reactivate_user'])) {
  $id = $_POST['user_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET act=:act WHERE id=:id");
    $stmt->execute(['act' => 1, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User reactivated successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }
} elseif (isset($_POST['deactivate_user'])) {
  $id = $_POST['user_id'];
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE users SET act=:act WHERE id=:id");
    $stmt->execute(['act' => 0, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User deactivated successfully';
    header('location: ../users.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../users.php');
  }
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

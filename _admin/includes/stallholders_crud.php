<?php
include '../../_session.php';


if (isset($_POST['add_stallholder'])) {
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
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $retype_password = $_POST['retype_password'];

  if ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match';
    header('location: ../applicants.php');
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

    if ($rowUser['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered as user';
      header('location: ../applicants.php');
    } elseif ($rowStallholder['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered as stallholder';
      header('location: ../applicants.php');
    } else {
      //generate code
      $passwordhash = password_hash($password, PASSWORD_DEFAULT);
      $now = date('Y-m-d');
      // STALLHOLDER ID
      $filename = $_FILES['valid_id']['name'];
      $source_photo  = $_FILES['valid_id']['tmp_name'];
      $namecreate = "valid_id_" . "_" . time() . "_";
      $namecreatenumber = rand(1000, 10000);
      $picname = $namecreate . $namecreatenumber;
      $finalname = $picname . ".jpeg";

      if (!empty($filename)) {
        move_uploaded_file($_FILES['valid_id']['tmp_name'], '../../src/valid_id/' . $finalname);
      }
      compress_image("../../src/valid_id/" . $finalname, "../../src/valid_id/" . $finalname, 30);

      try {
        $stmt = $conn->prepare("INSERT INTO 
        stall_holders (
          first_name, 
          middle_name, 
          last_name, 
          address, 
          date_of_birth, 
          place_of_birth, 
          contact_number, 
          religion, 
          marital_status, 
          spouse_name, 
          spouse_occupation, 
          gender, 
          educational_attainment, 
          username, 
          email, 
          password, 
          valid_id, 
          status, 
          act, 
          created_on) 
        VALUES (
          :first_name, 
          :middle_name, 
          :last_name, 
          :address, 
          :date_of_birth, 
          :place_of_birth, 
          :contact_number, 
          :religion, 
          :marital_status, 
          :spouse_name, 
          :spouse_occupation, 
          :gender, 
          :educational_attainment, 
          :username, 
          :email, 
          :password, 
          :valid_id, 
          :status, 
          :act, 
          :now)");
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
          'username' => $username,
          'email' => $email,
          'password' => $passwordhash,
          'valid_id' => $finalname,
          'status' => 1,
          'act' => 1,
          'now' => $now
        ]);
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Stallholder added successfully!';
        header('location: ../stallholders.php');
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['error'] = $e->getMessage();
        header('location: ../stallholders.php');
      }
    }
    // CLOSE CONNECTION
    $pdo->close();
  }
} else if (isset($_POST['edit_stallholder'])) {
  $id = $_POST['stallholder_id'];
  $first_name = ucfirst($_POST['edit_first_name']);
  $middle_name = ucfirst($_POST['edit_middle_name']);
  $last_name = ucfirst($_POST['edit_last_name']);
  $address = $_POST['edit_address'];
  $contact_number = $_POST['edit_contact_number'];
  $date_of_birth = date('Y-m-d', strtotime($_POST['edit_date_of_birth']));
  $place_of_birth = $_POST['edit_place_of_birth'];
  $religion = $_POST['edit_religion'];
  $marital_status = $_POST['edit_marital_status'];
  $spouse_name = $_POST['edit_spouse_name'];
  $spouse_occupation = $_POST['edit_spouse_occupation'];
  $other_gender = $_POST['edit_other_gender'];
  if ($other_gender == "") {
    $gender = $_POST['edit_gender'];
  } else {
    $gender = $_POST['edit_other_gender'];
  }
  $other_education = $_POST['edit_other_education'];
  if ($other_education == "") {
    $education = $_POST['edit_education'];
  } else {
    $education = $_POST['edit_other_education'];
  }
  $password = $_POST['edit_password'];
  $retype_password = $_POST['retype_password'];

  if ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match';
    header('location: ../applicants.php');
  } else {
    // OPEN CONNECTION
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    if ($password == $row['password']) {
      $password = $row['password'];
    } else {
      $password = password_hash($password, PASSWORD_DEFAULT);
    }
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET 
    first_name=:first_name, 
    middle_name=:middle_name, 
    last_name=:last_name, 
    address=:address, 
    contact_number=:contact_number, 
    date_of_birth=:date_of_birth, 
    place_of_birth=:place_of_birth, 
    religion=:religion, 
    marital_status=:marital_status, 
    spouse_name=:spouse_name, 
    spouse_occupation=:spouse_occupation, 
    gender=:gender, 
    educational_attainment=:educational_attainment, 
    password=:password
    WHERE id=:id");
      $stmt->execute([
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'address' => $address,
        'contact_number' => $contact_number,
        'date_of_birth' => $date_of_birth,
        'place_of_birth' => $place_of_birth,
        'religion' => $religion,
        'marital_status' => $marital_status,
        'spouse_name' => $spouse_name,
        'spouse_occupation' => $spouse_occupation,
        'gender' => $gender,
        'educational_attainment' => $education,
        'password' => $password,
        'id' => $id
      ]);
      $_SESSION['success'] = 'Edit Success!';
      $_SESSION['message'] = 'Stallholder information updated successfully';
      header('location: ../stallholders.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../stallholders.php');
    }
  }

  // CLOSE CONNECTION
  $pdo->close();
} elseif (isset($_POST['edit_stallholder_username'])) {
  $id = $_POST['stallholder_id'];
  $username = $_POST['edit_username'];
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
    header('location: ../stallholders.php');
  } elseif ($rowStallholderUsername['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../stallholders.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET username=:username WHERE id=:id");
      $stmt->execute(['username' => $username, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Username updated successfully';
      header('location: ../stallholders.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../stallholders.php');
    }
  }
  $pdo->close();
} elseif (isset($_POST['edit_stallholder_email'])) {
  $id = $_POST['stallholder_id'];
  $email = $_POST['edit_email'];

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
    header('location: ../stallholders.php');
  } elseif ($rowStallholder['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered';
    header('location: ../stallholders.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET email=:email WHERE id=:id");
      $stmt->execute(['email' => $email, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Stallholder email updated successfully';
      header('location: ../stallholders.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../stallholders.php');
    }
  }
  $pdo->close();
} else if (isset($_POST['delete_stallholder'])) {
  $id = $_POST['stallholder_id'];
  $stall_holder_id = $_POST['stallholder_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("DELETE FROM stall_holders WHERE id=:id");
    $stmt->execute(['id' => $id]);
    try {
      $stmt = $conn->prepare("DELETE FROM stalls_owned WHERE stall_holder_id=:id");
      $stmt->execute(['id' => $stall_holder_id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Stallholder deleted including stalls owned, products, and vendor/helper successfully';
      header('location: ../stallholders.php');
      try {
        $stmt = $conn->prepare("DELETE FROM products WHERE stall_holder_id=:id");
        $stmt->execute(['id' => $stall_holder_id]);
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Stallholder deleted including stalls owned, products, and vendor/helper successfully';
        header('location: ../stallholders.php');
        try {
          $stmt = $conn->prepare("DELETE FROM stall_vendor_helper WHERE stall_holder_id=:id");
          $stmt->execute(['id' => $stall_holder_id]);
          $_SESSION['success'] = 'Success!';
          $_SESSION['message'] = 'Stallholder deleted including stalls owned, products, and vendor/helper successfully';
          header('location: ../stallholders.php');
        } catch (PDOException $e) {
          $_SESSION['error'] = 'Error!';
          $_SESSION['message'] = $e->getMessage();
          header('location: ../stallholders.php');
        }
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['message'] = $e->getMessage();
        header('location: ../stallholders.php');
      }
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../stallholders.php');
    }
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stallholders.php');
  }

  $pdo->close();
} else if (isset($_POST['update_stallholder_valid_id'])) {
  $id = $_POST['stallholder_id'];
  $filename = $_FILES['valid_id']['name'];
  $source_photo  = $_FILES['valid_id']['tmp_name'];
  $namecreate = "valid_id_" . "_" . time() . "_";
  $namecreatenumber = rand(1000, 10000);
  $picname = $namecreate . $namecreatenumber;
  $finalname = $picname . ".jpeg";

  if (!empty($filename)) {
    move_uploaded_file($_FILES['valid_id']['tmp_name'], '../../src/valid_id/' . $finalname);
  }
  compress_image("../../src/valid_id/" . $finalname, "../../src/valid_id/" . $finalname, 30);
  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET valid_id=:valid_id WHERE id=:id");
    $stmt->execute(['valid_id' => $finalname, 'id' => $id]);
    $_SESSION['success'] = 'Update Success!';
    $_SESSION['message'] = 'Stallholder valid ID updated successfully';
    header('location: ../stallholders.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stallholders.php');
  }

  $pdo->close();
} else if (isset($_GET['redirect_to_vendor_helper'])) {

  $stall_id = $_GET['id'];

  header('location: ../vendor_helper.php?id=' . $stall_id);
} elseif (isset($_POST['reactivate_stallholder'])) {
  $id = $_POST['stallholder_id'];

  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET act=:act WHERE id=:id");
    $stmt->execute(['act' => 1, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Stallholder account reactivated successfully';
    header('location: ../stallholders.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stallholders.php');
  }
  $pdo->close();
} elseif (isset($_POST['deactivate_stallholder'])) {
  $id = $_POST['stallholder_id'];

  $conn = $pdo->open();
  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET act=:act WHERE id=:id");
    $stmt->execute(['act' => 0, 'id' => $id]);
    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'User deactivated successfully';
    header('location: ../stallholders.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stallholders.php');
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

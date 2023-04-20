<?php
include '../_session.php';

if (isset($_POST['register_stallholder'])) {
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

  $email = $_POST['email'];
  $username = $_POST['username'];
  $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)+=\{\}\[\]\|;:"\<\>,\?\\\]/';
  $password = $_POST['password'];
  $retype_password = $_POST['retype_password'];
  if (preg_match($pattern, $username)) {
    $_SESSION['error'] = 'Username Invalid!';
    $_SESSION['message'] = 'Username must contain letters(a-z/A-Z), numbers(0-9), and characters (-/_/.) only.';
    header('location: ../register_stallholder.php');
  } elseif ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error';
    $_SESSION['message'] = 'Passwords did not match';
    header('location: ../register_stallholder.php');
  } else {
    $conn = $pdo->open();
    // CHECK EMAIL IN USER DB
    $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
    $stmtUser->execute(['email' => $email]);
    $rowUser = $stmtUser->fetch();

    // CHECK USERNAME IN USER DB
    $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
    $stmtUser->execute(['username' => $username]);
    $rowUserName = $stmtUser->fetch();

    // CHECK EMAIL IN STALLHOLDER DB
    $stmtStallholder = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE email=:email");
    $stmtStallholder->execute(['email' => $email]);
    $rowStallholder = $stmtStallholder->fetch();

    // CHECK USERNAME IN STALLHOLDER DB
    $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE username=:username");
    $stmtUser->execute(['username' => $username]);
    $rowStallholderUsername = $stmtUser->fetch();

    // CHECK EMAIL IN STALLHOLDER DATABASE
    if ($rowUser['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered';
      header('location: ../register_stallholder.php');
    } elseif ($rowUserName['numrows'] > 0) {
      $_SESSION['error'] = 'Username Error!';
      $_SESSION['message'] = 'Username already taken.';
      header('location: ../register_stallholder.php');
    } elseif ($rowStallholder['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered';
      header('location: ../register_stallholder.php');
    } elseif ($rowStallholderUsername['numrows'] > 0) {
      $_SESSION['error'] = 'Username Error!';
      $_SESSION['message'] = 'Username already taken.';
      header('location: ../register_stallholder.php');
    } else {
      //generate code
      $passwordhash = password_hash($password, PASSWORD_DEFAULT);
      $now = date('Y-m-d');
      // STALLHOLDER ID
      $filename = $_FILES['valid_id']['name'];
      if (!empty($filename)) {
        move_uploaded_file($_FILES['valid_id']['tmp_name'], '../src/valid_id/' . $filename);
      }
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
            email, 
            username, 
            password, 
            valid_id, 
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
            :email, 
            :username, 
            :password, 
            :valid_id, 
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
          'email' => $email,
          'username' => $username,
          'password' => $passwordhash,
          'valid_id' => $filename,
          'now' => $now
        ]);
        $_SESSION['success'] = 'Application sent!';
        $_SESSION['message'] = 'Please wait for an email to be sent by Mariveles Public Market Office once your application is approved.';
        header('location: ../login.php');
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['error'] = $e->getMessage();
      }
      $pdo->close();
    }
  }
}

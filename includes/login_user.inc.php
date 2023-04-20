<?php
// include '../config/db.php';
include '../_session.php';

$conn = $pdo->open();

if (isset($_POST['login'])) {
  $username_email = $_POST['username_email'];
  $password = $_POST['password'];
  try {
    $stmtUserAdmin = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email OR username = :username");
    $stmtUserAdmin->execute(['email' => $username_email, 'username' => $username_email]);
    $rowUserAdmin = $stmtUserAdmin->fetch();
    if ($rowUserAdmin['numrows'] > 0) {
      if ($rowUserAdmin['status'] && $rowUserAdmin['act']) {
        if (password_verify($password, $rowUserAdmin['password'])) {
          if ($rowUserAdmin['user_type']) {
            $_SESSION['admin'] = $rowUserAdmin['id'];
            header('location: ../_admin/dashboard.php');
          } else {
            $_SESSION['user'] = $rowUserAdmin['id'];
            header('location: ../index.php');
          }
        } else {
          $_SESSION['error'] = 'Password Error!';
          $_SESSION['message'] = 'The password you typed is incorrect.';
          header('location: ../login.php');
        }
      } elseif ($rowUserAdmin['act'] == 0) {
        $_SESSION['error'] = 'Account Deactivated!';
        $_SESSION['message'] = 'This account was deactivated';
        header('location: ../retrieve_account.php');
      } else {
        $_SESSION['error'] = 'Account not verified!';
        $_SESSION['message'] = 'This account is not verified';
        header('location: ../reverify_account.php');
      }
    } elseif ($rowUserAdmin['numrows'] <= 0) {
      $stmtStallholder = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM stall_holders WHERE email = :email OR username = :username");
      $stmtStallholder->execute(['email' => $username_email, 'username' => $username_email]);
      $rowStallholder = $stmtStallholder->fetch();
      if ($rowStallholder['numrows1'] > 0) {
        if ($rowStallholder['status'] && $rowStallholder['act']) {
          if (password_verify($password, $rowStallholder['password'])) {
            if ($rowStallholder['user_type']) {
              $_SESSION['stallholder'] = $rowStallholder['id'];
              header('location: ../_stallholder/home.php');
            }
          } else {
            $_SESSION['error'] = 'Password Error!';
            $_SESSION['message'] = 'The password you typed is incorrect.';
            header('location: ../login.php');
          }
        } elseif ($rowStallholder['act'] == 0) {
          $_SESSION['error'] = 'Account Deactivated!';
          $_SESSION['message'] = 'This account was deactivated';
          header('location: ../retrieve_account.php');
        } else {
          $_SESSION['error'] = 'Account not verified!';
          $_SESSION['message'] = 'This account is not verified';
          header('location: ../reverify_account.php');
        }
      } else {
        $_SESSION['error'] = 'Email/Username Error!';
        $_SESSION['message'] = 'Email/Username not found.';
        header('location: ../login.php');
      }
    } else {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email not found.';
      header('location: ../login.php');
    }
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Connection Error!';
    $_SESSION['message'] = "There is some problem in connection: " . $e->getMessage();
    header('location: ../login.php');
  }
} else {
  $_SESSION['error'] = 'Error!';
  $_SESSION['message'] = 'Input  login credentials first.';
  header('location: ../login.php');
}
$pdo->close();

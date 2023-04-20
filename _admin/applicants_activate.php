<?php
include '../_session.php';
$output = '';
if (!isset($_GET['code']) or !isset($_GET['user'])) {
  $_SESSION['error'] = 'Error!';
  $_SESSION['message'] = 'Code to activate account not found.';
  $output .= '
      <!-- LOGO -->
      <div class="login-logo">
        <img src="../assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
      </div>
      <!-- CARD -->
      <div class="card">
        <div class="card-body login-card-body ">
          <h3 class="login-box-msg-header text-danger">Account Activation Error!</h3>
          <p class="login-box-msg">Please check your email again regarding with the activation of your account!</p>
        </div>
      </div>
		';
} else {
  $conn = $pdo->open();
  $stmt1 = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stall_holders WHERE activate_code=:code AND id=:id");
  $stmt1->execute(['code' => $_GET['code'], 'id' => $_GET['user']]);
  $row = $stmt1->fetch();
  if ($row['numrows'] > 0) {
    if ($row['status']) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = 'Account already activated.';
      $output .= '
          <!-- LOGO -->
          <div class="login-logo">
            <img src="../assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
          </div>
          <!-- CARD -->
          <div class="card">
            <div class="card-body login-card-body">
              <h3 class="login-box-msg-header text-danger">Account Already Activated!</h3>
              <p class="login-box-msg">You may delete the email sent by PalengkeGO.</p>
              <!-- LOG BACK IN -->
              <div>
                <a href="../login.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                  <i class="fas fa-sign-in-alt mr-auto"></i>
                  <span span class="mr-auto">You may login again</span>
                </a>
              </div>
            </div>
          </div>
				';
    } else {
      try {
        $stmt = $conn->prepare("UPDATE stall_holders SET status=:status WHERE id=:id");
        $stmt->execute(['status' => 1, 'id' => $_GET['user']]);
        $full_name = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Stallholder Account activated!';
        $output .= '
                <!-- LOGO -->
                <div class="login-logo">
                  <img src="../assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
                </div>
                <!-- CARD -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <h3 class="login-box-msg-header text-success">Stallholder Account Activated!</h3>
                    <p class="login-box-msg">
                      Welcome to PalengkeGO!
                      <br>'
          . $full_name .
          '<br>
                      <b>' . $row['email'] . '</b>
                    </p>
                    <!-- LOG BACK IN -->
                    <div>
                      <a href="../login.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                        <i class="fas fa-sign-in-alt mr-auto"></i>
                        <span span class="mr-auto">You may now login</span>
                      </a>
                    </div>
                  </div>
                </div>
					';
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['message'] = $e->getMessage();
      }
    }
  } else {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = "Cannot activate account. Wrong code.";
    $output .= '
        <!-- LOGO -->
        <div class="login-logo">
          <img src="../assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
        </div>
        <!-- CARD -->
        <div class="card">
          <div class="card-body login-card-body">
            <h3 class="login-box-msg-header text-danger">Account Activation Error!</h3>
            <p class="login-box-msg">The code used is invalid.</p>
            <!-- LOG BACK IN -->
            <div>
              <a href="../register.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                <i class="fas fa-sign-in-alt mr-auto"></i>
                <span span class="mr-auto">You may sign up to try again</span>
              </a>
            </div>
          </div>
        </div>
        ';
  }
  $pdo->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palengke Go | Activate Stallholder Account</title>

  <!-- Title Bar Icon -->
  <link rel="icon" type="image/icon type" href="https://i.ibb.co/8mPFM3W/Palengke-Go-Icon.png">
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/bootstrap/js/bootstrap.bundle.min.js">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plugins/adminlte/css/adminlte.min.css">
  <!-- Admin Style -->
  <link rel="stylesheet" href="../assets/css/admin_style.css">
  <link rel="stylesheet" href="../assets/css/login_style.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php echo $output; ?>
  </div>
  </div>

  <!-- SCRIPT -->
  <!-- JQUERY -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- POPPER -->
  <script src="../plugins/popper/popper.min.js"></script>
  <!-- BOOTSTRAP 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../plugins/adminlte/js/adminlte.min.js"></script>
  <!-- MAIN SCRIPT -->
  <!-- <script src="../assets/js/admin_script.js"></script> -->

  <!-- FOR SUCCESS MESSAGE -->

  <?php
  if (isset($_SESSION['success'])) {
  ?>
    <script>
      var Toast = Swal.mixin({
        toast: true,
        showCloseButton: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        icon: "success",
      });

      Toast.fire({
        title: '<h3 style="margin: 0; text-align: center; color: #28A745;"><?php echo $_SESSION['success']; ?></h3>',
        html: '<p style="margin: 0; text-align: center; font-size: large;"><?php echo $_SESSION['message']; ?></p>',
      });
    </script>
  <?php
    unset($_SESSION['success']);
    unset($_SESSION['message']);
  }
  ?>

  <!-- FOR ERROR -->

  <?php
  if (isset($_SESSION['error'])) {
  ?>
    <script>
      var Toast = Swal.mixin({
        toast: true,
        showCloseButton: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        icon: "error",
      });

      Toast.fire({
        title: '<h3 style="margin: 0; text-align: center; color: #C82333;"><?php echo $_SESSION['error']; ?></h3>',
        html: '<p style="margin: 0; text-align: center; font-size: large;"><?php echo $_SESSION['message']; ?></p>',
      });
    </script>
  <?php
    unset($_SESSION['error']);
    unset($_SESSION['message']);
  }
  ?>

</body>

</html>
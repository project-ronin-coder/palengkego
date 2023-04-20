<?php
include '_session.php';
$output = '';
if (!isset($_GET['code']) or !isset($_GET['user'])) {
  $_SESSION['error'] = 'Error!';
  $_SESSION['message'] = 'Code to reverify account not found.';
  $output .= '
      <!-- LOGO -->
      <div class="login-logo">
        <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
      </div>
      <!-- CARD -->
      <div class="card">
        <div class="card-body login-card-body ">
          <h3 class="login-box-msg-header">Account Reverification Error!</h3>
          <p class="login-box-msg">Please check your email again regarding with the activation of your account!</p>
        </div>
      </div>
		';
} else {
  $conn = $pdo->open();

  $stmtUserAdmin = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
  $stmtUserAdmin->execute(['code' => $_GET['code'], 'id' => $_GET['user']]);
  $rowUserAdmin = $stmtUserAdmin->fetch();

  $stmtStallholder = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stall_holders WHERE activate_code=:code AND id=:id");
  $stmtStallholder->execute(['code' => $_GET['code'], 'id' => $_GET['user']]);
  $rowStallholder = $stmtStallholder->fetch();

  if ($rowUserAdmin['numrows'] > 0) {
    if ($rowUserAdmin['status']) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = 'Account already activated.';
      $output .= '
          <!-- LOGO -->
          <div class="login-logo">
            <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
          </div>
          <!-- CARD -->
          <div class="card">
            <div class="card-body login-card-body">
              <h3 class="login-box-msg-header text-danger">Account Activated!</h3>
              <p class="login-box-msg">You may delete the email sent by PalengkeGO.</p>
              <!-- LOG BACK IN -->
              <div>
                <a href="login.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                  <i class="fas fa-sign-in-alt mr-auto"></i>
                  <span span class="mr-auto">You may login again</span>
                </a>
              </div>
            </div>
          </div>
				';
    } else {
      try {
        $stmtUpdateUserAdmin = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
        $stmtUpdateUserAdmin->execute(['status' => 1, 'id' => $rowUserAdmin['id']]);
        $full_name = $rowUserAdmin['first_name'] . ' ' . $rowUserAdmin['last_name'];
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Account Reverified!';
        $output .= '
                <!-- LOGIN -->
                <div class="login-logo">
                  <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
                </div>
                <!-- CARD -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <h3 class="login-box-msg-header">Account Reverified!</h3>
                    <p class="login-box-msg">
                      Welcome Back To PalengkeGO!
                      <br>'
          . $full_name .
          '<br>
                      <b>' . $rowUserAdmin['email'] . '</b>
                    </p>
                    <!-- FORM -->
                    <form>
                      <!-- LOG BACK IN -->
                      <div>
                        <a href="login.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                          <i class="fas fa-sign-in-alt mr-auto"></i>
                          <span span class="mr-auto">You may now login</span>
                        </a>
                      </div>
                    </form>
                  </div>
                </div>
					';
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['message'] = $e->getMessage();
      }
    }
  } elseif ($rowUserAdmin['numrows'] <= 0) {
    if ($rowStallholder['status']) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = 'Account already activated.';
      $output .= '
          <!-- LOGO -->
          <div class="login-logo">
            <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
          </div>
          <!-- CARD -->
          <div class="card">
            <div class="card-body login-card-body">
              <h3 class="login-box-msg-header text-danger">Account Activated!</h3>
              <p class="login-box-msg">You may delete the email sent by PalengkeGO.</p>
              <!-- LOG BACK IN -->
              <div>
                <a href="login.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                  <i class="fas fa-sign-in-alt mr-auto"></i>
                  <span span class="mr-auto">You may login again</span>
                </a>
              </div>
            </div>
          </div>
				';
    } else {
      try {
        $stmtUpdateStallholder = $conn->prepare("UPDATE stall_holders SET status=:status WHERE id=:id");
        $stmtUpdateStallholder->execute(['status' => 1, 'id' => $rowStallholder['id']]);
        $full_name = $rowStallholder['first_name'] . ' ' . $rowStallholder['last_name'];
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Account Reverified!';
        $output .= '
                <!-- LOGIN -->
                <div class="login-logo">
                  <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
                </div>
                <!-- CARD -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <h3 class="login-box-msg-header">Account Reverified!</h3>
                    <p class="login-box-msg">
                      Welcome Back To PalengkeGO!
                      <br>'
          . $full_name .
          '<br>
                      <b>' . $rowStallholder['email'] . '</b>
                    </p>
                    <!-- FORM -->
                    <form>
                      <!-- LOG BACK IN -->
                      <div>
                        <a href="login.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
                          <i class="fas fa-sign-in-alt mr-auto"></i>
                          <span span class="mr-auto">You may now login</span>
                        </a>
                      </div>
                    </form>
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
    $_SESSION['message'] = "Cannot reverify account. Wrong code.";
    $output .= '
        <!-- LOGO -->
        <div class="login-logo">
          <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
        </div>
        <!-- CARD -->
        <div class="card">
          <div class="card-body login-card-body">
            <h3 class="login-box-msg-header text-danger">Account Reverification Error!</h3>
            <p class="login-box-msg">The code used is invalid.</p>
            <!-- LOG BACK IN -->
            <div>
              <a href="register.php" class="btn-sign-in btn d-flex align-items-center justify-content-center">
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
  <title>Palengke Go | Reverify Account</title>

  <!-- LINKS -->
  <?php include 'dist/login_links.php' ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php echo $output; ?>
  </div>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/login_scripts.php' ?>
</body>

</html>
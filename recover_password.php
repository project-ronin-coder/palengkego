<?php
include '_session.php';
if (!isset($_GET['code']) or !isset($_GET['user'])) {
  header('location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palengke Go | Recover Password</title>

  <!-- LINKS -->
  <?php include 'dist/login_links.php' ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- LOGIN -->
    <div class="login-logo">
      <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
    </div>
    <!-- CARD -->
    <div class="card">
      <div class="card-body login-card-body">
        <h3 class="login-box-msg-header">Recover Password</h3>
        <p class="login-box-msg">Enter your new password</p>
        <!-- FORM -->
        <form action="includes/recover_password.inc.php?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>" method="post" enctype="multipart/form-data">
          <!-- PASSWORD -->
          <div class="input-group mb-3">
            <input type="password" class="form-control password" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- CONFIRM PASSWORD -->
          <div class="input-group mb-3">
            <input type="password" class="form-control retype-password" placeholder="Confirm Password" name="retype-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- SHOW HIDE PASSWORD -->
          <div class="icheck-primary">
            <input type="checkbox" class="show-hide-pass" id="registerShowHidePass" value="Show">
            <label for="registerShowHidePass" class="label-password" id="labelPassword">
              Show Password
            </label>
          </div>
          <!-- CHANGE PASSWORD -->
          <div>
            <div class="text-center mb-3 d-block">
              <button type="submit" name="changepass" class="btn-sign-in btn w-100 d-flex justify-content-center align-items-center">
                <i class="fas fa-sign-in-alt mr-auto"></i>
                <span id="close" class="mr-auto">Change Password</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- SCRIPTS -->
  <?php include 'dist/login_scripts.php' ?>
</body>

</html>
<?php
include '_session.php';

session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palengke Go | Login</title>
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
        <h3 class="login-box-msg-header">Login to your Account</h3>
        <p class="login-box-msg">Enter your username and password</p>
        <!-- FORM -->
        <form action="includes/login_user.inc.php" method="POST" enctype="multipart/form-data">
          <!-- USERNAME OR EMAIL -->
          <div class="email-container input-group mb-3">
            <input type="text" class="form-control username-email" placeholder="Enter Username or Email" name="username_email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa fa-envelope"></i>
              </div>
            </div>
          </div>
          <!-- PASSWORD -->
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control password" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
          </div>
          <!-- SHOW PASSWORD -->
          <div class="icheck-primary mb-3">
            <input type="checkbox" class="show-hide-pass" id="show-hide-password" value="Show">
            <label for="show-hide-password" id="label-password">
              Show Password
            </label>
          </div>
          <!-- SIGNIN -->
          <div class="text-center mb-3 d-block">
            <button type="submit" name="login" class="btn-sign-in btn w-100 d-flex justify-content-center align-items-center">
              <i class="fas fa-sign-in-alt mr-auto"></i>
              <span class="mr-auto">Sign in </span>
            </button>
          </div>
          <!-- LINKS -->
          <div class="links text-center">
            <p>
              <a href="forgot_password.php">Forgot password</a>
            </p>
            <p>
            <p>Don't have an account? <a href="register.php" class="text-center">Create an account</a></p>
            </p>
            <p>
            <p>Apply as stallholder? <a href="register_stallholder.php" class="text-center">Register here</a></p>
            </p>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/login_scripts.php' ?>
</body>

</html>
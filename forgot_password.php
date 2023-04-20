<?php
  include '_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palengke Go | Forgot Password</title>
  <!-- LINKS -->
  <?php include 'dist/login_links.php'?>
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
        <h3 class="login-box-msg-header">Forgot Password</h3>
        <p class="login-box-msg">Retrieve your password using email associated with the account</p>
        <!-- FORM -->
        <form action="includes/forgot_password.inc.php" method="post" enctype="multipart/form-data">
          <!-- EMAIL -->
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <!-- REQUEST NEW PASSWORD -->
          <div class="text-center mb-3 d-block">
            <button type="submit" name="reset"
              class="btn-sign-in btn w-100 d-flex justify-content-center align-items-center">
              <i class="fas fa-sign-in-alt mr-auto"></i>
              <span class="mr-auto">Request new password </span>
            </button>
          </div>
        </form>
        <!-- LINKS -->
        <div class="links">
          <p class="mt-3 mb-1">
            <a href="login.php">I remembered my password</a>
          </p>
          <p class="mb-0">
            <a href="register.php" class="text-center">Register a new account</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/login_scripts.php'?>
</body>

</html>
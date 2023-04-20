<?php
include '_session.php';
?>

<?php
if (isset($_SESSION['user'])) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palengke Go | Register</title>
  <!-- LINKS -->
  <?php include 'dist/login_links.php' ?>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <!-- LOGIN -->
    <div class="register-logo">
      <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
    </div>
    <!-- CARD -->
    <div class="card">
      <div class="card-body register-card-body">
        <h3 class="login-box-msg-header">Create an Account</h3>
        <p class="login-box-msg">Enter your personal details</p>
        <!-- FORM -->
        <form action="includes/register_user.inc.php" method="POST" enctype="multipart/form-data">
          <!-- FIRST NAME -->
          <div class="input-group mb-3">
            <input type="text" class="form-control first-name" id="firstName" name="first_name" placeholder="First name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>
          <!-- LAST NAME -->
          <div class="input-group mb-3">
            <input type="text" class="form-control last-name" id="lastName" name="last_name" placeholder="Last name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>
          <!-- CONTACT NUMBER -->
          <div class="input-group mb-3">
            <input type="text" class="form-control contact-number" id="contactNumber" name="contact_number" placeholder="Contact Number (09)" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-phone"></i>
              </div>
            </div>
          </div>
          <!-- EMAIL -->
          <div class="input-group mb-3">
            <input type="email" class="form-control email" id="email" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
          </div>
          <!-- USERNAME -->
          <div class="input-group mb-3">
            <input type="text" class="form-control username" id="username" name="username" placeholder="Username (a-z,A-Z,0-9,-/_/.)" size="25" minlength="10" maxlength="25" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <!-- PASSWORD -->
          <div class="input-group mb-3">
            <input type="password" class="form-control password" id="registerPassword" name="password" placeholder="Password" minlength="8" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- RETYPE PASSWORD -->
          <div class="input-group mb-3">
            <input type="password" class="form-control retype-password" id="registerRetypePassword" name="retype_password" placeholder="Retype password" required>
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
          <!-- REGISTER -->
          <div class="text-center mb-3 d-block">
            <button type="submit" name="register" class="btn-register btn w-100 d-flex justify-content-center align-items-center">
              <i class="fas fa-edit mr-auto"></i>
              <span class="mr-auto">Register </span>
            </button>
          </div>
          <!-- LINKS -->
          <div class="links text-center">
            <p>
              <a href="login.php">Already have an account</a>
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
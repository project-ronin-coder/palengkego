<?php
  include '_session.php';
$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = 'Code to activate account not found.';
		$output .= '
      <!-- LOGO -->
      <div class="login-logo">
        <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
      </div>
      <!-- CARD -->
      <div class="card">
        <div class="card-body login-card-body ">
          <h3 class="login-box-msg-header">Account Activation Error!</h3>
          <p class="login-box-msg">Please check your email again regarding with the activation of your account!</p>
        </div>
      </div>
		'; 
	}
	else{
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();
		if($row['numrows'] > 0){
			if($row['status']){
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
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status, act=:act WHERE id=:id");
					$stmt->execute(['status'=>1, 'act'=>1, 'id'=>$row['id']]);
          $full_name = $row['first_name'].' '.$row['last_name'];
          $_SESSION['success'] = 'Success!';
          $_SESSION['message'] = 'Account activated!';
					$output .= '
                <!-- LOGIN -->
                <div class="login-logo">
                  <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
                </div>
                <!-- CARD -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <h3 class="login-box-msg-header">Account Activated!</h3>
                    <p class="login-box-msg">
                      Welcome to PalengkeGO!
                      <br>'
                      .$full_name.
                      '<br>
                      <b>'.$row['email'].'</b>
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
				}
				catch(PDOException $e){
          $_SESSION['error'] = 'Error!';
          $_SESSION['message'] = $e->getMessage();
				}
			}
			
		}
		else{
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = "Cannot activate account. Wrong code.";
      $output .= '
        <!-- LOGO -->
        <div class="login-logo">
          <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
        </div>
        <!-- CARD -->
        <div class="card">
          <div class="card-body login-card-body">
            <h3 class="login-box-msg-header text-danger">Account Activation Error!</h3>
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
  <title>Palengke Go | Activate Account</title>

  <!-- LINKS -->
  <?php include 'dist/login_links.php'?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php echo $output; ?>
  </div>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/login_scripts.php'?>
</body>

</html>
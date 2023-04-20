<?php
  include '../_session.php';

	if(!isset($_GET['code']) OR !isset($_GET['user'])){
    header('location: ../pages/login.php');
	  exit(); 
	}
  
  $path = 'recover_password.php?code='.$_GET['code'].'&user='.$_GET['user'];

	if(isset($_POST['changepass'])){
		$password = $_POST['password'];
		$repassword = $_POST['retype-password'];

		if($password != $repassword){
			$_SESSION['error'] = 'Password Error!';
			$_SESSION['message'] = 'Passwords did not match';
			header('location: ../'.$path);
		}
		else{
			$conn = $pdo->open();

			$stmtUserAdmin = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE reset_code=:code AND id=:id");
			$stmtUserAdmin->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
			$rowUserAdmin = $stmtUserAdmin->fetch();

			if($rowUserAdmin['numrows'] > 0){
				$passwordUserAdmin = password_hash($password, PASSWORD_DEFAULT);

				try{
					$stmtUserAdmin = $conn->prepare("UPDATE users SET password=:password WHERE id=:id");
					$stmtUserAdmin->execute(['password'=>$passwordUserAdmin, 'id'=>$rowUserAdmin['id']]);

					$_SESSION['success'] = 'Success!';
					$_SESSION['message'] = 'Password successfully reset';
					header('location: ../login.php');
				}
				catch(PDOException $e){
					$_SESSION['error'] = "Error!";
					$_SESSION['message'] = $e->getMessage();
					header('location: ../'.$path);
				}
			}
      elseif ($rowUserAdmin['numrows'] <= 0) {
        $stmtStallholder = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM stall_holders WHERE reset_code=:code AND id=:id");
        $stmtStallholder->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
        $rowStallholder = $stmtStallholder->fetch();
        if($rowStallholder['numrows1'] > 0){
          $passwordStallholder = password_hash($password, PASSWORD_DEFAULT);
          try{
            $stmtStallholder = $conn->prepare("UPDATE stall_holders SET password=:password WHERE id=:id");
            $stmtStallholder->execute(['password'=>$passwordStallholder, 'id'=>$rowStallholder['id']]);
  
            $_SESSION['success'] = 'Success!';
            $_SESSION['message'] = 'Password successfully reset';
            header('location: ../login.php');
          }
          catch(PDOException $e){
            $_SESSION['error'] = "Error!";
            $_SESSION['message'] = $e->getMessage();
            header('location: ../'.$path);
          }
        }
        else{
          $_SESSION['error'] = 'Code Error!';
          $_SESSION['message'] = 'Code did not match with user';
          header('location: ../'.$path);
        }
      }
			else{
				$_SESSION['error'] = 'Code Error!';
				$_SESSION['message'] = 'Code did not match with user';
				header('location: ../'.$path);
			}

			$pdo->close();
		}

	}
	else{
		$_SESSION['error'] = 'Error!';
		$_SESSION['message'] = 'Input new password first';
		header('location: ../'.$path);
	}

?>
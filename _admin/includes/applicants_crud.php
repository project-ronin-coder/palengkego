<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../_session.php';

if (isset($_POST['add_applicant'])) {
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
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $retype_password = $_POST['retype_password'];

  if ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match';
    header('location: ../applicants.php');
  } else {
    // OPEN CONNECTION
    $conn = $pdo->open();

    // CHECK EMAIL IN USER DB
    $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
    $stmtUser->execute(['email' => $email]);
    $rowUser = $stmtUser->fetch();

    // CHECK EMAIL IN STALLHOLDER DB
    $stmtStallholder = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE email=:email");
    $stmtStallholder->execute(['email' => $email]);
    $rowStallholder = $stmtStallholder->fetch();

    if ($rowUser['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered as user';
      header('location: ../applicants.php');
    } elseif ($rowStallholder['numrows'] > 0) {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email already registered as stallholder';
      header('location: ../applicants.php');
    } else {
      //generate code
      $passwordhash = password_hash($password, PASSWORD_DEFAULT);
      $now = date('Y-m-d');
      // STALLHOLDER ID
      $filename = $_FILES['valid_id']['name'];
      $source_photo  = $_FILES['valid_id']['tmp_name'];
      $namecreate = "valid_id_" . "_" . time() . "_";
      $namecreatenumber = rand(1000, 10000);
      $picname = $namecreate . $namecreatenumber;
      $finalname = $picname . ".jpeg";

      if (!empty($filename)) {
        move_uploaded_file($_FILES['valid_id']['tmp_name'], '../../src/valid_id/' . $finalname);
      }
      compress_image("../../src/valid_id/" . $finalname, "../../src/valid_id/" . $finalname, 30);

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
          username, 
          email, 
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
          :username, 
          :email, 
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
          'username' => $username,
          'email' => $email,
          'password' => $passwordhash,
          'valid_id' => $finalname,
          'now' => $now
        ]);
        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Applicant added successfully!';
        header('location: ../applicants.php');
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['error'] = $e->getMessage();
        header('location: ../applicants.php');
      }
    }
    // CLOSE CONNECTION
    $pdo->close();
  }
} else if (isset($_POST['edit_applicant'])) {
  $id = $_POST['applicant_id'];
  $first_name = ucfirst($_POST['edit_first_name']);
  $middle_name = ucfirst($_POST['edit_middle_name']);
  $last_name = ucfirst($_POST['edit_last_name']);
  $address = $_POST['edit_address'];
  $contact_number = $_POST['edit_contact_number'];
  $date_of_birth = date('Y-m-d', strtotime($_POST['edit_date_of_birth']));
  $place_of_birth = $_POST['edit_place_of_birth'];
  $religion = $_POST['edit_religion'];
  $marital_status = $_POST['edit_marital_status'];
  $spouse_name = $_POST['edit_spouse_name'];
  $spouse_occupation = $_POST['edit_spouse_occupation'];
  $other_gender = $_POST['edit_other_gender'];
  if ($other_gender == "") {
    $gender = $_POST['edit_gender'];
  } else {
    $gender = $_POST['edit_other_gender'];
  }
  $other_education = $_POST['edit_other_education'];
  if ($other_education == "") {
    $education = $_POST['edit_education'];
  } else {
    $education = $_POST['edit_other_education'];
  }
  $password = $_POST['edit_password'];
  $retype_password = $_POST['retype_password'];

  if ($password !== $retype_password) {
    $_SESSION['error'] = 'Password Error!';
    $_SESSION['message'] = 'Passwords did not match';
    header('location: ../applicants.php');
  } else {
    // OPEN CONNECTION
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM stall_holders WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    if ($password == $row['password']) {
      $password = $row['password'];
    } else {
      $password = password_hash($password, PASSWORD_DEFAULT);
    }
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET 
    first_name=:first_name, 
    middle_name=:middle_name, 
    last_name=:last_name, 
    address=:address, 
    contact_number=:contact_number, 
    date_of_birth=:date_of_birth, 
    place_of_birth=:place_of_birth, 
    religion=:religion, 
    marital_status=:marital_status, 
    spouse_name=:spouse_name, 
    spouse_occupation=:spouse_occupation, 
    gender=:gender, 
    educational_attainment=:educational_attainment, 
    password=:password
    WHERE id=:id");
      $stmt->execute([
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'address' => $address,
        'contact_number' => $contact_number,
        'date_of_birth' => $date_of_birth,
        'place_of_birth' => $place_of_birth,
        'religion' => $religion,
        'marital_status' => $marital_status,
        'spouse_name' => $spouse_name,
        'spouse_occupation' => $spouse_occupation,
        'gender' => $gender,
        'educational_attainment' => $education,
        'password' => $password,
        'id' => $id
      ]);
      $_SESSION['success'] = 'Edit Success!';
      $_SESSION['message'] = 'Applicant information updated successfully';
      header('location: ../applicants.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../applicants.php');
    }
  }

  // CLOSE CONNECTION
  $pdo->close();
} elseif (isset($_POST['edit_applicant_username'])) {
  $id = $_POST['applicant_id'];
  $username = $_POST['edit_username'];
  // OPEN CONNECTION
  $conn = $pdo->open();

  // CHECK USERNAME IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
  $stmtUser->execute(['username' => $username]);
  $rowUserName = $stmtUser->fetch();
  // CHECK USERNAME IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE username=:username");
  $stmtUser->execute(['username' => $username]);
  $rowStallholderUsername = $stmtUser->fetch();

  if ($rowUserName['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../applicants.php');
  } elseif ($rowStallholderUsername['numrows'] > 0) {
    $_SESSION['error'] = 'Username Error!';
    $_SESSION['message'] = 'The username you entered is already taken';
    header('location: ../applicants.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET username=:username WHERE id=:id");
      $stmt->execute(['username' => $username, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Username updated successfully';
      header('location: ../applicants.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../applicants.php');
    }
  }
  $pdo->close();
} elseif (isset($_POST['edit_applicant_email'])) {
  $id = $_POST['applicant_id'];
  $email = $_POST['edit_email'];

  // OPEN CONNECTION
  $conn = $pdo->open();

  // CHECK EMAIL IN USER DB
  $stmtUser = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
  $stmtUser->execute(['email' => $email]);
  $rowUser = $stmtUser->fetch();

  // CHECK EMAIL IN STALLHOLDER DB
  $stmtStallholder = $conn->prepare("SELECT COUNT(*) AS numrows FROM stall_holders WHERE email=:email");
  $stmtStallholder->execute(['email' => $email]);
  $rowStallholder = $stmtStallholder->fetch();

  if ($rowUser['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered';
    header('location: ../applicants.php');
  } elseif ($rowStallholder['numrows'] > 0) {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'The email you entered is already registered';
    header('location: ../applicants.php');
  } else {
    try {
      $stmt = $conn->prepare("UPDATE stall_holders SET email=:email WHERE id=:id");
      $stmt->execute(['email' => $email, 'id' => $id]);
      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Applicant email updated successfully';
      header('location: ../applicants.php');
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../applicants.php');
    }
  }
  $pdo->close();
} else if (isset($_POST['delete_applicant'])) {
  $id = $_POST['applicant_id'];

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("DELETE FROM stall_holders WHERE id=:id");
    $stmt->execute(['id' => $id]);

    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Applicant deleted successfully';
    header('location: ../applicants.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../applicants.php');
  }

  $pdo->close();
} else if (isset($_POST['upload_applicant_valid_id'])) {
  $id = $_POST['applicant_id'];
  // STALLHOLDER ID
  $filename = $_FILES['update_valid_id']['name'];
  $source_photo  = $_FILES['update_valid_id']['tmp_name'];
  $namecreate = "valid_id_" . "_" . time() . "_";
  $namecreatenumber = rand(1000, 10000);
  $picname = $namecreate . $namecreatenumber;
  $finalname = $picname . ".jpeg";

  if (!empty($filename)) {
    move_uploaded_file($_FILES['update_valid_id']['tmp_name'], '../../src/valid_id/' . $finalname);
  }
  compress_image("../../src/valid_id/" . $finalname, "../../src/valid_id/" . $finalname, 30);

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET valid_id=:valid_id WHERE id=:id");
    $stmt->execute(['valid_id' => $finalname, 'id' => $id]);
    $_SESSION['success'] = 'Update Valid ID';
    $_SESSION['message'] = 'Applicant valid ID updated successfully';
    header('location: ../applicants.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../applicants.php');
  }

  $pdo->close();
} else 	if (isset($_POST['approve_applicant'])) {
  $id = $_POST['approve_id'];
  $email = $_POST['approve_email'];
  $set = '1234567890';
  $code = substr(str_shuffle($set), 0, 6);
  $_SESSION['email'] = $email;
  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE stall_holders SET activate_code=:code WHERE id=:id");
    $stmt->execute(['code' => $code, 'id' => $id]);
    // URL
    $url = 'http://localhost/palengke_go/_admin/applicants_activate.php?code=' . $code . '&user=' . $id;
    // EMAIL MESSAGE
    $message = "
    <html>
      <head>
        <meta name='viewport' content='width=device-width' />
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Simple Transactional Email</title>
        <style>
          /* -------------------------------------
                        GLOBAL RESETS
                    ------------------------------------- */
          img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
          }
      
          body {
            background-color: green;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
          }
      
          table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
          }
      
          table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top;
          }
      
          /* -------------------------------------
                        BODY & CONTAINER
                    ------------------------------------- */
          .body {
            background-color: #f6f6f6;
            width: 100%;
          }
      
          /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
          .container {
            display: block;
            Margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px;
          }
      
          /* This should also be a block element, so that it will fill 100% of the .container */
          .content {
            box-sizing: border-box;
            display: block;
            Margin: 0 auto;
            max-width: 580px;
            padding: 10px;
          }
      
          /* -------------------------------------
                        HEADER, FOOTER, MAIN
                    ------------------------------------- */
          .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%;
          }
      
          .wrapper {
            box-sizing: border-box;
            padding: 20px;
          }
      
          .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
          }
      
          .footer {
            clear: both;
            Margin-top: 10px;
            text-align: center;
            width: 100%;
          }
      
          .footer td,
          .footer p,
          .footer span,
          .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center;
          }
      
          /* -------------------------------------
                        TYPOGRAPHY
                    ------------------------------------- */
          h1,
          h2,
          h3,
          h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            Margin-bottom: 30px;
          }
      
          h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize;
          }
      
          p,
          ul,
          ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            Margin-bottom: 15px;
          }
      
          p li,
          ul li,
          ol li {
            list-style-position: inside;
            margin-left: 5px;
          }
      
          a {
            color: #3498db;
            text-decoration: underline;
          }
      
          #sub-title {
            margin-bottom: 0;
          }
      
          /* -------------------------------------
                        BUTTONS
                    ------------------------------------- */
          .btn {
            box-sizing: border-box;
            width: 100%;
          }
      
          .btn>tbody>tr>td {
            padding-bottom: 15px;
          }
      
          .btn table {
            width: auto;
          }
      
          .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
          }
      
          .btn a {
            background-color: #ffffff;
            border: solid 1px #3498db;
            border-radius: 5px;
            box-sizing: border-box;
            color: #3498db;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize;
          }
      
          .btn-primary table td {
            background-color: #3498db;
          }
      
          .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff;
          }
      
          /* -------------------------------------
                        OTHER STYLES THAT MIGHT BE USEFUL
                    ------------------------------------- */
          .last {
            margin-bottom: 0;
          }
      
          .first {
            margin-top: 0;
          }
      
          .align-center {
            text-align: center;
          }
      
          .align-right {
            text-align: right;
          }
      
          .align-left {
            text-align: left;
          }
      
          .clear {
            clear: both;
          }
      
          .mt0 {
            margin-top: 0;
          }
      
          .mb0 {
            margin-bottom: 0;
          }
      
          .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
          }
      
          .powered-by a {
            text-decoration: none;
          }
      
          hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            Margin: 20px 0;
          }
      
          /* -------------------------------------
                        RESPONSIVE AND MOBILE FRIENDLY STYLES
                    ------------------------------------- */
          @media only screen and (max-width: 620px) {
            table[class=body] h1 {
              font-size: 28px !important;
              margin-bottom: 10px !important;
            }
      
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
              font-size: 16px !important;
            }
      
            table[class=body] .wrapper,
            table[class=body] .article {
              padding: 10px !important;
            }
      
            table[class=body] .content {
              padding: 0 !important;
            }
      
            table[class=body] .container {
              padding: 0 !important;
              width: 100% !important;
            }
      
            table[class=body] .main {
              border-left-width: 0 !important;
              border-radius: 0 !important;
              border-right-width: 0 !important;
            }
      
            table[class=body] .btn table {
              width: 100% !important;
            }
      
            table[class=body] .btn a {
              width: 100% !important;
            }
      
            table[class=body] .img-responsive {
              height: auto !important;
              max-width: 100% !important;
              width: auto !important;
            }
          }
      
          /* -------------------------------------
                        PRESERVE THESE STYLES IN THE HEAD
                    ------------------------------------- */
          @media all {
            .ExternalClass {
              width: 100%;
            }
      
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%;
            }
      
            .apple-link a {
              color: inherit !important;
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              text-decoration: none !important;
            }
      
            .btn-primary table td:hover {
              background-color: white !important;
            }
      
            .btn-primary a:hover {
              background-color: white !important;
              border-color: white !important;
            }
          }
        </style>
      </head>
      <body>
        <table border='0' cellpadding='0' cellspacing='0' class='body' style='padding-top:2%'>
          <tr>
            <td>&nbsp;</td>
            <td class='container'>
              <div class='content'>
                <!-- START CENTERED WHITE CONTAINER -->
                <span class='preheader'>New Contact Form Entry.</span>
                <table class='main'>
                  <tr>
                    <td class='wrapper'>
                      <table border='0' cellpadding='0' cellspacing='0'>
                        <tr>
                          <td>
                            <center>
                              <img src='https://i.ibb.co/dpq1yhw/Latest-Palengke-Go-Set-Side.png' alt='palengke_go'>
                              <h2 id='sub-title'>Activate Your Stallholder Account</h2>
                            </center>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- START MAIN CONTENT AREA -->
                  <tr>
                    <td class='wrapper'>
                      <table border='0' cellpadding='0' cellspacing='0'>
                        <tr>
                          <td>
                            <p>Congratulations!</p>
                            <p>Your application as a stallholder in Mariveles Public Market has been
                              approved.</p>
                            <p>Click on the button below to activate your stallholder account.</p>
                            <p>
                              <center><a href=" . $url . " target='_blank'
                                  style='width:80%; display: inline-block; color: #ffffff; background-color: #59bd99; border: solid 1px #59bd99; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #59bd99;'>Activate
                                  Account</a></center>
                            </p>
                            <p>Regards,<br />PalengkeGO</p>
                            <p>If you have not performed this activity, then please ignore this email.</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- START FOOTER -->
                <div class='footer'>
                  <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td class='content-block'>
                        <span class='apple-link'>Municipal Public Market, San Carlos, Mariveles, Bataan 2105 (Region 3 -
                          Central Luzon) </span>
                        <br> This is mandatory service email sent to you by PalengkeGO.
                      </td>
                    </tr>
                    <tr>
                      <td class='content-block powered-by'>
                        Powered by <a href='http://gmenterprises.store'>PalengkeGo</a> | <a
                          href='https://goo.gl/maps/G7sgrY6E8NNNA2r56'>Mariveles Public Market</a> | <a
                          href='https://goo.gl/maps/z4vTqXtXWn2CRWQPA'>Municipality of Mariveles Bataan</a>
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- END FOOTER -->
                <!-- END CENTERED WHITE CONTAINER -->
              </div>
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>
      ";

    //Load PHPMAILER
    require("../../plugins/PHPMailer/PHPMailer.php");
    require("../../plugins/PHPMailer/SMTP.php");
    require("../../plugins/PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'palengkego.mariveles@gmail.com';
      $mail->Password = 'uznqjwcoehumjdzh';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port = 465;

      $mail->setFrom('palengkego.mariveles@gmail.com');

      //Recipients
      $mail->addAddress($email);
      $mail->addReplyTo('palengkego.mariveles@gmail.com');

      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Welcome to PalengkeGO! Mariveles Public Market App';
      $mail->Body    = $message;

      $mail->send();

      $_SESSION['success'] = 'Success!';
      $_SESSION['message'] = 'Email sent. Please wait for the applicant to activate their account';
      header('location: ../applicants.php');
    } catch (\Throwable $th) {
      $_SESSION['error'] = 'Mailer Error!';
      $_SESSION['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
      header('location: ../applicants.php');
    }
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../applicants.php');
  }

  $pdo->close();
  unset($_SESSION['email']);
} else if (isset($_GET['redirect_to_vendor_helper'])) {

  $stall_id = $_GET['applicant_id'];

  header('location: ../vendor_helper.php?id=' . $stall_id);
}

function compress_image($source_url, $destination_url, $quality)
{
  $info = getimagesize($source_url);

  if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
  elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
  elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
  elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);

  //save it
  imagejpeg($image, $destination_url, $quality);

  //return destination file url
  return $destination_url;
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../_session.php';


if (isset($_POST['reverify'])) {
  $email = $_POST['email'];

  $conn = $pdo->open();

  $stmtUserAdmin = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
  $stmtUserAdmin->execute(['email' => $email]);
  $rowUserAdmin = $stmtUserAdmin->fetch();

  if ($rowUserAdmin['numrows'] > 0) {
    $setUserAdmin = '1234567890';
    $codeUserAdmin = substr(str_shuffle($setUserAdmin), 0, 6);

    try {
      $stmtUserAdmin = $conn->prepare("UPDATE users SET activate_code=:code WHERE id=:id");
      $stmtUserAdmin->execute([
        'code' => $codeUserAdmin,
        'id' => $rowUserAdmin['id']
      ]);
      $url = 'http://localhost/palengke_go/reverify.php?code=' . $codeUserAdmin . '&user=' . $rowUserAdmin['id'];
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
                max-width: 100%; }
        
              body {
                background-color: green;
                font-family: sans-serif;
                -webkit-font-smoothing: antialiased;
                font-size: 14px;
                line-height: 1.4;
                margin: 0;
                padding: 0;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%; }
        
              table {
                border-collapse: separate;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                width: 100%; }
                table td {
                  font-family: sans-serif;
                  font-size: 14px;
                  vertical-align: top; }
        
              /* -------------------------------------
                  BODY & CONTAINER
              ------------------------------------- */
              .body {
                background-color: #f6f6f6;
                width: 100%; }
        
              /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
              .container {
                display: block;
                Margin: 0 auto !important;
                /* makes it centered */
                max-width: 580px;
                padding: 10px;
                width: 580px; }
        
              /* This should also be a block element, so that it will fill 100% of the .container */
              .content {
                box-sizing: border-box;
                display: block;
                Margin: 0 auto;
                max-width: 580px;
                padding: 10px; }
        
              /* -------------------------------------
                  HEADER, FOOTER, MAIN
              ------------------------------------- */
              .main {
                background: #ffffff;
                border-radius: 3px;
                width: 100%; }
        
              .wrapper {
                box-sizing: border-box;
                padding: 20px; }
        
              .content-block {
                padding-bottom: 10px;
                padding-top: 10px;
              }
              .footer {
                clear: both;
                Margin-top: 10px;
                text-align: center;
                width: 100%; }
                .footer td,
                .footer p,
                .footer span,
                .footer a {
                  color: #999999;
                  font-size: 12px;
                  text-align: center; }
        
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
                Margin-bottom: 30px; }
        
              h1 {
                font-size: 35px;
                font-weight: 300;
                text-align: center;
                text-transform: capitalize; }
        
              p,
              ul,
              ol {
                font-family: sans-serif;
                font-size: 14px;
                font-weight: normal;
                margin: 0;
                Margin-bottom: 15px; }
                p li,
                ul li,
                ol li {
                  list-style-position: inside;
                  margin-left: 5px; }
        
              a {
                color: #3498db;
                text-decoration: underline; }
        
              /* -------------------------------------
                  BUTTONS
              ------------------------------------- */
              .btn {
                box-sizing: border-box;
                width: 100%; }
                .btn > tbody > tr > td {
                  padding-bottom: 15px; }
                .btn table {
                  width: auto; }
                .btn table td {
                  background-color: #ffffff;
                  border-radius: 5px;
                  text-align: center; }
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
                  text-transform: capitalize; }
        
              .btn-primary table td {
                background-color: #3498db; }
        
              .btn-primary a {
                background-color: #3498db;
                border-color: #3498db;
                color: #ffffff; }
        
              /* -------------------------------------
                  OTHER STYLES THAT MIGHT BE USEFUL
              ------------------------------------- */
              .last {
                margin-bottom: 0; }
        
              .first {
                margin-top: 0; }
        
              .align-center {
                text-align: center; }
        
              .align-right {
                text-align: right; }
        
              .align-left {
                text-align: left; }
        
              .clear {
                clear: both; }
        
              .mt0 {
                margin-top: 0; }
        
              .mb0 {
                margin-bottom: 0; }
        
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
                width: 0; }
        
              .powered-by a {
                text-decoration: none; }
        
              hr {
                border: 0;
                border-bottom: 1px solid #f6f6f6;
                Margin: 20px 0; }
        
              /* -------------------------------------
                  RESPONSIVE AND MOBILE FRIENDLY STYLES
              ------------------------------------- */
              @media only screen and (max-width: 620px) {
                table[class=body] h1 {
                  font-size: 28px !important;
                  margin-bottom: 10px !important; }
                table[class=body] p,
                table[class=body] ul,
                table[class=body] ol,
                table[class=body] td,
                table[class=body] span,
                table[class=body] a {
                  font-size: 16px !important; }
                table[class=body] .wrapper,
                table[class=body] .article {
                  padding: 10px !important; }
                table[class=body] .content {
                  padding: 0 !important; }
                table[class=body] .container {
                  padding: 0 !important;
                  width: 100% !important; }
                table[class=body] .main {
                  border-left-width: 0 !important;
                  border-radius: 0 !important;
                  border-right-width: 0 !important; }
                table[class=body] .btn table {
                  width: 100% !important; }
                table[class=body] .btn a {
                  width: 100% !important; }
                table[class=body] .img-responsive {
                  height: auto !important;
                  max-width: 100% !important;
                  width: auto !important; }}
        
              /* -------------------------------------
                  PRESERVE THESE STYLES IN THE HEAD
              ------------------------------------- */
              @media all {
                .ExternalClass {
                  width: 100%; }
                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                  line-height: 100%; }
                .apple-link a {
                  color: inherit !important;
                  font-family: inherit !important;
                  font-size: inherit !important;
                  font-weight: inherit !important;
                  line-height: inherit !important;
                  text-decoration: none !important; }
                .btn-primary table td:hover {
                  background-color: white !important; }
                .btn-primary a:hover {
                  background-color: white !important;
                  border-color: white !important; } }
        
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
                                <img src='https://i.ibb.co/dpq1yhw/Latest-Palengke-Go-Set-Side.png' alt='palengke_go_logo'>
                                <p><h2>Account Reverification Request</h2></p>
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
                              <p>Greetings,</p>
                              <p>We have received a request for account reverification from the email address $email on PalengkeGo Website.</p>
                              <p>Click on the button below to reverify your account.</p>
                              <p><center><a href=" . $url . " target='_blank' style='width:80%; display: inline-block; color: #ffffff; background-color: #59bd99; border: solid 1px #59bd99; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #59bd99;'>Reverify Account</a></center></p>
                              <p>Regards,<br/>PalengkeGo</p>
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
                            <span class='apple-link'>Municipal Public Market, San Carlos, Mariveles, Bataan 2105 (Region 3 - Central Luzon) </span>
                            <br> This is mandatory service email sent to you by PalengkeGO.
                          </td>
                        </tr>
                        <tr>
                          <td class='content-block powered-by'>
                            Powered by <a href='http://gmenterprises.store'>PalengkeGo</a> | <a href='https://goo.gl/maps/G7sgrY6E8NNNA2r56'>Mariveles Public Market</a> | <a href='https://goo.gl/maps/z4vTqXtXWn2CRWQPA'>Municipality of Mariveles Bataan</a>
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

      //Load phpmailer
      require("../plugins/PHPMailer/PHPMailer.php");
      require("../plugins/PHPMailer/SMTP.php");
      require("../plugins/PHPMailer/Exception.php");

      $mailUserAdmin = new PHPMailer(true);
      try {
        //Server settings
        $mailUserAdmin->isSMTP();
        $mailUserAdmin->Host = 'smtp.gmail.com';
        $mailUserAdmin->SMTPAuth = true;
        $mailUserAdmin->Username = 'palengkego.mariveles@gmail.com';
        $mailUserAdmin->Password = 'uznqjwcoehumjdzh';
        $mailUserAdmin->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mailUserAdmin->Port = 465;

        $mailUserAdmin->setFrom('palengkego.mariveles@gmail.com');

        //Recipients
        $mailUserAdmin->addAddress($email);
        $mailUserAdmin->addReplyTo('palengkego.mariveles@gmail.com');

        //Content
        $mailUserAdmin->isHTML(true);
        $mailUserAdmin->Subject = 'Account Reverification from PalengkeGo! Mariveles Public Market App';
        $mailUserAdmin->Body    = $message;

        $mailUserAdmin->send();

        $_SESSION['success'] = 'Success!';
        $_SESSION['message'] = 'Account reverification link sent.';
        header('location: ../reverify_account.php');
      } catch (Exception $e) {
        $_SESSION['error'] = 'Message could not be sent!';
        $_SESSION['message'] = 'Mailer Error: ' . $mailUserAdmin->ErrorInfo;
        header('location: ../reverify_account.php');
      }
    } catch (PDOException $e) {
      $_SESSION['error'] = 'Error!';
      $_SESSION['message'] = $e->getMessage();
      header('location: ../reverify_account.php');
    }
  } elseif ($rowUserAdmin['numrows'] <= 0) {
    $stmtStallholder = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM stall_holders WHERE email=:email");
    $stmtStallholder->execute(['email' => $email]);
    $rowStallholder = $stmtStallholder->fetch();

    if ($rowStallholder['numrows1'] > 0) {
      //generate code
      $setStallholder = '1234567890';
      $codeStallholder = substr(str_shuffle($setStallholder), 0, 6);

      try {
        $stmtStallholder = $conn->prepare("UPDATE stall_holders SET activate_code=:code WHERE id=:id");
        $stmtStallholder->execute([
          'code' => $codeStallholder,
          'id' => $rowStallholder['id']
        ]);
        $url = 'http://localhost/palengke_go/reverify.php?code=' . $codeStallholder . '&user=' . $rowStallholder['id'];
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
                  max-width: 100%; }
          
                body {
                  background-color: green;
                  font-family: sans-serif;
                  -webkit-font-smoothing: antialiased;
                  font-size: 14px;
                  line-height: 1.4;
                  margin: 0;
                  padding: 0;
                  -ms-text-size-adjust: 100%;
                  -webkit-text-size-adjust: 100%; }
          
                table {
                  border-collapse: separate;
                  mso-table-lspace: 0pt;
                  mso-table-rspace: 0pt;
                  width: 100%; }
                  table td {
                    font-family: sans-serif;
                    font-size: 14px;
                    vertical-align: top; }
          
                /* -------------------------------------
                    BODY & CONTAINER
                ------------------------------------- */
                .body {
                  background-color: #f6f6f6;
                  width: 100%; }
          
                /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                .container {
                  display: block;
                  Margin: 0 auto !important;
                  /* makes it centered */
                  max-width: 580px;
                  padding: 10px;
                  width: 580px; }
          
                /* This should also be a block element, so that it will fill 100% of the .container */
                .content {
                  box-sizing: border-box;
                  display: block;
                  Margin: 0 auto;
                  max-width: 580px;
                  padding: 10px; }
          
                /* -------------------------------------
                    HEADER, FOOTER, MAIN
                ------------------------------------- */
                .main {
                  background: #ffffff;
                  border-radius: 3px;
                  width: 100%; }
          
                .wrapper {
                  box-sizing: border-box;
                  padding: 20px; }
          
                .content-block {
                  padding-bottom: 10px;
                  padding-top: 10px;
                }
                .footer {
                  clear: both;
                  Margin-top: 10px;
                  text-align: center;
                  width: 100%; }
                  .footer td,
                  .footer p,
                  .footer span,
                  .footer a {
                    color: #999999;
                    font-size: 12px;
                    text-align: center; }
          
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
                  Margin-bottom: 30px; }
          
                h1 {
                  font-size: 35px;
                  font-weight: 300;
                  text-align: center;
                  text-transform: capitalize; }
          
                p,
                ul,
                ol {
                  font-family: sans-serif;
                  font-size: 14px;
                  font-weight: normal;
                  margin: 0;
                  Margin-bottom: 15px; }
                  p li,
                  ul li,
                  ol li {
                    list-style-position: inside;
                    margin-left: 5px; }
          
                a {
                  color: #3498db;
                  text-decoration: underline; }
          
                /* -------------------------------------
                    BUTTONS
                ------------------------------------- */
                .btn {
                  box-sizing: border-box;
                  width: 100%; }
                  .btn > tbody > tr > td {
                    padding-bottom: 15px; }
                  .btn table {
                    width: auto; }
                  .btn table td {
                    background-color: #ffffff;
                    border-radius: 5px;
                    text-align: center; }
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
                    text-transform: capitalize; }
          
                .btn-primary table td {
                  background-color: #3498db; }
          
                .btn-primary a {
                  background-color: #3498db;
                  border-color: #3498db;
                  color: #ffffff; }
          
                /* -------------------------------------
                    OTHER STYLES THAT MIGHT BE USEFUL
                ------------------------------------- */
                .last {
                  margin-bottom: 0; }
          
                .first {
                  margin-top: 0; }
          
                .align-center {
                  text-align: center; }
          
                .align-right {
                  text-align: right; }
          
                .align-left {
                  text-align: left; }
          
                .clear {
                  clear: both; }
          
                .mt0 {
                  margin-top: 0; }
          
                .mb0 {
                  margin-bottom: 0; }
          
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
                  width: 0; }
          
                .powered-by a {
                  text-decoration: none; }
          
                hr {
                  border: 0;
                  border-bottom: 1px solid #f6f6f6;
                  Margin: 20px 0; }
          
                /* -------------------------------------
                    RESPONSIVE AND MOBILE FRIENDLY STYLES
                ------------------------------------- */
                @media only screen and (max-width: 620px) {
                  table[class=body] h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important; }
                  table[class=body] p,
                  table[class=body] ul,
                  table[class=body] ol,
                  table[class=body] td,
                  table[class=body] span,
                  table[class=body] a {
                    font-size: 16px !important; }
                  table[class=body] .wrapper,
                  table[class=body] .article {
                    padding: 10px !important; }
                  table[class=body] .content {
                    padding: 0 !important; }
                  table[class=body] .container {
                    padding: 0 !important;
                    width: 100% !important; }
                  table[class=body] .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important; }
                  table[class=body] .btn table {
                    width: 100% !important; }
                  table[class=body] .btn a {
                    width: 100% !important; }
                  table[class=body] .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important; }}
          
                /* -------------------------------------
                    PRESERVE THESE STYLES IN THE HEAD
                ------------------------------------- */
                @media all {
                  .ExternalClass {
                    width: 100%; }
                  .ExternalClass,
                  .ExternalClass p,
                  .ExternalClass span,
                  .ExternalClass font,
                  .ExternalClass td,
                  .ExternalClass div {
                    line-height: 100%; }
                  .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important; }
                  .btn-primary table td:hover {
                    background-color: white !important; }
                  .btn-primary a:hover {
                    background-color: white !important;
                    border-color: white !important; } }
          
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
                                  <img src='https://i.ibb.co/dpq1yhw/Latest-Palengke-Go-Set-Side.png' alt='palengke_go_logo'>
                                  <p><h2>Account Reverification Request</h2></p>
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
                                <p>Greetings,</p>
                                <p>We have received a request for account reverification from the email address $email on PalengkeGo Website.</p>
                                <p>Click on the button below to reverify your account.</p>
                                <p><center><a href=" . $url . " target='_blank' style='width:80%; display: inline-block; color: #ffffff; background-color: #59bd99; border: solid 1px #59bd99; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #59bd99;'>Reverify Account</a></center></p>
                                <p>Regards,<br/>PalengkeGo</p>
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
                              <span class='apple-link'>Municipal Public Market, San Carlos, Mariveles, Bataan 2105 (Region 3 - Central Luzon) </span>
                              <br> This is mandatory service email sent to you by PalengkeGO.
                            </td>
                          </tr>
                          <tr>
                            <td class='content-block powered-by'>
                              Powered by <a href='http://gmenterprises.store'>PalengkeGo</a> | <a href='https://goo.gl/maps/G7sgrY6E8NNNA2r56'>Mariveles Public Market</a> | <a href='https://goo.gl/maps/z4vTqXtXWn2CRWQPA'>Municipality of Mariveles Bataan</a>
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

        //Load phpmailer
        require("../plugins/PHPMailer/PHPMailer.php");
        require("../plugins/PHPMailer/SMTP.php");
        require("../plugins/PHPMailer/Exception.php");

        $mailStallholder = new PHPMailer(true);
        try {
          //Server settings
          $mailStallholder->isSMTP();
          $mailStallholder->Host = 'smtp.gmail.com';
          $mailStallholder->SMTPAuth = true;
          $mailStallholder->Username = 'palengkego.mariveles@gmail.com';
          $mailStallholder->Password = 'uznqjwcoehumjdzh';
          $mailStallholder->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
          $mailStallholder->Port = 465;

          $mailStallholder->setFrom('palengkego.mariveles@gmail.com');

          //Recipients
          $mailStallholder->addAddress($email);
          $mailStallholder->addReplyTo('palengkego.mariveles@gmail.com');

          //Content
          $mailStallholder->isHTML(true);
          $mailStallholder->Subject = 'Account Reverification from PalengkeGo! Mariveles Public Market App';
          $mailStallholder->Body    = $message;

          $mailStallholder->send();

          $_SESSION['success'] = 'Success!';
          $_SESSION['message'] = 'Account reverification link sent.';
        } catch (Exception $e) {
          $_SESSION['error'] = 'Message could not be sent!';
          $_SESSION['message'] = 'Mailer Error: ' . $mailStallholder->ErrorInfo;
          header('location: ../reverify_account.php');
        }
      } catch (PDOException $e) {
        $_SESSION['error'] = 'Error!';
        $_SESSION['message'] = $e->getMessage();
        header('location: ../reverify_account.php');
      }
    } else {
      $_SESSION['error'] = 'Email Error!';
      $_SESSION['message'] = 'Email not found.';
      header('location: ../reverify_account.php');
    }
  } else {
    $_SESSION['error'] = 'Email Error!';
    $_SESSION['message'] = 'Email not found.';
    header('location: ../reverify_account.php');
  }

  $pdo->close();
} else {
  $_SESSION['error'] = 'Fill up form first';
  $_SESSION['error'] = 'Input email associated with account.';
}

header('location: ../reverify_account.php');

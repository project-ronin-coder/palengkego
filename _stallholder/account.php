<?php
include '../_session.php';
include '_redirect_stallholder.php';
include 'pages/stallholder_details.php';
include 'pages/stallholder_stallsGetRow.php';
include 'pages/stallholder_productsGetRow.php';
include 'pages/stallholder_vendorhelperGetRow.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PalengkeGO</title>

  <?php include 'dist/styles_stallholder.php' ?>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <?php include 'pages/navbar.php' ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">My Account</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Account</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="card card-widget widget-user shadow">
            <div class="widget-user-header bg-main">
              <h3 class="widget-user-username text-light text-bold"><?php echo $stallholder_fullname ?></h3>
            </div>
            <div class="widget-user-image">
              <img src="<?php echo (!empty($stallholder['valid_id'])) ? '../src/valid_id/' . $stallholder['valid_id'] : '../src/valid_id/default_id.png'; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="card-footer">
              <h5 class="widget-user-desc text-center">Stallholder</h5>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $stalls_owned_row; ?></h5>
                    <span class="description-text">STALLS</span>
                    <div class="small-box bg-main">
                      <a href="stalls.php" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $products_owned_row; ?></h5>
                    <span class="description-text">PRODUCTS</span>
                    <div class="small-box bg-main">
                      <a href="products.php" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $vendor_helper_row; ?></h5>
                    <span class="description-text">VENDORS/HELPERS</span>
                    <div class="small-box bg-main">
                      <a href="vendor_helper.php" class="small-box-footer text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card card-primary card-outline border-main">
            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">Account Details</h3>
              <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item m-1"><a id="btnPersonalInfo" class="nav-link active-link" href="#personalInfo" data-toggle="tab">Personal
                    Information</a></li>
                <li class="nav-item m-1"><a id="btnAccountInfo" class="nav-link" href="#accountInfo" data-toggle="tab">Account
                    Information</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <form class="form-horizontal" id="formEditStallholder" action="includes/editInfo_stallholder.php" method="POST" enctype="multipart/form-data">
                <div class="tab-content">
                  <div class="tab-pane active" id="personalInfo">
                    <!-- EDIT PERSONAL INFO -->
                    <div id="containerEditPersonalInfo">
                      <!-- STALLHOLDER NAME -->
                      <input type="hidden" id="stallholder_Id" name="stallholder_id" hidden>
                      <div>
                        <ul class="list-group">
                          <button type="button" class="list-group-item list-group-item-action bg-main text-light" aria-current="true">
                            <span class="font-weight-bold h5">Stallholder Details</span>
                          </button>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Full Name:</span>
                            <span class="full-name"></span>
                          </li>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Address:</span>
                            <span class="address"></span>
                          </li>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Contact Number:</span>
                            <span class="contact-number"></span>
                          </li>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Date of Birth:</span>
                            <span class="date-of-birth"></span>
                          </li>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Place of Birth:</span>
                            <span class="place-of-birth"></span>
                          </li>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Gender:</span>
                            <span class="gender"></span>
                          </li>
                          <li class="list-group-item ">
                            <span class="font-weight-bold mr-1">Educational Attainment:</span>
                            <span class="educational-attainment"></span>
                          </li>
                        </ul>
                      </div>
                      <label class="h5"></label>
                      <div class="row">
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="accountInfo">
                    <!-- EDIT ACCOUNT INFO -->
                    <div id="containerEditAccountInfo">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <!-- EMAIL -->
                        <div class="input-group mb-3">
                          <input type="email" class="form-control email data-readonly" id="email" name="email" placeholder="Email" readonly>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <!-- EMAIL -->
                        <div class="input-group mb-3">
                          <input type="email" class="form-control username data-readonly" id="username" name="username" placeholder="Email" readonly>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-user"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <!-- PASSWORD -->
                        <div class="input-group mb-3">
                          <input type="password" class="form-control data-readonly" id="password" name="password" placeholder="Password" readonly>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-lock"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <a id="btnEdit" class="btn btn-main float-right btn-edit-account">Edit Account</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php include 'pages/footer.php' ?>
  </div>

  <?php include 'dist/modal_account.php' ?>
  <?php include 'dist/scripts_stallholder.php' ?>

  <script>
    // =======================================
    // FOR ID : INITIALIZATION
    // =======================================
    $(function() {
      $(document).ready(function() {
        var id = <?php echo $stallholder_id ?>;
        getRow(id);

        $("#myAccount").addClass("active-link");
      });
    });

    // =======================================
    // FOR VALID ID : CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      // FOR CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
      function displayImage(e) {
        if (e.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            document.querySelector('#newStallholderValidId').setAttribute('src', e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }
      }
    });

    // =======================================
    // FOR RADIO BUTTONS : MARITAL STATUS, GENDER, EDUCATION
    // =======================================
    $(function() {
      $("input[name=marital_status]:radio").click(function() {
        if ($('input[name=marital_status]:checked').val() == "Married") {
          $('#spouseInfo').show();
        } else if ($('input[name=marital_status]:checked').val() == "Cohabiting") {
          $('#spouseInfo').show();
        } else if ($('input[name=marital_status]:checked').val() == "Widowed") {
          $('#spouseInfo').show();
        } else {
          $('#spouseInfo').hide();
        }
      });
      $("#otherGender").click(function() {
        $("#male").prop('checked', false);
        $("#female").prop('checked', false);
      });
      $("#otherEducation").click(function() {
        $("#elementary").prop('checked', false);
        $("#secondary").prop('checked', false);
        $("#tertiary").prop('checked', false);
      });
    });

    // =======================================
    // FOR CRUD : ACCOUNT, PERSONAL, VALID ID, EMAIL, USERNAME, PASSWORD
    // =======================================
    $(function() {

      $(document).on("click", ".btn-edit-account", function(e) {
        e.preventDefault();
        $("#modalEditAccount").modal('show');
      });

      $(document).on("click", "#btnEditPersonalDetails", function(e) {
        e.preventDefault();
        $("#modalUpdatePersonalDetails").modal('show');
      });
      $(document).on("click", "#btnUpdateValidID", function(e) {
        e.preventDefault();
        $("#modalValidIDStallholder").modal('show');
      });
      $(document).on("click", "#btnUpdateEmail", function(e) {
        e.preventDefault();
        $("#modalUpdateEmail").modal('show');
      });
      $(document).on("click", "#btnUpdateUsername", function(e) {
        e.preventDefault();
        $("#modalUpdateUsername").modal('show');
      });
      $(document).on("click", "#btnChangePassword", function(e) {
        e.preventDefault();
        $("#modalUpdatePassword").modal('show');
      });
    });

    // =======================================
    // FOR ACCOUNT DETAILS : BUTTON REDIRECT
    // =======================================
    $(function() {
      $("#btnPersonalInfo").click(function(e) {
        $("#btnPersonalInfo").addClass("active-link");
        $("#personalInfo").addClass("active");

        $("#btnAccountInfo").removeClass("active-link");
        $("#accountInfo").removeClass("active");
      });
      $("#btnAccountInfo").click(function(e) {
        $("#btnAccountInfo").addClass("active-link");
        $("#accountInfo").addClass("active");

        $("#btnPersonalInfo").removeClass("active-link");
        $("#personalInfo").removeClass("active");
      });
    });


    // =======================================
    // FOR PASSWORD : SHOW HIDE PASSWORD
    // =======================================
    $(function() {
      $(document).on("click", ".show-hide-password", function(e) {
        let password = $(".password");
        let repassword = $(".retype-password")
        let label_pass = $(".label-password");
        if (password.attr("type") == "password") {
          password.attr("type", "text");
          repassword.attr("type", "text");
          label_pass.text("Hide Password");
        } else {
          password.attr("type", "password");
          repassword.attr("type", "password");
          label_pass.text("Show Password");
        }
      });
    });

    // =======================================
    // FOR ACCOUNT DETAILS: GET DATA FROM DB
    // =======================================
    function getRow(id) {
      $.ajax({
        type: "POST",
        url: "_stallholders_getRow.php",
        data: {
          id: id,
        },
        dataType: "json",
        success: function(response) {
          $('#stallholder_Id').val(response.id);
          $('.full-name').html(response.first_name + " " + response.middle_name + " " + response.last_name);
          $('.address').html(response.address);
          $('.contact-number').html(response.contact_number);
          $('.date-of-birth').html(response.date_of_birth);
          $('.place-of-birth').html(response.place_of_birth);
          $('.gender').html(response.gender);
          $('.educational-attainment').html(response.educational_attainment);


          $('#firstName').val(response.first_name);
          $('#middleName').val(response.middle_name);
          $('#lastName').val(response.last_name);
          $('#address').val(response.address);
          $('#contactNumber').val(response.contact_number);
          $('#placeOfBirth').val(response.place_of_birth);
          $('#religion').val(response.religion);
          $("input:radio[name=marital_status][value=" + response.marital_status + "]").prop('checked', true);
          $('#spouseName').val(response.spouse_name);
          $('#spouseOccupation').val(response.spouse_occupation);
          $("input:radio[name=gender][value=" + response.gender + "]").prop('checked', true);
          $("input:radio[name=education][value=" + response.educational_attainment + "]").prop('checked', true);
          if ($('input[name=marital_status]:checked').val() == "Married") {
            $('#spouseInfo').show();
          } else if ($('input[name=marital_status]:checked').val() == "Single") {
            $('#spouseInfo').hide();
          }

          $('.email').val(response.email);
          $('.username').val(response.username);
          $('#password').val(response.password);

          if (response.valid_id == "") {
            $("#newStallholderValidId").attr("src", "../src/valid_id/default_id.png");
          } else {
            $("#newStallholderValidId").attr("src", "../src/valid_id/" + response.valid_id);
          }
        },
      });
    }

    // =======================================
    // FOR DATE: CUSTOM INPUT
    // =======================================
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#dateOfBirth').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
              'month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })
    })
  </script>
</body>

</html>
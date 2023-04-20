<?php
include '_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Palengke GO | Register Stallholder</title>
  <!-- LINKS -->
  <?php include 'dist/login_links.php' ?>
</head>

<body class="hold-transition register-page my-3">
  <div class="register-box">
    <!-- REGISTER STALLHOLDER -->
    <div class="register-logo">
      <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="logo">
    </div>
    <!-- CARD -->
    <div class="card">
      <div class="card-body register-card-body">
        <h3 class="login-box-msg-header">Apply as Stallholder</h3>
        <p class="login-box-msg">Enter your personal details</p>
        <!-- FORM -->
        <form id="formRegisterStallholder" action="includes/register_stallholder.inc.php" method="POST" enctype="multipart/form-data">
          <!-- FULL NAME -->
          <div class="form-group">
            <label>Stallholder Name</label>
            <!-- FIRST NAME -->
            <div class="input-group mb-3">
              <input type="text" class="form-control first-name" id="firstName" name="first_name" placeholder="First Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
            <!-- MIDDLE NAME -->
            <div class="input-group mb-3">
              <input type="text" class="form-control middle-name" id="middleName" name="middle_name" placeholder="Middle Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
            <!-- LAST NAME -->
            <div class="input-group mb-3">
              <input type="text" class="form-control last-name" id="lastName" name="last_name" placeholder="Last Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Present Address</label>
            <p style="font-size: 14px;">(House/Lot/Blk, Street, Barangay, City/Municipality, Province)</p>
            <!-- PRESENT ADDRESS -->
            <div class="input-group mb-3">
              <input type="text" class="form-control address" id="address" name="address" placeholder="Present Address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-map-marker-alt"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Date of Birth</label>
            <!-- Date of Birth-->
            <div class="input-group mb-3 date" id="dateOfBirth" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#dateOfBirth" data-toggle="datetimepicker" placeholder="Date of Birth" name="date_of_birth" required />
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fa fa-calendar"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Place of Birth</label>
            <!-- PLACE OF BIRTH -->
            <div class="input-group mb-3">
              <input type="text" class="form-control place-of-birth" id="placeOfBirth" name="place_of_birth" placeholder="Place of Birth" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-map-marker-alt"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Contact Number (09)</label>
            <!-- CONTACT NUMBER -->
            <div class="input-group mb-3">
              <input type="text" class="form-control contact-number" id="contactNumber" name="contact_number" placeholder="Contact Number" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-phone"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Religion</label>
            <!-- Religion -->
            <div class="input-group mb-3">
              <input type="text" class="form-control religion" id="religion" name="religion" placeholder="Religion" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-praying-hands"></span>
                </div>
              </div>
            </div>
          </div>
          <!-- MARITAL STATUS -->
          <div class="form-group p-2 border border-1 rounded">
            <label>Marital Status</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="maritalStatus1" name="marital_status" value="Single">
              <label for="maritalStatus1" class="custom-control-label">Single</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="maritalStatus2" name="marital_status" value="Married">
              <label for="maritalStatus2" class="custom-control-label">Married</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="maritalStatus3" name="marital_status" value="Widowed">
              <label for="maritalStatus3" class="custom-control-label">Widowed</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="maritalStatus4" name="marital_status" value="Cohabiting">
              <label for="maritalStatus4" class="custom-control-label">Cohabiting</label>
            </div>
          </div>
          <!-- SPOUSE -->
          <div class="form-group p-2 border border-1 rounded" id="spouseInfo">
            <label>Spouse Information</label>
            <div class="form-group">
              <input type="text" class="form-control form-control-border" id="spouseName" placeholder="Spouse Name" name="spouse_name">
              <input type="text" class="form-control form-control-border" id="spouseOccupation" placeholder="Occupation" name="spouse_occupation">
            </div>
          </div>
          <!-- GENDER -->
          <div class="form-group p-2 border border-1 rounded">
            <label>Gender</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="male" value="Male" name="gender">
              <label for="male" class="custom-control-label">Male</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="female" value="Female" name="gender">
              <label for="female" class="custom-control-label">Female</label>
            </div>
            <div class="form-group">
              <label class="p-0 m-0" for="otherGender">Others</code></label>
              <input type="text" class="form-control form-control-border" id="otherGender" placeholder="Please Specify" name="other_gender">
            </div>
          </div>
          <!-- EDUCATIONAL ATTAINMENT -->
          <div class="form-group p-2 border border-1 rounded">
            <label>Educational Attainment</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="elementary" name="education" value="Elementary">
              <label for="elementary" class="custom-control-label">Elementary</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="secondary" name="education" value="Secondary">
              <label for="secondary" class="custom-control-label">Secondary</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input custom-control-input-success" type="radio" id="tertiary" name="education" value="Tertiary">
              <label for="tertiary" class="custom-control-label">Tertiary</label>
            </div>
            <div class="form-group">
              <label class="p-0 m-0" for="otherEducation">Others</code></label>
              <input type="text" class="form-control form-control-border" id="otherEducation" value="" placeholder="Please Specify" name="other_education">
            </div>
          </div>
          <div class="form-group">
            <label>Account Information</label>
            <!-- USERNAME -->
            <div class="input-group mb-3">
              <input type="text" class="form-control username" id="username" name="username" placeholder="Username (a-z,A-Z,0-9,-/_/.)" size="25" minlength="10" maxlength="25" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fas fa-user"></i>
                </div>
              </div>
            </div>
            <!-- EMAIL -->
            <div class="input-group mb-3">
              <input type="email" class="form-control email" id="email" name="email" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-envelope"></span>
                </div>
              </div>
            </div>
            <!-- PASSWORD -->
            <div class="input-group mb-3">
              <input type="password" class="form-control password" id="password" name="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-lock"></span>
                </div>
              </div>
            </div>
            <!-- RETYPE PASSWORD -->
            <div class="input-group mb-3">
              <input type="password" class="form-control retype-password" id="retypePassword" name="retype_password" placeholder="Retype password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="icheck-primary">
              <input type="checkbox" class="show-hide-pass" id="registerShowHidePass" value="Show">
              <label for="registerShowHidePass" class="label-password" id="labelPassword">
                Show Password
              </label>
            </div>
            <!-- Valid ID-->
            <div class="input-group mb-3 d-flex">
              <img class="img-thumbnail mx-auto d-block mb-2" id="add-valid-id" src="src/valid_id/default_id.png" onclick="triggerClick()" style="width: 100%; flex-shrink: 0;">
              <div class="custom-file">
                <input type="file" class="form-control custom-file-input valid-id" id="validId" name="valid_id" onchange="displayImage(this)" required>
                <label class="custom-file-label" for="valid-id">Upload a valid id picture</label>
              </div>
            </div>
          </div>
          <!-- REGISTER STALL -->
          <div class="text-center mb-3 d-block">
            <button type="submit" form="formRegisterStallholder" name="register_stallholder" class="btn-register btn w-100 d-flex justify-content-center align-items-center">
              <i class="fas fa-edit mr-auto"></i>
              <span class="mr-auto">Register</span>
            </button>
          </div>
        </form>
        <!-- LINKS -->
        <div class="links text-center">
          <p>
            <a href="login.php">Already have a stallholder registered</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/login_scripts.php' ?>
  <script>
    $(function() {
      $('#spouseInfo').hide();
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
    // FOR CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#add-valid-id').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>
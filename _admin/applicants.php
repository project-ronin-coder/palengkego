<?php
include '../_session.php';
include '_admin_redirect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- HEADER -->
  <?php include 'pages/header.php'; ?>

  <?php include 'assets/css/style_applicants.php'; ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <!-- NAVBAR -->
    <?php include 'pages/navbar.php' ?>

    <!-- SIDEBAR -->
    <?php include 'pages/sidebar.php' ?>

    <!-- CONTENT -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>List of Applicants</h1>
            </div>
            <div class="col-sm-6">
              <!-- BREADCRUMB -->
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">List of Applicants</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- MAIN CONTENT -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="my-3 mx-3 d-flex justify-content-start align-items-center">
                  <!-- ADD USER -->
                  <button data-toggle="modal" data-target="#addStallApplicant" class="btn-add btn btn-primary">
                    <span class="fa fa-plus pr-2"></span>
                    Add New Applicant
                  </button>
                </div>
                <hr class="m-0">

                <!-- BODY -->
                <div class="card-body">
                  <table id="applicants-table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Valid ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Vendors/Helpers</th>
                        <th>Status</th>
                        <th>Account Type</th>
                        <th>Date Applied</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_applicants_fetch.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>

    <!-- MODALS -->
    <?php include 'dist/modal_applicants.php' ?>
  </div>
  <!-- SCRIPTS -->
  <?php include 'dist/scripts.php' ?>
  <script>
    // =======================================
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      $("#applicants-table").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });
    });

    // =======================================
    // FOR VALID ID : CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
    // =======================================
    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#validId').setAttribute('src', e.target.result);
          // ADD
          document.querySelector('#addValidId').setAttribute('src', e.target.result);
          // APPROVE
          document.querySelector('#photoValidId').setAttribute('src', e.target.result);
          // PHOTO
        }
        reader.readAsDataURL(e.files[0]);
      }
    }

    // =======================================
    // FOR PASSWORD : SHOW OR HIDE PASSWORD
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
    // FOR ADD EDIT : RADIO BUTTONS
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
      $("input[name=edit_marital_status]:radio").click(function() {
        if ($('input[name=edit_marital_status]:checked').val() == "Married") {
          $('#editSpouseInfo').show();
        } else if ($('input[name=edit_marital_status]:checked').val() == "Cohabiting") {
          $('#editSpouseInfo').show();
        } else if ($('input[name=edit_marital_status]:checked').val() == "Widowed") {
          $('#editSpouseInfo').show();
        } else {
          $('#editSpouseInfo').hide();
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
      $("#editOtherGender").click(function() {
        $("#editMale").prop('checked', false);
        $("#editFemale").prop('checked', false);
      });
      $("#editOtherEducation").click(function() {
        $("#editElementary").prop('checked', false);
        $("#editSecondary").prop('checked', false);
        $("#editTertiary").prop('checked', false);
      });
    });


    // =======================================
    // FOR ADD EDIT : TOGGLE NEXT AND PREVIOUS
    // =======================================
    $(function() {
      // FOR ADD
      $("#btnPersonalInfo").hide();
      $("#btnPersonalInfo").click(function(e) {
        $("#btnPersonalInfo").hide();
        $("#btnAccountInfo").show();
      });
      $("#btnAccountInfo").click(function(e) {
        $("#btnAccountInfo").hide();
        $("#btnPersonalInfo").show();
      });
      // FOR EDIT
      $("#btnEditPersonalInfo").hide();
      $("#btnEditPersonalInfo").click(function(e) {
        $("#btnEditPersonalInfo").hide();
        $("#btnEditAccountInfo").show();
      });
      $("#btnEditAccountInfo").click(function(e) {
        $("#btnEditAccountInfo").hide();
        $("#btnEditPersonalInfo").show();
      });
    });


    // =======================================
    // FOR CRUD : SHOWING MODALS
    // =======================================

    $(function() {
      // FOR ADD
      $(document).on("click", ".btn-add", function(e) {
        e.preventDefault();
        $("#modalAddStallApplicant").modal("show");
      });

      // FOR EDIT
      $(document).on("click", ".btn-edit", function(e) {
        e.preventDefault();
        $("#modalEditApplicant").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });
      // FOR EDIT USERNAME
      $(document).on("click", ".btn-edit-username", function(e) {
        e.preventDefault();
        $("#modalEditUsername").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });
      // FOR EDIT EMAIL
      $(document).on("click", ".btn-edit-email", function(e) {
        e.preventDefault();
        $("#modalEditEmail").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR ADD VENDORS/HELPERS
      $(document).on("click", ".btn-view-vendor-helper", function(e) {
        e.preventDefault();
        $("#modalViewVendorHelper").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR DELETE
      $(document).on("click", ".btn-delete", function(e) {
        e.preventDefault();
        $("#modalDeleteApplicant").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR APPROVE
      $(document).on("click", ".btn-approve", function(e) {
        e.preventDefault();
        $("#modalApproveApplicant").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR VALID ID
      $(document).on("click", ".btn-valid-id", function(e) {
        e.preventDefault();
        $("#modalValidIdApplicant").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR GETTING DATA FROM DB
      function getRow(id) {
        $.ajax({
          type: "POST",
          url: "_applicants_getRow.php",
          data: {
            id: id,
          },
          dataType: "json",
          success: function(response) {
            // APPLICANT ID
            $(".applicant-id").val(response.id);

            // APPLICANT NAME
            var middle = response.middle_name;
            var initial = middle.substring(0, 1);
            var middle_initial = initial + "."
            $('.full-name').html(response.first_name + " " + middle_initial + " " + response.last_name);

            // EDIT NAME
            $("#editFirstName").val(response.first_name);
            $("#editMiddleName").val(response.middle_name);
            $("#editLastName").val(response.last_name);

            // EDIT ADDRESS AND CONTACT NUMBER
            $("#editAddress").val(response.address);
            $("#editContactNumber").val(response.contact_number);

            // EDIT DATE OF BIRTH AND PLACE OF BIRTH
            $("#editDateOfBirth").val(response.date_of_birth);
            $("#editPlaceOfBirth").val(response.place_of_birth);

            // EDIT RELIGION
            $("#editReligion").val(response.religion);

            // EDIT MARITAL STATUS AND SPOUSE DETAILS
            $("input:radio[name=edit_marital_status][value=" + response.marital_status + "]").prop('checked', true);
            if ($('input[name=edit_marital_status]:checked').val() == "Married") {
              $('#editSpouseInfo').show();
            } else if ($('input[name=edit_marital_status]:checked').val() == "Single") {
              $('#editSpouseInfo').hide();
            }
            $("#editSpouseName").val(response.spouse_name);
            $("#editSpouseOccupation").val(response.spouse_occupation);

            // EDIT GENDER AND EDUCATIONAL ATTAINMENT
            if (response.gender == "Male" || response.gender == "Female") {
              $("input:radio[name=edit_gender][value=" + response.gender + "]").prop('checked', true);
              if ($('input[name=edit_gender]:checked').val() == "Male") {
                $(".edit-other-gender").val("");
              } else if ($('input[name=edit_gender]:checked').val() == "Female") {
                $(".edit-other-gender").val("");
              }
            } else {
              if ($(".edit-other-gender") != "") {
                $(".edit-other-gender").val(response.gender);
                $("#editMale").prop('checked', false);
                $("#editFemale").prop('checked', false);
              }
            }
            if (response.educational_attainment == "Elementary" || response.educational_attainment == "Secondary" || response.educational_attainment == "Tertiary") {
              $("input:radio[name=edit_education][value=" + response.educational_attainment + "]").prop('checked', true);
              if ($('input[name=edit_education]:checked').val() == "Elementary") {
                $(".edit-other-education").val("");
              } else if ($('input[name=edit_education]:checked').val() == "Secondary") {
                $(".edit-other-education").val("");
              } else if ($('input[name=edit_education]:checked').val() == "Tertiary") {
                $(".edit-other-education").val("");
              }
            } else {
              if ($(".edit-other-education") != "") {
                $(".edit-other-education").val(response.educational_attainment);
                $("#editElementary").prop('checked', false);
                $("#editSecondary").prop('checked', false);
                $("#editTertiary").prop('checked', false);
              }
            }

            // EDIT USERNAME, EMAIL AND PASSWORD
            $(".edit-username").val(response.username);
            $(".edit-email").val(response.email);
            $("#editPassword").val(response.password);

            // APPROVE
            $('#applicantEmail').val(response.email);
            $('#emailAddress').html('Email: ' + response.email);
            // UPDATE ID
            if (response.valid_id == "") {
              $("#validId").attr("src", "../src/valid_id/default_id.png");
            } else {
              $("#validId").attr("src", "../src/valid_id/" + response.valid_id);
            }

            // VENDORS AND HELPERS
            var html = ''
            if (response.row_count < 1) {
              html = '<li class="list-group-item m-0">No Vendor/Helper Found</li>';
            } else {
              $(response.vendor_helper_name).each(function(k, v) {
                html += '<li class="list-group-item d-flex justify-content-between align-items-center"><span>' + v.vendor_helper_name + '</span><span>' + v.role + '</span></li>'
              })
            }
            $('#modalViewVendorHelper ul').html(html)
          },
        });
      }
    });

    // =======================================
    // FOR DATE : CUSTOM SELECT STYLE FOR DATE
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
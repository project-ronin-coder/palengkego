<?php
include '../_session.php';
include '_redirect_stallholder.php';
include 'pages/stallholder_details.php';
include 'pages/stallholder_stallsGetRow.php';
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

    <!-- NAVBAR -->
    <?php include 'pages/navbar.php' ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">My Vendors/Helpers</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Vendors/Helpers</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-11 col-sm-12">
              <div class="card">
                <!-- HEADER -->
                <div class="my-3 mx-3 d-flex justify-content-start align-items-center">
                  <!-- ADD USER -->
                  <button id="addBtn" class="btn-add btn btn-primary">
                    <span class="fa fa-plus pr-2"></span>
                    Add New Vendor/Helper
                  </button>
                  <div class="alert alert-info d-none w-100" id="limitVendorHelper">
                    <h5><i class="icon fas fa-info"></i>Vendor/Helper Limit!</h5>
                    <p>You have reached the limit for adding new vendor/helper</p>
                  </div>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="tableVendorHelper" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Vendor/Helper Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Role</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody id="tableBody">
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_vendor_helper_fetch.php' ?>
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
  </div>

  <?php include 'dist/modal_vendor_helper.php' ?>
  <?php include 'dist/scripts_stallholder.php' ?>
  <script>
    // =======================================
    // FOR NAVBAR : ADD ACTIVE LINK TO NAVBAR
    // =======================================
    $(function() {
      $(document).ready(function() {
        $("#navlinkVendorsHelpers").addClass("active-link");
      });
    });

    // =======================================
    // FOR TABLE : CHECK THE NUMBER OF VENDOR : LIMIT TO 3
    // =======================================
    $(function() {
      var rowCount = $('#tableBody tr').length;
      if (rowCount == 3) {
        $('#addBtn').hide();
        $('#limitVendorHelper').removeClass('d-none');
      } else {
        $('#addBtn').show();
        $('#limitVendorHelper').addClass('d-none');
      }
    });

    // =======================================
    // FOR TABLE : SHOW FUNCTIONALITIES
    // =======================================

    $(function() {
      bsCustomFileInput.init();
      $("#tableVendorHelper").DataTable({
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
    // FOR CRUD : MODAL SHOW
    // =======================================

    $(function() {
      var stallholder_id = <?php echo $stallholder_id ?>;
      $('.stallholder-id').val(stallholder_id)
      // FOR ADD

      // FOR ADD
      $(document).on("click", "#addBtn", function(e) {
        e.preventDefault();
        e.preventDefault();
        $("#modalAddVendorHelper").modal("show");
      });

      // FOR EDIT
      $(document).on("click", ".btn-edit", function(e) {
        e.preventDefault();
        $("#modalEditVendorHelper").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR EDIT
      $(document).on("click", ".btn-delete", function(e) {
        e.preventDefault();
        $("#modalDeleteVendorHelper").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR GETTING DATA FROM DB
      function getRow(id) {
        $.ajax({
          type: "POST",
          url: "_vendor_helper_getRow.php",
          data: {
            id: id,
          },
          dataType: "json",
          success: function(response) {
            $(".vendor-helper-id").val(response.id);
            // EDIT
            $(".edit-vendor-helper-name").val(response.vendor_helper_name);
            $(".edit-vendor-helper-address").val(response.address);
            $(".edit-vendor-helper-contact").val(response.contact_number);
            $("input:radio[name=edit_role][value=" + response.role + "]").prop('checked', true);

            // DELETE
            $("#deleteVendorHelper").html(response.vendor_helper_name);
          },
        });
      }
    })
  </script>
</body>

</html>
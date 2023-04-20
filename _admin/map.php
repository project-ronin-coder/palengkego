<?php
include '../_session.php';
include '_admin_redirect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'pages/header.php';
  include 'dist/styles_map.php';
  ?>
  <style>
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <?php include 'pages/navbar.php' ?>
    <?php include 'pages/sidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Map</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Map</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="card bg-gradient-primary">
          <div class="card-header border-0">
            <h3 class="card-title">
              <i class="fas fa-map-marker-alt mr-1"></i>
              Mariveles Public Market Map
            </h3>
            <div class="card-tools">
              <button type="button" id="btnLegend" class="btn btn-main mr-2">
                <i class="fa fa-info mr-2"></i>
                Legend
              </button>
              <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="w-100">
              <h1 id="sectionTitle" class="text-center">Mariveles Public Market Sections</h1>
            </div>
            <div id="world-map">
              <?php include '../userMap_palengkego.php' ?>
            </div>
          </div>
          <div class="card-footer bg-transparent">
          </div>
        </div>
      </section>
    </div>
    <?php include 'pages/footer.php' ?>

    <!-- MODALS -->
    <?php include 'dist/modal_map.php' ?>
  </div>

  <?php
  include 'dist/scripts.php'
  ?>
  <script src="assets/js/map.js"></script>
  <script>
    // =======================================
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      $("#assign-table").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });
    });

    $(function() {
      bsCustomFileInput.init();
      $("#reassign-table").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });
    });

    // =====================================
    // FOR LEGEND : GUIDE
    // ======================================
    $(function() {
      // SHOW MODAL
      $("#btnLegend").click(function() {
        $("#viewLegend").modal('show');
      });

      // =====================================
      // FOR FILTER : OCCUPIED, UNOCCUPIED, UNFILTER
      // ======================================
      $(function() {
        // OCCUPIED
        $('#btnOccupied').click(function() {
          $('#btnOccupied').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $.ajax({
            url: '_map_getOccupied.php',
            dataType: 'JSON',
            success: (response) => {
              $(response).each(function(key, value) {
                $('#' + value['ref']).toggleClass("fill-assigned")
              })
            }
          })
        });
        // UNOCCUPIED
        $('#btnUnoccupied').click(function() {
          $('#btnUnoccupied').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $(".map-section").toggleClass("fill-unassigned");
          $.ajax({
            url: '_map_getOccupied.php',
            dataType: 'JSON',
            success: (response) => {
              $(response).each(function(key, value) {
                $('#' + value['ref']).removeClass("fill-assigned")
                $('#' + value['ref']).removeClass("fill-unassigned")
              })
            }
          })
        });
      });

      // =====================================
      // FOR FILTER : SECTIONS
      // ======================================
      $(function() {
        // DRY GOODS
        $('#btnDG').click(function() {
          $('#btnDG').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#DryGoods").toggleClass("fill");
        });
        // ANNEX
        $('#btnDGAS').click(function() {
          $('#btnDGAS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#DryGoodsAnnexSection-Muslim").toggleClass("fill");
        });
        // GROCERY
        $('#btnGS').click(function() {
          $('#btnGS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#GrocerySection").toggleClass("fill");
        });
        // GROCERY EXTENSION
        $('#btnGSE').click(function() {
          $('#btnGSE').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#GrocerySection-Extension").toggleClass("fill");
        });
        // FISH 
        $('#btnFS').click(function() {
          $('#btnFS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#FishSection").toggleClass("fill");
        });
        // MEAT
        $('#btnMS').click(function() {
          $('#btnMS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#MeatSection").toggleClass("fill");
        });
        // FRUITS
        $('#btnFRTS').click(function() {
          $('#btnFRTS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#FruitSection").toggleClass("fill");
        });
        // VEGETABLES
        $('#btnVGTS').click(function() {
          $('#btnVGTS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#VegetableSection").toggleClass("fill");
        });
        // FVE
        $('#btnFVE').click(function() {
          $('#btnFVE').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#FruitsAndVegetableSection-Extension").toggleClass("fill");
        });
        // PROCESSED FOODS
        $('#btnPFS').click(function() {
          $('#btnPFS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#ProcessedFoodsSection").toggleClass("fill");
        });
        // CARINDERIA
        $('#btnCS').click(function() {
          $('#btnCS').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#CarinderiaSection").toggleClass("fill");
        });
        // ADMIN
        $('#btnAdmin').click(function() {
          $('#btnAdmin').toggleClass("btn-danger btn-success");
          $("i", this).toggleClass("fa-times fa-check");
          $("#Admin-Office").toggleClass("fill");
        });
      });
    });

    // =====================================
    // FOR POPOVER : DISPLAY SECTION ID
    // ======================================
    $(function() {
      $('.map-section').popover({
        html: true,
        content: fetchID,
        placement: 'top',
        trigger: 'hover'
      });

      function fetchID() {
        var id = $(this).attr("id");
        var section = '<div class="m-0 text-light"><h5 class="m-0">Section: ' + id + '</h5></div>';
        return section;
      }

      $('.modal').on('shown.bs.modal', function(e) {
        $("body").addClass("modal-open")
      });
    })

    // =======================================
    // FOR STALLS : OFFCANVAS SHOW RECORD NO RECORD
    // =======================================
    $(".map-section").click(function() {
      var id = $(this).attr("id");
      $.ajax({
        url: "_map_getRowRecord.php?ref=" + id,
        type: "GET",
        dataType: "JSON",
        success: (response) => {
          if (response.length != 0) {
            // RECORD MODAL
            $("#displayRecordFound").modal('show');
            // ID
            $(".id").val(response[0].id);
            // STALL ID
            $(".stall-id").val(response[0].ref);
            // STALL OWNER ID
            $(".stall-owner-id").val(response[0].stall_holder_id);
            // STALL SECTION ID
            $(".stall-section").val(response[0].stall_id);
            $(".stall-section").html(response[0].stall_id);

            // STALL NAME
            var owner_middle_name = response[0].middle_name;
            var owner_initial = response[0].middle_name.slice(0, 1);
            var owner_middle_initial;
            var stall_owner;

            if (owner_middle_name == "") {
              owner_middle_initial = "";
            } else {
              owner_middle_initial = owner_initial + ".";
            }

            stall_owner = response[0].first_name + " " + owner_middle_initial + " " + response[0].last_name;

            // STALL OWNER
            $(".stallholder").html(stall_owner);

            $(".stall-name").html(response[0].stall_name);
            // STALL PHOTO
            if (response[0].stall_photo == "") {
              $("#stallPhoto").attr("src", "../src/stall_photo/default_stall.png");
            } else {
              $("#stallPhoto").attr("src", "../src/stall_photo/" + response[0].stall_photo);
            }
          } else {
            $.ajax({
              url: "_map_getRowNoRecord.php?ref=" + id,
              type: "GET",
              dataType: "JSON",
              success: (response) => {
                // NO RECORD MODAL
                $("#displayError").modal('show');
                // SECTION ID 
                $(".stall-section").html(response.section);
                $(".stall-id").html(response.stall_id);
                $(".stall-section-id").val(response.ref);
              }
            })
          }
        }
      });
    });

    // =======================================
    // FOR STALLS : ASSIGN, UNASSING, REASSIGN
    // =======================================
    $(function() {
      // UNASSIGN STALL
      $(document).on("click", ".btn-unassign", function(e) {
        e.preventDefault();
        $("#modalUnassignStall").modal("show");
      });

      // REASSING STALL
      $(document).on("click", ".btn-reassign", function(e) {
        e.preventDefault();
        $("#modalReassignStallholder").modal("show");
        var id = $(this).data("id");
        getRowReassign(id);
      });

      // FUNCTION FOR REASSIGN
      function getRowReassign(id) {
        $.ajax({
          type: "POST",
          url: "_map_getRowReassign.php",
          data: {
            id: id,
          },
          dataType: "json",
          success: function(response) {
            $(".stall-id").val(response.id);
            // STALLHOLDER DETAILS
            if (response.stall_photo == "") {
              $("#reassignStallPhoto").attr("src", "../src/stall_photo/default_stall.png");
            } else {
              $("#reassignStallPhoto").attr("src", "../src/stall_photo/" + response.stall_photo);
            }
            // STALL NAME
            if (response.stall_name == "") {
              $("#reassignStallName").html(response.first_name + " " + response.last_name + "\'s Stall");
            } else {
              $("#reassignStallName").html(response.stall_name);
            }
            $('#reassignStallholder').html(response.first_name + ' ' + response.last_name);
            $('#reassignAddress').html(response.address);
            $('#reassignContactNumber').html(response.contact_number);
            $('#reassignEmail').html(response.email);
          },
        });
      }

      // ASSING STALLHOLDER
      $(document).on("click", ".btn-assign", function(e) {
        e.preventDefault();
        $("#modalAssignStallholder").modal("show");
        var id = $(this).data("id");
        getRowAssign(id);
      });

      // FUNCTION FOR ASSIGN
      function getRowAssign(id) {
        $.ajax({
          type: "POST",
          url: "_map_getRowAssign.php",
          data: {
            id: id,
          },
          dataType: "json",
          success: function(response) {
            // STALLHOLDER ID
            $(".stallholder-id").val(response.id);
            // STALLHOLDER DETAILS
            // VALID ID
            $("#photoValidId").attr("src", "../src/valid_id/" + response.valid_id);

            // NAME
            var middle_name = response.middle_name;
            var initial = response.middle_name.slice(0, 1);
            var middle_initial;
            var full_name;

            if (middle_name == "") {
              middle_initial = "";
            } else {
              middle_initial = initial + ".";
            }

            full_name = response.first_name + " " + middle_initial + " " + response.last_name;
            $('#fullName').html(full_name);

            // ADDRESS, CONTACT NUMBER, EMAIL
            $('#address').html(response.address);
            $('#contactNumber').html(response.contact_number);
            $('#email').html(response.email);

            // TEMPORARY STALL NAME
            $(".temp-stall-name").val(full_name + "\'s Stall");
          },
        });
      }
    })
  </script>

</body>

</html>
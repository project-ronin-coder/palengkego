<?php
include '../_session.php';
include '_redirect_stallholder.php';
include 'pages/stallholder_details.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PalengkeGO</title>

  <?php include 'dist/styles_stallholder.php' ?>
  <style>
    .custom-control-input:focus~.custom-control-label::before {
      border-color: #25AB7B !important;
      box-shadow: 0 0 0 0.2rem rgba(37, 171, 123, 0.25) !important;
    }

    .custom-control-input:checked~.custom-control-label::before {
      border-color: #25AB7B !important;
      background-color: #25AB7B !important;
    }

    .custom-control-input:active~.custom-control-label::before {
      background-color: #25AB7B !important;
      border-color: #25AB7B !important;
    }

    .custom-control-input:focus:not(:checked)~.custom-control-label::before {
      border-color: #25AB7B !important;
    }

    .custom-control-input-green:not(:disabled):active~.custom-control-label::before {
      background-color: #25AB7B !important;
      border-color: #25AB7B !important;
    }
  </style>
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
              <h1 class="m-0">My Stalls</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Stalls</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-11 col-sm-12">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-store pr-1"></i>
                    Stalls List
                  </h3>
                </div>
                <div class="card-body row justify-content-center">
                  <?php include 'fetch/_stalls_fetchStalls.php' ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'dist/modal_stalls.php' ?>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>
  </div>
  <?php include 'dist/scripts_stallholder.php' ?>

  <script>
    // =======================================
    // FOR NAVBAR : ADD ACTIVE LINK TO NAVBAR
    // =======================================
    $(function() {
      $(document).ready(function() {
        $("#navlinkStalls").addClass("active-link");
      });
    });
    // =======================================
    // FOR EDIT STALL : SHOW MODAL
    // =======================================
    $(function() {
      // EDIT
      $(document).on("click", ".btn-edit-stall", function(e) {
        e.preventDefault();
        $("#modalEditStall").modal("show");
        var id = $(this).data('id');
        getRow(id);
      });
      // FOR GETTING DATA FROM DB
      function getRow(id) {
        $.ajax({
          type: "POST",
          url: "_stalls_getRow.php",
          data: {
            id: id,
          },
          dataType: "json",
          success: function(response) {
            $(".stall-id").val(response.id);


            // STALL NAME
            if (response.stall_name == "") {
              $("#stallName").html(response.first_name + " " + response.middle_name + " " + response.last_name +
                "\'s Stall");
            } else {
              $("#stallName").html(response.stall_name);
            }
            if (response.stall_photo == "") {
              $("#stallPhoto").attr("src", "../src/stall_photo/default_stall.png");
            } else {
              $("#stallPhoto").attr("src", "../src/stall_photo/" + response.stall_photo);
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
            $('#modalEditStall ul').html(html)

            // EDIT
            $("#editStallName").val(response.stall_name);
            if (response.stall_photo == "") {
              $("#StallPhoto").attr("src", "../src/stall_photo/default_stall.png");
            } else {
              $("#StallPhoto").attr("src", "../src/stall_photo/" + response.stall_photo);
            }

          },
        });
      }
    });

    // =======================================
    // FOR PRODUCTS : LIST ITEM LIMITS
    // =======================================
    $(function() {

      if ($(".products-group").has(".product-item").length == 0) {
        $(".li-redirect").show();
      } else if ($(".products-group").has(".product-item").length > 2) {
        $(".li-redirect").hide();
      }

      $("ul.products-group").each(function() {
        $("li:gt(4)", this).hide();
        $("li:nth-child(5)", this).after(
          "<li class='list-group-item p-0 rounded-0 li-redirect'><button type='submit' class='w-100 btn p-2 m-0 rounded-0 btn-redirect' name='redirect'>See more...</button></li>"
        );
      });

      $("ul.products-group").each(function() {
        $("li:gt(4)", this).hide();
        $("li:last-child", this).after(
          "<li class='list-group-item p-0 rounded-0 li-redirect'><button type='submit' class='w-100 btn p-2 m-0 rounded-0 btn-redirect' name='redirect'>See more...</button></li>"
        );
      });
    });

    // =======================================
    // FOR STALL PHOTO : CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      // FOR CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
      function displayImage(e) {
        if (e.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            document.querySelector('#newStallPhoto').setAttribute('src', e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }
      }
    });
  </script>
</body>

</html>
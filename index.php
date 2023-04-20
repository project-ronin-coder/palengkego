<?php
include '_session.php';

if (isset($_SESSION['user'])) {
  $user_id = $user['id'];
  $user_first_name = $user['first_name'];
  $user_last_name = $user['last_name'];
  $user_name = $user_first_name . " " . $user_last_name;
  $user_username = $user['username'];
  $user_email = $user['email'];
  $user_contact_number = $user['contact_number'];
  $user_profile = (!empty($user['profile_picture'])) ? $user['profile_picture'] : 'default_user.png';
  $user_type = $user['user_type'];
  if ($user_type == 0) {
    $user_type = "User";
  }
} else if (isset($_SESSION['stallholder'])) {

  $stallholder_id = $stallholder['id'];
  $stallholder_username = $stallholder['username'];
  $stallholder_email = $stallholder['email'];

  $middle_name = $stallholder['middle_name'];
  $initial = mb_substr($middle_name, 0, 1);

  if ($stallholder['middle_name'] == "") {
    $middle_initial = "";
  } else {
    $middle_initial = $initial . ".";
  }

  $stallholder_name = $stallholder['first_name'] . " " . $middle_initial . " " . $stallholder['last_name'];
  $stallholder_contact_number = $stallholder['contact_number'];
  $stallholder_address = $stallholder['address'];
  $user_profile = $stallholder['valid_id'];
  // ACCOUNT TYPE
  $user_type = $stallholder['user_type'];
  if ($user_type == 3) {
    $user_type = "Stallholder";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PalengkeGO</title>
  <!-- Title Bar Icon -->
  <link rel="icon" type="image/icon type" href="https://i.ibb.co/8mPFM3W/Palengke-Go-Icon.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- BOOTSTRAP 5 -->
  <link rel="stylesheet" href="plugins/bootstrap5/bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <?php include 'dist/user_style.php' ?>
</head>

<body>
  <div class="map">
    <?php include 'userMap_palengkego.php' ?>
  </div>

  <div class="action-buttons d-flex flex-column">
    <div class="btn-group dropdown">
      <div class="user-icon-container" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="user-icon" src="assets/img/default.png" alt="default user icon" srcset="">
      </div>
      <ul class="dropdown-menu mt-2 me-2">
        <?php
        if (isset($_SESSION['user'])) {
          echo '
          <img src="src/profile/' . $user_profile . '"';
          echo '" class="user-image mx-auto d-block rounded-circle" alt="User Image">
          <li><hr class="dropdown-divider"></li>
          <p class="text-center fs-5 fw-semibold">
            <span>' . $user_name . '</span>
            <br>
          </p>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center user-account fs-5">Account</a></li>
          <li><a class="dropdown-item text-center fs-5" href="logout.php">Logout</a></li>
          ';
        } else if (isset($_SESSION['stallholder'])) {
          echo '
          <img src="src/valid_id/' . $user_profile . '"';
          echo '" class="user-image mx-auto d-block rounded-circle" alt="User Image">
          <li><hr class="dropdown-divider"></li>
          <p class="text-center fs-5 fw-semibold">
            <span>' . $stallholder_name . '</span>
            <br>
            <span class="fw-normal">' . $user_type . '</span>
          </p>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center user-account fs-5">Account</a></li>
          <li><a class="dropdown-item text-center fs-5" href="logout.php">Logout</a></li>
          ';
        } else {
          echo '
          <li><a class="dropdown-item fs-6" href="logout.php">Login or Create an Account</a></li>
          ';
        }
        ?>

      </ul>
    </div>
  </div>

  <div class="controls">
    <button class="btn d-none" type="button" id="btnStartPosition">
      <i class="fa fa-map-marker-alt"></i>
    </button>
    <button class="btn " type="button" id="btnZoomIn">
      <i class="fa fa-plus"></i>
    </button>
    <button class="btn " type="button" id="btnZoomOut">
      <i class="fa fa-minus"></i>
    </button>
    <button class="btn " type="button" id="btnReset">
      <i class="fa fa-sync"></i>
    </button>
  </div>

  <div class="search-buttons d-flex flex-column">
    <div class="d-flex">
      <button type="button" class="btn btn-main rounded-0 rounded-start" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas">
        <i class="fa fa-bars"></i>
      </button>

      <div class="input-group input-group-sm input-search">
        <form class="w-100" action="includes/search_products.inc.php" id="searchProducts" method="POST" enctype="multipart/form-data">
          <input id="inputSearch" type="text" class="form-control border border-white" placeholder="Search for products" name="keyword">
        </form>
      </div>

      <button id="searchButton" type="submit" form="searchProducts" class="btn btn-main rounded-0 rounded-end">
        <i class="fas fa-search"></i>
      </button>
      <button type="button" id="removeSearched" class="btn btn-danger remove-list rounded-0 rounded-end d-none">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="mt-1">
      <ul class="list-group products-view-group rounded-0">
        <?php
        if (isset($_SESSION['search_data'])) {
          $row = $_SESSION['search_data'];
          if ($row['numrows'] < 1) {
            echo '
                  <li class="list-group-item m-0">No Item Found</li>
                ';
          } else {
            try {
              $conn = $pdo->open();
              $stmt = $conn->prepare("
            SELECT 
            prod.id, prod.product_name, prod.stall_id, 
            ss.stall_id as section_id, ss.section,
            sh.first_name, sh.middle_name, sh.last_name,
            so.stall_name

            FROM `products` as prod 

            INNER JOIN stall_section as ss ON prod.section_id = ss.id
            INNER JOIN stalls_owned as so ON prod.stall_id = so.id
            INNER JOIN stall_holders as sh ON prod.stall_holder_id = sh.id

            WHERE product_name 
            LIKE :keyword
            ORDER BY stall_name ASC
            ");
              $stmt->execute(['keyword' => '%' . $_SESSION['keyword'] . '%']);

              foreach ($stmt as $row) {
                echo '
                      <li class="list-group-item m-0 view-product" data-id="' . $row['section_id'] . '">
                        <i class="fas fa-box text-secondary"></i>
                        <span class="fw-bold">' . $row['product_name'] . '</span> from 
                        <span class="fst-italic">' . $row['stall_name'] . '</span>
                      </li>
                    ';
              }
            } catch (PDOException $e) {
              echo '
                    <li class="list-group-item m-0">' . $e->getMessage() . '</li>
                  ';
            }
          }
        }
        $pdo->close();

        ?>
      </ul>
    </div>
  </div>

  <?php include 'dist/user_modal.php' ?>
  <?php include 'dist/user_offcanvas.php' ?>
  <?php include 'dist/user_script.php' ?>
  <script>
    // =======================================
    // SCRIPT TO BE USED BY USERS WITHOUT ACCOUNT
    // =======================================

    // =======================================
    // FOR DOCUMENT READY
    // =======================================
    $(function() {
      $(document).ready(function() {
        // HIDE ROUTE DOTS
        $(".route").hide()
      });
    });

    // =======================================
    // FOR MOBILE : CHANGE OFFCANVAS TO BOTTOM
    // =======================================
    $(function() {
      if ($(window).width() > 768) {
        $('.offcanvas-navbar-menu').removeClass('offcanvas-bottom').addClass('offcanvas-start');
        $('.offcanvas-stall').removeClass('offcanvas-bottom').addClass('offcanvas-start');
        $('#btnLoginCreate').addClass("d-none");
      } else {
        $('.offcanvas-navbar-menu').removeClass('offcanvas-start').addClass('offcanvas-bottom');
        $('.offcanvas-stall').removeClass('offcanvas-start').addClass('offcanvas-bottom');
        $('#btnLoginCreate').removeClass("d-none");
      }
    })

    // =======================================
    // FOR STALLS : LIVE SEARCHING OF STALLS
    // =======================================
    $(function() {
      $("#searchStalls").keyup(function() {
        var input = $(this).val();
        // alert(input);
        if (input != "") {
          $.ajax({
            url: "includes/search_stalls.inc.php",
            method: "POST",
            data: {
              input: input
            },
            success: function(data) {
              $("#searchResult").html(data);
            }
          })
        } else {
          $("#searchResult").html('')
        }
      })
    })

    // =======================================
    // FOR MAP : PANNING AND ZOOMING
    // =======================================
    $(function() {
      var eventsHandler;
      var beforePan;
      var palengkeGOMap;

      // USING PANZOOM
      beforePan = function(oldPan, newPan) {
        var stopHorizontal = false,
          stopVertical = false,
          gutterWidth = 100,
          gutterHeight = 500,
          // Computed variables
          sizes = this.getSizes(),
          leftLimit = -((sizes.viewBox.x + sizes.viewBox.width) * sizes.realZoom) +
          gutterWidth,
          rightLimit = sizes.width - gutterWidth - sizes.viewBox.x * sizes.realZoom,
          topLimit = -((sizes.viewBox.y + sizes.viewBox.height) * sizes.realZoom) +
          gutterHeight,
          bottomLimit =
          sizes.height - gutterHeight - sizes.viewBox.y * sizes.realZoom;

        customPan = {};
        customPan.x = Math.max(leftLimit, Math.min(rightLimit, newPan.x));
        customPan.y = Math.max(topLimit, Math.min(bottomLimit, newPan.y));

        return customPan;
      };

      // USING HAMMER JS
      eventsHandler = {
        haltEventListeners: ['touchstart', 'touchend', 'touchmove', 'touchleave', 'touchcancel'],
        init: function(options) {
          var instance = options.instance,
            initialScale = 1,
            pannedX = 0,
            pannedY = 0

          // Init Hammer
          // Listen only for pointer and touch events
          this.hammer = Hammer(options.svgElement, {
            inputClass: Hammer.SUPPORT_POINTER_EVENTS ? Hammer.PointerEventInput : Hammer.TouchInput
          })

          // Enable pinch
          this.hammer.get('pinch').set({
            enable: true
          })

          // Handle double tap
          this.hammer.on('doubletap', function(ev) {
            instance.zoomIn()
          })

          // Handle pan
          this.hammer.on('panstart panmove', function(ev) {
            // On pan start reset panned variables
            if (ev.type === 'panstart') {
              pannedX = 0
              pannedY = 0
            }

            // Pan only the difference
            instance.panBy({
              x: ev.deltaX - pannedX,
              y: ev.deltaY - pannedY
            })
            pannedX = ev.deltaX
            pannedY = ev.deltaY
          })

          // Handle pinch
          this.hammer.on('pinchstart pinchmove', function(ev) {
            // On pinch start remember initial zoom
            if (ev.type === 'pinchstart') {
              initialScale = instance.getZoom()
              instance.zoomAtPoint(initialScale * ev.scale, {
                x: ev.center.x,
                y: ev.center.y
              })
            }

            instance.zoomAtPoint(initialScale * ev.scale, {
              x: ev.center.x,
              y: ev.center.y
            })
          })

          // Prevent moving the page on some devices when panning over SVG
          options.svgElement.addEventListener('touchmove', function(e) {
            e.preventDefault();
          });
        },
        destroy: function() {
          this.hammer.destroy()
        }
      }

      // INITIATE PANZOOM ON MAP 
      palengkeGOMap = svgPanZoom("#PalengkeGoMap", {
        zoomEnabled: true,
        controlIconsEnabled: false,
        fit: 1,
        center: 1,
        beforePan: beforePan,
        customEventsHandler: eventsHandler
      });

      // MAP CONTROLS: ZOOM IN, ZOOM OUT, RESET
      document.getElementById("btnZoomIn").addEventListener("click", function(ev) {
        ev.preventDefault();

        palengkeGOMap.zoomIn();
      });

      document.getElementById("btnZoomOut").addEventListener("click", function(ev) {
        ev.preventDefault();

        palengkeGOMap.zoomOut();
      });

      document.getElementById("btnReset").addEventListener("click", function(ev) {
        ev.preventDefault();

        palengkeGOMap.resetZoom();
        palengkeGOMap.fit();
        palengkeGOMap.center();
      });
    })

    // =======================================
    // FOR FILTER : BUTTONS FOR FILTERING SECTIONS
    // =======================================
    $(function() {
      // DRY GOODS 
      $('#btnDG').click(function() {
        $('#btnDG').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#DryGoods").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // DRY GOODS ANNEX
      $('#btnDGAS').click(function() {
        $('#btnDGAS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#DryGoodsAnnexSection-Muslim").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // GROCERY 
      $('#btnGS').click(function() {
        $('#btnGS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#GrocerySection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // GROCERY EXTENSION
      $('#btnGSE').click(function() {
        $('#btnGSE').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#GrocerySection-Extension").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // FISH
      $('#btnFS').click(function() {
        $('#btnFS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#FishSection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // MEAT
      $('#btnMS').click(function() {
        $('#btnMS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#MeatSection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // FRUITS
      $('#btnFRTS').click(function() {
        $('#btnFRTS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#FruitSection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // VEGETABLES
      $('#btnVGTS').click(function() {
        $('#btnVGTS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#VegetableSection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // FVE
      $('#btnFVE').click(function() {
        $('#btnFVE').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#FruitsAndVegetableSection-Extension").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // PROCESSED FOODS
      $('#btnPFS').click(function() {
        $('#btnPFS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#ProcessedFoodsSection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // CARINDERIA
      $('#btnCS').click(function() {
        $('#btnCS').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#CarinderiaSection").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });

      // ADMIN
      $('#btnAdmin').click(function() {
        $('#btnAdmin').toggleClass("btn-danger btn-success");
        $("i", this).toggleClass("fa-times fa-check");
        $("#Admin-Office").toggleClass("fill");

        // REMOVE ROUTE LINES
        $('.stall-route').remove();
        // REMOVE ROUTE DOTS
        $(".route").hide()
        // REMOVE SECTION FILLS
        $('.map-section').removeClass("fill-assigned");
        // REMOVE BTN DIRECTIONS DISABLE
        $('.btn-directions').removeAttr('disabled');
      });
    });

    // =======================================
    // FOR NAVBAR MENU : OFFCANVAS SHOW
    // =======================================
    $(function() {
      $("#btnStalls").click(function() {
        $("#stallsOffcanvas").offcanvas('show');
        $("#navbarOffcanvas").offcanvas('hide');
      });

      $("#btnFilter").click(function() {
        $("#filterOffcanvas").offcanvas('show');
        $("#navbarOffcanvas").offcanvas('hide');
      });
      $("#btnGuide").click(function() {
        $("#GuideOffcanvas").offcanvas('show');
        $("#navbarOffcanvas").offcanvas('hide');
      });
      $("#btnAbout").click(function() {
        $("#AboutOffcanvas").offcanvas('show');
        $("#navbarOffcanvas").offcanvas('hide');
      });
    });

    // =======================================
    // FOR PRODUCTS SEARCH
    // =======================================
    $(function() {
      // LIMITING PRODUCTS SHOWN
      $("ul.products-view-group").each(function() {
        $("li:gt(3)", this).hide(); /* :gt() is zero-indexed */
        $("li:nth-child(4)", this).after(
          "<li class='list-group-item p-0 rounded-0 li-redirect'><button type='submit' class='w-100 btn p-2 m-0 rounded-0 btn-search-results' name='redirect'>See more...</button></li>"
        );
      });

      // DISPLAY ALL PRODUCTS SEARCHED
      $(document).on("click", ".btn-search-results", function(e) {
        e.preventDefault();
        $("#displaySearch").modal('show');
      });

      // FOR LOCATING STALL OF PRODUCT
      $(document).on("click", ".view-product", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $('.map-section').removeClass("fill-assigned");
        $('#' + id).addClass("fill-assigned");
        $('#removeSearched').removeClass("d-none");
        $('#searchButton').removeClass("rounded-end");
      });

      // FOR REMOVING SEARCH|DIRECTIONS|STALLS
      $(document).on("click", ".remove-list", function(e) {
        // REMOVE
        $('.products-view-group li').remove();
        $('.stall-route').remove();
        $('.route').remove();

        // ADD CLASS
        $('#removeSearched').addClass("d-none");
        $('#searchButton').addClass("rounded-end");

        // REMOVE CLASS
        $('.map-section').removeClass("fill-assigned");
        $('.map-section').removeClass("fill-assigned");

        // REMOVE ATTR
        $('.btn-directions').removeAttr('disabled');

        <?php
        unset($_SESSION['keyword']);
        unset($_SESSION['search_data']);
        unset($_SESSION['search_count']);
        ?>
      });
    });

    // =======================================
    // FOR STALLS : OFFCANVAS SHOW RECORD NO RECORD
    // =======================================

    $(function() {
      $(document).on("click", ".map-section", function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        $.ajax({
          url: "includes/getRecordStallDetails.inc.php?ref=" + id,
          type: "GET",
          dataType: "JSON",
          success: (response) => {
            if (response.length != 0) {
              // STALLS OWNED: OFF CANVAS SHOW
              $("#stallOwnedOffcanvas").offcanvas('show');
              // STALL DETAILS

              // ID
              $(".id").val(response[0].id);

              // STALL OWNER NAME
              $stall_owner = response[0].first_name + " " + response[0].last_name;
              $(".stallholder").html($stall_owner);

              // STALL ID
              $(".stall-id").val(response[0].stall_id);
              $(".stall-id").html(response[0].stall_id);

              // STALL OWNER ID
              $(".stall-owner-id").val(response[0].stall_holder_id);

              // STALL SECTION ID
              $(".stall-section").val(response[0].section);
              $(".stall-section").html(response[0].section);

              // STALL NAME
              if (response[0].stall_name == "") {
                $(".stall-name").html($stall_owner + "\'s Stall");
              } else {
                $(".stall-name").html(response[0].stall_name);
              }

              // STALL PHOTO
              if (response[0].stall_photo == "") {
                $(".stall-photo").attr("src", "src/stall_photo/default_stall.png");
              } else {
                $(".stall-photo").attr("src", "src/stall_photo/" + response[0].stall_photo);
              }

              // PRODUCTS VIEW GROUP
              var products_group = '';
              var products_view_group = '';
              if (response[0].products_row_count < 1) {
                products_group = '<li class="list-group-item">No Products Found</li>';
                products_view_group = '<li class="list-group-item">No Products Found</li>';
              } else {
                $(response[0].product_name).each(function(k, v) {
                  products_group += '<li class="list-group-item m-0">' + v.product_name + '</li>'
                  products_view_group += '<li class="list-group-item m-0">' + v.product_name + '</li>'
                })
              }

              // APPEND ALL PRODUCTS
              $('.products-group').html(products_group);
              $('#displayProducts ul').html(products_view_group);

              // VENDOR HELPER GROUP
              var vendor_helper_group = '';
              if (response[0].vendor_row_count < 1) {
                vendor_helper_group = '<li class="list-group-item">No Vendors/Helpers Found</li>';
              } else {

                $(response[0].vendor_helper_name).each(function(k, v) {
                  vendor_helper_group += '<li class="list-group-item d-flex justify-content-between align-items-center"><span>' + v.vendor_helper_name + '</span><span>' + v.role + '</span></li>'
                })
              }

              // APPEND ALL VENDORS/HELPERS
              $('.vendor-helper-group').html(vendor_helper_group);


              // LIMIT PRODUCTS VIEW
              $(function() {
                $("ul.products-group").each(function() {
                  $("li:gt(4)", this).hide(); /* :gt() is zero-indexed */
                  $("li:nth-child(5)", this).after(
                    "<li class='list-group-item p-0 rounded-0 li-redirect'><button type='submit' class='w-100 btn p-2 m-0 rounded-0 btn-redirect' name='redirect'>See more...</button></li>"
                  );
                });
              });
            } else {
              $.ajax({
                url: "includes/getNoRecordStall.inc.php?ref=" + id,
                type: "GET",
                dataType: "JSON",
                success: (response) => {
                  // SHOW NO RECORD DETAILS
                  $("#stallNoRecordOffcanvas").offcanvas('show');
                  $(".stall-section").html(response.section);
                  $(".stall-id").html(response.stall_id);
                  $(".stall-section-id").val(response.ref);
                }
              })
            }
          }
        });
      });
      // FOR SHOWING ALL PRODUCTS
      $(document).on("click", ".btn-redirect", function(e) {
        e.preventDefault();
        $("#displayProducts").modal('show');
      });
    });

    // =======================================
    // FOR ALGORITHM: DRAW PLOT
    // =======================================
    function drawIt(svg, points) {
      var NS = "http://www.w3.org/2000/svg";
      var ll = document.createElementNS(NS, "polyline")
      $(ll).attr({
        points: points
      }).css({
        "stroke-width": "5px",
        "stroke": "#000"
      });
      $(ll).addClass("cls-1 stall-route");
      $(svg).append(ll);
      return ll
    }

    function plotter(svg, start_x, start_y, destination_x, destination_y) {
      if (start_x < destination_x) {
        // ROUTE WILL GO TO RIGHT
        var route_right = []

        // CHECK THE ROUTE 
        $('.route[cy="' + start_y + '"]').each(function() {
          var x = $(this).attr('cx')
          if (destination_x >= x) {
            route_right.push([start_y, x])
          }
        })

        // SORT THE ROUTE
        route_right.sort(([a, b], [c, d]) => c - a || b - d);
        console.log(route_right)
        var i_target_x = route_right[route_right.length - 1][1]
        var i_target_y = route_right[route_right.length - 1][0]
        // DRAW THE ROUTE
        drawIt(svg, start_x + ' ' + start_y + ' ' + i_target_x + ' ' + i_target_y);

        if (start_y > destination_y) {
          // ROUTE WILL GO UP
          var route_up = []

          // CHECK THE ROUTE
          $('.route[cx="' + i_target_x + '"]').each(function() {
            var y = $(this).attr('cy')
            if ((destination_y <= +y)) {
              route_up.push([i_target_x, y])
            }
          })

          // SORT THE ROUTE
          route_up.sort(([a, b], [c, d]) => c - a || b - d);

          // CREATE NEW ROUTE
          var new_route = []
          route_up.forEach(function(v, k) {
            if (i_target_y >= +v[1]) {
              new_route.push(v[1])
            }
          })

          // DRAW THE ROUTE
          drawIt(svg, i_target_x + ' ' + i_target_y + ' ' + i_target_x + ' ' + new_route[0]);

          // EXECUTE PLOT
          plotter(svg, i_target_x, new_route[0], destination_x, destination_y);
        } else {
          // ROUTE WILL GO UP
          var route_down = []

          // CHECK THE ROUTE
          $('.route[cx="' + i_target_x + '"]').each(function() {
            var y = $(this).attr('cy')
            if ((destination_y <= +y)) {
              route_down.push([i_target_x, y])
            }
          })

          // SORT THE ROUTE
          route_down.sort(([a, b], [c, d]) => c - a || b - d);

          // CREATE NEW ROUTE
          var new_route = []
          route_down.forEach(function(v, k) {
            if (i_target_y <= +v[1]) {
              new_route.push(v[1])
            }
          })

          // DRAW THE ROUTE
          drawIt(svg, i_target_x + ' ' + i_target_y + ' ' + i_target_x + ' ' + new_route[0]);

          // EXECUTE PLOT
          plotter(svg, i_target_x, new_route[0], destination_x, destination_y);
        }
      } else {
        // ROUTE WILL GO UP
        var route_up = []

        // CHECK THE ROUTE
        $('.route[cx="' + start_x + '"]').each(function() {
          var y = $(this).attr('cy')
          if ((destination_y <= +y)) {
            route_up.push([start_x, y])
          }
        })
        // SORT THE ROUTE
        route_up.sort(([c, d], [a, b]) => c - a || b - d);

        console.log(route_up)
        var i_target_x = route_up[route_up.length - 1][0]
        var i_target_y = route_up[route_up.length - 1][1]

        // DRAW THE ROUTE
        drawIt(svg, start_x + ' ' + start_y + ' ' + i_target_x + ' ' + i_target_y);

        if (start_y > destination_y) {
          var route_left = []
          $('.route[cy="' + i_target_y + '"]').each(function() {
            var x = $(this).attr('cx')
            if ((destination_x <= +x)) {
              route_left.push([x, i_target_y])
            }
          })
          // SORT THE ROUTE
          route_left.sort(([a, b], [c, d]) => c - a || b - d);
          var new_target_x = route_left[route_left.length - 1][0]
          var new_target_y = route_left[route_left.length - 1][1]
          console.log(route_left)
          console.log(new_target_x)
          console.log(new_target_y)
          drawIt(svg, i_target_x + ' ' + i_target_y + ' ' + new_target_x + ' ' + new_target_y);

          console.log(new_route)

          // // DRAW THE ROUTE
          drawIt(svg, new_target_x + ' ' + new_target_y + ' ' + new_target_x + ' ' + destination_y);

        }
      }
    }

    $("#Admin-Office").click(function() {
      $("#productList").html('Services Offered');
    })
  </script>
</body>

</html>
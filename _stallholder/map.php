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
  <?php include 'dist/styles_map.php' ?>
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
              <h1 class="m-0">Mariveles Public Market Map <small>by PalengkeGO</small></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Map</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="card card-outline-main card-outline">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title m-0 mr-auto">Vacant Stalls</h5>
              <a type="button" id="btnLegend" class="btn btn-main">
                <i class="fa fa-info mr-2"></i>
                Legend
              </a>
            </div>
            <div class="card-body map-container">
              <div class="map">
                <?php include '../userMap_palengkego.php' ?>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <button id="btnZoomIn" class="btn btn-main mr-2">Zoom In</button>
              <button id="btnZoomOut" class="btn btn-main mr-2">Zoom Out</button>
              <button id="btnReset" class="btn btn-main mr-2">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>
  </div>

  <?php include 'dist/modal_map.php' ?>
  <?php include 'dist/scripts_stallholder.php' ?>
  <!-- PANZOOM -->
  <script src="../plugins/panzoom/svg-pan-zoom.min.js"></script>
  <!-- HAMMER JS -->
  <script src="../plugins/hammerjs/hammer.js"></script>
  <script>
    // =======================================
    // FOR NAVBAR : ADD ACTIVE LINK TO NAVBAR
    // =======================================
    $(function() {
      $(document).ready(function() {
        $("#navlinkMap").addClass("active-link");
      });
    });

    // =======================================
    // FOR LEGEND : FILTERING SECTIONS
    // =======================================
    $(function() {

      $("#btnLegend").click(function() {
        $("#viewLegend").modal('show');
      });
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

    // =======================================
    // FOR OCCUPIED: SHOW OCCUPIED
    // =======================================
    $(function() {
      $.ajax({
        url: '_map_getOccupied.php',
        dataType: 'JSON',
        success: (response) => {
          $(response).each(function(key, value) {
            $('#' + value['ref']).addClass("fill-assigned")
          })
        }
      })
    });

    // =======================================
    // FOR POPOVER: DISPLAY SECTION NAME
    // =======================================
    $(function() {
      $('.map-section').popover({
        html: true,
        content: fetchID,
        placement: 'top',
        trigger: 'hover'
      });

      function fetchID() {
        var id = $(this).attr("id");
        var section = '<div class="m-0 text-dark"><h5 class="m-0">Section: ' + id + '</h5></div>';
        return section;
      }
    });

    // =======================================
    // FOR MAP: PAN AND ZOOM
    // =======================================
    $(function() {
      var eventsHandler;
      var beforePan;
      var palengkeGOMap;

      beforePan = function(oldPan, newPan) {
        var stopHorizontal = false,
          stopVertical = false,
          gutterWidth = 200,
          gutterHeight = 200,
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
          }

          ,
        destroy: function() {
          this.hammer.destroy()
        }
      }
      palengkeGOMap = svgPanZoom("#PalengkeGoMap", {
        zoomEnabled: true,
        controlIconsEnabled: false,
        fit: 1,
        center: 1,
        customEventsHandler: eventsHandler
      });

      // FOR ZOOM IN
      document.getElementById("btnZoomIn").addEventListener("click", function(ev) {
        ev.preventDefault();

        palengkeGOMap.zoomIn();
      });

      // FOR ZOOM OUT
      document.getElementById("btnZoomOut").addEventListener("click", function(ev) {
        ev.preventDefault();

        palengkeGOMap.zoomOut();
      });

      // FOR RESET
      document.getElementById("btnReset").addEventListener("click", function(ev) {
        ev.preventDefault();

        palengkeGOMap.resetZoom();
        palengkeGOMap.fit();
        palengkeGOMap.center();
      });
    })
  </script>
</body>

</html>
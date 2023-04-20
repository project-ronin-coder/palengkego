<!-- JQUERY -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- BOOTSTRAP 4 WITH POPPER-->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/adminlte/js/adminlte.min.js"></script>
<!-- MAIN SCRIPT -->
<!-- <script src="../assets/js/admin_script.js"></script> -->
<!-- PANZOOM -->
<script src="../plugins/panzoom/svg-pan-zoom.min.js"></script>
<!-- HAMMER JS -->
<script src="../plugins/hammerjs/hammer.js"></script>

<script>
  $(function() {
    var eventsHandler;
    var beforePan;

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
    svgPanZoom("#PalengkeGoMap", {
      zoomEnabled: true,
      controlIconsEnabled: true,
      fit: 1,
      center: 1,
      customEventsHandler: eventsHandler
    });
  })

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(function() {
    $('[data-toggle="popover"]').popover()
  })

  $("#store-icon").click(function() {
    icon = $(this).find("i");
    if (icon.hasClass("fa-angle-left")) {
      icon.addClass("fa-angle-down").removeClass("fa-angle-left");
    } else {
      icon.addClass("fa-angle-left").removeClass("fa-angle-down");
    }
  });

  $(function() {
    /** add active class and stay opened when selected */
    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $("ul.sidebar-menu a")
      .filter(function() {
        return this.href == url;
      })
      .parent()
      .addClass("active-style");
    // for treeview
    $("ul.treeview-menu a")
      .filter(function() {
        return this.href == url;
      })
      .parent()
      .addClass("active-style");
  });
</script>

<!-- FOR SUCCESS MESSAGE -->

<?php
if (isset($_SESSION['success'])) {
?>
  <script>
    var Toast = Swal.mixin({
      toast: true,
      showCloseButton: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      icon: "success",
    });

    Toast.fire({
      title: '<h3 style="margin: 0; text-align: center; color: #28A745;"><?php echo $_SESSION['success']; ?></h3>',
      html: '<p style="margin: 0; text-align: center; font-size: large;"><?php echo $_SESSION['message']; ?></p>',
    });
  </script>
  ";
<?php
  unset($_SESSION['success']);
  unset($_SESSION['message']);
}
?>

<!-- FOR ERROR -->

<?php
if (isset($_SESSION['error'])) {
?>
  <script>
    var Toast = Swal.mixin({
      toast: true,
      showCloseButton: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      icon: "error",
    });

    Toast.fire({
      title: '<h3 style="margin: 0; text-align: center; color: #C82333;"><?php echo $_SESSION['error']; ?></h3>',
      html: '<p style="margin: 0; text-align: center; font-size: large;"><?php echo $_SESSION['message']; ?></p>',
    });
  </script>
  ";
<?php
  unset($_SESSION['error']);
  unset($_SESSION['message']);
}
?>

<!-- FOR INFO -->

<?php
if (isset($_SESSION['info'])) {
?>
  <script>
    var Toast = Swal.mixin({
      toast: true,
      showCloseButton: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      icon: "info",
    });

    Toast.fire({
      title: '<h3 style="margin: 0; text-align: center; color: #17A2B8;"><?php echo $_SESSION['info']; ?></h3>',
      html: '<p style="margin: 0; text-align: center; font-size: large;"><?php echo $_SESSION['message']; ?></p>',
    });
  </script>
  ";
<?php
  unset($_SESSION['info']);
  unset($_SESSION['message']);
}
?>
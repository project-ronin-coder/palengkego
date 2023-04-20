<!-- JQUERY -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- BOOTSTRAP 4 WITH POPPER-->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
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
<!-- dropzonejs -->
<script src="../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/adminlte/js/adminlte.min.js"></script>
<!-- MAIN SCRIPT -->
<script src="../assets/js/script.js"></script>
<!-- FOR SUCCESS MESSAGE -->

<?php
if (isset($_SESSION['success'])) {
?>
  <script>
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showCloseButton: true,
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
      position: 'top-end',
      showCloseButton: true,
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
      position: 'top-end',
      showCloseButton: true,
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
<?php
  unset($_SESSION['info']);
  unset($_SESSION['message']);
}
?>
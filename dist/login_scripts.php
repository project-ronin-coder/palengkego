<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- POPPER -->
<script src="plugins/popper/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/adminlte/js/adminlte.min.js"></script>
<!-- SCRIPTS -->
<script src="assets/js/script.js"></script>
<script>
  $(document).ready(function() {

    $(".show-hide-pass").click(function() {
      let password = $(".password");
      let retype_password = $(".retype-password");
      let label_pass = $(".label-password");
      if (password.attr("type") == "password") {
        password.attr("type", "text");
        retype_password.attr("type", "text");
        label_pass.text("Hide Password");
      } else {
        password.attr("type", "password");
        retype_password.attr("type", "password");
        label_pass.text("Show Password");
      }
    });
  });
</script>

<script>
  // REMOVE ERROR/SUCCESS MESSAGE AFTER 3 SECONDS
  setTimeout(function() {
    if ($('#message').length > 0) {
      $('#message').remove();
    }
  }, 5000)
  setTimeout(function() {
    if ($('.invalid-username').length > 0) {
      $('.invalid-username').remove();
    }
  }, 5000)
</script>

<!-- FOR SUCCESS MESSAGE -->

<?php
if (isset($_SESSION['success'])) {
?>
  <script>
    var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      icon: "success",
    });

    Toast.fire({
      title: '<h4 style="margin: 0; text-align: center; color: #28A745;"><?php echo $_SESSION['success']; ?></h4>',
      html: '<p style="margin: 0; text-align: center; font-size: medium;"><?php echo $_SESSION['message']; ?></p>',
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
      position: 'top',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      icon: "error",
    });

    Toast.fire({
      title: '<h4 style="margin: 0; text-align: center; color: #C82333;"><?php echo $_SESSION['error']; ?></h4>',
      html: '<p style="margin: 0; text-align: center; font-size: medium;"><?php echo $_SESSION['message']; ?></p>',
    });
  </script>
<?php
  unset($_SESSION['error']);
  unset($_SESSION['message']);
}
?>
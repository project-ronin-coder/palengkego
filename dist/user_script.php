  <!-- JQUERY -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap5/popper.min.js"></script>
  <script src="plugins/bootstrap5/bootstrap.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <!-- Panzoom -->
  <script src="plugins/panzoom/svg-pan-zoom.min.js"></script>
  <!-- Hammer JS -->
  <script src="plugins/hammerjs/hammer.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <?php
  // =======================================
  // SCRIPT TO BE USED BY USERS WITH ACCOUNT
  // =======================================

  if (isset($_SESSION['user'])) {
  ?>
    <script>
      var user_id = <?php echo $user_id ?>;
      $(".user-id").val(user_id);

      // =======================================
      // FOR DIRECTIONS : SHOWING AND LOCATION STALLS
      // =======================================
      $(".btn-directions").click(function() {
        var stall_id = $("#stallId").html();
        var route_id = "route-" + stall_id
        var x = $("#route-" + stall_id).attr("cx")
        var y = $("#route-" + stall_id).attr("cy")

        $(".route").attr("r", "3");

        // SHOW ADMIN OFFICE ROUTE
        $("#route-Admin-Office").show()
        // SHOW DIRECTION ROUTE
        $("#route-" + stall_id).show()
        // HIDE OFFCANVAS
        $("#stallNoRecordOffcanvas").offcanvas('hide');
        $("#stallOwnedOffcanvas").offcanvas('hide');
        // REMOVE CLASSES
        $('#removeSearched').removeClass("d-none");
        $('#searchButton').removeClass("rounded-end");
        $("#DryGoods").removeClass("fill");
        $('.map-section').removeClass("fill-assigned");
        // ADD CLASSES
        $('#' + stall_id).addClass("fill-assigned");
        // DISABLE DIRECTION BUTTONS
        $('.btn-directions').attr('disabled', 'disabled');
        // DRAW LINE
        $(function() {
          var svg = document.getElementsByClassName("svg-pan-zoom_viewport");
          var start_x = 2275
          var start_y = 810
          var destination_x = x
          var destination_y = y
          plotter(svg, start_x, start_y, destination_x, destination_y);
        });
      })

      // =======================================
      // FOR DIRECTIONS : LIVE SEARCHING OF STALLS
      // =======================================
      $(function() {
        $("#directionSearchStalls").keyup(function() {
          var input = $(this).val();
          // alert(input);
          if (input != "") {
            $.ajax({
              url: "includes/directions_stalls.inc.php",
              method: "POST",
              data: {
                input: input
              },
              success: function(data) {
                $("#directionSearchResults").html(data);
              }
            })
          } else {
            $("#directionSearchResults").html('')
          }
        })

        // FOR GETTING STALL NAME VALUE
        $(document).on("click", ".get-stall", function(e) {
          e.preventDefault();
          var stall_id = $(this).data("id");
          var stall_name = $(this).data("name");
          // alert(stall_name);
          $("#directionSearchStalls").val(stall_name)

          // FOR LOCATING THE DIRECTION OF THE STALL
          $("#btnLocateStall").click(function() {
            var route_id = "route-" + stall_id
            // GET X AND Y VALUE
            var x = $("#route-" + stall_id).attr("cx")
            var y = $("#route-" + stall_id).attr("cy")

            // CHANGE ROUTE RADIUS TO 5
            $(".route").attr("r", "5");

            // SHOW ROUTE 
            $("#route-Admin-Office").show()
            $("#route-" + stall_id).show()

            // HIDE DIRECTIONS OFF CANVAS
            $("#directionsOffcanvas").offcanvas('hide');

            // REMOVE CLASSES
            $('#removeSearched').removeClass("d-none");
            $('#searchButton').removeClass("rounded-end");
            $("#DryGoods").removeClass("fill");
            $('.map-section').removeClass("fill-assigned");

            // ADD CLASSES
            $('#' + stall_id).addClass("fill-assigned");

            // DISABLE BUTTON
            $('#btnLocateStall').attr('disabled', 'disabled');

            // DRAW THE DIRECTION
            $(function() {
              var svg = document.getElementsByClassName("svg-pan-zoom_viewport");
              var start_x = 2275
              var start_y = 810
              var destination_x = x
              var destination_y = y
              plotter(svg, start_x, start_y, destination_x, destination_y);
            });
          });
        });
      })

      // =======================================
      // FOR EDIT ACCOUNT : MODAL SHOW
      // =======================================
      $(function() {

        // FOR PERSONAL DETAILS
        $(document).on("click", "#btnPersonalDetails", function(e) {
          e.preventDefault();
          $("#editUserPersonalDetails").modal('show');
          getUserRow(user_id);
        });

        // FOR EMAIL UPDATE
        $(document).on("click", "#btnUpdateUsername", function(e) {
          e.preventDefault();
          $("#updateUsername").modal('show');
          getUserRow(user_id);
        });

        // FOR EMAIL UPDATE
        $(document).on("click", "#btnUpdateEmail", function(e) {
          e.preventDefault();
          $("#updateUserEmail").modal('show');
          getUserRow(user_id);
        });

        // FOR PASSWORD CHANGE
        $(document).on("click", "#btnChangePassword", function(e) {
          e.preventDefault();
          $("#changeUserPassword").modal('show');
          getUserRow(user_id);
        });

        // FOR PROFILE CHANGE
        $(document).on("click", "#btnProfilePicture", function(e) {
          e.preventDefault();
          $("#editUserProfilePicture").modal('show');
          getUserRow(user_id)
        });

        // FOR DEACTIVATE ACCOUNT
        $(document).on("click", "#btnDeactivateAccount", function(e) {
          e.preventDefault();
          $("#deactivateUserAccount").modal('show');
          getUserRow(user_id)
        });

        // FUNCTION FOR USERS ROW
        function getUserRow(id) {
          $.ajax({
            type: "POST",
            url: "_users_getRow.php",
            data: {
              id: id,
            },
            dataType: "json",
            success: function(response) {
              $('#username').val(response.username);
              $('#userEmail').val(response.email);
              $('#userFirstName').val(response.first_name);
              $('#userLastName').val(response.last_name);
              $('#userContactNumber').val(response.contact_number);

              if (response.profile_picture == "") {
                $("#updateProfilePicture").attr("src", "src/profile/default_user.png");
              } else {
                $("#updateProfilePicture").attr("src", "src/profile/" + response.profile_picture);
              }
            },
          });
        }

        // FOR SHOWING PASSWORD
        $(function() {
          let password = $("#userPassword");
          let label_pass = $("#labelShowPassword");
          $("#showPassword").click(function() {
            if (password.attr("type") == "password") {
              password.attr("type", "text");
              label_pass.text("Hide Password");
            } else {
              password.attr("type", "password");
              label_pass.text("Show Password");
            }
          });
        });

        // FOR CHANGING DISPLAY IMAGE
        function displayImage(e) {
          if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              document.querySelector('#updateProfilePicture').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
          }
        }
      })

      // =======================================
      // FOR NAVBAR MENU : OFFCANVAS SHOW
      // =======================================
      $(function() {
        // NAVBAR MENU : DIRECTIONS
        $(document).on("click", "#btnDirections", function(e) {
          e.preventDefault();
          $("#directionsOffcanvas").offcanvas('show');
          $("#navbarOffcanvas").offcanvas('hide');
        });

        // NAVBAR MENU : ACCOUNT
        $(document).on("click", "#btnAccount", function(e) {
          e.preventDefault();
          $("#accountOffcanvas").offcanvas('show');
          $("#navbarOffcanvas").offcanvas('hide');
        });

        $(".user-account").click(function() {
          $("#accountOffcanvas").offcanvas('show');
          $("#navbarOffcanvas").offcanvas('hide');
        });
      })
    </script>
  <?php

    // =======================================
    // SCRIPT TO BE USED BY STALLHOLDER
    // =======================================

  } else if (isset($_SESSION['stallholder'])) {
  ?>
    <script>
      var user_id = <?php echo $stallholder_id ?>;
      $(".user-id").val(user_id);

      // =======================================
      // FOR DIRECTIONS : SHOWING AND LOCATION STALLS
      // =======================================
      $(".btn-directions").click(function() {
        var stall_id = $("#stallId").html();
        var route_id = "route-" + stall_id
        var x = $("#route-" + stall_id).attr("cx")
        var y = $("#route-" + stall_id).attr("cy")

        $(".route").attr("r", "3");

        // SHOW ADMIN OFFICE ROUTE
        $("#route-Admin-Office").show()
        // SHOW DIRECTION ROUTE
        $("#route-" + stall_id).show()
        // HIDE OFFCANVAS
        $("#stallNoRecordOffcanvas").offcanvas('hide');
        $("#stallOwnedOffcanvas").offcanvas('hide');
        // REMOVE CLASSES
        $('#removeSearched').removeClass("d-none");
        $('#searchButton').removeClass("rounded-end");
        $("#DryGoods").removeClass("fill");
        $('.map-section').removeClass("fill-assigned");
        // ADD CLASSES
        $('#' + stall_id).addClass("fill-assigned");
        // DISABLE DIRECTION BUTTONS
        $('.btn-directions').attr('disabled', 'disabled');
        // DRAW LINE
        $(function() {
          var svg = document.getElementsByClassName("svg-pan-zoom_viewport");
          var start_x = 2275
          var start_y = 810
          var destination_x = x
          var destination_y = y
          plotter(svg, start_x, start_y, destination_x, destination_y);
        });
      })

      // =======================================
      // FOR DIRECTIONS : LIVE SEARCHING OF STALLS
      // =======================================
      $(function() {
        $("#directionSearchStalls").keyup(function() {
          var input = $(this).val();
          // alert(input);
          if (input != "") {
            $.ajax({
              url: "includes/directions_stalls.inc.php",
              method: "POST",
              data: {
                input: input
              },
              success: function(data) {
                $("#directionSearchResults").html(data);
              }
            })
          } else {
            $("#directionSearchResults").html('')
          }
        })

        // FOR GETTING STALL NAME VALUE
        $(document).on("click", ".get-stall", function(e) {
          e.preventDefault();
          var stall_id = $(this).data("id");
          var stall_name = $(this).data("name");
          // alert(stall_name);
          $("#directionSearchStalls").val(stall_name)

          // FOR LOCATING THE DIRECTION OF THE STALL
          $("#btnLocateStall").click(function() {
            var route_id = "route-" + stall_id
            // GET X AND Y VALUE
            var x = $("#route-" + stall_id).attr("cx")
            var y = $("#route-" + stall_id).attr("cy")

            // CHANGE ROUTE RADIUS TO 5
            $(".route").attr("r", "5");

            // SHOW ROUTE 
            $("#route-Admin-Office").show()
            $("#route-" + stall_id).show()

            // HIDE DIRECTIONS OFF CANVAS
            $("#directionsOffcanvas").offcanvas('hide');

            // REMOVE CLASSES
            $('#removeSearched').removeClass("d-none");
            $('#searchButton').removeClass("rounded-end");
            $("#DryGoods").removeClass("fill");
            $('.map-section').removeClass("fill-assigned");

            // ADD CLASSES
            $('#' + stall_id).addClass("fill-assigned");

            // DISABLE BUTTON
            $('#btnLocateStall').attr('disabled', 'disabled');

            // DRAW THE DIRECTION
            $(function() {
              var svg = document.getElementsByClassName("svg-pan-zoom_viewport");
              var start_x = 2275
              var start_y = 810
              var destination_x = x
              var destination_y = y
              plotter(svg, start_x, start_y, destination_x, destination_y);
            });
          });
        });
      })

      // =======================================
      // FOR NAVBAR MENU : OFFCANVAS SHOW
      // =======================================
      $(function() {
        // NAVBAR MENU : DIRECTIONS
        $(document).on("click", "#btnDirections", function(e) {
          e.preventDefault();
          $("#directionsOffcanvas").offcanvas('show');
          $("#navbarOffcanvas").offcanvas('hide');
        });

        // NAVBAR MENU : ACCOUNT
        $(document).on("click", "#btnAccount", function(e) {
          e.preventDefault();
          $("#accountOffcanvas").offcanvas('show');
          $("#navbarOffcanvas").offcanvas('hide');
        });
        // NAVBAR MENU : ACCOUNT
        $(document).on("click", ".user-account", function(e) {
          e.preventDefault();
          $("#accountOffcanvas").offcanvas('show');
          $("#navbarOffcanvas").offcanvas('hide');
        });

      })
    </script>
  <?php
  } else {
  ?>
    <script>
      $(".btn-directions").click(function() {
        $("#displayNoAccount").modal('show');
      })

      $("#btnDirections").click(function() {
        $("#displayNoAccount").modal('show');
      });
    </script>
  <?php
  }
  ?>

  <!-- 
    =======================================
    FOR SUCCESS MESSAGE 
    =======================================
  -->

  <?php
  if (isset($_SESSION['success'])) {
  ?>
    <script>
      var Toast = Swal.mixin({
        toast: true,
        showCloseButton: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
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

  <!-- 
    =======================================
    FOR ERROR MESSAGE 
    =======================================
  -->

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
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
              <h1 class="m-0">About</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">About</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="card card-outline-main">
            <div class="card-header">
              <h5 class="card-title m-0">About PalengkeGO</h5>
            </div>
            <div class="card-body">
              <div class="pb-2">
                <p class="card-text">
                  <span class="font-weight-bold">PalengkeGO</span> is a system designed by Ron Vincent P. San Juan, Roselle F. Silvestre, and Isabel C. Cruz.
                  We are graduating students of Eastwoods Professional College of Science and Technology.
                  In partial fulfillment of the requirement for the degree of Bachelor of Science in Information Technology,
                  we decided to create <span class="font-weight-bold">PalengkeGO</span>.
                </p>
              </div>
              <hr>
              <div class="pb-2">
                <h5 class="pb-2"> For Users and Citizens</h5>
                <p class="card-text">
                  <span class="font-weight-bold">PalengkeGO</span> is designed to help citizens of Mariveles, Bataan, in terms of searching for products or items
                  they are looking for with just the use of their mobile phones, tablets, laptops, or computers at home.
                  It can also search for and locate stalls, filter the sections, and make the public market of Mariveles
                  Bataan accessible even if users are not present inside the public market.
                </p>
              </div>
              <hr>
              <div class="pb-2">
                <h5 class="pb-2"> For Stallholders and Vendors</h5>
                <p class="card-text">
                  <span class="font-weight-bold">PalengkeGO</span> caters to any citizens who aspire to be stallholders inside the public market. They can simply apply as
                  stallholder, provide the necessary details, and wait for the admin office to approve their application. Once an
                  applicant is approved and verified as a stallholder, they have the ability to manage their stalls by adding products,
                  adding vendors or helpers, and editing their stall by uploading their stall photo and indicating their stall name in
                  order for the stall to be known by users. Stallholders also have access to the map, where they can filter all the
                  unassigned stalls or vacant sections inside the public market.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="card card-outline-main">
            <div class="card-header">
              <h5 class="card-title m-0">About the Developers</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-main">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../assets/img/sanjuan.jpg" alt="User Avatar">
                      </div>
                      <h3 class="widget-user-username text-light font-weight-normal">Ron Vincent P. San Juan</h3>
                      <h5 class="widget-user-desc text-light">System Developer</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="mailto:ronvincent.sanjuan.rvsj@gmail.com" class="nav-link">
                            Email <span class="float-right bg-primary px-1 rounded">ronvincent.sanjuan.rvsj@gmail.com</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="https://www.facebook.com/rvincent.sanjuan/" class="nav-link">
                            Facebook <span class="float-right bg-info px-1 rounded">rvincent.sanjuan</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link">
                            Contact Number <span class="float-right bg-success px-1 rounded">09682267445</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-main">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../assets/img/fernandez.jpg" alt="User Avatar">
                      </div>
                      <h3 class="widget-user-username text-light font-weight-normal">Roselle F. Silvestre</h3>
                      <h5 class="widget-user-desc text-light">Project Manager</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="mailto:fernandezroselle0521@gmail.com" class="nav-link">
                            Email <span class="float-right bg-primary px-1 rounded">fernandezroselle0521@gmail.com</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="https://www.facebook.com/roselle.fernandez.391" class="nav-link">
                            Facebook <span class="float-right bg-info px-1 rounded">roselle.fernandez.391</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link">
                            Contact Number <span class="float-right bg-success px-1 rounded">09975200319</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-main">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../assets/img/default.png" alt="User Avatar">
                      </div>
                      <h3 class="widget-user-username text-light font-weight-normal">Isabel C. Cruz</h3>
                      <h5 class="widget-user-desc text-light">Project Manager</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="mailto:isabelcruz1326@gmail.com" class="nav-link">
                            Email <span class="float-right bg-primary px-1 rounded">isabelcruz1326@gmail.com</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="https://www.facebook.com/isabel.cruz.37051579" class="nav-link">
                            Facebook <span class="float-right bg-info px-1 rounded">isabel.cruz.37051579</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link">
                            Contact Number <span class="float-right bg-success px-1 rounded">09511028977</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>
  </div>

  <?php include 'dist/modal_stallholder.php' ?>
  <?php include 'dist/scripts_stallholder.php' ?>
  <script>
    $(function() {
      $(document).ready(function() {
        $("#navlinkAbout").addClass("active-link");
      });
    });
  </script>
</body>

</html>
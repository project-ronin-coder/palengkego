<!-- NAVBAR -->
<nav class="main-header navbar navbar-expand-md">
  <div class="container">
    <a href="home.php" class="navbar-brand">
      <img src="../assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" height="30" alt="">
    </a>
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon d-flex justify-content-center align-items-center">
        <i class="fa fa-bars"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="home.php" class="nav-link" id="navlinkHome">Home</a>
        </li>
        <li class="nav-item">
          <a href="stalls.php" class="nav-link " id="navlinkStalls">
            Stalls
            <span class="badge badge-danger navbar-badge d-none">
              <?php
              if ($stalls_owned_row == "") {
                echo "";
              } elseif ($stalls_owned_row > 0) {
                echo $stalls_owned_row;
              }
              ?>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="products.php" class="nav-link" id="navlinkProducts">Products</a>
        </li>
        <li class="nav-item">
          <a href="vendor_helper.php" class="nav-link" id="navlinkVendorsHelpers">Vendors/Helpers</a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link " id="navlinkAbout">About</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown" style="float: right;">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <?php echo $stallholder_fullname; ?>
          </a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li>
              <div class="stallholder mx-auto d-block">
                <img src="<?php echo (!empty($stallholder['valid_id'])) ? '../src/valid_id/' . $stallholder['valid_id'] : '../src/valid_id/default_id.png'; ?>" class="stallholder-image" alt="User Image">
              </div>
            </li>
            <li class="dropdown-divider"></li>
            <li><a href="account.php" class="dropdown-item" id="myAccount">My Account</a></li>
            <!-- <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                </li>

                <li class="dropdown-submenu">
                  <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                  <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                    <li><a href="#" class="dropdown-item">3rd level</a></li>
                    <li><a href="#" class="dropdown-item">3rd level</a></li>
                  </ul>
                </li>

                <li><a href="#" class="dropdown-item">level 2</a></li>
                <li><a href="#" class="dropdown-item">level 2</a></li>
              </ul>
            </li> -->
            <li class="dropdown-divider"></li>
            <li><a href="../logout.php" class="dropdown-item">Logout</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
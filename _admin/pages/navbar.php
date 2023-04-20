    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-light"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto ">
        <li class="nav-item">
          <div class="btn-group">
            <button id="admin-button" type="button"
              class="text-light btn dropdown-toggle d-flex align-items-center justify-content-center"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span
                class="mt-auto mb-auto d-none d-sm-block mr-2 hidden-xs text-light"><?php echo $admin['first_name'].' '.$admin['last_name']; ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right mt-2">
              <img
                src="<?php echo (!empty($admin['profile_picture'])) ? '../src/profile/'.$admin['profile_picture'] : '../src/profile/default.png'; ?>"
                class="admin-image mx-auto d-block rounded-circle" alt="User Image">
              <p class="text-center mt-2"><?php echo $admin['first_name'].' '.$admin['last_name']; ?></p>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Update</a>
              <a class="dropdown-item" href="../logout.php">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
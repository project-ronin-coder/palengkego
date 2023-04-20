<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-2">
  <!-- Brand Logo -->
  <div class="brand-link elevation-2">
    <img src="../assets/img/_PalengkeGo_Single.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2 bg-light">
    <span class="brand-text logo-title text-light ">PalengkeGo</span>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="sidebar-menu nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link ">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- Map -->
        <li class="nav-item">
          <a href="map.php" class="nav-link">
            <i class="nav-icon fas fa-map"></i>
            <p>
              Map
            </p>
          </a>
        </li>
        <!-- Stalls -->
        <li class="nav-item">
          <a id="store-icon" class="btn nav-link d-flex align-items-center" data-toggle="collapse" href="#collapseStalls" role="button" aria-expanded="true" aria-controls="collapseStalls">
            <i class="nav-icon fas fa-store"></i>
            <p>
              Stalls
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <div class="collapse ml-2" id="collapseStalls">
            <ul class="nav">
              <li class="nav-item">
                <a id="listofstalls" href="stalls_assigned.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Assigned Stalls</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="stalls_unassigned.php" class="nav-link">
                  <i id="listOfStallholders" class="far fa-circle nav-icon"></i>
                  <p>List of Unassigned Stalls</p>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- Stallholders -->
        <li class="nav-item">
          <a href="stallholders.php" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Stallholders
            </p>
          </a>
        </li>
        <!-- Applicants -->
        <li class="nav-item">
          <a href="applicants.php" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Applicants
              <!-- <span class="badge badge-warning right">
                <?php include 'row/applicants_rowCount.php'; ?>
              </span> -->
            </p>
          </a>
        </li>
        <!-- Users -->
        <li class="nav-item">
          <a href="users.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        <!-- Reports -->
        <li class="nav-item">
          <a href="reports.php" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Reports
            </p>
          </a>
        </li>
        <!-- <li class="nav-header">EXAMPLES</li> -->
      </ul>
    </nav>
  </div>
</aside>
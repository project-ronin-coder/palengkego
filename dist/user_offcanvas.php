<!-- OFFCANVAS: NAVBAR -->
<div class="offcanvas offcanvas-start" id="navbarOffcanvas">

  <!-- HEADER -->
  <div id="navbarHeader" class="offcanvas-header py-1">
    <img src="assets/img/PalengkeGO_Main_Logo.png" alt="picture logo of PalengkeGO" class="palengkego-logo" id="palengkegoLogo">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <!-- SEPARATOR -->
  <hr id="navbarSeparator" class="m-0">

  <!-- BODY -->
  <div id="navbarBody" class="offcanvas-body px-0 pt-0">
    <button id="btnDirections" class="btn-navbar btn rounded-0">
      <i class="icon-navbar fa fa-route"></i>
      <span class="title-navbar ms-2">Directions</span>
    </button>
    <button id="btnStalls" class="btn-navbar btn rounded-0">
      <i class="icon-navbar fa fa-store"></i>
      <span class="title-navbar ms-2">Stalls</span>
    </button>
    <button id="btnFilter" class="btn-navbar btn rounded-0 ">
      <i class="icon-navbar fa fa-filter"></i>
      <span class="title-navbar ms-2">Filter</span>
    </button>
    <button id="btnAccount" class="btn-navbar btn rounded-0 ">
      <i class="icon-navbar fa fa-user"></i>
      <span class="title-navbar ms-2">Account</span>
    </button>
    <button id="btnAbout" class="btn-navbar btn rounded-0 ">
      <i class="icon-navbar fa fa-info"></i>
      <span class="title-navbar ms-2">About</span>
    </button>
    <button id="btnGuide" class="btn-navbar btn rounded-0 ">
      <i class="icon-navbar fa fa-question"></i>
      <span class="title-navbar ms-2">Guide</span>
    </button>
  </div>
  <div class="offcanvas-footer bg-main d-flex justify-content-end">
    <?php
    if (isset($_SESSION['user']) || isset($_SESSION['stallholder'])) {
      echo '
      <a href="logout.php" id="btnLoginCreate" class="btn-main btn rounded-0 p-2 w-100 d-none ">
        <span class="title-navbar ms-2">Logout</span>
        <i class="fa fa-arrow-alt-circle-right"></i>
      </a>
          ';
    } else {
      echo '
      <a href="login.php" id="btnLoginCreate" class="btn-main btn rounded-0 p-2 w-100 d-none">
        <span class="title-navbar ms-2">Login or Create an Account</span>
        <i class="fa fa-arrow-alt-circle-right"></i>
      </a>
      ';
    }
    ?>

  </div>
</div>

<!-- OFFCANVAS: DIRECTIONS -->

<div class="offcanvas offcanvas-navbar-menu offcanvas-start" id="directionsOffcanvas">
  <!-- HEADER -->
  <div id="directionsHeader" class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Directions</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="directionsBody" class="offcanvas-body">
    <div class="container">
      <div class="row mb-2">
        <label for="directionStart" class="col-sm-4 col-form-label">Start Location</label>
        <div class="input-group mb-2 col-sm-8">
          <div class="input-group-text bg-main"><i class="icon-navbar fa fa-crosshairs"></i></div>
          <input class="form-control" id="directionStart" value="Admin Office" disabled>
        </div>
      </div>
      <div class="row mb-2">
        <label for="directionSearchStalls" class="col-sm-4 col-form-label">Destination</label>
        <div class="input-group mb-2 col-sm-8">
          <div class="input-group-text bg-main"><i class="icon-navbar fa fa-map-marker-alt"></i></div>
          <input class="form-control" id="directionSearchStalls" placeholder="Search for Stalls..." required>
        </div>
      </div>
    </div>
    <hr>
    <div class="list-group" id="directionSearchResults">
    </div>
  </div>
  <div class="offcanvas-footer p-2 bg-main d-flex justify-content-end">
    <button type="submit" id="btnLocateStall" class="btn btn-flat btn-light btn-locate-stall">
      <i class="fa fa-route pr-1"></i>
      Start
    </button>
  </div>
</div>

<!-- OFFCANVAS: STALLS -->

<div class="offcanvas offcanvas-navbar-menu offcanvas-start" id="stallsOffcanvas">
  <!-- HEADER -->
  <div id="stallsHeader" class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Search Stalls</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="stallsBody" class="offcanvas-body">
    <div class="container">
      <div class="input-group">
        <div class="input-group-text"><i class="icon-navbar fa fa-store"></i></div>
        <input class="form-control" id="searchStalls" placeholder="Search for Stalls...">
        <div class="input-group-text bg-main"><i class="icon-navbar fa fa-search"></i></div>
      </div>
    </div>
    <hr>
    <div class="list-group" id="searchResult">
    </div>
  </div>
</div>

<!-- OFFCANVAS: FILTER -->

<div class="offcanvas offcanvas-navbar-menu offcanvas-start" id="filterOffcanvas">
  <!-- HEADER -->
  <div id="filterHeader" class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter Sections</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="filterBody" class="offcanvas-body">
    <ul class="list-group mb-2">
      <li class="list-group-item bg-success text-light" aria-current="true">Guide</li>
      <li class="list-group-item">1. Click the section you want to locate</li>
      <li class="list-group-item">2. Click again to remove the selection</li>
    </ul>
    <button id="btnOccupied" class="btn btn-success d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-occupied right px-2 me-2">‎ </span>
      <span class="me-2">Occupied</span>
      <i class="fa fa-check"></i>
    </button>
    <button id="btnDG" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-dgs right px-2 me-2">‎ </span>
      <span class="me-2">Dry Goods Section</span>
      <i class="fa fa-times"></i>
    </button>
    <button id="btnDGAS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-dgas right px-2 me-2">‎ </span>
      <span class="me-2">Dry Goods Annex Section-Muslim</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnGS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-gs right px-2 me-2">‎ </span>
      <span class="me-2">Grocery Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnGSE" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-gse right px-2 me-2">‎ </span>
      <span class="me-2">Grocery Section Extension</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnFS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-fs right px-2 me-2">‎ </span>
      <span class="me-2">Fish Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnMS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-ms right px-2 me-2">‎ </span>
      <span class="me-2">Meat Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnFRTS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-frts right px-2 me-2">‎ </span>
      <span class="me-2">Fruit Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnVGTS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-vgts right px-2 me-2">‎ </span>
      <span class="me-2">Vegetable Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnFVE" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-fve right px-2 me-2">‎ </span>
      <span class="me-2">Fruit and Vegetable Section Extension</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnPFS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-pfs right px-2 me-2">‎ </span>
      <span class="me-2">Processed Foods Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnCS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-cs right px-2 me-2">‎ </span>
      <span class="me-2">Carinderia Section</span>
      <i class="fa fa-times me-2"></i>
    </button>
    <button id="btnAdmin" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
      <span class="badge badge-admin right px-2 me-2">‎ </span>
      <span class="me-2">Admin Office</span>
      <i class="fa fa-times me-2"></i>
    </button>
  </div>
</div>

<!-- OFFCANVAS: ACCOUNT -->

<div class="offcanvas offcanvas-navbar-menu offcanvas-start" id="accountOffcanvas">
  <!-- HEADER -->
  <div id="filterHeader" class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
      General Account Settings
    </h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <hr class="m-0">
  <div id="filterBody" class="offcanvas-body">
    <?php
    if (isset($_SESSION['user'])) {
      echo '
          <div>
            <img class="img-thumbnail d-block mx-auto w-50" src="src/profile/' . $user_profile . '" alt="">
          </div>
          <div class="mt-2">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Name: ' . $user_name . '</li>
              <li class="list-group-item">Username: ' . $user_username . '</li>
              <li class="list-group-item">Email: ' . $user_email . '</li>
              <li class="list-group-item">Contact Number: ' . $user_contact_number . '</li>
              <li class="list-group-item">User Type: ' . $user_type . '</li>
            </ul>
          </div>
          <hr class="my-2">
          <h5>Account Settings</h5>
          <div>
            <button id="btnPersonalDetails" class="btn-navbar btn btn-secondary rounded-0 mb-1">
              <i class="icon-navbar fa fa-user"></i>
              <span class="title-navbar ms-2">Personal Details</span>
            </button>
            <button id="btnUpdateUsername" class="btn-navbar btn btn-secondary rounded-0 mb-1">
              <i class="icon-navbar fa fa-user"></i>
              <span class="title-navbar ms-2">Update Username</span>
            </button>
            <button id="btnUpdateEmail" class="btn-navbar btn btn-secondary rounded-0 mb-1">
              <i class="icon-navbar fa fa-envelope"></i>
              <span class="title-navbar ms-2">Update Email</span>
            </button>
            <button id="btnChangePassword" class="btn-navbar btn btn-secondary rounded-0 mb-1">
              <i class="icon-navbar fa fa-lock"></i>
              <span class="title-navbar ms-2">Change Password</span>
            </button>
            <button id="btnProfilePicture" class="btn-navbar btn btn-secondary rounded-0 mb-1">
              <i class="icon-navbar fa fa-portrait"></i>
              <span class="title-navbar ms-2">Change Profile Picture</span>
            </button>
          </div>
          ';
    } else if (isset($_SESSION['stallholder'])) {
      echo '
          <div>
            <img class="img-thumbnail d-block mx-auto w-50" src="src/valid_id/' . $user_profile . '" alt="">
          </div>
          <div class="mt-2">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Name: ' . $stallholder_name . '</li>
              <li class="list-group-item">Address: ' . $stallholder_address . '</li>
              <li class="list-group-item">Email: ' . $stallholder_email . '</li>
              <li class="list-group-item">Contact Number: ' . $stallholder_contact_number . '</li>
              <li class="list-group-item">User Type: ' . $user_type . '</li>
            </ul>
          </div>
      ';
    } else {
      echo '';
    }
    ?>
  </div>
  <div class="offcanvas-footer p-0 bg-danger d-flex justify-content-end">
    <?php
    if (isset($_SESSION['user'])) {
      echo '
      <button id="btnDeactivateAccount" class="btn-navbar btn-danger btn rounded-0 d-flex justify-content-center align-items-center">
        <i class="icon-navbar fa fa-portrait"></i>
        <span class="title-navbar ms-2">Deactivate Account</span>
      </button>
          ';
    } else if (isset($_SESSION['stallholder'])) {
      echo '
      <a href="_stallholder/account.php" id="btnEditStallholderAccount" class="btn-navbar btn-main btn rounded-0 d-flex justify-content-center align-items-center">
        <i class="icon-navbar fa fa-portrait"></i>
        <span class="title-navbar ms-2">Edit Account</span>
      </a>
      ';
    } else {
      echo 'Account';
    }
    ?>
  </div>
</div>

<div class="offcanvas offcanvas-navbar-menu offcanvas-start" id="AboutOffcanvas">
  <!-- HEADER -->
  <div id="stallsHeader" class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">About</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="stallsBody" class="offcanvas-body">
    <div class="accordion" id="accordionAbout">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            About PalengkeGO
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionAbout">
          <div class="accordion-body">
            <p>
              <strong class="me-1 text-success">PalengkeGO</strong> is a system designed by Ron Vincent P. San Juan, Roselle F. Silvestre, and Isabel C. Cruz.
              We are graduating students of <a href="https://www.facebook.com/EPCST" class="fst-italic">Eastwoods Professional College of Science and Technology</a>.
              In partial fulfillment of the requirement for the degree of Bachelor of Science in Information Technology,
              we decided to create <strong class="me-1 text-success">PalengkeGO</strong>.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            For Users and Citizens
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionAbout">
          <div class="accordion-body">
            <p>
              <strong class="text-success">PalengkeGO</strong> is designed to help citizens of Mariveles, Bataan, in terms of searching for products or items
              they are looking for with just the use of their mobile phones, tablets, laptops, or computers at home.
              It can also search for and locate stalls, filter the sections, and make the public market of Mariveles
              Bataan accessible even if users are not present inside the public market.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            For Stallholders and Vendors
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionAbout">
          <div class="accordion-body">
            <p>
              <strong class="text-success">PalengkeGO</strong> caters to any citizens who aspire to be stallholders inside the public market. They can simply apply as
              stallholder, provide the necessary details, and wait for the admin office to approve their application. Once an
              applicant is approved and verified as a stallholder, they have the ability to manage their stalls by adding products,
              adding vendors or helpers, and editing their stall by uploading their stall photo and indicating their stall name in
              order for the stall to be known by users. Stallholders also have access to the map, where they can filter all the
              unassigned stalls or vacant sections inside the public market.
            </p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            About Developers
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionAbout">
          <div class="accordion-body">
            <div class="list-group mb-2">
              <a class="list-group-item list-group-item-action bg-success m-0" aria-current="true">
                <span class="fs-5 fw-semibold text-light">Ron Vincent P. San Juan</span>
                <br>
                <span class="text-light">System Developer</span>
              </a>
              <a href="mailto:ronvincent.sanjuan.rvsj@gmail.com" class="list-group-item list-group-item-success list-group-item-action d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Email</span>
                <span class="badge bg-primary rounded-pill">ronvincent.sanjuan.rvsj@gmail.com</span>
              </a>
              <a href="https://www.facebook.com/rvincent.sanjuan/" class="list-group-item list-group-item-success list-group-item-action d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Facebook</span>
                <span class="badge bg-primary rounded-pill">rvincent.sanjuan</span>
              </a>
              <a class="list-group-item list-group-item-success d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Contact Number</span>
                <span class="badge bg-primary rounded-pill">09682267445</span>
              </a>
            </div>
            <div class="list-group mb-2">
              <a class="list-group-item list-group-item-action bg-success m-0" aria-current="true">
                <span class="fs-5 fw-semibold text-light">Roselle F. Silvestre</span>
                <br>
                <span class="text-light">Project Manager</span>
              </a>
              <a href="mailto:fernandezroselle0521@gmail.com" class="list-group-item list-group-item-success list-group-item-action d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Email</span>
                <span class="badge bg-primary rounded-pill">fernandezroselle0521@gmail.com</span>
              </a>
              <a href="https://www.facebook.com/roselle.fernandez.391" class="list-group-item list-group-item-success list-group-item-action d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Facebook</span>
                <span class="badge bg-primary rounded-pill">roselle.fernandez.391</span>
              </a>
              <a class="list-group-item list-group-item-success d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Contact Number</span>
                <span class="badge bg-primary rounded-pill">09975200319</span>
              </a>
            </div>
            <div class="list-group mb-2">
              <a class="list-group-item list-group-item-action bg-success m-0" aria-current="true">
                <span class="fs-5 fw-semibold text-light">Isabel C. Cruz</span>
                <br>
                <span class="text-light">Project Manager</span>
              </a>
              <a href="mailto:isabelcruz1326@gmail.com" class="list-group-item list-group-item-success list-group-item-action d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Email</span>
                <span class="badge bg-primary rounded-pill">isabelcruz1326@gmail.com</span>
              </a>
              <a href="https://www.facebook.com/isabel.cruz.37051579" class="list-group-item list-group-item-success list-group-item-action d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Facebook</span>
                <span class="badge bg-primary rounded-pill">isabel.cruz.37051579</span>
              </a>
              <a class="list-group-item list-group-item-success d-flex flex-column justify-content-between align-items-center m-0">
                <span class="text-dark">Contact Number</span>
                <span class="badge bg-primary rounded-pill">09511028977</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-navbar-menu offcanvas-start" id="GuideOffcanvas">
  <!-- HEADER -->
  <div id="stallsHeader" class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Welcome to PalengkeGO!</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="stallsBody" class="offcanvas-body ">
    <div class="accordion" id="accordionGuide">
      <div class="accordion-item ">
        <h2 class="accordion-header " id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Guide for Users without Account
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul class="list-group mb-2">
              <li class="list-group-item bg-primary text-light fw-semibold" aria-current="true">PalengkeGO has limited restrictions for users without accounts.</li>
              <li class="list-group-item">1. Users without accounts are restricted from locating the direction of the stalls.</li>
              <li class="list-group-item">2. Users without accounts are unable to use the <span class="fw-bold">Directions</span> feature in the sidebar menu.</li>
              <li class="list-group-item">BUT, there are also features that you can freely use without having an account!</li>
              <li class="list-group-item">3. PalengkeGO welcomes its users from using the <span class="fw-bold">Search</span> feature. Just click the search box and type products you want to find in the Mariveles Public Market Map.</li>
              <li class="list-group-item">4. Users can also use the <span class="fw-bold">Stalls</span> feature in the sidebar menu if they want to find stalls they're familiar with. Just simply click the sidebar menu and proceed to the <span class="fw-bold">Stalls</span> section.</li>
              <li class="list-group-item">5. <span class="fw-bold">Filter</span> feature is also available for use. This feature filters out the map from its different sections. You can also find this feature in the sidebar menu.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item ">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Guide for Users with Account
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul class="list-group mb-2">
              <li class="list-group-item bg-primary text-light fw-semibold" aria-current="true">PalengkeGO gives full access to users with verified accounts. Just make sure your account is <span class="fw-bold">verified.</span> They have access to:</li>
              <li class="list-group-item">1. Users can use the <span class="fw-bold">Search</span> feature for searching products in the Mariveles Public Market.</li>
              <li class="list-group-item">2. Users can use the <span class="fw-bold">Directions</span> feature for finding the directions to the stall they want to find.</li>
              <li class="list-group-item">3. Users can use the <span class="fw-bold">Stalls</span> feature for finding the directions to the stall they want to find.</li>
              <li class="list-group-item">4. Users can use the <span class="fw-bold">Filter</span> feature for filtering out different sections of the map</li>
              <li class="list-group-item">5. If you want to edit your account, click on the User Icon on the top right of the app. Proceed to the <span class="fw-bold">Account</span> section</li>
              <li class="list-group-item">For the <span class="fw-bold">Account Section</span></li>
              <li class="list-group-item ps-4">a. Click on <span class="fw-bold">Personal Details</span> if you want to edit your personal details.</li>
              <li class="list-group-item ps-4">b. Click on <span class="fw-bold">Update Email</span> if you want to update your email address.</li>
              <li class="list-group-item ps-4">c. Click on <span class="fw-bold">Update Userrname</span> if you want to update your username.</li>
              <li class="list-group-item ps-4">d. Click on <span class="fw-bold">Change Password</span> if you want to change your password.</li>
              <li class="list-group-item ps-4">e. Click on <span class="fw-bold">Change Profile Picture</span> if you want to update your profile picture.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item ">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Guide for Stallholders
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <ul class="list-group mb-2">
              <li class="list-group-item bg-success text-light" aria-current="true">PalengkeGO also gives full access to stallholders. They have access to:</li>
              <li class="list-group-item">1. Searching <span class="fw-bold">Products</span>. Stallholders can also search for products. Just click on the search button located on the top left of the app</li>
              <li class="list-group-item">2. Locating <span class="fw-bold">Stalls</span>. Stallholders can freely locate stalls even their own. Just click on the sidebar menu and proceed to <span class="fw-bold">Directions</span> tab</li>
              <li class="list-group-item">3. Searching <span class="fw-bold">Stalls</span> Stallholders can freely search stalls even their own. Just click on the sidebar menu and proceed to <span class="fw-bold">Directions</span> tab</li>
              <li class="list-group-item">4. Filtering Sections in the Map. Stallholders can also user the Filter Feature located in the <span class="fw-bold">Filter</span> tab. This feature filters out different sections in the map</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="offcanvas offcanvas-stall offcanvas-start" id="stallOwnedOffcanvas">
  <!-- HEADER -->
  <div id="stallOwnedHeader" class="offcanvas-header bg-main">
    <h5 class="offcanvas-title stall-name text-light" id="stallName">Stall Name</h5>
    <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="stallOwnedBody" class="offcanvas-body">
    <!-- ID -->
    <input type="hidden" class="stall-id" id="stall-id" name="id">
    <!-- STALL PHOTO -->
    <img src="" class="img-thumbnail mb-2 stall-photo" id="stallPhoto" alt="">
    <h6 class="fw-semibold">Stall Owner: <span class="stallholder fs-6"></span></h6>
    <h6 class="fw-semibold">Section: <span class="stall-section fs-6" id="stallSection"></span></h6>
    <h6 class="fw-semibold">Section ID: <span class="stall-id fs-6" id="stallId"></span></h6>
    <hr class="my-2">
    <!-- PRODUCTS -->
    <div class="container mb-2">
      <h5><strong id="productList">Product List</strong></h5>
      <ul class="list-group products-group">
        <li class="list-group-item m-0">No Products Found</li>
      </ul>
    </div>
    <div class="container mb-2">
      <h5><strong id="vendorHelperList">Vendors/Helpers List</strong></h5>
      <ul class="list-group vendor-helper-group">
        <li class="list-group-item m-0">No Vendors/Helpers Found</li>
      </ul>
    </div>
  </div>
  <div class="offcanvas-footer p-2 bg-main d-flex justify-content-end">
    <button type="submit" form="editStoreApplicant" class="btn btn-flat btn-light btn-directions" name="edit-request">
      <i class="fa fa-route pr-1"></i>
      Directions
    </button>
  </div>
</div>

<div class="offcanvas offcanvas-stall offcanvas-start" id="stallNoRecordOffcanvas">
  <!-- HEADER -->
  <div id="stallNoRecordHeader" class="offcanvas-header bg-danger">
    <div class="m-0 p-0">
      <h5 class="modal-title">Section: <span class="stall-section" id="stallSection"></span></h5>
      <h5 class="modal-title">Section ID: <span class="stall-id" id="stallId"></span></h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <!-- BODY -->
  <div id="stallNoRecordBody" class="offcanvas-body  d-flex flex-column justify-content-center align-items-center">
    <i class="fa fa-times-circle fa-5x text-danger mb-3"></i>
    <h1 class="text-center">No Record Found!</h1>
  </div>
  <div id="stallNoRecordFooter" class="offcanvas-footer p-2 bg-danger d-flex justify-content-end">
    <button type="submit" form="editStoreApplicant" class="btn btn-flat btn-light btn-directions" name="edit-request">
      <i class="fa fa-route pr-1"></i>
      Directions
    </button>
  </div>
</div>
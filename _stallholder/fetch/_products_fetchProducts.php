<!-- QUERY -->
<?php
$conn = $pdo->open();
try {
  $stmt = $conn->prepare("
    SELECT
    so.id,
    ss.stall_id,ss.section,
    sh.first_name, sh.last_name, sh.address, sh.contact_number, sh.email, sh.password, sh.valid_id, sh.user_type, sh.status, sh.activate_code, sh.reset_code,
    so.stall_name, so.stall_photo, so.stall_status, so.created_on
    
    FROM `stalls_owned` as so 

    INNER JOIN stall_section as ss ON so.stall_id = ss.id
    INNER JOIN stall_holders as sh ON so.stall_holder_id = sh.id

    WHERE so.stall_status = 1 AND so.stall_holder_id=:id
    ");
  $stmt->execute(['id' => $stallholder_id]);
  $stmt = $stmt->fetchAll();

  if (count($stmt) == 0) {
    echo '
        <div class="alert alert-info alert-dismissible w-100">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> No Products Found</h5>
          You are not assigned to any stalls. Please proceed to the admin office for inquiries about your stalls and products.
        </div>
    ';
  }
  foreach ($stmt as $row) {
    // STALL ID
    $stallId = $row['id'];
    // STALL PHOTO
    $stallPhoto = (!empty($row['stall_photo'])) ? '../src/stall_photo/' . $row['stall_photo'] : '../src/stall_photo/default_stall.png';
    // STALL OWNER NAME
    $stallOwnerName = $row['first_name'] . " " . $row['last_name'];
    // STALL NAME
    $stallName = ($row['stall_name']) ? '<span>' . $row['stall_name'] . '</span>' : '<span>' . $stallOwnerName . '\'s Stall' . '</span>';
    // STALL SECTION
    $stallSection = $row['stall_id'];
    // STALL CATEGORY
    $stallCategory = $row['section'] . " (" . $stallSection . ")";
    // INITIALIZATION

    $stmt = $conn->prepare('SELECT * FROM products WHERE stall_id=:id');
    $stmt->execute(['id' => $stallId]);
    $products = $stmt->fetchAll();
    echo "
      <div id='stallCard' class='card card-widget widget-user stall-card col-lg-6 col-md-12 col-xl-6'>
        <form action='includes/redirect_to_productView.php?id=" . $stallId . "' method='GET'>
          <div class='card-footer stall-card-footer p-2'>
  
            <input type='hidden' class='stall-id' value='" . $stallId . "' name='stall_id'>
            <div class='small-box bg-light border border-main'>
              <div class='inner pb-2 m-0'>
                <div class='card'>
                  <div class='card-header card-main pb-2'>
                    <h4 class='card-title text-white'>" . $stallName . "</h4>
                    <div class='card-tools collapse-btn'>
                      <button type='button' class='btn btn-tool btn-collapse' data-id='" . $stallId . "' data-card-widget='collapse'>
                        <i class='fas fa-plus text-white'></i>
                      </button>
                    </div>
                  </div>
                  <div class='card-body border border-main p-0'>
                    <ul class='list-group products-group'>
                      <li class='list-group-item m-0 rounded-0 h6 text-bold text-center'>Product list</li>
                    ";
    if (count($products) == 0) {
      echo "          <li class='list-group-item m-0 rounded-0 product-item text-center'>
                                        <span>No products found.</span>
                                      </li>
                              ";
    } else {
      foreach ($products as $row) {
        $productID = $row['id'];
        $productName = $row['product_name'];
        $productPrice = 'Php' . ' ' . $row['product_price'] . '.00';
        echo "        <li class='list-group-item m-0 rounded-0 product-item text-center' data-id='" . $productID . "'>
                          <span>" . $productName . "</span>
                        </li>
          ";
      }
    }
    echo "
                    </ul>
                  </div>
                </div>
              </div>
              <div class='small-box-footer bg-main text-white m-0 p-0'>
                <button type='submit' class='w-100 btn p-2 m-0 rounded-0 btn-add-product' name='redirect'><span class='h5 mr-2'>Add Products</span><i class='fas fa-plus text-white'></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
      ";
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
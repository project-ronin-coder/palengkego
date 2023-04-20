<?php
include '../_session.php';

if (isset($_POST['input'])) {
  $conn = $pdo->open();
  $inpText = $_POST['input'];
  $sql = '
  SELECT 
  so.id, so.stall_name,
  ss.stall_id

  FROM stalls_owned as so 

  INNER JOIN stall_section as ss ON so.stall_id = ss.id

  WHERE stall_name 
  LIKE :keyword

  AND so.stall_status=1
  ';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['keyword' => '%' . $inpText . '%']);
  $result = $stmt->fetchAll();

  if ($result) {
    foreach ($result as $row) {
      echo '
          <button type="button" class="list-group-item list-group-item-action view-product" data-id="' . $row['stall_id'] . '">
            <i class="fas fa-box text-secondary me-2"></i>
            <span>' . $row['stall_name'] . '</span>
          </button>
          ';
    }
  } else {
    echo '<li class="list-group-item">No Stall Found</li>';
  }
  $pdo->close();
}

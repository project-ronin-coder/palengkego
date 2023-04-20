<?php
include '../../_session.php';

if (isset($_POST['edit_stall'])) {
  $id = $_POST['stall_id'];
  $stall_name = $_POST['stall_name'];

  $conn = $pdo->open();
  $stmt = $conn->prepare("SELECT * FROM stalls_owned WHERE id=:id");
  $stmt->execute(['id' => $id]);
  $row = $stmt->fetch();
  try {
    $stmt = $conn->prepare("UPDATE stalls_owned SET stall_name=:stall_name WHERE id=:id");
    $stmt->execute([
      'stall_name' => $stall_name,
      'id' => $id
    ]);
    $_SESSION['success'] = 'Update Success!';
    $_SESSION['message'] = 'Stall information updated successfully';
    header('location: ../stalls_assigned.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stalls_assigned.php');
  }

  $pdo->close();
} elseif (isset($_POST['upload_stall_photo'])) {
  $id = $_POST['stall_id'];
  $filename = $_FILES['stall_photo']['name'];
  $source_photo  = $_FILES['stall_photo']['tmp_name'];
  $namecreate = "stall_photo" . "_" . time() . "_";
  $namecreatenumber = rand(1000, 10000);
  $picname = $namecreate . $namecreatenumber;
  $finalname = $picname . ".jpeg";

  if (!empty($filename)) {
    move_uploaded_file($_FILES['stall_photo']['tmp_name'], '../../src/stall_photo/' . $finalname);
  }
  compress_image("../../src/stall_photo/" . $finalname, "../../src/stall_photo/" . $finalname, 100);

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE stalls_owned SET stall_photo=:stall_photo WHERE id=:id");
    $stmt->execute(['stall_photo' => $finalname, 'id' => $id]);
    $_SESSION['info'] = 'Update Stall Photo';
    $_SESSION['message'] = 'Stall photo updated successfully';
    header('location: ../stalls_assigned.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stalls_assigned.php');
  }

  $pdo->close();
} elseif (isset($_POST['unassign_stall'])) {
  $id = $_POST['stall_id'];
  $now = date('Y-m-d');

  $conn = $pdo->open();

  try {
    $stmt = $conn->prepare("UPDATE stalls_owned SET stall_status = 0, stall_id = 0, unassigned_on=:unassigned_date  WHERE id=:id");
    $stmt->execute(['id' => $id, 'unassigned_date' => $now]);

    $_SESSION['success'] = 'Success!';
    $_SESSION['message'] = 'Stall unassigned successfully';
    header('location: ../stalls_assigned.php');
  } catch (PDOException $e) {
    $_SESSION['error'] = 'Error!';
    $_SESSION['message'] = $e->getMessage();
    header('location: ../stalls_assigned.php');
  }

  $pdo->close();
} elseif (isset($_POST['redirect'])) {
  $stallholder_name = $_POST['stall_holder_name'];
  $_SESSION['info'] = 'Edit Stallholder';
  $_SESSION['message'] = 'Edit stallholder named ' . $stallholder_name;
  header('location: ../stallholders.php');
} elseif (isset($_POST['redirect_to_map'])) {
  $_SESSION['info'] = 'Assign Stallholder';
  $_SESSION['message'] = 'Choose a section for assignment of Stallholder';
  header('location: ../map.php');
} elseif (isset($_GET['redirect_to_products'])) {
  $stall_id = $_GET['stall_id'];
  header('location: ../products.php?id=' . $stall_id);
}

function compress_image($source_url, $destination_url, $quality)
{
  $info = getimagesize($source_url);

  if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
  elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
  elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
  elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);

  //save it
  imagejpeg($image, $destination_url, $quality);

  //return destination file url
  return $destination_url;
}

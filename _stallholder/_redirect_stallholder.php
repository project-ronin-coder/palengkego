<?php
if (!isset($_SESSION['stallholder']) || trim($_SESSION['stallholder']) == '') {
  header('location: ../login.php');
  session_destroy();
  exit();
} elseif (isset($_SESSION['admin'])) {
  header('location: ../login.php');
  session_destroy();
  exit();
} elseif (isset($_SESSION['user'])) {
  header('location: ../login.php');
  session_destroy();
  exit();
}

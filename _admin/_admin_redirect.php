<?php
if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
  header('location: ../login.php');
  session_destroy();
  exit();
} elseif (isset($_SESSION['user'])) {
  header('location: ../login.php');
  session_destroy();
  exit();
} elseif (isset($_SESSION['stallholder'])) {
  header('location: ../login.php');
  session_destroy();
  exit();
}
